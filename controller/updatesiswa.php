<?php
    include '../model/database.php';

    $id          = $_POST['id'];
    $firstname   = $_POST['firstname'];
    $lastname    = $_POST['lastname'];
    $role        = $_POST['role'];
    $address     = $_POST['address'];

    $sql = "UPDATE user SET first_name = '$firstname', last_name = '$lastname', role_id = '$role' , address = '$address' WHERE user_id = '$id'";
    $db->exec($sql);
    $db = null;
    header("location:../View/home_admin.php?user_id=".$user);
?>