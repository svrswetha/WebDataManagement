<?php
session_start();
    # DB Connection
    include 'Dbconnection.php';
    $con = OpenCon();
// if(isset($_POST['Submit'])){
    
//     $err1="";
//     $err2="";
//     $err3="";
      
//     $email= $_POST['email'];
//     $password= $_POST['Password'];
//     $pass="123456";
   
//  if(empty($email))
//  {
//   $err1 = "\r\n"."Please Enter your Email !";
  
//  }
//  if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
//  {
//   $err2= "\r\n"."Its Not a valid email !";
//  }
//   if($password != $pass)
//  {
//     $err3= "\r\n"."Its Not a valid password !";
//  }

//  if ($err1!="" ||$err2!=""||$err3!="" )
//  {

// 			 echo $err1.$err2.$err3;
//    }


else
{

   mysqli_autocommit($con,FALSE);
    $query1="SELECT roleId FROM Users WHERE email='$email' ";
    $result= mysqli_query($con,$query1);
    $row1= mysqli_fetch_array($result);
    if($row1[0]!=0)
    {
        header("Location:BusinessPetStore.html");
       
  
    }
    else 
    {
      header("Location:ClientPetstore.html");
    }
    mysqli_commit($con);
}
}
    #close connection
    CloseCon($con);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/pet.css">
	</head>
	<body id = back>
		<div id=wrapper>	
			<header>
				<h1>Pet Store</h1>
			</header>
			<div id = container>
                <div id = column1>
				<nav>	
					<ul>	
						<li><a href ="index.php">Home</a></li>
						<li><a href="AboutUs.php">About Us</a></li>
						<li><a href="ContactUs.php">Contact Us</a></li>
						<li><a href="Client.php">Client</a></li>
						<li><a href="Service.php">Service</a></li>
						<li><a href="Login.php">Login</a></li>
					</ul>
				</nav>
			</div>

			<div id = column2>
			<img src="Images/client.png">
			<section>
			

			<h2>Login</h2>
			<p>Required information is marked with asterick (&#42).</p>

				<br><form name="myForm" method ="post" action="#">
                      <p>
                          <label> * E-mail: </label>
                          <input type="email" name="email" required>
                      </p>
                      <p>
                      		<label> *Password: </label>
                      		<input type="password" name="Password" required>
                      </p>
                        <p>
                      		<input type="Submit" name="Submit" value="Submit"></p>
                     </form>
                 </section>
                <footer>                    
                    Copyright &copy; 2018 Pet Store<br>
                    <a href="mailto:swetha@vijayaraghavan.com">swetha@vijayaraghavan.com</a>                    
                </footer>
                </div>
            </div>
        </div>  
    </body>
    
</html>