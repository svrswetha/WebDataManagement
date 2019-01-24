<?php
class Dbconnection extends CI_Model
{
	function test_main()
	{ 
		echo "This is model function";
	}
	function insert_data($data)
	{
		$this->db->insert("contactus",$data);
	}
	function login_data($email)
	{
	$qu = $this->db->query("SELECT roleid FROM users where email='$email' ");
    #$ro = $qu->row(0, 'users');
	$ro=$qu->row_array();

	
	#$this->db->select('roleid');
    #$this->db->where('email', $email);
    #$query = $this->db->get('users');
    #if ($query->num_rows() ==1) {
    	#$row1= mysqli_fetch_array($query);
        if($ro=='1')
        {
        	$this->load->view('clientpage');
        }
        else
        {
        	#redirect("http://localhost/CodeIgniter-3.1.9/index.php/controllers/Main/businesspage");
        	 $this->load->view('businesspage');
        }
    # }
    #else {
        #redirect(base_url()."controllers/Main/login");
    #}
	
	}
}
?>