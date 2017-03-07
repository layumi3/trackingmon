<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

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

	/*TOOD ref https://console.developers.google.com/apis/credentials?project=inlaid-subset-132307*/
	public function index()
	{
		$this->load->model('m_web');

		$latitute='-6.8700394';
		$longitude='107.5878127';

		$config['center'] = "$latitute, $longitude";
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);
		$result=array();

		$mark=$this->m_web->get_all_order();
		// break;
		$now=date('Y-m-d');
		$start_date = date('Y-m-d', strtotime("$now -1 weeks"));
		// echo("$now - $start_date");
		$marker = array();

		foreach ($mark as $key => $value) {
			$order_parm = $value->id_order;
	 			$marker['position'] = "$value->latitude, $value->longitude";
				$marker['infowindow_content'] = '<b> Order #'.$order_parm.'</b></br>'.$value->username." | ".$value->nopol.'</br>'.$value->waktu;
				$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';

				$this->googlemaps->add_marker($marker);
		}
		$data['map'] = $this->googlemaps->create_map();
		// $data['location']=$this->m_web->location();

		$this->load->view('v_location',$data);
			
	}

}
