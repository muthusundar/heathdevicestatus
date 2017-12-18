<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	 function __construct(){
        parent::__construct();
		$this->load->helper('url');
    }
	public function index()
	{		
		$data['data']="";
		if(isset($_POST)){			
			if($this->input->post('Email') && $this->input->post('Password')){				
				$data['data']=$this->Adminmodel->login();
				if($data['data']==1){					
					$data['data']="Invalid credentials";	
				}else{
					redirect(base_url()."user_detail");
				}
			}
		}else{
			$data['data']="Please give the valid credentials";
		}			
		$this->load->view('login',$data);
	}

	public function check_password(){
		if(!isset($_SESSION['admin'])){
			redirect(base_url());
		}
		echo $this->Adminmodel->check_password();
	}

	public function profile(){
		if(!isset($_SESSION['admin'])){
			redirect(base_url());
		}
		$data['data']="";
		$data['data']=$this->Adminmodel->profile();
		$this->load->view('profile',$data);
	}

	
	public function get_user(){
		if(!isset($_SESSION['admin'])){
			redirect(base_url());
		}
		$data=$this->Adminmodel->get_user();
		echo json_encode($data);
	}
	
	public function get_device(){
		if(!isset($_SESSION['admin'])){
			redirect(base_url());
		}
		$data=$this->Adminmodel->get_device();
		echo json_encode($data);
	}
	
	public function user_detail(){
		if(!isset($_SESSION['admin'])){
			redirect(base_url());
		}
		$data['usercnt']=$this->Adminmodel->usercnt();
		if(!isset($_SESSION['admin']['UserID'])){
			redirect(base_url()."index");}
		if($this->input->post('submit')){
			$this->Adminmodel->user_detail();
			redirect(base_url().'user_detail?s');
		}		
		$data['data']=$this->Adminmodel->user_detail_list();
		$this->load->view('user-details',$data);			
	}
	
	public function device_detail(){
		if($this->input->post('submit')){
			$this->Adminmodel->device_detail();
			redirect(base_url().'device_detail?s');
		}		
		$data['data']=$this->Adminmodel->device_detail_list();
		$this->load->view('device-detail',$data);			
	}
	
	
	
	public function email_check(){
		if(!isset($_SESSION['admin'])){
			redirect(base_url());
		}
		$_POST['Email'] = trim($this->input->post('Email'));
		echo $result = $this->Adminmodel->email_check();
	}
	
	public function deviceid_check(){
		if(!isset($_SESSION['admin'])){
			redirect(base_url());
		}
		$_POST['DeviceID'] = trim($this->input->post('DeviceID'));
		echo $result = $this->Adminmodel->deviceid_check();
	}

	public function verify_email($id){
		if(!isset($id) || !isset($_GET['token'])){
			redirect(base_url());
		}
		$data = $this->Adminmodel->profile_details($id);
		$_SESSION['admin']=$data[0];
		$this->load->view('verify_email');
	}
	public function reset_pass(){
		$res = $this->Adminmodel->reset_password();
		if($res){
			redirect(base_url()."user_detail");
		}
	}
	public function forgot_password(){
		$data['data']="";
		if($this->input->post()){
			if($this->input->post('Email')){
				$data['data']=$this->Adminmodel->forgot_password();
				if($data['data']==0){
					$data['data']="You email not matched our record.";	
				}else{
					$data['data']="Your password has been reseted successfully.Please check your registered email Inbox.";
				}
			}else{
				$data['data']="Please enter your email address.";
			}
		}
		$this->load->view('forgot_password',$data);
	}
	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}
	//Delete functionality
	public function delete_user(){
		if(!isset($_SESSION['admin'])){
			redirect(base_url());
		}
		$this->Adminmodel->delete_user();
		redirect(base_url().'user_detail?d');
	}
	
	public function delete_device(){
		if(!isset($_SESSION['admin'])){
			redirect(base_url());
		}
		$this->Adminmodel->delete_device();
		redirect(base_url().'device_detail?d');
	}

       
        
        
        
}
