<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html><head>
<title>Pet Store</title></head>
<link rel="stylesheet" href="css/pet.css">
<meta name="viewport" content="width-device-width">
<!--<script type="text/javascript" >
	function validateForm() {
          if (!myForm.email.value)
           {
          alert("Please enter your Email Address");
            myForm.email.focus();
             return false;
         }
     else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g.test(myForm.email.value))
        {
   
      alert("You have entered an invalid email address!");
    return (false);
         }
   else if(!myForm.password.value)
    {
    	alert("Please enter your Password");
    	myForm.password.focus();
    	return false;
    }
    else if(!(document.myForm.password.value=="123456"))
    {
    	alert("Please enter correct Password");
    	myForm.password.focus();
    	return false;
    }
    
 
   return true;
}
 </script> -->
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
<h2>Login</h2>
<p> Required information is marked with an asterisk(*).</p>
<form name="myForm" method="POST" action="http://localhost/CodeIgniter-3.1.9/index.php/Main/formvalid">
<table class="table">
<tr><td>*E-mail:</td><td><input type="email" name="email" value="" required></td></tr>
<tr><td>*Password:</td><td><input type="password" name="password" value=""required></td></tr>
<tr><td><input type="submit" name="Submit" value="Submit"></td><td></td></tr>
</table>
</form> 
<footer>
<br/><i>Copyright &copy 2018 Pet Store<br/>
<a href="mailto:kavya@ponnam.com" onmouseover="this.style.color='blue';"><u>kavya@ponnam.com</u></a></i></p>
</div></body>
</footer>
</div></div>
</html>
