<?php
    function generateRow(){
        $contents = '';
        session_start();
        include_once('config/conn1.php');
        $user_id = $_SESSION['user_id'];
        $room_id = $_GET['id'];
       $sql = "SELECT *, tbl_room.name as room_name, tbl_type.name as day_night, tbl_room.id as room_id, tbl_type.name as room_type, tbl_reservation.status as status, tbl_reservation.reference_no as reference_no, tbl_reservation.id as id FROM tbl_room LEFT JOIN room_category ON room_category.id = tbl_room.category_id  LEFT JOIN tbl_reservation ON tbl_reservation.room_id = tbl_room.id  LEFT JOIN tbl_type ON tbl_type.id = tbl_reservation.room_type_id  LEFT JOIN tbl_payment_type ON tbl_payment_type.type_id = tbl_type.id   WHERE tbl_reservation.id = ? AND user_id = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $room_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
            $totalAmount = 0;
            $day = 150;
            $night = 180;
            $roomprice = $row['price'];
            if($row['day_night'] == 'Morning'){
                $forday = $day*$row['number_p'];
                $totalAmount = $roomprice+$forday;
                $fornight = $night*$row['number_p'];
                $totalAmount1 = $roomprice+$fornight;
             $contents .= "
            
            <tr>
                <td>".$row['room_name']."</td>
                <td>".$row['name']."</td>
                <td>".$row['payment_type']."</td>
                <td>".$totalAmount."</td>
                <td>".$row['status']."</td>
                <td>".$row['date_accomodation']." ".date('h:i:A', strtotime($row['time_accomodation'])). "</td>
            </tr>
            ";
            }else if($row['day_night'] == 'Night'){
                $fornight = $night*$row['number_p'];
                $totalAmount = $roomprice+$fornight;
                $fornight = $night*$row['number_p'];
                $totalAmount1 = $roomprice+$fornight;
             $contents .= "
            
            <tr>
                <td>".$row['room_name']."</td>
                <td>".$row['name']."</td>
                <td>".$row['payment_type']."</td>
                <td>".$totalAmount."</td>
                <td>".$row['status']."</td>
                <td>".$row['date_accomodation']." ".date('h:i:A', strtotime($row['time_accomodation'])). "</td>
                
            </tr>
            ";
            }
        }
    
        
        return $contents;
    }

    require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Generated Invoice - Strike RGP Resort ");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '8', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
    

<br>
    <h1><b>STRIKE RGP RESORT</b></h1>
    ADDRESS: Soldiers IV, Bacoor, Philippines, 4102
    <br>PHONE: 0963 714 8110
    <br>EMAIL: strikergpresort14@gmail.com
    <br>
    <br>
   <h5>Instruction:<h5>
<br><h6>Check your Email account for your Verification, and if you have received it, please print it also. And after you combine the <b>Reservation Details</b> and <b>Email Receipt</b>, you can visit our resort on the day of your booking appointment. We appreciate your cooperation.</h6>
        <br>
        <br>
        <h3>Reservation Details</h3>
        <table border="1" cellspacing="0" cellpadding="4">  
           <tr>  
                <th width="22%">Room Name</th>
                <th width="13%">Day</th>
                <th width="15%">Payment Type</th>
            
                <th width="15%">Total Price</th>
                <th width="15%">Status</th>
                <th width="20%">Time & Date</th>
           </tr>  



           
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('Billings.pdf', 'I');
    

?>
