<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Restapimodel extends CI_Model {
	function __construct(){
       parent::__construct();
		$this->load->dbutil();
    }
	public function users(){
		return $this->db->get('user')->result_array();
	}
	
	public function devices(){
		$this->db->select('*,IF(ReportedOn >= DATE_SUB(NOW(), INTERVAL 1 DAY),"green","red") AS Status');
		return $this->db->get('device')->result_array();
	}
	
	public function users_update(){
		$user['Name']=$this->input->post('Name');
		$user['Email']=$this->input->post('Email');
		$user['IsActive']=$this->input->post('IsActive');
		$password=$this->RandomString();
		$user['RandomString']=md5($password);
		if($this->input->post('Password')){
			$user['Password']=md5($this->input->post('Password'));
		}
		if(empty($_POST['id'])){
			unset($_POST['id']);
				$this->db->insert('user',$user); //Create New Admin/Super Admin User 
				$id=$this->db->insert_id();					
				$this->load->library('email');
				$this->email->from('muthusunda@gmail.com', 'Admin');
				$this->email->reply_to($_POST['Email'], 'Customer');
				$this->email->to($_POST['Email']);
				$this->email->subject('Your Account Credentials');	
				$url=base_url().'verify_email/'.$id.'?token='.$user['RandomString'];
				$message = '<p>Hi '.$_POST['Name'].',</p>
				<p>You sms.health.com account has been setup based on your request.</p>
				<p>Your Password Reset Link is '.$url.'</p><br>
				<p>In case of any issues please feel to contact us at <a style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#19365e; text-decoration:underline;" href="mailto:muthusunda@gmail.com">muthusunda@gmail.com</a></p><br>
				<p>Thanks,</p>
				<p>sms.health.com</p>';			
				$this->email->message($message);	
				$this->email->set_alt_message('This is the alternative message');
				$this->email->send();
				return $id;	
		}else{
			$this->db->where('UserID',$this->input->post('id'));
			$this->db->update('user',$user);
			return $this->input->post('id');
		}
	}
	
	public function devices_update(){
		$device['DeviceID']=$this->input->post('DeviceID');
		$device['DeviceLabel']=$this->input->post('DeviceLabel');
		$device['ReportedOn']=date('Y-m-d H:i:s', strtotime($this->input->post('ReportedOn')));
		
		if(empty($_POST['id'])){				
			unset($_POST['id']);
				$this->db->insert('device',$device); //Create New device 
				return $this->db->insert_id();	
		}else{
			$this->db->where('ID',$this->input->post('id'));
			$this->db->update('device',$device);
			return $this->input->post('id');
		}
	}
	
	public function users_delete($id){
		$this->db->where('UserID',$id);
		$this->db->delete('user');
	}
	
	public function devices_delete($id){
		$this->db->where('ID',$id);
		$this->db->delete('device');
	}
	
	public function RandomString(){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) 
        {
            $randstring .= @$characters[rand(0, strlen($characters))];
        }
    return $randstring;
    }
}
?>