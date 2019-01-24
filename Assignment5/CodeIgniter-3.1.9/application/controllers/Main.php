<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('Main');
	}
	public function aboutus()
	{
		$this->load->helper('url');
		$this->load->view('Aboutus');
	}
	public function contactus()
	{
		$this->load->helper('url');
		$this->load->view('ContactUs');
	}
	public function client()
	{
		$this->load->helper('url');
		$this->load->view('Client');
	}
	public function service()
	{
		$this->load->helper('url');
		$this->load->view('Service');
	}
	public function login()
	{
		$this->load->helper('url');
		$this->load->view('Login');
	}
	public function formvalidation()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		#array of validations in documentation
		$this->form_validation->set_rules("firstname","First name",'required|alpha');
		$this->form_validation->set_rules("lastname","Last name",'required|alpha');
		$this->form_validation->set_rules("email","E-mail",'required|valid_email');
        $this->form_validation->set_rules("phone","Phone",'regex_match[/^[0-9]{10}$/]'); 
		$this->form_validation->set_rules("comments","Comments",'required|alpha');


		if($this->form_validation->run()==TRUE)
		{
			    $fname = $this->input->post("firstname");
				$lname = $this->input->post("lastname");
				$email = $this->input->post("email");
				$phone = $this->input->post("phone");
				$comments = $this->input->post("comments") ;
			$this->load->model("Dbconnection");
			$data=array(
				"fname"  =>$fname,
				"lname" =>$lname,
				"email" =>$email,
				"phone" =>$phone,
				"comments" =>$comments

			);
			$this->Dbconnection->insert_data($data);
			$this->load->view('ContactUs');
			echo "data inserted";

		}
		else{
				$this->load->view('ContactUs');
				echo form_error('firstname'); 
				echo form_error('lastname'); 
				echo form_error('email'); 
				echo form_error('phone'); 
				echo form_error('comments'); 
		}

	}
	public function inserted()
	{
		$this->load->view('ContactUs');
	}

public function formvalid()
	{
		$this->load->library('form_validation');
		$this->load->helper('url','form');
		$this->load->model("Dbconnection");

		#array of validations in documentation
		$this->form_validation->set_rules("email","E-mail",'required');
		#$this->form_validation->set_rules("lastname","Last name",'required|alpha');
		#$this->form_validation->set_rules("email","E-mail","required");

		#$this->form_validation->set_rules("comments","Comments","required");

		if($this->form_validation->run()==TRUE)
		{
			    $email = $this->input->post("email");
				#$password = $this->input->post("password");
				#$data=array(
				#"email" =>$email,
				#"password" =>$password
			#);
			$this->Dbconnection->login_data($email);
		}
			
		else{
				$this->load->view('login');
		}

	}
public function clientpage()
{
		      $this->load->view('clientpage'); 
 }            
 public function businesspage()  {      
         $this->load->view('businesspage');
     }
}
?>