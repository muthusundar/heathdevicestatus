<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Adminmodel extends CI_Model {
	function __construct(){
       parent::__construct();
		$this->load->dbutil();
    }
	public function login(){
		$this->db->where('Email',$this->input->post('Email'));
		$this->db->where('IsActive',1);
		$this->db->where('Password',md5($this->input->post('Password')));
		$rows =$this->db->get('user')->result_array();
		if(isset($rows[0]['Email'])){			
			$_SESSION['admin']=$rows[0];
			return $rows;	
		} else {
			return 1;
		}
	}
	public function delete_user(){		
		$this->db->where('UserID',$this->input->get('UserID'));
		$this->db->delete('user');
	}
	public function delete_device(){
		$this->db->where('ID',$this->input->get('ID'));
		$this->db->delete('device');
	}
	public function forgot_password(){
		$this->db->where('Email',$this->input->post('Email'));
		$rows =$this->db->get('user')->result_array();	
		if(isset($rows[0]['Email'])){
			$password=$this->RandomString();
			$user['RandomString']=md5($password);
			$this->db->where('Email',$rows[0]['Email']);
			$this->db->update('user', $user);
			$this->load->library('email');
			$this->email->from('muthusunda@gmail.com', 'Admin');
			$this->email->reply_to($_POST['Email'], 'Customer');
			$this->email->to($_POST['Email']);
			$this->email->subject('Your password reset Link');	
			$url=base_url().'verify_email/'.$rows[0]['UserID'].'?token='.$user['RandomString']."&s";
			//echo $url;
			$message = '<p>Hi '.$rows[0]['Name'].',</p>
			<p>Your sms.health.com password has been reset based on your request.</p>
			<p>Your Password Reset Link is '.$url.'</p><br>
			<p>In case of any issues please feel to contact us at <a style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#19365e; text-decoration:underline;" href="mailto:muthusunda@gmail.com">muthusunda@gmail.com</a></p><br>
			<p>Thanks,</p>
			<p>sms.health.com</p>';			
			$this->email->message($message);	
			$this->email->set_alt_message('This is the alternative message');
			$this->email->send();
			return "1";
		}else{
			return "0";
		}
	}
	public function user_detail(){
		if(isset($_POST['submit'])){
			$user['Name']=$this->input->post('Name');
			$user['Email']=$this->input->post('Email');
			$user['IsActive']=$this->input->post('IsActive');
			$password=$this->RandomString();
			$user['RandomString']=md5($password);
			if($this->input->post('Password')){
				$user['Password']=md5($this->input->post('Password'));
			}
			if(empty($_POST['UserID'])){
				unset($_POST['UserID']);
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
				$this->db->where('UserID',$this->input->post('UserID'));
				$this->db->update('user',$user);
			}
		}

	}
	
	public function device_detail(){
		if(isset($_POST['submit'])){
			$device['DeviceID']=$this->input->post('DeviceID');
			$device['DeviceLabel']=$this->input->post('DeviceLabel');
			$device['ReportedOn']=date('Y-m-d H:i:s', strtotime($this->input->post('ReportedOn')));
			
			if(empty($_POST['ID'])){				
				unset($_POST['ID']);
					$this->db->insert('device',$device); //Create New device 
					return 1;	
			}else{
				$this->db->where('ID',$this->input->post('ID'));
				$this->db->update('device',$device);
			}
		}

	}
	public function get_user(){
		if($this->input->post('UserID')){
			$this->db->where('UserID',$this->input->post('UserID'));
			$data=$this->db->get('user')->result_array();	
			return $data[0];
		}
	}
	
	public function get_device(){
		if($this->input->post('ID')){
			$this->db->where('ID',$this->input->post('ID'));
			$data=$this->db->get('device')->result_array();			
			return ((count($data)<=1)?$data[0]:'');
		}
	}
	public function profile(){		
		$_POST['UserID']=isset($_POST['UserID'])?$_POST['UserID']:$_SESSION['admin']['UserID'];
		if(isset($_POST['submit'])){
			$user['Password']=md5($this->input->post('Password'));		
			$this->db->where('UserID',$this->input->post('UserID'));
			$this->db->update('user',$user);
		}			
		$this->db->where('UserID',$this->input->post('UserID'));
		return $this->db->get('user')->result_array();	
	}
	public function check_password(){
		$_POST['UserID']=isset($_POST['UserID'])?$_POST['UserID']:$_SESSION['admin']['UserID'];
		$this->db->where('UserID',$this->input->post('UserID'));
		$this->db->where('Password',md5($this->input->post('Password')));
		if( $this->db->get('user')->num_rows() == 1){
			return "true";
		}else{
			return "false";
		}
	}

	public function usercnt(){
		$this->db->select('COUNT(*) AS cnt');
		$data=$this->db->get('user')->result_array();
		return ((!empty($data[0]['cnt']))?$data[0]['cnt']:0); 

	}

	public function user_detail_list(){		
		$this->db->select('a.*');
		return $this->db->get('user a')->result_array();
	}
	
	public function device_detail_list(){		
		$this->db->select('a.*');
		return $this->db->get('device a')->result_array();
	}
	
	public function profile_details($id){
		$this->db->where('UserID',$id);
		$this->db->where('IsActive',1);
		$data=$this->db->get('user')->result_array();
		return $data;
	}
	public function reset_password(){
		$this->db->where('UserID',$_SESSION['admin']['UserID']);
		$data = array('Password'=>md5($this->input->post('Password')),'IsActive'=>1);
		$result = $this->db->update('user',$data);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}
	
	public function change_password(){
		if(isset($_POST['Email'])){
			$query = $this->db->query("SELECT Email FROM user WHERE Email ='".mysql_real_escape_string($_POST['Email'])."' AND password='".md5(mysql_real_escape_string($_POST['Password']))."'");		
			$rows = $query->result_array();
			if(isset($rows[0]['email'])){
				$data['Password']=md5($_POST['Password']);
				$this->db->where('Email', $_POST['Email']);
				$this->db->update('user', $data);			
				return "1";
			}else {
				return "0";
			}
		}
	}
	public function email_check(){	
		$this->db->where('Email', $this->input->post('Email'));
		if($this->input->post('UserID') != ''){
			$this->db->where('UserID <>', $this->input->post('UserID'));
		}
		if( $this->db->get('user')->num_rows() > 0){
			return "false";
		}else{
			return "true";
		}
	}

	public function deviceid_check(){
		$this->db->where('DeviceID', $this->input->post('DeviceID'));
		if($this->input->post('ID') != '' || $this->input->post('ID') != null){
			$this->db->where('ID <>', $this->input->post('ID'));
		}
		if( $this->db->get('device')->num_rows() > 0){
			return "false";
		}else{
			return "true";
		}
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