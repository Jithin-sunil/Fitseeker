<?php
include('../Assets/Connection/Connection.php');
session_start();



if(isset($_POST["btnlogin"]))
{
	$Email=$_POST["txtemail"];
	$Password=$_POST["txtpassword"];
	
	$Seluser="select * from tbl_user where user_email='$Email' and user_password='$Password'";
	$user=$con->query($Seluser);
	
	$Seladmin="select * from tbl_admin where admin_email='$Email' and admin_password='$Password'";
	$admin=$con->query($Seladmin);
	
	$Selseller="select * from tbl_seller where seller_email='$Email' and seller_password='$Password'";
	$seller=$con->query($Selseller);
	
	$Seltraineer="select * from tbl_traineer where traineer_email='$Email' and traineer_password='$Password'";
	$traineer=$con->query($Seltraineer);
	

	
	if($datauser=$user->fetch_assoc())
	{
		$_SESSION["uid"]=$datauser["user_id"];
		$_SESSSION["uname"]=$datauser["user_name"];
		header('Location:../User/Homepage.php');
	}
	else if ($dataadmin=$admin->fetch_assoc())
	{
		$_SESSION["aid"]=$dataadmin["admin_id"];
		$_SESSSION["aname"]=$dataadmin["admin_name"];
		header('Location:../Admin/Home.php');
	}
	else if ($dataseller=$seller->fetch_assoc())
	{
		$_SESSION["sid"]=$dataseller["seller_id"];
		$_SESSSION["sname"]=$dataseller["seller_name"];
		if($dataseller['seller_status']=='1')
		{
		header('Location:../Seller/HomePAGE.php');
		}
		else if($dataseller['seller_status']=='2')
		{
		?>
        <script>
		alert("Rejected");
		</script>
        <?php
		}
		else
		{
			?>
        <script>
		alert("Pending");
		</script>
        <?php
		}
	}
	else if ($datatraineer=$traineer->fetch_assoc())
	{
		$_SESSION["tid"]=$datatraineer["traineer_id"];
		$_SESSSION["tname"]=$datatraineer["traineer_name"];
		
		
		
		
		
		
		if($datatraineer['traineer_status']=='1')
		{
		header('Location:../Traineer/HomePAGE.php');
		}
		else if($datatraineer['traineer_status']=='2')
		{
		?>
        <script>
		alert("Rejected");
		</script>
        <?php
		}
		else
		{
			?>
        <script>
		alert("Pending");
		</script>
        <?php
		}
	
		
		
	}
	
	else
		{
			?>
            <script>
			alert("INVAILD data")
			</script>
            <?php
		}
}
		
			
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form with Animated Rings</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap");
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Quicksand", sans-serif;
    }
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #111;
      width: 100%;
      overflow: hidden;
    }
    .ring {
      position: relative;
      width: 500px;
      height: 500px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .ring i {
      position: absolute;
      inset: 0;
      border: 2px solid #fff;
      transition: 0.5s;
    }
    .ring i:nth-child(1) {
      border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
      animation: animate 6s linear infinite;
    }
    .ring i:nth-child(2) {
      border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
      animation: animate 4s linear infinite;
    }
    .ring i:nth-child(3) {
      border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
      animation: animate2 10s linear infinite;
    }
    .ring:hover i {
      border: 6px solid var(--clr);
      filter: drop-shadow(0 0 20px var(--clr));
    }
    @keyframes animate {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }
    @keyframes animate2 {
      0% {
        transform: rotate(360deg);
      }
      100% {
        transform: rotate(0deg);
      }
    }
    .login {
      position: absolute;
      width: 300px;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      gap: 20px;
    }
    .login h2 {
      font-size: 2em;
      color: #fff;
    }
    .login .inputBx {
      position: relative;
      width: 100%;
    }
    .login .inputBx input {
      position: relative;
      width: 100%;
      padding: 12px 20px;
      background: transparent;
      border: 2px solid #fff;
      border-radius: 40px;
      font-size: 1.2em;
      color: #fff;
      box-shadow: none;
      outline: none;
    }
    .login .inputBx input[type="submit"] {
      width: 100%;
      background: #0078ff;
      background: linear-gradient(45deg, #ff357a, #fff172);
      border: none;
      cursor: pointer;
    }
    .login .inputBx input::placeholder {
      color: rgba(255, 255, 255, 0.75);
    }
    .login .links {
      position: relative;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
    }
    .login .links a {
      color: #fff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="ring">
    <i style="--clr:#00ff0a;"></i>
    <i style="--clr:#ff0057;"></i>
    <i style="--clr:#fffd44;"></i>
    <div class="login">
      <h2>Login</h2>
     <form action="" method="post">
     <div class="inputBx">
        <input type="text" name="txtemail" placeholder="Username">
      </div>
      <div class="inputBx">
        <input type="password" name="txtpassword" placeholder="Password">
      </div>
      <div class="inputBx">
        <input type="submit" name="btnlogin" value="Sign in">
      </div>
     </form>
      <div class="links">
        <!-- <a href="#">Forget Password</a> -->
        <a href="../Index.php">Register</a>
      </div>
    </div>
  </div>
</body>
</html>
