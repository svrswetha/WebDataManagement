<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html><head>
<title>Pet Store</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/pet.css">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
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
<img src="<?php echo base_url('images/pet store banner 5 png (1).png');?>" alt="" style="width:100%;" >
<h2>Enjoy your Pets in our Island</h2>
<p>Pet Store offers a special experience on dealing with your pet's needs on the Island. Relax in serenity with our experts taking care of all your pet's need.
<ul><li>Grooming</li><li>Vaccines</li><li>Implants</li><li>Dental Cleaning</li><li>Travel Documents</li></ul></p>
<address>Pet Store<br/>1999 All Pets Road<br/>Round Rock, TX 95555<br/><br/><a href="tel:888-555-5555" style="color:black;">888-555-5555</a><br/>
</address>
<footer>
<br/><i>Copyright &copy 2018 Pet Store<br/>
<a href="mailto:kavya@ponnam.com" onmouseover="this.style.color='blue';"><u>kavya@ponnam.com</u></a></i></p>
</div></body>
</footer>
</div>
</div>
</html>
