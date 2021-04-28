<?php
    include '../model/database.php';

    $user   = $_POST['Delete'];
    $query  = "DELETE FROM user WHERE user_id = '$user'";
    $db->query($query);
    header("location:../View/home_admin.php?user_id=".$user);
?>