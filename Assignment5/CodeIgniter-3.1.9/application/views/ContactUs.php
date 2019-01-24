<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html><head>
<title>Pet Store</title></head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/pet.css">
<meta name="viewport" content="width-device-width">
<!--<script type="text/javascript" >
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
          alert("Please enter your email Address");
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
	</script>-->
<body>
<div id="wrapper">
<h1>Pet Store</h1>
<div class="row">
	<div class="leftcolumn" style="background-color:#90C7E3">
<nav>
<a href="<?php echo site_url('Main/index'); ?>">Home</a>
<a href="<?php echo site_url('Main/aboutus'); ?>">About Us</a>
<a href="<?php echo site_url('Main/contactus'); ?>">Contact Us</a>
<a href="<?php echo site_url('Main/client'); ?>">Client</a>
<a href="<?php echo site_url('Main/service'); ?>">Service</a>
<a href="<?php echo site_url('Main/login'); ?>">Login</a>  
</nav>
</div>
<div class="rightcolumn" >
<img src="<?php echo base_url('images/pet store banner 7 png.png');?>" alt=""  width=100%">
<h2>Contact Us</h2>
<?php
 #echo form_error('First Name'); 
#if ($this->uri->segment(2)=="inserted"){
# echo '<p>Data inserted</p>' ;}
?>
<p> Required information is marked with an asterisk(*).</p>
<form name= "myForm" method ="POST" action="http://localhost/CodeIgniter-3.1.9/index.php/Main/formvalidation">
<table class="table">
<tr><td>*First name:</td><td><input type="text" name="firstname" value="" required></td></tr>
<tr><td>*Last name:</td><td><input type="text" name="lastname" value="" required></td></tr>
<tr><td>*E-mail:</td><td><input type="text" name="email" value="" required></td></tr>
<tr><td>Phone:</td><td><input type="text" name="phone" value=""></td></tr>
<tr><td valign="top">*Comments:</td><td><textarea rows="3" cols="24" name="comments" value="" required></textarea></td></tr>
<tr><td><input type="submit" name="sendmail" value="Submit"></td><td></td></tr>
</table>
</form> 
<footer>
<br/><i>Copyright &copy 2018 Pet Store<br/>
<a href="mailto:kavya@ponnam.com" onmouseover="this.style.color='blue';"><u>kavya@ponnam.com</u></a></i></p>
</div></body>
</footer>
</div></div>
</html>