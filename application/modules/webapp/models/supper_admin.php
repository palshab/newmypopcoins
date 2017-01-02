<?php
class Supper_admin extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function call_procedure($procedure, $parameter = array()) {
		$param         = $this->userfunction->paramiter($parameter);
		$query         = $this->db->query("call $procedure($param)", $parameter);
		$close         = $this->db->close();
		 
		return $result = $query->result();
		
	}
	public function call_procedureRow($procedure, $parameter = array()) {
		$param         = $this->userfunction->paramiter($parameter);
		$query         = $this->db->query("call $procedure($param)", $parameter);
		$close         = $this->db->close();
	return $result = $query->row();
	}
    public function call_procedureInsert($procedure, $parameter = array()) {
		$param         = $this->userfunction->paramiter($parameter);
		$query         = $this->db->query("call $procedure($param)", $parameter);
		$close         = $this->db->close();
			
		//return $result = $query->result_array();
	}

	public function userdata($array) {
		$recorddata = array(
			'admin_id'  => $array[0]->ad_id,
			'username'  => $array[0]->username,
			'validated' => true);
		$this->session->set_userdata($recorddata);

		main_menu('menuaccess');
	}
	public function registration()
	{
		$this->db->select('*');
		$this->db->from('tbl_supperadmin');
		$result=$this->db->get();
		return $result->result();
	}
	function masterHide()

{
    
function get_countries()
    {
        $query = $this->db->get('tbl_aw_week');
            if ($query->num_rows >= 1)
            {
                foreach($query->result_array() as $row)
                {
                    $data[$row['week_id']]=$row['countryName'];
                }
                return $data;
            }
    }


}
}
?>