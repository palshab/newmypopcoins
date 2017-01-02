<?php
class Model_api extends CI_Model 
{
	public function __construct() {
		parent::__construct();
	}
	public function call_procedure($procedure, $parameter = array())
	{  
		$param         = $this->userfunction->paramiter($parameter);
		$query         = $this->db->query("call $procedure($param)", $parameter);
		$close         = $this->db->close();
		$result = $query->result();
		return $result = $query->result();
	}
	public function call_procedureRow($procedure, $parameter = array())
	{
		$param         = $this->userfunction->paramiter($parameter);
		$query         = $this->db->query("call $procedure($param)", $parameter);
		$close         = $this->db->close();
		return $result = $query->row();
	}
	public function call_procedures($procedure, $parameter = array())
	{  
		$param         = $this->userfunction->paramiter($parameter);
		$query         = $this->db->query("call $procedure($param)", $parameter);
		$close         = $this->db->close();
			
	}
}
?>