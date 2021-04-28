<!DOCTYPE html>
<?php
    session_start();
?>
<html>
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
    </head>
    <body style="background-image: url(../asset/background.jpg)">
    <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title"><b>PROFILE</b></h3>
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
                    <li class="navbar-right"><a href="home_guru.php">Home</a></li>
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
        <table id="example" class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> Nama </th>
                    <th> Tugas </th>
                    <th> UTS </th>
                    <th> UAS </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../model/database.php';
                    // $queryuser = "SELECT * FROM user";
                    $result = $db->query("SELECT * FROM grade LEFT JOIN user ON grade.user_id = user.user_id;");

                    foreach($result as $row){
                        echo"<tr>";
                        echo"<td>" . $row[0] . "</td>";
                        echo"<td>" . $row[6] . " " . $row[7] . "</td>";
                        echo"<td>" . $row[1] . "</td>";
                        echo"<td>" . $row[2] . "</td>";
                        echo"<td>" . $row[3] . "</td>";
                        echo '<td>
                        <form action="edit.php" method="POST">
                            <input style="display: none;" type="text" name="EDIT" value="'.$row[0].'"></input>
                            <button class="btn btn-warning"><i class="fas fa-backspace">EDIT</i></button>								
                        </form>
                        </td>';
                        echo"</tr>";
                    }
                    $result = null;
                    $db = null;
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th> ID </th>
                    <th> Nama </th>
                    <th> Tugas </th>
                    <th> UTS </th>
                    <th> UAS </th>
                    <th> Action </th>
                </tr>
            </tfoot>
        </table>
        </div>
        <footer style="background: white;">
    <p class="footer">Copyright &copy USchool</p>
</footer>
    </body>
</html>