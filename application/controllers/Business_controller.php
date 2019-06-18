<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('google');
		$this->load->model('Business_model');
		$this->load->model('Login_model');
    } 
	public function index()
	{
			$this->load->view('header');
			$this->load->view('business/page');
	}
	public function plan_page()
	{	
	
		if($this->session->userdata('business') === true){
		$row = $this->session->userdata('userData');
		$data = $this->Business_model->check_plan($row['data']->id); 
		
			if($data['status'] ==='active'){
				
				redirect('page/'.$row['data']->name);
			}else{ 
				$this->load->view('header');
				$this->load->view('business/plans');
				$this->load->view('footer');
			}
		}else{
			redirect('profile');
		}
		
	}
	public function page()
	{
		if($this->session->userdata('business') === true){
			$row = $this->session->userdata('userData');
				$id = $row['data']->id;
				$output['profile'] 			= $this->Login_model->user_data($id);
				$output['questions'] 		= $this->Login_model->user_questions_data($id);
				$output['answers'] 			= $this->Login_model->user_answers_data($id);
				$output['states'] 			= $this->Login_model->user_states($id);
				$output['follow_status'] 	= $this->Login_model->follow_status($id,'other_user');
				$output['page_detail'] 		= $this->Login_model->page_detail($id);
				$datas 						= (object)$this->Business_model->graph_value($id);
				$date=strtotime($output['page_detail']->plan_duration);
				$diff=$date-time();
				if($diff > 0){
							
				$follow = (object)$datas->follow;
				$visitor = (object)$datas->visitor;
				//print_r($follow); die;
				foreach($follow as $key=>$value)
				{
					$follow_value[] = $value->follow; 
					$follow_date[]  = $value->date; 
				}
				foreach($visitor as $key=>$value)
				{
					$visitor_value[] = $value->visitor; 
					$visitor_date[]  = $value->date; 
				}
				$output['graph'] = (object)array('follow'=>$follow_value,'visitor'=>$visitor_value,'follow_date'=>$follow_date,'visitor_date'=>$visitor_date);
				$this->load->view('header');
				$this->load->view('business/page',$output);
				$this->load->view('footer');
				
				}else{
					$this->Business_model->disabled_plan($output['page_detail']->id); 
					redirect(base_url('plans'));
				}
				
				
		}else{
			$this->plan_page();
		}
	}
	public function selected_plans()
	{
		
		if($this->session->userdata('business') === true){
		$row = $this->session->userdata('userData');
		//echo $row['data']->id; die;
		$plan = $this->input->post('plan');
		if($plan === 'starter')
		{
			$date = strtotime(date("Y/m/d").'7 day');
			$data = array(
						'plan'=>$plan,
						'plan_duration'=>date('Y-m-d', $date),
						'cost'=>'5',
						'limits'=>'5',
						'time_status'=>'active',
						'status'=>'active'
						);
		}else if($plan === 'recommended'){
			$date = strtotime(date("Y/m/d").'1 month');
			$data = array(
						'plan'=>$plan,
						'plan_duration'=>date('Y-m-d', $date),
						'cost'=>'20',
						'limits'=>'20',
						'time_status'=>'active',
						'status'=>'active'
						);
		}else if($plan === 'premium'){
			$date = strtotime(date("Y/m/d").'1 year');
			$data = array(
						'plan'=>$plan,
						'plan_duration'=>date('Y-m-d', $date),
						'cost'=>'240',
						'limits'=>'240',
						'time_status'=>'active',
						'status'=>'active'
						);
		}
		//print_r($data); die;
			$this->Business_model->add_plan($row['data']->id,$data); 
			$this->session->set_flashdata('success', 'Plan Active Successfully');
			$output['success'] = $this->session->flashdata('success');
			echo json_encode($output);
		}else{
			redirect('profile');
		}
	}
	public function registration()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tbl_user.email]');
		$this->form_validation->set_rules('password','Password','required|md5');
		$this->form_validation->set_rules('mobile','Mobile','trim|required');
		$this->form_validation->set_rules('profession','Profession','required');
		
		if($this->form_validation->run() == true)
		{
			$data = array(
						  'name' 			=>	$this->input->post('name'),
						  'email' 			=>	$this->input->post('email'),
						  'password'		=>	$this->input->post('password'),
						  'mobile'			=> 	$this->input->post('mobile'),
						  'profession'		=>	$this->input->post('profession')
						);
			
			$this->Business_model->insert_register($data);
			$this->session->set_flashdata('success', 'Registration Successfully.');
    		$output['success'] = $this->session->flashdata('success');
    		echo json_encode($output); die;
			
		}else{
			$output['errors'] = array(
									'name'				=>form_error('name'),
									'email'				=>form_error('email'),
									'password'			=>form_error('password'),
									'mobile'			=>form_error('mobile'),
									'profession'		=>form_error('profession')
									);
			echo json_encode($output);
		}
	}
	public function login()
	{
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|md5');
		
		if($this->form_validation->run() == true)
		{
			$data = array(
						  'email' 			=>	$this->input->post('email'),
						  'password'		=>	$this->input->post('password'),
						  );
						
			 $userData['data'] = $this->Business_model->fetch_record($data);
				if($userData['data'] != '' && $userData['data']!= 'business')
				{	
					 $this->session->set_userdata('loggedIn', true);
					 $this->session->set_userdata('business', true);
					 $this->session->set_userdata('userData', $userData);
					 $this->session->set_flashdata('success', 'Login Successfully.');
					 $output['success_business'] = $this->session->flashdata('success');
					 
				}elseif($userData['data'] === 'business'){ 
					 $this->session->set_flashdata('error', 'Business Not Plan');
					 $output['error'] = $this->session->flashdata('error');
				}else{ 
					 $this->session->set_flashdata('error', 'Email and Password are incorrect');
					 $output['error'] = $this->session->flashdata('error');
				}
			 // if($userData['check']=='forget'){
				// $output['error_p'] = "forget Password"; 
			 // }else if($userData['check'] =='reset'){
				// $output['error_p'] = "reset Password";
			 // }else if($userData['check'] =='wrong'){
				// $output['errors'] = array('password'=>"Wrong! Password");
			 // }else{
			 
			 //}
			 echo json_encode($output); die;
			 
		}else{
			$output['errors'] = array(
									'email'				=>form_error('email'),
									'password'			=>form_error('password'),
								     );
			echo json_encode($output);
		}
	}
	public function forget()
	{
			echo "yes forget"; die;
	}
	public function reset_password()
	{
			echo "yes reset"; die;
	}
	public function profile()
	{
		
		// redirect to login page if user not logged in
		if(!$this->session->userdata('loggedIn')){
			redirect(base_url('login'));
		}
		$userData = $this->session->userdata('userData');
		$output['profile'] = $this->Business_model->user_data($userData['data']->id);
		$output['questions'] = $this->Business_model->user_questions_data($userData['data']->id);
		$output['answers'] = $this->Business_model->user_answers_data($userData['data']->id);
		$output['states'] = $this->Business_model->user_states($userData['data']->id);
		$output['follow_status'] 	= $this->Business_model->follow_status($userData['data']->id,'login_user');
		$this->load->view('header');
		$this->load->view('front_end/profile',$output);
	}
	public function user($id)
	{
		$this->checkLogin($id);
		
		//echo $userData['data']->id; die;
		$output['profile'] 			= $this->Business_model->user_data($id);
		$output['questions'] 		= $this->Business_model->user_questions_data($id);
		$output['answers'] 			= $this->Business_model->user_answers_data($id);
		$output['states'] 			= $this->Business_model->user_states($id);
		$output['follow_status'] 	= $this->Business_model->follow_status($id,'other_user');
		
		$this->load->view('header');
		$this->load->view('front_end/user',$output);
		
	}
	public function follow()
	{	
	//print_r($_POST); die;
		
		if($this->session->userdata('loggedIn') === true){
		$userData = $this->session->userdata('userData');
		$following = $this->input->post('following');
		//echo $following; die;
		$follower  = $userData['data']->id ;
		if($following != $follower){
			$this->Business_model->follow($following,$follower);
		}
		
			$this->session->set_flashdata('success', 'Following Successfully');
			$output['success'] = $this->session->flashdata('success');
			echo json_encode($output);
			
		}else{
			$this->session->set_flashdata('Warning', 'Please Login First.');
			$output['Warning'] = $this->session->flashdata('Warning');
			echo json_encode($output);
		}
	}
	public function user_viewer()
	{
		if(isset($_POST['viewer_ip']))
		{	//print_r($_POST); die;
			$id = $this->input->post('user_id');
			$ip = $this->input->post('viewer_ip');
			$this->Business_model->user_viewer($id,$ip);
		}
	}
	public function logout()
	{
		//delete login status & user info from session
		$this->session->unset_userdata('loggedIn');
		$this->session->unset_userdata('userData');
        $this->session->sess_destroy();
		
		//redirect to login page
		redirect(base_url('home'));
    }
	public function update_profile()
	{
		$data = array(
					'id'				=>	$this->input->post('id'),
					'name' 				=>	$this->input->post('name'),
					'dob'				=>	$this->input->post('dob'),
					'profession'		=>	$this->input->post('profession'),
					'institute_name'	=>	$this->input->post('institute_name'),
					'gender'			=>	$this->input->post('gender'),
					);
					
		$this->Business_model->update_profile($data);
		$this->session->set_flashdata('success', 'Update Successfully.');
		$output['success'] = $this->session->flashdata('success');
		echo json_encode($output);
	}
	public function update_about()
	{
		$data = array(
					'about' 			=>	$this->input->post('about'),
					);
		$row = $this->session->userdata('userData');
		$this->Business_model->update_about($data,$row['data']->id);
		$this->session->set_flashdata('success', 'Update Successfully.');
		$output['success'] = $this->session->flashdata('success');
		echo json_encode($output);
	}
}
