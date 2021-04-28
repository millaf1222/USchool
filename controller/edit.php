<?php
    include "../model/database.php";

    $id = $_POST['id'];
    $nilaiTugas = $_POST['nilaiTugas'];
    $nilaiUTS = $_POST['nilaiUTS'];
    $nilaiUAS = $_POST['nilaiUAS'];

    $query = "UPDATE grade SET nilai_tugas = '$nilaiTugas', nilai_uts = '$nilaiUTS', nilai_uas = '$nilaiUAS' WHERE user_id = '$id';";
    $db->query($query);

    header("location:../view/home_guru.php");
?>