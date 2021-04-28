<?php
    include "../model/database.php";

    $id = $_POST['id'];
    $password = md5($_POST['password']);
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $role = $_POST['roleId'];
    $address = $_POST['address'];

    $query = "INSERT INTO user(user_id, password, first_name, last_name, role_id, address) VALUES('".$id."', '".$password."', '".$firstName."', '".$lastName."', '".$role."', '".$address."');";
    $result = $db->query($query);

    //echo var_dump($query);die;

    header("location:../view/home_admin.php");
?>