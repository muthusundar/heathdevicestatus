<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Homemodel extends CI_Model {
	function __construct(){
       parent::__construct();
		$this->load->dbutil();
    }
	public function index(){
		return $this->db->query('SELECT *, IF(ReportedOn >= DATE_SUB(NOW(), INTERVAL 1 DAY),"green","red") AS Status FROM `device`')->result_array();
	}
	
	
}
?>