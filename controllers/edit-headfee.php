<?php
require_once '../config/reservation_class.php';
require_once '../config/conn.php';

if(isset($_POST['edit_headfee'])) {
    $id = $_POST['id'];
    $price = $_POST['price'];

    $query = edit_headfee($id, $price);

    if($query == true) {
        echo 'success';
    }
}