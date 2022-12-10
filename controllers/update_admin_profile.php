<?php
require_once "../config/reservation_class.php";
require_once '../config/conn.php';

function update_admin_profile($user_id, $name, $username, $email, $password) {
    global $con;

    $update_admin = mysqli_query($con, "UPDATE tbl_user SET name = '$name', admin_username = '$username', email = '$email', password = '$password' WHERE user_id = $user_id");

    if($update_admin) {
        return true;
    }
}

function remove_profile_pic($user_id) {
    global $con;

    $query_for_deleting_image =mysqli_query($con, "UPDATE tbl_user SET image = null WHERE user_id = $user_id");

    if($query_for_deleting_image) {
        return true;
    }
}

function update_profile_pic($user_id, $image) {
    global $con;

    $query_for_updating_image =mysqli_query($con, "UPDATE tbl_user SET image = '$image' WHERE user_id = $user_id");

    if($query_for_updating_image) {
        return true;
    }
}

if(isset($_POST['update_profiles'])) {
    $user_id = $_POST['admin_id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $old_password = md5(mysqli_real_escape_string($con, $_POST['old_pass']));
    $new_password = mysqli_real_escape_string($con, $_POST['new_pass']) ?? null;
    $password = md5($new_password);

    $query_for_fetching_admin_info_in_db = mysqli_query($con, "SELECT * FROM tbl_user WHERE user_id = $user_id");

    $fetching_admin_info_in_db = mysqli_fetch_assoc($query_for_fetching_admin_info_in_db);

    $old_image = $fetching_admin_info_in_db['image'];
    $password_db = $fetching_admin_info_in_db['password'];

    if($old_password != $password_db) {
        echo 'wrong password';
    } else {
        if($old_password == $password) {
            echo 'same password';
        } else {
            if($new_password == null || $new_password == '') {
                $query_for_checking_if_email_exist = mysqli_query($con, "SELECT * FROM tbl_user WHERE email = '$email' AND user_id != $user_id");
    
                if(mysqli_num_rows($query_for_checking_if_email_exist) > 0) {
                    echo 'email already used';
                } else {
                    $query_for_checking_if_username_exist = mysqli_query($con, "SELECT * FROM tbl_user WHERE admin_username = '$username' AND user_id != $user_id");
    
                    if(mysqli_num_rows($query_for_checking_if_username_exist) > 0) {
                        echo 'username already used';
                    } else {
                        $password = $password_db;
    
                        $add = update_admin_profile($user_id, $name, $username, $email, $password);
                        if($add == true){
                            echo 'updated';
                        }
                    }
                }
            } else {
                $query_for_checking_if_email_exist = mysqli_query($con, "SELECT * FROM tbl_user WHERE email = '$email' AND user_id != $user_id");
    
                if(mysqli_num_rows($query_for_checking_if_email_exist) > 0) {
                    echo 'email already used';
                } else {
                    $query_for_checking_if_username_exist = mysqli_query($con, "SELECT * FROM tbl_user WHERE admin_username = '$username' AND user_id != $user_id");
    
                    if(mysqli_num_rows($query_for_checking_if_username_exist) > 0) {
                        echo 'username already used';
                    } else {
                        $add = update_admin_profile($user_id, $name, $username, $email, $password);
    
                        if($add == true){
                            echo 'updated';
                        }
                    }
                }
            }
        }
    }
}

if(isset($_POST['delete_image'])) {
    $user_id = $_POST['user_id'];

    $query_for_getting_old_image = mysqli_query($con, "SELECT * FROM tbl_user WHERE user_id = $user_id");

    $fetching_old_image = mysqli_fetch_assoc($query_for_getting_old_image);

    $old_image = $fetching_old_image['image'];

    $delete_image = remove_profile_pic($user_id);

    if($delete_image == true) {
        if(file_exists('../admin/assets/images/'.$old_image)) {
            unlink('../admin/assets/images/'.$old_image);
        }
        echo 'image deleted';
    }
}

if(isset($_POST['update_images'])) {
    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $user_id = $_POST['user_id'];

    $query_for_getting_old_image = mysqli_query($con, "SELECT * FROM tbl_user WHERE user_id = $user_id");

    $fetching_old_image = mysqli_fetch_assoc($query_for_getting_old_image);

    $old_image = $fetching_old_image['image'];

    $img_ext = explode('.', $image_name);
    $img_ext = strtolower(end($img_ext));

    $image = uniqid() . '.' . $img_ext;

    if($old_image == null || $old_image == '') {
        $update_image = update_profile_pic($user_id, $image);

        if($update_image == true) {
            move_uploaded_file($image_tmp_name, '../admin/assets/images/' . $image);

            echo 'image updated';
        } 
    } else {
        $update_image = update_profile_pic($user_id, $image);

        if($update_image == true) {
            move_uploaded_file($image_tmp_name, '../admin/assets/images/' . $image);

            if(file_exists('../admin/assets/images/'.$old_image)) {
                unlink('../admin/assets/images/'.$old_image);
            }

            echo 'image updated';
        } 
    }
}
?>