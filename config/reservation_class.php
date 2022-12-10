<?php 

date_default_timezone_set('Asia/Manila');
require 'db.php';
require 'conn.php';

class class_model{


	private $dsn = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db = DB_NAME;
	private $conn;

	public function __construct()
	{
		$this->db_conn();
	}


	private function db_conn(){
		$this->conn = new mysqli($this->dsn, $this->user, $this->pass, $this->db);
		if(!$this->conn){
			$this->error = "Fatal Error: Can't connect to database, or database is not define!".$this->conn->connect_error;
			return false;
		}
	}

//login process

	public function login_admin($username, $password){
		$stmt = $this->conn->prepare("SELECT * FROM `tbl_user` WHERE `admin_username` = ? AND `password` = ?") or die($this->conn->error);
		$stmt->bind_param("ss",$username, $password);
		if($stmt->execute()){
			$result = $stmt->get_result();
			$valid = $result->num_rows;
			$fetch = $result->fetch_array();
			return array(
				'user_id'=> htmlentities($fetch['user_id']),
				'role'=>$fetch['role'],
				'count'=>$valid
			);
		}
	}

	public function login_user($email, $password){
		$stmt = $this->conn->prepare("SELECT * FROM `tbl_user` WHERE `email` = ? AND `password` = ? AND `role` = 'USER' ") or die($this->conn->error);
		$stmt->bind_param("ss",$email, $password);
		if($stmt->execute()){
			$result = $stmt->get_result();
			$valid = $result->num_rows;
			$fetch = $result->fetch_array();
			return array(
				'user_id'=> htmlentities($fetch['user_id']),
				'user_fullname' => htmlentities($fetch['name']),
				'role'=>$fetch['role'],
				'count'=>$valid
			);
		}
	}
//session
	public function user_account($user_id){
		$stmt = $this->conn->prepare("SELECT * FROM `tbl_user` WHERE `user_id` = ? ") or die($this->conn->error);
		$stmt->bind_param("i", $user_id);
		if($stmt->execute()){
			$result = $stmt->get_result();
			$fetch = $result->fetch_array();
			return array(
				'name'=> $fetch['name'],
				'role'=>$fetch['role']
			);
		}	
	}


