<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_web extends CI_Model {

	function validation($username,$password){
		$sql="select * from tb_user where username='$username' and password = '$password'" ;
		$query = $this->db->query($sql);
		return $query->row();
	}

	function driver(){
		$sql="select * from tb_driver";
		$query = $this->db->query($sql);
		return $query->result();    	
	}

	function driver_location($driver_param){
		$sql="SELECT * FROM  `position_tb` LEFT JOIN order_tb ON order_tb.id_order = position_tb.id_order WHERE username =  '$driver_param'";
		$query = $this->db->query($sql);
		return $query->result();    	
	}

		function map_location($driver_param){
		$sql="SELECT * FROM `tb_posisi`left join tb_order on tb_order.id_order =tb_posisi.id_order where id_sim ='$driver_param' order by waktu desc LIMIT 1";
		$query = $this->db->query($sql);
		return $query->row();    	
	}

	function order(){
		$sql="SELECT * FROM order_tb JOIN car_tb ON car_tb.nopol = order_tb.nopol GROUP BY order_tb.id_order LIMIT 0 , 30 ";
		$query = $this->db->query($sql);
		return $query->result();    	
	}
		function order_id(){
		$sql="SELECT * 
FROM  `tb_order` 
ORDER BY  `tb_order`.`last_in` DESC 
LIMIT 1";

		$query = $this->db->query($sql);
		return $query->result();    	
	}

	function location($driver_param){
$bata="SELECT id_order AS id_order
FROM  `order_tb` 
WHERE username =  '$driver_param'
ORDER BY id_position asc 
";
$que = $this->db->query($bata);
$m_order=$que->result();

foreach ($m_order as $key){
 $morder=$key->id_order;
}

		$sql="SELECT tb_posisi.*, tb_driver.nama_driver, tb_pegawai.nama_peminjam FROM `tb_posisi` left join tb_order on tb_order.id_order=tb_posisi.id_order
left join tb_driver on tb_driver.id_sim=tb_order.id_sim
left join tb_pegawai on tb_pegawai.id_peminjam=tb_order.id_peminjam where tb_posisi.id_order='$morder' order by waktu desc limit 30";

		$query = $this->db->query($sql);
		return $query->result();    	
	}

	function insert_driver($driver_param){
		$this->db->insert('tb_driver', $driver_param); 	
	}

	function insert_user($user_param){
		$this->db->insert('tb_user', $user_param); 		
	}

	function deleteOrder($id){
		$sql="delete from order_tb where id_order='$id'" ;
		$sqls="delete from position_tb where id_order='$id'" ;
		$query = $this->db->query($sql);
		$query = $this->db->query($sqls);
	}

	function insert_borrower($borrower_param){
		$this->db->insert('tb_pegawai', $borrower_param); 	
	}

	function vehicle(){
		$sql="SELECT * from `tb_kendaraan`";
		$query = $this->db->query($sql);
		return $query->result();    	
	}

	function get_all_order(){
		$sql="SELECT * 
FROM  `order_tb` 
JOIN position_tb ON order_tb.id_order = position_tb.id_order
ORDER BY id_position DESC 
LIMIT 0 , 30";
		$query = $this->db->query($sql);
		return $query->result();  
	}



	function count_driver(){
		$sql="SELECT * FROM  `tes_posisi` WHERE DATE( waktu ) =  '2016-07-18' GROUP BY id_order ORDER BY  `tes_posisi`.`waktu` DESC ";
		$query = $this->db->query($sql);
		return $query->result();    	
	}

	function get_position(){
		$sql="SELECT * from tb_posisi";
		$query = $this->db->query($sql);
		// log_message('debug', $this->db->last_query());
		return $query->result();    
	}

}
