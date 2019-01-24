<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
    session_start();
    # connect to db
    include 'dbconnection.php';
    $con = OpenCon();
if(isset($_POST['sendmail'])){
    
    $error1="";
    $error2="";
    $error3="";
    $error4="";
    $error5="";
    $error6="";
    $error7="";


    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $businessname= $_POST['businessname'];
    $password= "123456";

/*if(empty($fname))
 {
  $error1= "Enter your fisrt name !";
 }
 else if(!ctype_alpha($fname))
 {
  $error2 = "\r\n"."Alphabets only For first Name!";
   }
if(empty($lname))
 {
  $error3 = "\r\n"."Enter your last name !";
 }
else if(!ctype_alpha($lname))
 {
  $error4 = "\r\n"."Alphabets only  for Last Name!";
   }
 if(empty($email))
 {
  $error5 = "\r\n"."enter your email !";
  
 }
 else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
 {
  $error6= "\r\n"."Not valid email !";
 }
  if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone))
 {
  $error7 = "\r\n"."Enter 10 digit phone number in required pattern!";
  
 }

 if ($error1!="" ||$error2!=""||$error3!=""||$error4!=""||$error5!="" ||$error6!=""||$error7!="" )
 {

			 echo $error1.$error2.$error3.$error4.$error5.$error6.$error7;
   }


else
{P*/
    $sql = "SELECT * FROM users WHERE email='$email'";
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {
      echo "mail already exists" ;
    }else
    {
    mysqli_autocommit($con,FALSE);
    $query1="SELECT roleid FROM roles WHERE description='$businessname' ";
    $result= mysqli_query($con,$query1);
    $row1= mysqli_fetch_array($result);
    $query2="INSERT INTO users (email,password,roleid) VALUES ('$email','$password','$row1[0]')";
    mysqli_query($con,$query2);
    $query3="SELECT userid FROM users WHERE email='$email'";
    $result1= mysqli_query($con,$query3);
    $row2= mysqli_fetch_array($result1);
    $query4= "INSERT INTO client (fname,lname,phone,email,userid) VALUES ('$fname','$lname','$phone','$email','$row2[0]') ";
    mysqli_query($con,$query4);
    echo "Data inserted Successfully..!!";
 
    if(mail($_POST['email'], "Your account is created" , "Hi"   .$fname ."your password is" .$password ))
    {
        echo " Mail sent";

    } 
    else
    {
        echo "Mail failed";
    }

    # commit
    mysqli_commit($con);
//}
}
}
//}
    #close connection
    CloseCon($con);
?>
<!DOCTYPE html>
<html><head>
<title>Pet Store</title></head>
<link rel="stylesheet" href="css/pet.css">
<meta name="meta" content="width-device-width">
<script type="text/javascript" >
	function validateForm() {
			if(document.myForm.firstname.value == "" )
			{
				alert( "Please provide FirstName name!" );
                 document.myForm.firstname.focus() ;
                 return false;
			}
	else if (!/^[a-zA-Z]*$/g.test(document.myForm.firstname.value)) 
			{
        alert("Invalid characters in FirstName");
        document.myForm.firstname.focus();
        return false;
		}
		else if (document.myForm.lastname.value == "" )
			{
				alert( "Please provide your Lastname!" );
                 document.myForm.lastname.focus() ;
                 return false;
			}
		else if (!/^[a-zA-Z]*$/g.test(document.myForm.lastname.value)) 
			{
        alert("Invalid characters in Last Name");
        document.myForm.lastname.focus();
        return false;
		}
		else if (!myForm.email.value) {
          alert("Please enter your Email Address");
            myForm.email.focus();
             return false;
   }
     
         else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g.test(myForm.email.value))
        {
   
      alert("You have entered an invalid email address!");
    return (false);
         }

      else if(document.myForm.phone.value=="")
            	{
            		return (true);
            	}
   
    else if ((!/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/g.test(myForm.phone.value)))
           {
           
            	alert("Please enter valid Phone Number");
            	myForm.phone.focus();
            	return (false);
            }
            
        return (true);
    }
	</script>
<body>
<div id="wrapper">
<h1>Pet Store</h1>
<div class="row">
	<div class="leftcolumn" style="background-color:#90C7E3">
<nav>
<a href="index.php">Home</a>
<a href="Aboutus.php">About Us</a>
<a href="contactUs.php">Contact Us</a>
<a href="client.php">Client</a>
<a href="service.php">Service</a>
<a href="login.php">Login</a> 
</nav>
</div>
<div class="rightcolumn" >
<img src="images/pet store banner 5 png (1).png" alt=""  width="100%">
<h2>Client</h2>
<p> Required information is marked with an asterisk(*).</p>
<form name="myForm" method="post" action="#" onsubmit="return validateForm();">
<table class="table">
<tr><td>*First name:</td><td><input type="text" name="firstname" required  ></td></tr>
<tr><td>*Last name:</td><td><input type="text" name="lastname" required ></td></tr>
<tr><td>*E-mail:</td><td><input type="text" name="email"  required></td></tr>
<tr><td>Phone:</td><td><input type="text" name="phone" ></td></tr>
<tr><td>Business Name:</td><td><input type="text" name="businessname" ></td></tr>
<tr><td><input type="submit" name="sendmail" value="Submit"></td><td></td></tr>
</table>
</form> 
<footer>
<br/><i>Copyright &copy 2018 Pet Store<br/>
<a href="mailto:kavya@ponnam.com" onmouseover="this.style.color='blue';"><u>kavya@ponnam.com</u></a></i></p>
</div></body>
</td></td>
</footer>
</div></div>
</html>