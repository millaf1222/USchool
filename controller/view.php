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
<body>
    <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                <div class="navbar-header">
                    <h4 style="color: black">Welcome, <?php echo $_SESSION['name'];
                    ?></h4>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="navbar-right"><a href="../view/home_admin.php">Home</a></li>
                </ul>
       
                <ul class="navbar-nav navbar-right">
                    <li class="navbar-right"><a href="../control/logout.php">LOG OUT</a></li>
                </ul>
                </div>
            </nav>
        </header>
    <h1 style="text-align:center;">EDIT</h1>
    <div class="container" style="width:25%; margin-top:2em;">
        <form action="updatesiswa.php" method="post" id="myform" onSubmit="return validasi()">
        <?php
            include "../model/database.php";
            $key = htmlspecialchars($_POST['view']);
            
            $query = "SELECT * FROM user WHERE user_id = '$key'";
            $result = $db->query($query);
            //echo var_dump($query);die; 

            foreach($result as $a){
                echo'<label>Nama Depan</label> </br>'; 
                echo'<input type="text" name="firstname" value="'. $a[2] . '"> </br>';
                echo'<label>Nama Belakang</label> </br>';
                echo'<input type="text" name="lastname" value="'. $a[3] . '"> </br>';
                echo'<label>ID</label> </br>';
                echo'<input type="text" readonly name="id" value="'. $a[0] . '"> </br>';
                echo'<label>Role</label></br>';
                echo'<input type="text" name="role" value="'. $a[4] . '"> </br>';
                echo'<label>Address</label> </br>';
                echo'<input type="text" name="address" value="'. $a[5] . '">';
                echo '<input style="display: none;" type="text" name="edituser" value="'.$a[0].'"></input> </br>';
                echo'<button class="btn btn-warning"><i class="fas fa-backspace">Update</i></button>';
                echo'<button class="btn btn-danger"><i class="fas fa-backspace">Cancel</i></button>';
            }
        ?>
        
        </form>
    </div>
</body> 
</html>