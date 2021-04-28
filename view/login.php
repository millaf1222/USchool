<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="login.css">

        <script type="text/javascript">
            function validasi () {
                var id = document.getElementById("id").value;
                var password = document.getElementById("password").value;

                if(id != "" && password != ""){
                    return true;
                }
                else{
                    alert('All field must not be empty!');
                    return false;
                }
             }
            </script>
    </head>
    <body style="background-image: url(../asset/login.jpg);">
    <div class="kotak_login">
    
		<p class="tulisan_login">USchool</p>
 
		<form action="../controller/check_login.php" method="POST" onSubmit="return validasi();" required>
			<label>User ID</label>
			<input type="text" name="userid" class="form-control" id="id" required>
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" id="password" placeholder="Password ..">
 
			<input type="submit" class="tombol_login" value="LOGIN">
			<br/>
        </form>
    </div>
    </body>
</html>