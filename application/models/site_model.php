<?php
class site_model extends CI_Model{
		function Get_All()
	{
	
	$query = $this->db->get('test');
	  if($query->num_rows()>0)
	  {
       foreach ($query->result() as $row)
        { $data[ ]=$row; }
		   return $data;
	}
	
}
}
?>