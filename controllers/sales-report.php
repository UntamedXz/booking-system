<?php
$connect = new PDO("mysql:host=localhost;dbname=u130950772_rgp_resort", "u130950772_root", "RgpResort00");

$column = array('room_id', 'user_name', 'room_name', 'date_accomodation', 'paid_date', 'total');

$query = "SELECT *, re.room_type_id AS day, re.id AS room_id, u.name as user, room.name as room_name, u.name as user_name  FROM tbl_reservation re LEFT JOIN tbl_user u ON u.user_id = re.user_id LEFT JOIN tbl_room room ON room.id = re.room_id LEFT JOIN room_category cat ON cat.id = room.category_id WHERE re.status = 'PAID'";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'AND DATE(re.paid_date) BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" ';
}

if (isset($_POST['search']['value'])) {
    $query .= '
 AND (re.room_id LIKE "%' . $_POST['search']['value'] . '%"
 OR u.name LIKE "%' . $_POST['search']['value'] . '%"
 OR room.room_name LIKE "%' . $_POST['search']['value'] . '%"
 OR DATE(re.date_accomodation) LIKE "%' . $_POST['search']['value'] . '%"
 OR DATE(re.paid_date) LIKE "%' . $_POST['search']['value'] . '%"
 OR re.total LIKE "%' . $_POST['search']['value'] . '%" )
 ';
}

if (isset($_POST['order'])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY orders.order_id ASC ';
}

$query1 = '';

if ($_POST['length'] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$total_sales = 0;

foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row['room_id'];
    $sub_array[] = $row['user_name'];
    $sub_array[] = $row['room_name'];
    $sub_array[] = date('M-d-y', strtotime($row['date_accomodation']));
    $sub_array[] = date('M-d-y', strtotime($row['paid_date']));
    $sub_array[] = $row['total'];
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT *, re.room_type_id AS day, re.id AS room_id, u.name as user, room.name as room_name, u.name as user_name  FROM tbl_reservation re LEFT JOIN tbl_user u ON u.user_id = re.user_id LEFT JOIN tbl_room room ON room.id = re.room_id LEFT JOIN room_category cat ON cat.id = room.category_id WHERE re.status = 'PAID'";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => count_all_data($connect),
    'recordsFiltered' => $number_filter_row,
    'data' => $data,
    'total'    => number_format($total_sales, 2)
);

echo json_encode($output);
