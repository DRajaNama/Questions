<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BMS extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('BMS_model');
    } 
	public function index()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$this->load->view('main');
	}
	public function direct_login()
	{	
		$id = $this->uri->segment(2);
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$userData['data'] = $this->BMS_model->direct_login($id);
		$this->session->set_userdata('loggedIn', true);
		$this->session->set_userdata('userData', $userData);
		redirect('profile');
	}
	public function dashboard()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$output['map_data'] = $this->BMS_model->map_data();
		$this->load->view('lists/dashboard',$output);
	}
	public function seo()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$this->load->view('lists/seo');
	}
	public function seo_data()
	{
		$row = $this->BMS_model->seo_data();
		foreach($row as $key=>$value)
		{
			foreach($value as $keys=>$values)
			{
				$arrays[] = array($values->meta_key =>$values->meta_value);
			}
		}
		//print_r($arrays); 
		$data = array(
					'site_title'=>$arrays[0]['site_title'],
					'site_description'=>$arrays[1]['site_description'],
					'site_keyword'=>$arrays[2]['site_keyword'],
					'site_index'=>$arrays[3]['site_index'],
					'site_follow'=>$arrays[4]['site_follow'],
					'question_title'=>$arrays[5]['question_title'],
					'question_index'=>$arrays[6]['question_index'],
					'question_follow'=>$arrays[7]['question_follow'],
					'search_page'=>$arrays[8]['search_page'],
					'notfound_page'=>$arrays[9]['notfound_page'],
					);
		echo json_encode($data); 
	}
	public function site_seo()
	{
		if(isset($_POST['site_title']))
		{
			$data = array(
						'site_title'=>$this->input->post('site_title'),
						'site_description'=>$this->input->post('site_description'),
						'site_keyword'=>$this->input->post('site_keyword'),
						'site_index'=>$this->input->post('site_index'),
						'site_follow'=>$this->input->post('site_follow'),
					);
			$this->BMS_model->insert_seo($data,'site_title');
			$this->session->set_flashdata('success', 'Site SEO Insert Successfully.');
			$output['success'] = $this->session->flashdata('success');
			echo json_encode($output); die;
		}
		if(isset($_POST['question_title']))
		{
			$data = array(
						'question_title'=>$this->input->post('question_title'),
						'question_index'=>$this->input->post('question_index'),
						'question_follow'=>$this->input->post('question_follow'),
					);
			$this->BMS_model->insert_seo($data,'question_title');
			$this->session->set_flashdata('success', 'Question SEO Insert Successfully.');
			$output['success'] = $this->session->flashdata('success');
			echo json_encode($output); die;
		}
		if(isset($_POST['search_page']))
		{
			$data = array(
						'search_page'=>$this->input->post('search_page'),
						'notfound_page'=>$this->input->post('notfound_page'),
					);
			$this->BMS_model->insert_seo($data,'search_page');
			$this->session->set_flashdata('success', 'Page SEO Insert Successfully.');
			$output['success'] = $this->session->flashdata('success');
			echo json_encode($output); die;
		}
	}
	public function graph()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$output['graph_data'] = $this->BMS_model->graph_data();
		//print_r($output); die;
		// foreach($output['graph_data'] as $key=>$value)
		// {
			// echo '"'.$value->Month.'" = '.$value->total.",";
		// }die;
		$this->load->view('lists/graph',$output);
	}
	public function frame()
	{
		$output['states'] = (object)$this->BMS_model->all_states();
		$this->load->view('lists/frame',$output);
	}
	public function users_list()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$output['states']  = $this->BMS_model->user_states();
		//print_r($output);
		$this->load->view('lists/users_list',$output);
	}
	public function answers_list()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$output['states']  = $this->BMS_model->answer_states();
		$this->load->view('lists/answers_list',$output);
	}
	public function quetion_list()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$output['states']  = $this->BMS_model->question_states();
		$this->load->view('lists/question_list',$output);
	}
	public function ads_list()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$output['states']  = $this->BMS_model->ads_states();
		$this->load->view('lists/adv_list',$output);
	}
	public function question_listing()
	{
		$limit 	= $this->input->post('limit');
		$page 	= $this->input->post('page');
		$search = $this->input->post('search');
		$filter = $this->input->post('filter');
		$start = ($page-1)*$limit;
		$total = $this->BMS_model->count_all_question($search); 
		$total_pages = ceil($total / $limit); 
		
		$output = $this->BMS_model->questions_lists($search,$filter,$limit,$start);
		//print_r($output); die;
		foreach($output as $key => $value)
		{	
			
			$ajax[] = array(
							'id'				=>$value->id,
							'creator_id'		=>$value->creator_id,
							'question'			=>substr($value->question,0,30).' ...',
							'category'			=>$value->category,
							'total_no_answer'	=>$value->total_no_answer,
							'viewers'			=>$value->viewers,
							'level'				=>$value->level,
							'status'			=>$value->status,
							'taags'				=>explode(',',$value->taags),
							'creator_name'		=>$value->name,
							'created'			=>substr($value->created,0,-8),
							'modified'			=>substr($value->modified,0,-8),
						);
						
						
		}
							
		$datas = array(
					"recordsTotal"		=>	$total,
					"total_page"		=>	$total_pages,
					"data"				=>	$ajax,
					"page_num" 			=>	$page,
		);
		echo json_encode($datas);
	}
	public function answers_listing()
	{
		$limit 	= $this->input->post('limit');
		$page 	= $this->input->post('page');
		$search = $this->input->post('search');
		$filter = $this->input->post('filter');
		$start = ($page-1)*$limit;
		$total = $this->BMS_model->count_all_answer($search); 
		$total_pages = ceil($total / $limit); 
		
		$output = $this->BMS_model->answers_lists($search,$filter,$limit,$start);
		//print_r($output); die;
		foreach($output as $key => $value)
		{	
			
			$ajax[] = array(
							'id'				=>$value->id,
							'creator_id'		=>$value->user_id,
							'question_id'		=>$value->questions_id,
							'answer'			=>substr($value->answer,0,80).' ...',
							'accepted'			=>$value->accepted,
							'status'			=>$value->status,
							'name'				=>$value->name,
							'created'			=>substr($value->created,0,-8),
							'modified'			=>substr($value->modified,0,-8),
						);
						
						
		}
							
		$datas = array(
					"recordsTotal"		=>	$total,
					"total_page"		=>	$total_pages,
					"data"				=>	$ajax,
					"page_num" 			=>	$page,
		);
		echo json_encode($datas);
	}
	public function advers_listing()
	{
		$limit 	= $this->input->post('limit');
		$page 	= $this->input->post('page');
		$search = $this->input->post('search');
		$filter = $this->input->post('filter');
		$start = ($page-1)*$limit;
		$total = $this->BMS_model->count_all_adv($search); 
		$total_pages = ceil($total / $limit); 
		
		$output = $this->BMS_model->adv_lists($search,$filter,$limit,$start);
		//print_r($output); die;
		
		foreach($output as $key => $value)
		{	
			
			$ajax[] = array(
							'id'			=>$value->id,
							'user_id'		=>$value->user_id,
							'title'			=>$value->title,
							'image'			=>$value->image,
							'type'			=>$value->type,
							'stoped'		=>substr($value->stoped,0,-8),
							'status'		=>$value->status,
							'creator_name'	=>$value->name,
							'created'		=>substr($value->created,0,-8),
						);
						
						
		}
							
		$datas = array(
					"recordsTotal"		=>	$total,
					"total_page"		=>	$total_pages,
					"data"				=>	$ajax,
					"page_num" 			=>	$page,
		);
		echo json_encode($datas);
	}
	public function change_action()
	{
		$id = $this->input->post('id');
		$this->BMS_model->change_action($id);
	}
	public function delete_contact()
	{
		$id = $this->input->post('id');
		$this->BMS_model->delete_contact($id);
	}
	public function delete_category()
	{
		$id = $this->input->post('id');
		$this->BMS_model->delete_category($id);
	}
	public function add_category()
	{
		
			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('description','Description','required');
			
			if($this->form_validation->run() == true)
			{
				$data = array('title'=>$this->input->post('title'),'description'=>$this->input->post('description'),
							'id'=>$this->input->post('id'));
							$this->BMS_model->category_submit($data);
				$this->session->set_flashdata('success', 'Category Add Successfully.');
				$output['success'] = $this->session->flashdata('success');
				echo json_encode($output); die;
			}else{
				$output['errors'] = array(
										'title'				=>form_error('title'),
										'description'		=>form_error('description'),
										);
				echo json_encode($output);
			}
	}
	public function category_data()
	{
		$id = $this->input->post('id');
		$data = $this->BMS_model->get_category($id);
		echo json_encode($data);
	}
	public function repeat_action()
	{
		$id = $this->input->post('id');
		$this->BMS_model->repeat_action($id);
	}
	public function contact_page()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$output = array();
		$output['states']  = $this->BMS_model->contact_states();
		//print_r($output);
		$this->load->view('lists/contact_list',$output);
	}
	public function tags()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$output = array();
		$output['states']  = $this->BMS_model->tags_states();
		//print_r($output);
		$this->load->view('lists/tags_list',$output);
	}
	public function category_page()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$output = array();
		$output['states']  = $this->BMS_model->category_states();
		//print_r($output); die;
		$this->load->view('lists/category_list',$output);
	}
	public function category_list()
	{
		$limit 	= $this->input->post('limit');
		$page 	= $this->input->post('page');
		$search = $this->input->post('search');
		$filter = $this->input->post('filter');
		$start = ($page-1)*$limit;
		$total = $this->BMS_model->count_all_category($search); 
		$total_pages = ceil($total / $limit); 
		
		$output = $this->BMS_model->category_lists($search,$filter,$limit,$start);
		//print_r($output); die;
		foreach($output as $key => $value)
		{	
			
			$ajax[] = array(
							'id'				  =>$value->id,
							'title'				  =>$value->title,
							'description'		  =>$value->description,
							'total_link_question' =>$value->total_link_question,
							'status'			  =>$value->status,
						);
						
						
		}
							
		$datas = array(
					"recordsTotal"		=>	$total,
					"total_page"		=>	$total_pages,
					"data"				=>	$ajax,
					"page_num" 			=>	$page,
		);
		echo json_encode($datas);
	}
	public function contact_list()
	{
		$limit 	= $this->input->post('limit');
		$page 	= $this->input->post('page');
		$search = $this->input->post('search');
		$filter = $this->input->post('filter');
		$start = ($page-1)*$limit;
		$total = $this->BMS_model->count_all_contact($search); 
		$total_pages = ceil($total / $limit); 
		
		$output = $this->BMS_model->contact_lists($search,$filter,$limit,$start);
		//print_r($output); die;
		foreach($output as $key => $value)
		{	
			
			$ajax[] = array(
							'id'				=>$value->id,
							'email'				=>$value->email,
							'name'				=>$value->name,
							'message'			=>$value->message,
							'created'			=>$value->created,
							'action'			=>$value->action,
						);
						
						
		}
							
		$datas = array(
					"recordsTotal"		=>	$total,
					"total_page"		=>	$total_pages,
					"data"				=>	$ajax,
					"page_num" 			=>	$page,
		);
		echo json_encode($datas);
	}
	public function tags_list()
	{
		$limit 	= $this->input->post('limit');
		$page 	= $this->input->post('page');
		$search = $this->input->post('search');
		$filter = $this->input->post('filter');
		$start = ($page-1)*$limit;
		$total = $this->BMS_model->count_all_tags($search); 
		$total_pages = ceil($total / $limit); 
		
		$output = $this->BMS_model->tags_lists($search,$filter,$limit,$start);
		//print_r($output); die;
		foreach($output as $key => $value)
		{	
			
			$ajax[] = array(
							'id'					=>$value->id,
							'title'					=>$value->title,
							'description'			=>substr($value->description, 0, 40),
							'status'				=>$value->status,
							'total_link_question'	=>$value->total_linked_question,
							'total_intrest_user'	=>$value->total_intrest_user,
						);
						
						
		}
							
		$datas = array(
					"recordsTotal"		=>	$total,
					"total_page"		=>	$total_pages,
					"data"				=>	$ajax,
					"page_num" 			=>	$page,
		);
		echo json_encode($datas);
	}
	public function listing()
	{
		$limit 	= $this->input->post('limit');
		$page 	= $this->input->post('page');
		$search = $this->input->post('search');
		$filter = $this->input->post('filter');
		$start = ($page-1)*$limit;
		$total = $this->BMS_model->count_all($search); 
		$total_pages = ceil($total / $limit); 
		
		$output = $this->BMS_model->lists($search,$filter,$limit,$start);
	
		foreach($output as $key => $value)
		{	
			
			$ajax[] = array(
							'id'			=>$value->id,
							'name'			=>$value->name,
							'email'			=>$value->email,
							'location'		=>json_decode($value->location)->location_name,
							'profession'	=>$value->profession,
							'gender'		=>$value->gender,
							'institute_name'=>$value->institute_name,
							'mobile'		=>$value->mobile,
							'status'		=>$value->status,
							'created'		=>substr($value->created,0,-8),
							'modified'		=>substr($value->modified,0,-8),
						);
		}
							
		$datas = array(
					"recordsTotal"		=>	$total,
					"total_page"		=>	$total_pages,
					"data"				=>	$ajax,
					"page_num" 			=>	$page,
		);
		echo json_encode($datas);
	}
	public function delete_user()
	{
		$id = $this->input->post('id');
		
		$this->BMS_model->delete_user($id);
		
	}
	public function delete_tags()
	{
		$id = $this->input->post('id');
		
		$this->BMS_model->delete_tags($id);
		
	}
	public function delete_adv()
	{
		$id = $this->input->post('id');
		$img = $this->input->post('image');
		$this->BMS_model->delete_adv($id);
		$path = 'assets/uploads/banner/'.$img;
		unlink($path);
	}
	public function edit_data()
	{
		$id = $this->input->post('id');
		
		$output['data'] = $this->BMS_model->get_user($id);
		echo json_encode($output);
	}
	public function update_user()
	{
		$id 				= $this->input->post('id');
		$data = array(
			'name'			=>$this->input->post('name'),
			'email'			=>$this->input->post('email'),
			'gender'		=>$this->input->post('gender'),
			'mobile'		=>$this->input->post('mobile'),
			'dob'			=>$this->input->post('dob'),
			'institute_name'=>$this->input->post('institute_name'),
			'profession'	=>$this->input->post('profession'),
			);
		$output['data'] = $this->BMS_model->update_user($id,$data);
		echo json_encode($output);
	}
	public function change_status()
	{
		$id = $this->input->post('id');
		
		$this->BMS_model->change_status($id);
		
	}
	public function category_status()
	{
		$id = $this->input->post('id');
		
		$this->BMS_model->category_status($id);
		
	}
	public function adv_status()
	{
		$id = $this->input->post('id');
		$this->BMS_model->adv_status($id);
	}
	public function question_status()
	{
		$id = $this->input->post('id');
		
		$this->BMS_model->question_status($id);
		
	}
	public function answer_status()
	{
		$id = $this->input->post('id');
		
		$this->BMS_model->answer_status($id);
		
	}
	public function tags_status()
	{
		$id = $this->input->post('id');
		
		$this->BMS_model->tags_status($id);
		
	}
	public function user_update()
	{
		if($this->session->userdata('BMS_loggedIn') == false){
			redirect(base_url('BMS-login'));
		}
		$this->load->view('lists/user_update');
	}
	public function get_user_data()
	{
		$id = $this->input->post('id');
		$output['data'] = $this->BMS_model->get_user_data($id);
		echo json_encode($output); die;
	}
}
