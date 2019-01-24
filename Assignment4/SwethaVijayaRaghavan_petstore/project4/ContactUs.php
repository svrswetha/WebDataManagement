<?php
session_start();
    # DB connection
    include 'Dbconnection.php';
    $con = OpenCon();
if(isset($_POST['Submit'])){
    
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
    $comments=$_POST['comments'];
    

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
  $err5 = "\r\n"."Please Enter your Email !";
 }
 else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
 {
  $err6= "\r\n"."Its Not a valid email !";
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

  mysqli_autocommit($con,FALSE);
  $query="INSERT INTO contactUs (fname,lname,email,phone,comments) VALUES ('$fname','$lname','$email','$phone','$comments')";
    mysqli_query($con,$query);
  echo "Data inserted Successfully..!!";


    # commit
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
		<title>AboutUs</title>
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
			   <img src="Images/contactus.png">
			<section>
			     <h2>Contact Us</h2>
			       <p>Required information is marked with asterick (&#42).</p>

				    <br><form method ="post" action = "#">
                     <p>
                        <label>* First Name: </label>
                        <input type="text" name="fname" required>
                     </p>
                     <p>
                         <label>* Last Name: </label>
                         <input type="text" name="lname" required>
                     </p>

                      <p>
                          <label>* E-mail: </label>
                          <input type="text" name="email" required>
                      </p>

                       <p>
                           <label>Phone: </label>
                           <input type="text" name="phone" required>
                       </p>
                       <p>
                           <label class ="comments">* Comments: </label>
                           <input type="textarea" name="comments">
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