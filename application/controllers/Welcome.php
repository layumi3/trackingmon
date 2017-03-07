<?php
// header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('v_logins');
	}

	public function listManagement()
	{
		$this->load->model('m_web');
		$data['driver'] = $this->m_web->driver();
		$data['order'] = $this->m_web->order();
		$this->load->view('index',$data);
	}

	function newData(){
		$this->load->model('m_web');
		// $data['borrower'] = $this->m_web->borrower();
		$data['vehicle'] = $this->m_web->vehicle();
		$data['order'] = $this->m_web->order_id();
		$this->load->view('v_form',$data);
	}

	function newDataBorrower(){
		$this->load->model('m_web');
		$data['borrower'] = $this->m_web->borrower();
		$this->load->view('v_form_peminjam',$data);
	}

	function fillLogin(){
		$this->load->model('m_web');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$login_status = $this->m_web->validation($username,$password);
		if ($login_status){
			$this->session->set_userdata('ses_username',$username);
			$this->session->set_userdata('ses_login_status',$login_status);
			$this->listManagement();
		}else{
			$this->load->view('v_logins');	
		}
	}

	function logout(){
		$this->session->unset_userdata('ses_login_status');
		$this->session->unset_userdata('ses_username');
		$this->index();
	}

	public function deleteOrder(){
		$this->load->model('m_web');
		$id = $this->input->get('id');
		$this->m_web->deleteOrder($id);
		$this->listManagement();
	}

	function fillOrder(){
		$last_in=date("Y-m-d H:i:s");
		$this->load->model('m_web');
		$order_param= array('id_order' => $this->input->post('id_order'),
			'id_kendaraan' => $this->input->post('id_kendaraan'),
			'tgl_pesan' => $this->input->post('tgl_pesan'),
			'tgl_berangkat' => $this->input->post('tgl_berangkat'),
			'tgl_kembali' => $this->input->post('tgl_kembali'),
			'asal' => $this->input->post('asal'),
			'tujuan' => $this->input->post('tujuan'),
			'id_peminjam' => $this->input->post('id_peminjam'),
			'last_in' => $last_in
			);
		$this->m_web->insert_order($order_param);
		$this->listManagement();
	}

	function fillDriver(){
		$this->load->model('m_web');
		$driver_param= array(
			'id_sim' => $this->input->post('id_sim'),
			'nama_driver' => $this->input->post('nama_driver'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'alamat' => $this->input->post('alamat'),
			'handphone' => $this->input->post('handphone'),
			'status' => 'inactive'
			);
		$user_param=array('username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'status' => 'active'
			);
		$this->m_web->insert_driver($driver_param);
		$this->m_web->insert_user($user_param);
		$this->listManagement();
	}
	
	function detailDriver(){
		$this->load->model('m_web');
		$latitute='-6.8700394';
		$longitude='107.5878127';

		$config['center'] = "$latitute, $longitude";
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);
		$result=array();

		$driver_param= $this->input->get('username');
		$mark_driver=$this->m_web->driver_location($driver_param);
		$data['location'] = $this->m_web->driver_location($driver_param);
		$now=date('Y-m-d');
		$start_date = date('Y-m-d', strtotime("$now -1 weeks"));
		// echo("$now - $start_date");
		$marker = array();

		foreach ($mark_driver as $key => $value) {
			$order_parm = $value->id_position;
	 			$marker['position'] = "$value->latitude, $value->longitude";
				$marker['infowindow_content'] = '<b> Posisi #'.$order_parm.'</b></br>'.$value->username." | ".$value->nopol.'</br>'.$value->waktu;
				$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';

				$this->googlemaps->add_marker($marker);
		}

		/*$data['onedriver']=$this->m_web->detail_driver_a($driver_param);
		$driver=$this->m_web->location($driver_param);
		$marker = array();

			foreach ($driver as $keys) {
				$satu=$keys->id_posisi;
				if ($satu==1){
					$marker['position'] = "$keys->latitude, $keys->longitude";
					$marker['infowindow_content'] = '<b> Awal Ya '.$keys->id_order.'</b>'." l ".$keys->waktu;
					$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9900FF|000000';
				}else{
		 			$marker['position'] = "$keys->latitude, $keys->longitude";
					$marker['infowindow_content'] = '<b>'.$keys->id_order.'</b>'." l ".$keys->waktu;
					$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=#|9999FF|000000';

				}
					$this->googlemaps->add_marker($marker);
			}*/
		/*$marker = array();

			foreach ($mark_driver as $keys) {
		 			$marker['position'] = "$keys->latitude, $keys->longitude";
					$marker['infowindow_content'] = '<b>'.$keys->id_order.'</b>'." l ".$keys->waktu;
					$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=*|9999FF|000000';

					$this->googlemaps->add_marker($marker);
			}
			
						for ($i=0; $i < count($mark_driver); $i++) { 
						}*/
		$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('v_detail_driver',$data);
	}


}
