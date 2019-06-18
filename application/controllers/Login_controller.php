<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('google');
		$this->load->model('Login_model');
    } 
	public function index()
	{	
		if($this->session->userdata('loggedIn') == true){
			redirect(base_url('home'));
		}
		$data['GoogleLogin'] = $this->google_login();
		//$data['FbLogin'] = $this->fb_login();
		$this->load->view('front_end/login',$data);
	}
	public function BMS()
	{
		if(isset($_POST['email'])){
			
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('password','Password','required|md5');
				
				if($this->form_validation->run() == true)
				{
					$data = array(
								  'email' 		=>	$this->input->post('email'),
								  'password'	=>	$this->input->post('password'),
								  );
								
					 $userData['data'] = $this->Login_model->BMS_record($data);
					
					 $this->session->set_userdata('BMS_loggedIn', true);
					 $this->session->set_userdata('BMS_userData', $userData);
					 
					 $this->session->set_flashdata('success', 'Login Successfully.');
					 $output['success_BMS'] = $this->session->flashdata('success');
					 echo json_encode($output); die;
					 
				}else{
					$output['errors'] = array(
											'email'		=>form_error('email'),
											'password'	=>form_error('password'),
											 );
					echo json_encode($output);
				}
		
		}else{
			$this->load->view('secure/login');
		}
	}
	public function sign_up()
	{	
		$data['GoogleLogin'] = $this->google_login();
		if($this->session->userdata('loggedIn') == true){
			redirect(base_url('home'));
		}
		$this->load->view('front_end/sign_up',$data);
	}
	public function registration()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tbl_user.email]');
		$this->form_validation->set_rules('mobile','Mobile','required|numeric');
		$this->form_validation->set_rules('password','Password','required|md5');
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]|md5');
		$this->form_validation->set_rules('profession','Profession','required');
		
		if($this->form_validation->run() == true)
		{
			$data = array(
						  'name' 			=>	$this->input->post('name'),
						  'email' 			=>	$this->input->post('email'),
						  'mobile' 			=>	$this->input->post('mobile'),
						  'password'		=>	$this->input->post('password'),
						  'confirm_password'=> 	$this->input->post('confirm_password'),
						  'profession'		=>	$this->input->post('profession')
						);
			
			$this->Login_model->insert_register($data);
			$this->session->set_flashdata('success', 'Registration Successfully.');
    		$output['success'] = $this->session->flashdata('success');
    		echo json_encode($output); die;
			
		}else{
			$output['errors'] = array(
									'name'				=>form_error('name'),
									'email'				=>form_error('email'),
									'mobile'			=>form_error('mobile'),
									'password'			=>form_error('password'),
									'confirm_password'	=>form_error('confirm_password'),
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
						
			 $userData['data'] = $this->Login_model->fetch_record($data);
			 $this->session->set_userdata('loggedIn', true);
			 $this->session->set_userdata('userData', $userData);
			 $this->session->set_flashdata('success', 'Login Successfully.');
			 $output['success_login'] = $this->session->flashdata('success');
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
	public function fb_login()
	{
		if($this->session->userdata('loggedIn') == true){
			redirect('home');
		}
		
		$data = array(
			'name' => $this->input->post('name').' '.$this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'gender' => $this->input->post('gender'),
			'image' => $this->input->post('image')
		 );
			//insert data 
			 $this->Login_model->insert_register($data);
			 // get data for session
			 $data = $this->Login_model->fetch_data($data);
			 $userData['data'] = $data['check'];
			 $this->session->set_userdata('loggedIn', true);
			 $this->session->set_userdata('userData', $userData);
			 $this->session->set_flashdata('success', 'Login Successfully.');
			 $output['success'] = $this->session->flashdata('success');
			 echo json_encode($output); die;
	 }
	public function google_login()
	{	
		//redirect to profile page if user already logged in
		if($this->session->userdata('loggedIn') == true){
			redirect('home');
		}
		
		if(isset($_GET['code'])){
			//authenticate user
			$this->google->getAuthenticate();
			
			//get user info from google
			$gpInfo = $this->google->getUserInfo();
			
            //preparing data for database insertion
			$userData['name'] 			= $gpInfo['given_name'].' '.$gpInfo['family_name'];
            $userData['email'] 			= $gpInfo['email'];
			$userData['gender'] 		= !empty($gpInfo['gender'])?$gpInfo['gender']:'';
			$userData['image_url'] 		= !empty($gpInfo['picture'])?$gpInfo['picture']:'';
			
			//insert data 
			 $this->Login_model->insert_register($data);
			 // get data for session
			 $userData = $this->Login_model->fetch_data($data);
			 
			 $this->session->set_userdata('loggedIn', true);
			 $this->session->set_userdata('userData', $userData);
			 $this->session->set_flashdata('success', 'Login Successfully.');
			 $output['success'] = $this->session->flashdata('success');
			 redirect(base_url('home'));
		} 
		
		//google login url
		$data = $this->google->loginURL();
	
		return $data;
	}
	public function profile()
	{
		
		// redirect to login page if user not logged in
		if(!$this->session->userdata('loggedIn')){
			redirect(base_url('login'));
		}
		$userData 					= $this->session->userdata('userData');
		$output['profile'] 			= $this->Login_model->user_data($userData['data']->id);
		$output['questions'] 		= $this->Login_model->user_questions_data($userData['data']->id);
		$output['answers'] 			= $this->Login_model->user_answers_data($userData['data']->id);
		$output['states'] 			= $this->Login_model->user_states($userData['data']->id);
		$output['follow_status'] 	= $this->Login_model->follow_status($userData['data']->id,'login_user');
		$output['activity']			= $this->Login_model->followed_activity($userData['data']->id);
		$this->load->view('header');
		$this->load->view('front_end/profile',$output);
		$this->load->view('footer');
	}
	public function user($id)
	{
		$this->checkLogin($id);
			
		//echo $userData['data']->id; die;
		$output['profile'] 			= $this->Login_model->user_data($id);
		$output['questions'] 		= $this->Login_model->user_questions_data($id);
		$output['answers'] 			= $this->Login_model->user_answers_data($id);
		$output['states'] 			= $this->Login_model->user_states($id);
		$output['follow_status'] 	= $this->Login_model->follow_status($id,'other_user');
		if($output['profile']!='')
		{
		$this->load->view('header');
		$this->load->view('front_end/user',$output);
		$this->load->view('footer');
		}else{
			redirect('PageNotFound');
		}
	}
	public function checkLogin($id)
	{
		if($this->session->userdata('loggedIn')== true){
		$userData = $this->session->userdata('userData');
		if($userData['data']->id === $id){
			redirect(base_url('profile'));
		}else{
			return true;
		}
		}else{
			 return false;
		}
	}
	public function follow()
	{	
		if($this->session->userdata('loggedIn') === true){
		$userData = $this->session->userdata('userData');
		$following = $this->input->post('following');
		//echo $following; die;
		$follower  = $userData['data']->id ;
		if($following != $follower){
			$this->Login_model->follow($following,$follower);
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
			$this->Login_model->user_viewer($id,$ip);
		}
	}
	public function logout()
	{
		//delete login status & user info from session
		$this->session->unset_userdata('loggedIn');
		$this->session->unset_userdata('userData');
		$this->session->unset_userdata('business');
		$this->session->sess_destroy();
		//redirect to login page
		redirect(base_url('home'));
    }
	public function BMS_logout()
	{
		$this->session->unset_userdata('BMS_loggedIn');
		$this->session->unset_userdata('BMS_userData');
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
					
		$this->Login_model->update_profile($data);
		$this->session->set_flashdata('success', 'Update Successfully.');
		$output['success'] = $this->session->flashdata('success');
		echo json_encode($output);
	}
	public function location_update()
	{
		$data = array(
					'longitute'			=>	$this->input->post('log'),
					'latitude' 			=>	$this->input->post('lat'),
					'location_name'		=>	$this->input->post('name'),
					);
		$row = $this->session->userdata('userData');
		$this->Login_model->update_location($data,$row['data']->id);
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
		$this->Login_model->update_about($data,$row['data']->id);
		$this->session->set_flashdata('success', 'Update Successfully.');
		$output['success'] = $this->session->flashdata('success');
		echo json_encode($output);
	}
}
