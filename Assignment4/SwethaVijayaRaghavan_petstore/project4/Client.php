<?php
session_start();
  # DB Connection
   include 'Dbconnection.php';
    $con = OpenCon();
if(isset($_POST['sendmail'])){
    $err1="";
    $err2="";
    $err3="";
    $err4="";
    $err5="";
    $err6="";
    $err7="";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $businessname= $_POST['bname'];
    $password= "123456";

if(empty($fname))
 {
  $err1= "Please enter your Fisrt Name !";
 }
 else if(!ctype_alpha($fname))
 {
  $err2 = "\r\n"."Alphabets only allowed for First Name!";
   }
if(empty($lname))
 {
  $err3 = "\r\n"."Please enter your Last Name !";
 }
else if(!ctype_alpha($lname))
 {
  $err4 = "\r\n"."Alphabets only allowed for Last Name!";
   }
 if(empty($email))
 {
  $err5 = "\r\n"."Please enter your Email !";
  
 }
 else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
 {
  $err6= "\r\n"."Its not valid email !";
 }
  if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone))
 {
  $err7 = "\r\n"."Please enter 10 digit phone number in required pattern(xxx-xxx-xxxx)!";
  
 }

 if ($err1!="" ||$err2!=""||$err3!=""||$err4!=""||$err5!="" ||$err6!=""||$err7!="" )
 {

       echo $err1.$err2.$err3.$err4.$err5.$err6.$err7;
   }


else
{
	$sql = "SELECT *FROM Users WHERE email='$email'";
    $results = mysqli_query($con, $sql);
    if (!mysqli_num_rows($results) == 0) {
      echo "<script type='text/javascript'>alert('mail already exists');</script>" ;
    }else
    {
    mysqli_autocommit($con,FALSE);
    $query1="SELECT roleId FROM roles WHERE description='$businessname' ";
    $result= mysqli_query($con,$query1);
    $row1= mysqli_fetch_array($result);
    $query2="INSERT INTO Users (email,password,roleId) VALUES ('$email','$password','$row1[0]')";
    mysqli_query($con,$query2);
    $query3="SELECT userId FROM Users WHERE email='$email'";
    $result1= mysqli_query($con,$query3);
    $row2= mysqli_fetch_array($result1);
    $query4= "INSERT INTO client (fname,lname,phone,email,userId) VALUES ('$fname','$lname','$phone','$email','$row2[0]') ";
    mysqli_query($con,$query4);
    echo "Data inserted Successfully..!!";
 
    if(mail($_POST['email'], "Your Account is Created Successfully" , "Hello"   .$fname ."Your Password is" .$password ))
    {
        echo "EMail Sent Successfully";

    } 
    else
    {
        echo "EMail sending Failed";
    }

    # commit
    mysqli_commit($con);
}
}
}
    #close connection
    CloseCon($con);


?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Pet Store</title>
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
			

			<h2>Client</h2>
			<p>Required information is marked with asterick (&#42).</p>

				<br><form name="myForm" method ="post" action="#" autocomplete="off">
                     <p>      
                        <label>&#42 First Name: </label>
                        <input type="text" name="fname" maxlength="30" required>
                      </p>
                      <p>
                        <label>&#42 Last Name: </label>
                        <input type="text" name="lname" maxlength="30" required="required">
                     </p>

                      <p>
                          <label>&#42 E-mail: </label>
                          <input type="text" name="email" maxlength="30" required>
                      </p>

                       <p>
                           <label>Phone: </label>
                           <input type="text" name="phone" maxlength="12">
                       </p>
                       <p>
                             <label>Business Name: </label>
                             <input type="text" name="bname">
                        </p>
                        <p>
                      		<input type="Submit" name="sendmail" value="Submit"></p>
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