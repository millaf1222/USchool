<?php
    include 'database.php';
    
    $user   = $_GET['user_id'];
    $id     = $_POST['id'];
    $tugas  = $_POST['tugas'];
    $uts    = $_POST['uts'];
    $uas    = $_POST['uas'];

    $sql = "UPDATE grade SET nilai_tugas = '$tugas', nilai_uts = '$uts', nilai_uas = '$uas' WHERE user_id = '$id'";
    $db->exec($sql);
    $db = null;
    header("location:../View/home_guru.php?user_id=".$user);
?>