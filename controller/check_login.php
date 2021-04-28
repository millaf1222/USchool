<?php
    session_start();
    include '../model/database.php';
    $id = $_POST['userid'];
    $password = md5($_POST['password']);


    $query = ("SELECT * FROM user WHERE user_id = '$id' && password='$password'");
    $result = $db->query($query);


    //set session role
    $queryRole = "SELECT role_name FROM role WHERE role_id = (SELECT role_id FROM user WHERE user_id = '$id');";
    $resultRole = $db->query($queryRole);
    $role = $resultRole->fetch();
    $_SESSION['role'] = $role[0];
    $_SESSION['id'] = $id;

    $queryNama = "SELECT CONCAT(first_name, ' ', last_name) FROM user WHERE user_id = '$id';";
    $resultNama = $db->query($queryNama);
    $nama = $resultNama->fetch();
    $_SESSION['name'] = $nama[0];

//unset($conn);

    //echo var_dump($_SESSION['role']);die;
    if($result->rowCount() == 1) {
        if(strcmp($_SESSION['role'],'admin')== 0){
            $_SESSION['status'] = 'login';
            header("location:../view/home_admin.php");
        }
        else if(strcmp($_SESSION['role'],'murid') == 0){
            $queryNilai = "SELECT * FROM grade WHERE user_id = '$id'";
            $resultNilai = $db->query($queryNilai);
            $nilai = $resultNilai->fetch();

            $nilaiTugas = $nilai[1];
            $nilaiUTS = $nilai[2];
            $nilaiUAS = $nilai[3];
     
            $nilaiTotal = ($nilaiTugas + $nilaiUTS + $nilaiUAS) / 3;

            if($nilaiTotal >= 80 && $nilaiTotal <= 100){
                $grade = "A";
                $_SESSION['grade'] = $grade;
                $_SESSION['keterangan'] = "Lulus";
            }
            else if($nilaiTotal >= 65 && $nilaiTotal <= 79){
                $grade = "B";
                $_SESSION['grade'] = $grade;
                $_SESSION['keterangan'] = "Lulus";
            }
            else if($nilaiTotal >= 45 && $nilaiTotal <= 64){
                $grade = "C";
                $_SESSION['grade'] = $grade;
                $_SESSION['keterangan'] = "Lulus";
            }
            else{
                $grade = "D";
                $_SESSION['grade'] = $grade;
                $_SESSION['keterangan'] = "TIdak Lulus";
            }
            $_SESSION['status'] = 'login';
            header("location:../view/home_siswa.php");
        }
        else{
            $_SESSION['status'] = 'login';
            header("location:../view/home_guru.php");
        }
    }else{
        header("location:../view/login.php");
    }
?>