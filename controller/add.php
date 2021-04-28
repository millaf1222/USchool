<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
        <title>USchool</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );

            $(document).ready(function(){
                $('#myModal').modal({
                    show: false,
                });
            });

            function showModal(){
                $('#myModal').modal({
                    show: true
                });
            }
        </script>

<style>
        html,body{
            margin : 0;
            padding : 0;
            width : 100%;
            height : 100%;
        }
        body{
            width : 100%;
            height : 100%;
            background-repeat: no-repeat;
            background-image : url("../Asset/background.jpg");
            background-size: 100% 100%;
        }
        form{
            font-size : 16px;
            margin : 5% 40%;
        }
        footer{
            bottom : 0;
            position : absolute;
            width : 100%;
            height : 8%;
            background-color : #AAA;
        }
        .footer{
            margin : 1.5% 1%;
        }
    </style>
    </head>
    
</head>
<body>
<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title"><b>CODER'S PROFILE</b></h3>
				</div>
				<div class="modal-body">
					<img src="../asset/profile.jpg" style="max-width:100px;max-height:100px;margin-bottom:2em;" class="mx-auto d-block">
					<h4 style="text-align:center;"><b>Milla Fitriyany</b></h4>
					<h4 style="text-align:center;"><b>00000031459</b></h4>
					<h4 style="text-align:center;"><b>Web Programming - AL</b></h4>
				</div>
			</div>
		</div>
	</div>
<header>
<nav class="navbar navbar-default">
                <div class="container-fluid">
                <div class="navbar-header">
                    <h4 style="color: black">Welcome, <?php echo $_SESSION['name'];
                    ?></h4>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="navbar-right"><a href="../view/home_admin.php">Home </a></li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="navbar-right"><button onClick="showModal();">Profile</button></li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="navbar-right"><a href="../controller/logout.php">LOG OUT</a></li>
                </ul>
                </div>
            </nav>
</header>
<div class="content">
<form action="adduser.php" method="post">
<?php
    include "../model/database.php";
    $query = "SELECT MAX(user_id) FROM user";
    $result = $db->query($query);
    foreach($result as $hasil){
        $newId = $hasil[0]+1;
    }
?>
    <p>
        <label for="id">ID</label><br>
        <input type="number" value="<?php echo $newId;?>" >
        <input type="number" name="id" id="Id" value="<?php echo $newId;?>" hidden>
    </p>
    <p>
        <label for="firstName">Nama Depan</label><br>
        <input type="text" name="fname" required>
    </p>
    <p>
        <label for="lastName">Nama Belakang</label><br>
        <input type="text" name="lname" required>
    </p>
    <p>
        <label for="role">Role</label><br>
        <select name="roleId" required>
            <option selected disabled hidden value="">Pilih Role</option>
            <option value="3">Murid</option>
            <option value="2">Guru</option>
        </select>
    </p>
    <p>
        <label for="address">Address</label><br>
        <input type="text" name="address" required>
    </p>
    <p>
        <label for="pass">Password</label><br>
        <input type="password" name="password" required>
    </p>
    <input type="submit" value="Add">
    <a href="<?php echo "../View/home_admin.php?user_id=".$id?>" ><button type="button">Cancel</button></a>
</form>
</div>
<footer>
    <p class="footer">Copyright &copy USchool</p>
</footer>
</body>
</html>