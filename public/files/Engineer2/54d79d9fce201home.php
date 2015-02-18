<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('common_m');
		$this->load->model('user_m');

		$mode = $this->common_m->fetch_mode();
		if($mode['mode'] == 2){

			die();
		}

	}

	public function index() {
		
		if(!$this->auth_user->is_logged_in()) redirect('users/login');
		$data = array('title' => 'Dashboard', 'loggedUser'=>$this->auth_user->fetch_user_info(), 'current_dashboard'=>true);

		
		$this->load->view('homepage', $data);
	}

	public function audit_data_status(){

		$date_to = $this->input->post('date_to');
		$date_from = $this->input->post('date_from');
		$loggedUser = $this->auth_user->fetch_user_info();

		$filter_by_zone= 'national';
		if($loggedUser['zone'] !="national") $filter_by_zone = $loggedUser['zone'];

		$totalStores = $this->common_m->fetch_total_stores($date_to, $date_from, $filter_by_zone);
		$filter = array('date_to'=>$date_to, 'date_from'=>$date_from, 'filter_by_zone'=>$filter_by_zone);
		
		$loggedUser['level'] = 4;
		$total_audit_checked = count($this->common_m->fetch_approved_data($filter, $loggedUser));

		$loggedUser['level'] = 1;
		$total_audit_done = count($this->common_m->fetch_approved_data($filter, $loggedUser));

		$pending = $totalStores['total_stores']-$total_audit_done;

		$array = array('total_stores'=>$totalStores['total_stores'], 'audit_done'=>$total_audit_done, 'audit_checked'=>$total_audit_checked, 'pending'=>$pending);
		echo json_encode(array('result'=>true, 'data'=>$array));

	}

	public function add_location(){

		if(!$this->auth_user->is_logged_in()) 	redirect('users/login');

		$loggedUser = $this->auth_user->fetch_user_info();

		if(!in_array($loggedUser['level'],array(1))) redirect('home');

		$success_msg = '';

		if($this->input->post('submit')) {

			$success_msg = $this->_add_location_submit();
		}

		$data = array('title'=>'Add Location', 'loggedUser'=>$loggedUser, 'success_msg'=> $success_msg ,'postdata'=>$this->input->post(), 'current_add_location'=>true);

		$this->load->view('audit/location_form', $data);
	}


	public function edit_location($id = NULL){

		if(!$this->auth_user->is_logged_in()) 	redirect('users/login');

		$loggedUser = $this->auth_user->fetch_user_info();

		if(!in_array($loggedUser['level'],array(1))) redirect('home');

		if(empty($id)) redirect('location_list');

		$success_msg = '';

		
		if($this->input->post('submit')) {

			$success_msg = $this->_update_location_submit($id);
		}
		$resultData = $this->common_m->fetch_location_date_by_id($id);

		$data = array('title'=>'Edit Location', 'loggedUser'=>$loggedUser, 'success_msg'=> $success_msg ,'postdata'=>$resultData, 'current_add_location'=>true);

		$this->load->view('audit/edit_location', $data);
	}

	private function _update_location_submit($id){

		if($this->_validation_location()){

			$resultData = $this->common_m->fetch_location_date_by_id($id);
			$data = array(
				'location_id'	=>	$this->input->post('location_id'),
				'store_name'	=>	$this->input->post('store_name'),
				'channel_type'	=>	$this->input->post('channel_type'),
				'store_address'	=>	$this->input->post('store_address'),
				'store_state'	=>	$this->input->post('store_state'),
				'store_city'	=>	$this->input->post('store_city'),
				'store_region'	=>	$this->input->post('store_region'),
			);
			$parent_id = $this->common_m->update_location_data($resultData, $data);

			return 'Location Data has been successfully updated';

		}
	}

	public function delete_location($id){

		if(empty($id)) redirect('home/location_list');

		$resultData = $this->common_m->fetch_location_date_by_id($id);

		$this->common_m->delete_location($resultData);
		$this->session->set_flashdata('success', 'Location has been successfully deleted');
		redirect('home/location_list');
	}

	private function _validation_location(){

		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('date','Date','required|trim');
		$this->form_validation->set_rules('location_id','Location Id','required|trim');		
		$this->form_validation->set_rules('channel_type','Channel Type','required|trim');
		$this->form_validation->set_rules('store_name','Store Name','required|trim');
		$this->form_validation->set_rules('store_address','Store Address','required|trim');
		$this->form_validation->set_rules('store_state','Store State','required|trim');
		$this->form_validation->set_rules('store_city','Store City','required|trim');
		$this->form_validation->set_rules('store_region','Store Region','required|trim');

		return $this->form_validation->run();
	}

	private function _add_location_submit(){

		if($this->_validation_location()){

			$location_data = $this->common_m->fetch_location_data($this->input->post('location_id'));
			if($location_data){
				$data = array('date_added'=> date('Y-m-d',strtotime($this->input->post('date'))), 'parent_id'=>$location_data['id']);
				$this->common_m->add_location_data_date($data);
			}else{
				$data = array(
					'location_id'	=>	$this->input->post('location_id'),
					'store_name'	=>	$this->input->post('store_name'),
					'channel_type'	=>	$this->input->post('channel_type'),
					'store_address'	=>	$this->input->post('store_address'),
					'store_state'	=>	$this->input->post('store_state'),
					'store_city'	=>	$this->input->post('store_city'),
					'store_region'	=>	$this->input->post('store_region'),
				);
				$parent_id = $this->common_m->add_location_data($data);

				$data = array('date_added'=> date('Y-m-d',strtotime($this->input->post('date'))), 'parent_id'=>$parent_id);
				$this->common_m->add_location_data_date($data);
			}

			return 'Location Data has been successfully added';

		}
	}

	public function location_check(){
		
		$location_id = $this->input->post('location_id');

		if(empty($location_id)){ echo json_encode(array('result'=>false)); return false;}

		$auth_user = $this->auth_user->fetch_user_info();

		$region = $auth_user['zone'];
		$location_data = $this->common_m->fetch_location_data($location_id, $region);

		echo json_encode(array('result'=>true,'locdata'=>$location_data));

	}


	public function location_list( $search_column ='all', $search_query = 'all', $limit = NULL){

		$result = $this->common_m->fetch_location_data_all();
		if(!$this->auth_user->is_logged_in()) redirect('users/login');

		$filter = array();
		$page = (!is_null($limit)) ? $limit : 1;
		$loggedUser = $this->auth_user->fetch_user_info();
		$data = array('title' => 'Location List', 'loggedUser'=>$loggedUser, 'current_location_data'=>true, 'limit'=>$page, 'success_msg'=>$this->session->flashdata('success'));

		$this->load->library('pagination');

		$location_data = $this->common_m->fetch_location_data_all($search_query,$search_column);
		$config['base_url'] = site_url('home/location_list/'.$search_column.'/'.$search_query);
		$config['total_rows']	=	count($location_data);
		$config['per_page']		= 10;
		$config["uri_segment"]	= 5;

		$this->pagination->initialize($config);

		$page = (!is_null($limit)) ? $limit : 0;
		$location_data	=	$this->common_m->fetch_location_data_all($search_query,$search_column,$config['per_page'], $page);

		$pagination = $this->pagination->create_links();
		
		$data['location_data'] = $location_data;
		$data['pagination'] = $pagination;

		$data['filter'] = $filter;
		$this->load->view('audit/location_list', $data);
	}

	public function filter_locationdata(){

		$search_query = $this->input->get('search_val');
		$search_column = $this->input->get('search_column');

		redirect('home/location_list/'.$search_column.'/'.$search_query);
	}


	public function add_audit(){
		
		if(!$this->auth_user->is_logged_in()) 	redirect('users/login');

		$loggedUser = $this->auth_user->fetch_user_info();

		if(!in_array($loggedUser['level'],array(3))) redirect('home');

		$success_msg = '';

		if($this->input->post('submit')) {

			$success_msg = $this->_add_audit_submit();
		}

		$data = array('title'=>'Add Audit', 'loggedUser'=>$loggedUser, 'success_msg'=> $success_msg ,'postdata'=>$this->input->post(), 'current_add_audit'=>true);

		$this->load->view('audit/add_audit', $data);
	}

	
	

	private function _add_audit_submit(){

		if($this->_validate_auditdata()){
			$data = array();
			if(!empty($_FILES['audio_file']['name'])) {

				$audio_file_name = time(). '.' .strtolower(end(explode('.', $_FILES['audio_file']['name'])));
				move_uploaded_file($_FILES['audio_file']['tmp_name'], 'uploads/audio/'.$audio_file_name);
				$data['audio_file'] = $audio_file_name;
			}

			if(!empty($_FILES['image1']['name'])){
				$image1_file = time(). '1.' .strtolower(end(explode('.', $_FILES['image1']['name'])));
				move_uploaded_file($_FILES['image1']['tmp_name'], 'uploads/images/'.$image1_file);
				$data['image1'] = $image1_file;
			}

			if(!empty($_FILES['image2']['name'])){
				$image2_file = time(). '2.' .strtolower(end(explode('.', $_FILES['image2']['name'])));
				move_uploaded_file($_FILES['image2']['tmp_name'], 'uploads/images/'.$image2_file);
				$data['image2'] = $image2_file;
			}

			if(!empty($_FILES['image3']['name'])){
				$image3_file = time(). '3.' .strtolower(end(explode('.', $_FILES['image3']['name'])));
				move_uploaded_file($_FILES['image3']['tmp_name'], 'uploads/images/'.$image3_file);
				$data['image3'] = $image3_file;
			}
			
			$this->common_m->add_audit_data($data);
			return 'Audit data has been successfully added';
		}

	}


	public function edit_audit($audit_id = NULL){
		
		if(!$this->auth_user->is_logged_in()) 	redirect('users/login');

		$loggedUser = $this->auth_user->fetch_user_info();

		if(!in_array($loggedUser['level'],array(2)) || empty($audit_id)) redirect('home/audit_list');

		$success_msg = '';

		if($this->input->post('submit')) {

			$success_msg = $this->_update_audit_submit($audit_id);
		}
		$audit_data = $this->common_m->fetch_approved_data_row($audit_id);
		$data = array('title'=>'Update Audit', 'loggedUser'=>$loggedUser, 'success_msg'=> $success_msg ,'postdata'=>$audit_data, 'current_view_report'=>true);

		$this->load->view('audit/edit_audit', $data);
	}

	public function client_view($audit_id = NULL){
		
		if(!$this->auth_user->is_logged_in()) 	redirect('users/login');

		$loggedUser = $this->auth_user->fetch_user_info();

		if(!in_array($loggedUser['level'],array(1,4)) || empty($audit_id)) redirect('home/audit_list');

		$audit_data = $this->common_m->fetch_approved_data_row($audit_id);
		$data = array('title'=>'View Report', 'loggedUser'=>$loggedUser, 'postdata'=>$audit_data, 'current_view_report'=>true);

		$this->load->view('audit/client_audit', $data);
	}

	private function _update_audit_submit($audit_id){

		if($this->_validate_auditdata()){
			$data = array();
			$audit_data = $this->common_m->fetch_approved_data_row($audit_id);
			$data =array('audit_id'=>$audit_id, 'product_id1'=>$audit_data['prodcut_id1'],'product_id2'=>$audit_data['prodcut_id2'],'product_id3'=>$audit_data['prodcut_id3']);
			$this->common_m->update_audit_data($data);
			return 'Audit data has been successfully added';
		}

	}

	private function _validate_auditdata(){

		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('date','Date','required|trim');
		$this->form_validation->set_rules('time_in','Time In','required|trim');		
		$this->form_validation->set_rules('time_out','Time Out','required|trim');
		$this->form_validation->set_rules('location_id','Location Id','required|trim');

		if($this->input->post('audit_status') == 'done'){
			$this->form_validation->set_rules('product1_category','Product1 Category','required|trim');
			$this->form_validation->set_rules('product1_brand','Product1 Brand','required|trim');
			$this->form_validation->set_rules('product1_model','Product1 Model','required|trim');
			$this->form_validation->set_rules('product1_price_offerd','Product1 Price Offered','required|trim|numeric');
			$this->form_validation->set_rules('product1_price_suggested','Product1 Suggested Price','required|trim|numeric');
			$this->form_validation->set_rules('product1_price_break','Product1 Price Break','required|trim');
			$this->form_validation->set_rules('product1_price_break_reason','Product1 Reason for Price Break','required|trim');
			$this->form_validation->set_rules('product1_remark','Product1 Remark','required|trim');

			$this->form_validation->set_rules('product2_category','Product2 Category','required|trim');
			$this->form_validation->set_rules('product2_brand','Product2 Brand','required|trim');
			$this->form_validation->set_rules('product2_model','Product2 Model','required|trim');
			$this->form_validation->set_rules('product2_price_offerd','Product2 Price Offered','required|trim|numeric');
			$this->form_validation->set_rules('product2_price_suggested','Product2 Suggested Price','required|trim|numeric');
			$this->form_validation->set_rules('product2_price_break','Product2 Price Break','required|trim');
			$this->form_validation->set_rules('product2_price_break_reason','Product2 Reason for Price Break','required|trim');
			$this->form_validation->set_rules('product2_remark','Product2 Remark','required|trim');
		}
		elseif($this->input->post('audit_status')=='notdone'){
			$this->form_validation->set_rules('reason','Reason','required|trim');
		}

		return $this->form_validation->run();
	}

	public function privacy_policy(){

		if(!$this->auth_user->is_logged_in()) 	redirect('users/login');


		$data = array('title'=>'Add Audit', 'bodyClass'=>'page-header-fixed bg-1',  
			'loggedUser'=>$this->auth_user->fetch_user_info(), 
			'postdata'=>$this->input->post(),'current_privacypolicy'=>true);

		$this->load->view('pages/privacy_policy.php', $data);
	}

	public function terms_and_conditions(){

		if(!$this->auth_user->is_logged_in()) 	redirect('users/login');


		$data = array('title'=>'Add Audit', 'bodyClass'=>'page-header-fixed bg-1',  
			'loggedUser'=>$this->auth_user->fetch_user_info(), 
			'postdata'=>$this->input->post(),'current_terms_and_conditions'=>true);

		$this->load->view('pages/terms_and_conditions.php', $data);
	}

	public function information(){

		if(!$this->auth_user->is_logged_in()) 	redirect('users/login');


		$data = array('title'=>'Information', 'loggedUser'=>$this->auth_user->fetch_user_info(), 'postdata'=>$this->input->post(),'current_information'=>true);

		$this->load->view('pages/information', $data);
	}


	public function view_report($filter_by_zone = 'national', $location_id ="all", $start_date = "all", $end_date = "all", $limit = NULL ){

		if(!$this->auth_user->is_logged_in()) redirect('users/login');

		if($start_date =='all') $date_to = ''; else $date_to = $start_date;
		if($end_date =='all') $date_from = ''; else $date_from = $end_date;

		$loggedUser = $this->auth_user->fetch_user_info();
		if(in_array($loggedUser['level'],array(2,4))) $filter_by_zone = $loggedUser['zone']; 
		$filter = array('filter_by_zone'=>$filter_by_zone,'location_id'=>$location_id, 'date_to'=>$date_to, 'date_from'=>$date_from, 'audit_status'=>2);
		
		$data = array('title' => 'View Report','loggedUser'=>$loggedUser, 'current_view_report'=>true, 'filter'=> $filter);

		if(in_array($loggedUser['level'],array(3))) redirect('home');

		$this->load->library('pagination');
		
		$audit_data = $this->common_m->fetch_approved_data($filter, $loggedUser);
		$config['base_url'] = site_url('home/view_report/'. $filter_by_zone.'/'.$location_id.'/'.$start_date.'/'.$end_date);
		$config['total_rows']	=	count($audit_data);
		$config['per_page']		= 10;
		$config["uri_segment"]	= 7;


		$this->pagination->initialize($config);

		$page = (!is_null($limit)) ? $limit : 0;
		$audit_data	=	$this->common_m->fetch_approved_data($filter, $loggedUser, $config['per_page'], $page);

		$pagination = $this->pagination->create_links();
		
		$data['audit_data'] = $audit_data;
		$data['pagination'] = $pagination;

		$data['filter'] = $filter;
		$this->load->view('audit/audit_list', $data);
	}

	public function filter_report(){

		$filter_by_zone = $this->input->get('filter_by_zone');
		$location_id = $this->input->get('location_id');
		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');

		if($filter_by_zone == "")  $filter_by_zone = "national";
		if($location_id == "")  $location_id = "all";
		if($start_date == "")  $start_date = "all";
		if($end_date == "")  $end_date = "all";

		redirect('home/view_report/'.$filter_by_zone.'/'.$location_id.'/'.$start_date.'/'.$end_date);

	}

	public function approved_audit_data(){

		$status = $this->input->post('status');
		$audit_id = $this->input->post('audit_id');

		$this->common_m->approved_audit_data($status, $audit_id);
		echo json_encode(array('result'=>true));
	}

	public function approved_audit_data_client(){

		$status = $this->input->post('status');
		$audit_id = $this->input->post('audit_id');

		$this->common_m->approved_audit_data_client($status, $audit_id);
		echo json_encode(array('result'=>true));
	}


	public function download_file(){

		$this->load->helper('download');

		$type = $this->input->get('type');
		$path = $this->input->get('file');
		if(empty($path)) return false;

		if($type == 'audio') $pathname = 'uploads/audio/'.$path;
		else $pathname = 'uploads/images/'.$path;

		$data = file_get_contents($pathname); // Read the file's contents
		force_download($path, $data); 
	}


	public function export_audit(){

		if(!$this->auth_user->is_logged_in()) 	redirect('users/login');

		$loggedUser = $this->auth_user->fetch_user_info();

		if(in_array($loggedUser['level'], array(3))) redirect('home');

		$data = array('title'=>'Export Audit', 'loggedUser'=>$loggedUser, 'postdata'=>$this->input->post(), 'current_export_audit'=>true);
		

		if($this->input->post('submit')){

			if($this->_validate_exportform($loggedUser)){

				$filter = array(
					'date_to' => $this->input->post('date_to'),
					'date_from' => $this->input->post('date_from'),
					'filter_by_zone' => $this->input->post('filter_by_zone'),
					'location_id' => $this->input->post('location_id'),
					'auditor' => $this->input->post('auditor'),
					'audit_status' => $this->input->post('audit_status'),
				);
				
				$resultData = $this->common_m->fetch_approved_data($filter, $loggedUser);

				if(empty($resultData)) $data['error_msg'] = 'There is no data to export in excel';
				else $this->export($resultData);
			}
		}

		if($loggedUser['level'] == 2){
			$supervisor = $this->auth_user->fetch_user_id();
			$data['auditor_list'] = $this->user_m->fetch_user_with_role(3,$supervisor);
		}

		$this->load->view('audit/export_audit', $data);
	}

	private function _validate_exportform($loggedUser){

		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('date_to','Date To','required|trim|date');
		$this->form_validation->set_rules('date_from','Date From','required|trim|date');

		return $this->form_validation->run();
	}

	public function export($resultData){
		
		$loggedUser = $this->auth_user->fetch_user_info();

		require(APPPATH.'libraries/PHPExcel.php');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()->setCreator($loggedUser['username'])
									 ->setLastModifiedBy($loggedUser['username'])
									 ->setTitle("Report Audit Data")
									 ->setSubject("Report Audit Data")
									 ->setDescription("Report Audit Data for audit")
									 ->setKeywords("report audit data")
									 ->setCategory("Report Audit FIle");


		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1', 'Sl No.')
		            ->setCellValue('B1', 'Agency Name')
		            ->setCellValue('C1', 'List given by Samsung')
		            ->setCellValue('D1', 'Report Submission Date')
		            ->setCellValue('E1', 'Check Date')
		            ->setCellValue('F1', 'Region')
		            ->setCellValue('G1', 'State')
		            ->setCellValue('H1', 'Branch')
		            ->setCellValue('I1', 'New Channel Type')
		            ->setCellValue('J1', 'Location ID')
		            ->setCellValue('K1', 'Outlet Name')
		            ->setCellValue('L1', 'City')
		            ->setCellValue('M1', 'Store Address')
		            ->setCellValue('N1', 'Salesperson Name')
		            ->setCellValue('O1', 'Salesperson reaction')
		            ->setCellValue('P1', 'Rate your intraction')
		            
		            ->setCellValue('Q1', 'Category')
		            ->setCellValue('R1', 'Brand')
		            ->setCellValue('S1', 'Model No')
		            ->setCellValue('T1', 'Price Offered')
		            ->setCellValue('U1', 'Suggested Price')
		            ->setCellValue('V1', 'Difference')
		            ->setCellValue('W1', 'PV1')
		            ->setCellValue('X1', 'PV %Age1')
		            ->setCellValue('Y1', 'Reason for Price Break')
		            ->setCellValue('Z1', 'Proof')
		            ->setCellValue('AA1', 'Remark')

		            ->setCellValue('AB1', 'Category')
		            ->setCellValue('AC1', 'Brand')
		            ->setCellValue('AD1', 'Model No')
		            ->setCellValue('AE1', 'Price Offered')
		            ->setCellValue('AF1', 'Suggested Price')
		            ->setCellValue('AG1', 'Difference')
		            ->setCellValue('AH1', 'PV2')
		            ->setCellValue('AI1', 'PV %Age2')
		            ->setCellValue('AJ1', 'Reason for Price Break')		            
		            ->setCellValue('AK1', 'Proof')
		            ->setCellValue('AL1', 'Remark')

					->setCellValue('AM1', 'Category')
		            ->setCellValue('AN1', 'Brand')
		            ->setCellValue('AO1', 'Model No')
		            ->setCellValue('AP1', 'Price Offered')
		            ->setCellValue('AQ1', 'Suggested Price')
		            ->setCellValue('AR1', 'Difference')
		            ->setCellValue('AS1', 'PV3')
		            ->setCellValue('AT1', 'PV %Age3')
		            ->setCellValue('AU1', 'Reason for Price Break')		            
		            ->setCellValue('AV1', 'Proof')
		            ->setCellValue('AW1', 'Remark')		            
		            
		            ->setCellValue('AX1', 'PV1+PV2')
		            ->setCellValue('AY1', ' Overall Score out of 6')
		           
		            ->setCellValue('AZ1', 'Picture URLs')
		            ->setCellValue('BA1', 'Front Board Photos')

		            ->setCellValue('BB1', 'Audit Status')
		            ->setCellValue('BC1', 'Audit Reason');

		if($loggedUser['level'] == 2){
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('BD1', 'Supervisor Audit Status')
						->setCellValue('BE1', 'Auditor');
		}

		$objPHPExcel->getActiveSheet()->getStyle('A1:BE1')->applyFromArray(
			array('fill' 	=> array(
										'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
										'color'		=> array('argb' => 'EEEEEE')
									)
				 )
			);

		$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(59);
		$objPHPExcel->getActiveSheet()->getStyle('A1:BE1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('BA')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getStyle('A1:BE1')->getFont()->setSize(8);
		$objPHPExcel->getActiveSheet()->getStyle('A1:BE1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('A1:BE1')->getAlignment()->setWrapText(true);

		 $i=2;
		 foreach($resultData as $row){

		 	$color = '';
		 	if($row['audit_status'] == 'done'){ 
	            $diff1 = $row['price_offered1']-$row['suggested_price1'];  
	            $pv1 =($diff1)>=0?1:0;
	            
	            $diff2 = $row['price_offered2']-$row['suggested_price2']; 
	            $pv2 =  ($diff2)>=0?1:0;
          
	            $pvPlus = $pv1+$pv2;

	            if($pvPlus == 2) $color = '81F781';
	            elseif($pvPlus == 1) $color ='F3F781';
	            else $color = 'FA5858';

	            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':BE'.$i)->applyFromArray(
					array('fill' 	=> array(
												'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
												'color'		=> array('argb' => $color)
											)
						 )
					);
	          }

		 	$image_url = "";
		 	if($row['image1']!="") $image_url .= base_url('uploads/images/'.$row['image1']);
		 	if($row['image2']!="") $image_url .= ", ".base_url('uploads/images/'.$row['image2']);
		 	if($row['image3']!="") $image_url .= ", ".base_url('uploads/images/'.$row['image3']);
		 	
		 	$audio_file = $check_date = "";
		 	if($row['audio_file'] != "") $audio_file = site_url('home/download_file')."?type=audio&file=".$row['audio_file'];
		 	if($row['mis_status'] != 1) $check_date = date('d F Y',strtotime($row['check_date']));
		 		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A'.$i, $i-1)
		            ->setCellValue('B'.$i, $row['agency_name'])
		            ->setCellValue('C'.$i, date('d F Y',strtotime($row['list_by_samsung'])))
		            ->setCellValue('D'.$i, date('d F Y',strtotime($row['date_in'])))
		            ->setCellValue('E'.$i, $check_date)
		            ->setCellValue('F'.$i, $row['store_region'])
		            ->setCellValue('G'.$i, $row['store_state'])
		            ->setCellValue('H'.$i, strtoupper($row['store_city']))
		            ->setCellValue('I'.$i, $row['channel_type'])
		            ->setCellValue('J'.$i, $row['location_id'])
		            ->setCellValue('K'.$i, $row['store_name'])
		            ->setCellValue('L'.$i, $row['store_city'])
		            ->setCellValue('M'.$i, $row['store_address'])

		            ->setCellValue('N'.$i, $row['salesperson'])
		            ->setCellValue('O'.$i, $row['reaction'])
		            ->setCellValue('P'.$i, $row['rate_intraction'])

		            ->setCellValue('Q'.$i, $row['category1'])
		            ->setCellValue('R'.$i, $row['brand1'])
		            ->setCellValue('S'.$i, $row['model_no1'])
		            ->setCellValue('T'.$i, $row['price_offered1'])
		            ->setCellValue('U'.$i, $row['suggested_price1'])
		            ->setCellValue('V'.$i, '=+T'.$i.'-'.'U'.$i)
		            ->setCellValue('W'.$i, '=IF(V'.$i.'>=0,1,0)')
		            ->setCellValue('X'.$i, '=+V'.$i.'/T'.$i)
		            ->setCellValue('Y'.$i, $row['reason_price_var1'])
		            ->setCellValue('Z'.$i, $audio_file)
		            ->setCellValue('AA'.$i, $row['remark1'])

		            ->setCellValue('AB'.$i, $row['category2'])
		            ->setCellValue('AC'.$i, $row['brand2'])
		            ->setCellValue('AD'.$i, $row['model_no2'])
		            ->setCellValue('AE'.$i, $row['price_offered2'])
		            ->setCellValue('AF'.$i, $row['suggested_price2'])
		            ->setCellValue('AG'.$i, '=+AE'.$i.'-'.'AF'.$i)
		            ->setCellValue('AH'.$i, '=IF(AG'.$i.'>=0,1,0)')
		            ->setCellValue('AI'.$i, '=+AG'.$i.'/AE'.$i)
		            ->setCellValue('AJ'.$i, $row['reason_price_var2'])
		            ->setCellValue('AK'.$i, $audio_file)
		            ->setCellValue('AL'.$i, $row['remark2'])

		            ->setCellValue('AM'.$i, $row['category3'])
		            ->setCellValue('AN'.$i, $row['brand3'])
		            ->setCellValue('AO'.$i, $row['model_no3'])
		            ->setCellValue('AP'.$i, $row['price_offered3'])
		            ->setCellValue('AQ'.$i, $row['suggested_price3'])
		            ->setCellValue('AR'.$i, '=+AP'.$i.'-'.'AQ'.$i)
		            ->setCellValue('AS'.$i, '=IF(AR'.$i.'>=0,1,0)')
		            ->setCellValue('AT'.$i, '=+AR'.$i.'/AP'.$i)
		            ->setCellValue('AU'.$i, $row['reason_price_var3'])
		            ->setCellValue('AV'.$i, $audio_file)
		            ->setCellValue('AW'.$i, $row['remark3'])

		            ->setCellValue('AX'.$i, '=+AH'.$i.'+W'.$i)
		            ->setCellValue('AY'.$i, '=+AH'.$i.'+W'.$i.'+O'.$i.'+P'.$i)

		            ->setCellValue('AZ'.$i, $image_url)
		            ->setCellValue('BA'.$i, '')
		            ->setCellValue('BB'.$i, $row['audit_status'])
		            ->setCellValue('BC'.$i, $row['audit_reason']);

		        if($loggedUser['level'] == 2){
		        	if($row['supervisor_status']==2){ $audit_staus = "Approved";}
		        	elseif($row['supervisor_status']==3){$audit_staus ="Disapproved";}
		        	else{$audit_staus ="Pending Approval";}
					$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue('BD'.$i, $audit_staus)
								->setCellValue('BE'.$i, $row['username']);
				}

		            $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(80);
		            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':BE'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':BE'.$i)->getFont()->setSize(8);
		            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':BE'.$i)->getAlignment()->setWrapText(true);

		            /*if($row['image1']!="" && file_exists('./uploads/images/'.$row['image1'])){
			            $objDrawing = new PHPExcel_Worksheet_Drawing();
						$objDrawing->setName('OutLet Picture');
						$objDrawing->setDescription('OutLet Picture');
						$objDrawing->setPath('./uploads/images/'.$row['image1']);
						$objDrawing->setCoordinates('BA'.$i);
						$objDrawing->setWidth(80);
						$objDrawing->setHeight(80);
						$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
					}*/
		    $i++;
		 }
		 $j = $i-1;
		 $objPHPExcel->getActiveSheet()->getStyle('A1:BE'.$j)->applyFromArray(
			array('borders' => array(
								'allborders'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
							)
				 )
			);


		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Simple');


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="report.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}

}

