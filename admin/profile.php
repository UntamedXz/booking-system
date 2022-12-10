<?php 
include './head.php';
include '../config/conn.php';
include('includes/fetch.php');
?>
<style>
	.save {
		background-color: #38a0a6 !important;
        border: 1px solid #38a0a6 !important;
	}

	.save:hover {
		background-color: #1c465a !important;
        border: 1px solid #1c465a !important;
	}
</style>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body pt-4">
                          <div class="row">
                          <div class="container rounded bg-white mb-5">
                            <?php
                            $user_id = $_SESSION['admin_id'];
                            $get_admin_profile = mysqli_query($con, "SELECT * FROM tbl_user WHERE user_id = $user_id");

                            foreach($get_admin_profile as $row) {
                                if($row['image'] == null || $row['image'] == '') {
                                    $image = "./assets/images/no_image2.png";
                                } else {
                                    $image = "./assets/images/".$row['image'];
                                }
                            ?>
                            <div class="row">
                                    <div class="col-md-3 border-right mt-4">
                                        <div class="d-flex flex-column align-items-center text-center p-3">
                                            <img class="rounded-circle mb-2" width="150px" src="<?php echo $image; ?>">
                                        <?php
                                        if($row['image'] != null || $row['image'] != '') {
                                        ?>
                                        <button id="delete_image" class="btn btn-sm btn-danger mb-2">REMOVE</button>
                                        <?php
                                        }
                                        ?>
                                        <form id="update_image" enctype="multipart/form-data">
                                            <input type="file" name="image" id="image" class="form-control">
                                            <button type="submit" id="update_image_btn" class="btn btn-sm btn-primary my-2 save">UPDATE</button>
                                        </form>
                                        <span class="font-weight-bold"><?php echo $row['name']; ?></span>
                                        <span class="text-black-50"><?php echo $row['email']; ?></span>
                                        <span> </span>
                                    </div>
                                    </div>
                                    <div class="col-md-9 border-right">
                                        <form id="update_profile_form" enctype="multipart/form-data">
                                            <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $user_id; ?>">
                                            <div class="p-3 py-5">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="text-right">Profile Settings</h4>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Fullname" value="<?php echo $row['name']; ?>" id="name" name="name" required></div>
                                                    <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" value="<?php echo $row['admin_username']; ?>" placeholder="Username" id="username" name="username" required></div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Email" value="<?php echo $row['email']; ?>" id="email" name="email" required></div>
                                                    <div class="col-md-6"><label class="labels">Old Password</label><input type="password" class="form-control" value="" placeholder="Old Password" id="old_pass" name="old_pass" required></div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6"><label class="labels">New Password</label><input type="password" class="form-control" placeholder="New Password" value="" id="new_pass" name="new_pass"></div>
                                                    <div class="col-md-6"><label class="labels">Confirm Password</label><input type="password" class="form-control" value="" placeholder="Confirm Password" id="confirm_pass" name="confirm_pass"></div>
                                                </div>
                                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button save" type="submit">Save Profile</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                    </div>
                          </div>
                        </div>

                        <div id="styleSelector">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?php
include './includes/profile-style.php';
?>

<script>
    $(window).on('load', function() {
        if(localStorage.getItem('status') == 'updated') {
            swal("Success!", "Profile updated successfully!", "success");
            localStorage.removeItem('status');
        } else if(localStorage.getItem('status') == 'image updated') {
            swal("Success!", "Profile image updated successfully!", "success");
            localStorage.removeItem('status');
        } else if(localStorage.getItem('status') == 'image deleted') {
            swal("Success!", "Profile image deleted successfully!", "success");
            localStorage.removeItem('status');
        }
    })

    $('#update_profile_form').on('submit', function(e) {
        e.preventDefault();

        if($('#new_pass').val().length != 0) {
            if($('#new_pass').val() != $('#confirm_pass').val()) {
                swal("Failed!", "Please make sure your passwords match!", "error");
            } else {
                $.ajax({
                    url: "../controllers/update_admin_profile.php",
                    method: "POST",
                    data: $('#update_profile_form').serialize() + "&update_profiles=true",
                    success: function(data) {
                        if(data == 'wrong password') {
                            swal("Failed!", "Incorrect Password!", "error");
                        } else if(data == 'same password') {
                            swal("Failed!", "New Password cannot be same as current password. Please choose different password!", "error");
                        } else if(data == 'updated') {
                            localStorage.setItem('status', 'updated');
                            location.reload();
                        } else if(data == 'email already used') {
                            swal("Failed!", "Email already used!", "error");
                        } else if(data == 'username already used') {
                            swal("Failed!", "Username already used!", "error");
                        }
                        console.log(data);
                    }
                })
            }
        } else {
            $.ajax({
                url: "../controllers/update_admin_profile.php",
                method: "POST",
                data: $('#update_profile_form').serialize() + "&update_profiles=true",
                success: function(data) {
                    if(data == 'wrong password') {
                        swal("Failed!", "Incorrect Password!", "error");
                    } else if(data == 'same password') {
                        swal("Failed!", "New Password cannot be same as current password. Please choose different password!", "error");
                    } else if(data == 'updated') {
                        localStorage.setItem('status', 'updated');
                        location.reload();
                    } else if(data == 'email already used') {
                        swal("Failed!", "Email already used!", "error");
                    } else if(data == 'username already used') {
                        swal("Failed!", "Username already used!", "error");
                    }
                    console.log(data);
                }
            })
        }
    })

    $('#delete_image').on('click', function(e) {
        e.preventDefault();

        var user_id = $('#admin_id').val();

        $.ajax({
            url: "../controllers/update_admin_profile.php",
            method: "POST",
            data: {
                user_id: user_id,
                delete_image: true,
            },
            success: function(data) {
                if(data.includes('image deleted')) {
                    localStorage.setItem('status', 'image deleted');
                    location.reload();
                }
                console.log(data);
            }
        })
    })

    $('#update_image').on('submit', function(e) {
        e.preventDefault();

        if($('#image').val().length == 0) {
            swal("Failed!", "Upload image first!", "error");
        } else {
            var imageExt = $('#image').val().split('.').pop().toLowerCase();

            if ($.inArray(imageExt, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                swal("Failed!", "File not supported!", "error");
            } else {
                var imageSize = $('#image')[0].files[0].size;

                if (imageSize > 10485760) {
                    swal("Failed!", "File too large!", "error");
                } else {
                    var form = new FormData(this);
                    form.append('update_images', true);
                    form.append('user_id', $('#admin_id').val());
                    $.ajax({
                        url: "../controllers/update_admin_profile.php",
                        type: "post",
                        data: form,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if(data.includes('image updated')) {
                                localStorage.setItem('status', 'image updated');
                                location.reload();
                            }
                            console.log(data);
                        }
                    })
                }
            }
        }
    })
</script>

<?php
include './bottom.php'
?>