	public function fetchstaff()
	{
		$query = "SELECT * FROM tbl_user WHERE `role` = 'STAFF' ";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function Inquire()
	{
		$query = "SELECT * FROM tbl_inquiries";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function InquireByid($id){
		$sql = "SELECT * FROM  tbl_inquiries WHERE id = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function add_reply($message,$inquire_id){
		$sql = "UPDATE `tbl_inquiries` SET `reply` = ? WHERE `id` = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("si",$message, $inquire_id);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	
	public function getProfile($id){
		$sql = "SELECT * FROM  tbl_user WHERE user_id = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}


	public function sessionUser($id){
		$sql = "SELECT * FROM  tbl_user WHERE user_id = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	//account add
	// public function add_user($fullname,$email,$password){
	// 	$stmt = $this->conn->prepare("INSERT INTO `tbl_user` (`name`,`email`,`password`) VALUES(?, ?, ?)") or die($this->conn->error);
	// 	$stmt->bind_param("sss", $fullname,$email,$password);
	// 	if($stmt->execute()){
	// 		$stmt->close();
	// 		$this->conn->close();
	// 		return true;
	// 	}
	// }

	public function add_staff($name,$username,$email,$password,$role, $image){
		$stmt = $this->conn->prepare("INSERT INTO `tbl_user` (`name`, `admin_username`, `email`,`password`, `role`, `image`) VALUES(?, ?, ?, ?, ?, ?)") or die($this->conn->error);
		$stmt->bind_param("ssssss", $name,$username,$email,$password,$role, $image);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	//category
	public function add_category($name,$slug){
		$stmt = $this->conn->prepare("INSERT INTO `room_category` (`name`,`slug`) VALUES(?, ?)") or die($this->conn->error);
		$stmt->bind_param("ss", $name,$slug);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	public function edit_category($name, $slug, $category_id){
		$sql = "UPDATE `room_category` SET `name` = ?, `slug` = ? WHERE `id` = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("ssi",$name, $slug, $category_id);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	public function fetchcategoryByID($id)
	{
		$query = "SELECT * FROM room_category WHERE id = ? ";
		$stmt = $this->conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function fetchcategory()
	{
		$query = "SELECT * FROM room_category";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function fetchAllClients()
	{
		$query = "SELECT * FROM tbl_user WHERE `role` = 'USER' ";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function fetchHistory($user_id)
	{
		$sql = "SELECT *, tbl_reservation.id as res_id, tbl_type.name as acco, tbl_room.name as room_n, tbl_reservation.user_id as user_id, tbl_reservation.room_type_id as acco_type, tbl_reservation.room_id as reserve_id FROM tbl_reservation LEFT JOIN tbl_room ON tbl_room.id=tbl_reservation.room_id  LEFT JOIN tbl_user ON tbl_user.user_id = tbl_reservation.user_id LEFT JOIN tbl_type ON tbl_type.id=tbl_reservation.room_type_id WHERE tbl_reservation.user_id = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	//end

	public function add_room($category_id, $name, $morning_price, $night_price, $description, $image1, $image2, $availability, $person){
		$stmt = $this->conn->prepare("INSERT INTO `tbl_room` (`category_id`,`name`, `morning_price`, `night_price`,`description`,`image`, `image_2`, `availability`, `person`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)") or die($this->conn->error);
		$stmt->bind_param("isssssssi", $category_id, $name, $morning_price, $night_price, $description, $image1, $image2, $availability, $person);
		if($stmt->execute()) {
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	public function update_room($category_id, $name, $morning_price, $night_price, $description, $update_filename1, $update_filename2, $availability, $person, $room_id){
		$sql = "UPDATE `tbl_room` SET `category_id` = ?, `name` = ?, `morning_price` = ?, `night_price` = ?, `description` = ?, `image` = ?, `image_2` = ?, `availability` = ?, `person` = ? WHERE `id` = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("issssssssi",$category_id, $name, $morning_price, $night_price, $description, $update_filename1, $update_filename2, $availability, $person, $room_id);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	public function update_booking($reference_no, $book_id){
		$sql = "UPDATE `tbl_reservation` SET `reference_no` = ? WHERE `id` = ?  ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("si", $reference_no, $book_id);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}


	public function fetchRooms()
	{
		$query = "SELECT *, b.name AS category, a.name as room_name, a.id as id, b.slug as slug, a.id as room_id FROM tbl_room a LEFT JOIN room_category b ON a.category_id = b.id WHERE a.category_id = b.id ";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function fetchByID($room_id)
	{
		$sql = "SELECT a.*, b.name AS category FROM tbl_room a LEFT JOIN room_category b ON a.category_id = b.id WHERE a.id = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i", $room_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function book_room($user_id, $room_id, $room_type_id, $payment_type, $date_accomodation, $number_p, $room_price, $total_headfee, $age_, $per_head_fee, $booked_datetime, $gcash_proof, $gcash_reference, $total){
		$stmt = $this->conn->prepare("INSERT INTO `tbl_reservation` (`user_id`,`room_id`,`room_type_id`,`payment_type`,`date_accomodation`, `number_p`, `room_price`, `head_fee`, `ages`, `per_head_fee`, `booked_datetime`, `gcash_proof`, `gcash_reference`, `total`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)") or die($this->conn->error);
		$stmt->bind_param("iiisssssssssss",$user_id, $room_id, $room_type_id, $payment_type, $date_accomodation, $number_p, $room_price, $total_headfee, $age_, $per_head_fee, $booked_datetime, $gcash_proof, $gcash_reference, $total);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	public function fetchBookByroomID($room_id, $user_id)
	{
		$sql = "SELECT *, tbl_room.name as room_name, tbl_room.id as room_id, tbl_type.name as room_type, tbl_reservation.status as status, tbl_reservation.reference_no as reference_no, tbl_reservation.id as id FROM tbl_room LEFT JOIN room_category ON room_category.id = tbl_room.category_id LEFT JOIN tbl_reservation ON tbl_reservation.room_id = tbl_room.id LEFT JOIN tbl_type ON tbl_type.id = tbl_reservation.room_type_id LEFT JOIN tbl_payment_type ON tbl_payment_type.type_id = tbl_type.id WHERE tbl_reservation.id = ? AND user_id = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("ii", $room_id, $user_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function fetchRoomsByID($user_id)
	{
		$sql = "SELECT *, tbl_room.name as room_n, tbl_reservation.id as reserve_id FROM tbl_reservation LEFT JOIN tbl_room ON tbl_room.id=tbl_reservation.room_id WHERE tbl_reservation.user_id = ? ORDER BY reserve_id DESC";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function fetchRoomsByIDPaid($user_id)
	{
		$sql = "SELECT *, tbl_room.name as room_n, tbl_reservation.room_id as reserve_id FROM tbl_reservation LEFT JOIN tbl_room ON tbl_room.id=tbl_reservation.room_id WHERE status ='PAID' AND user_id = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function ReserveByUser($user_id)
	{
		$sql = "SELECT COUNT(id) as count_reserve FROM tbl_reservation left JOIN tbl_user ON tbl_user.user_id = tbl_reservation.user_id WHERE tbl_reservation.user_id = ?  ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function inquireByUsers($user_id)
	{
		$sql = "SELECT COUNT(reply) as reply FROM tbl_inquiries WHERE user_id = ? AND `read_reply` = '0' ";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute([$user_id]);
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}


	public function fetchIdinquireByUsers($user_id)
	{
		$sql = "SELECT * FROM tbl_inquiries LEFT JOIN tbl_user ON tbl_user.user_id=tbl_inquiries.user_id WHERE tbl_inquiries.user_id = ? AND `read_reply` = '0' || `read_reply` = '1' ";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute([$user_id]);
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function fetchBooked()
	{
		$sql = "SELECT *, re.room_type_id AS day, re.id AS room_id, u.name as user, room.name as room_name, u.name as user_name  FROM tbl_reservation re LEFT JOIN tbl_user u ON u.user_id = re.user_id LEFT JOIN tbl_room room ON room.id = re.room_id LEFT JOIN room_category cat ON cat.id = room.category_id  ";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function fetchPendings()
	{
		$sql = "SELECT *, re.room_type_id AS day, re.id AS room_id, u.name as user  FROM tbl_reservation re LEFT JOIN tbl_user u ON u.user_id = re.user_id LEFT JOIN tbl_room room ON room.id = re.room_id LEFT JOIN room_category cat ON cat.id = room.category_id  WHERE `status` = 'PENDING' ";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function fetchClientId($book_id)
	{
		$sql = "SELECT *, u.email as email, cat.name as category, u.name AS client_name, tbl_type.name as room_type_id, re.room_type_id AS day, re.id AS book_id, room.id as room_id, room.name as room_name  FROM tbl_reservation re LEFT JOIN tbl_user u ON u.user_id = re.user_id LEFT JOIN tbl_room room ON room.id = re.room_id LEFT JOIN room_category cat ON cat.id = room.category_id LEFT JOIN tbl_type ON tbl_type.id = re.room_type_id LEFT JOIN tbl_payment_type ON tbl_payment_type.type_id = tbl_type.id WHERE re.id = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i", $book_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function update_client($book_id){
		$sql = "UPDATE `tbl_reservation` SET `status` = 'CONFIRMED' WHERE `id` = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i",$book_id);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	public function paid_client($book_id){
		$sql = "UPDATE `tbl_reservation` SET `status` = 'PAID', `paid_at` = NOW() WHERE `id` = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i",$book_id);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	public function CHECK_IN($book_id){
		$sql = "UPDATE `tbl_reservation` SET `check_in_out` = 'CHECKED IN' WHERE `id` = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i",$book_id);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}


	public function CHECK_OUT($book_id){
		$sql = "UPDATE `tbl_reservation` SET `check_in_out` = 'CHECKED OUT' WHERE `id` = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i",$book_id);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	public function count_numberofrooms()
	{
		$sql = "SELECT COUNT(id) as rooms FROM tbl_room";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public function count_numberofreserve()
	{
		$sql = "SELECT COUNT(id) as reserve FROM tbl_reservation";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}


	public function inquiry($name, $user_id, $email, $subject, $message){
		$stmt = $this->conn->prepare("INSERT INTO `tbl_inquiries` (`name`, `user_id`, `email`,`subject`, `message`) VALUES(?, ?, ?, ?, ?)") or die($this->conn->error);
		$stmt->bind_param("sisss", $name, $user_id, $email, $subject, $message);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	public function read($user_id){
		$sql = "UPDATE `tbl_inquiries` SET `read_reply` = '1' WHERE `user_id` = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i",$user_id);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

	public function read_0($user_id){
		$sql = "UPDATE `tbl_inquiries` SET `read_reply` = '0' WHERE `user_id` = ? ";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("i",$user_id);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

}

//account add
	// public function add_user($fullname,$email,$password){
	// 	$stmt = $this->conn->prepare("INSERT INTO `tbl_user` (`name`,`email`,`password`) VALUES(?, ?, ?)") or die($this->conn->error);
	// 	$stmt->bind_param("sss", $fullname,$email,$password);
	// 	if($stmt->execute()){
	// 		$stmt->close();
	// 		$this->conn->close();
	// 		return true;
	// 	}
	// }

function add_user($name, $email, $password, $verification) {
    global $con;

    $query = mysqli_query($con, "INSERT INTO tbl_user (name, email, password, verification) VALUES ('$name', '$email', '$password', '$verification')");

    if($query) {
        return true;
    }
}

function edit_headfee($id, $price) {
    global $con;

    $query = mysqli_query($con, "UPDATE tbl_headfee SET price = '$price' WHERE id = $id");

    if($query) {
        return true;
    }
}

?>
