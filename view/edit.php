<?php
    session_start();
?>

<!DOCTYPE html> 
<html>  
<head>    
        <title>USchool</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>  
<body style="background-image: url(../asset/background.jpg)">
    <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                <div class="navbar-header">
                    <h4 style="color: black">Welcome, <?php echo $_SESSION['name'];
                    ?></h4>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="navbar-right"><a href="../view/home_guru.php">Home</a></li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="navbar-right"><a href="../controller/logout.php">LOG OUT</a></li>
                </ul>
                </div>
            </nav>
        </header>
    <h1 style="text-align:center;">EDIT</h1>
    <div class="container" style="width:25%; margin-top:2em;">
        <form action="../controller/edit.php" method="post" id="myform" onSubmit="return validasi()">
        <?php
            include "../model/database.php";
            $key = htmlspecialchars($_POST['EDIT']);
            
            $query = "SELECT * FROM grade LEFT JOIN user ON grade.user_id = user.user_id WHERE user.user_id = '$key'";
            $result = $db->query($query);
            //echo var_dump($query);die; 

            foreach($result as $a){
                echo'<form method="post" action="../controller/edit.php">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" readonly value="' . $a[6] . ' '. $a[7] . '"><br>
                <label>ID</label>
                <input type="text" class="form-control" name="id" id="id" readonly value="' . $a[0] . '"><br>
                <label>Nilai Tugas</label>
                <input type="text" name="nilaiTugas" id="nilaiTugas" value="' . $a[1] . '"><br>
                <label>Nilai UTS</label>
                <input type="text" name="nilaiUTS" id="nilaiUTS" value="' . $a[2] . '"><br>
                <label>Nilai UAS</label>
                <input type="text" name="nilaiUAS" id="nilaiUAS" value="' . $a[3] . '"><br>
                <input type="submit" class="btn btn-primary" style="margin-top:2em;" value="Submit" name="submit">
                <a href="home_a.php"><input type="button" value="Cancel" class="btn btn-danger" style="margin-top:2em;"></button></a>
                </form>';
            }
        ?>
        </form>
    </div>
</body> 
</html>