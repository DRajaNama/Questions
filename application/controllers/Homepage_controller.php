<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Home_model');
		 $this->count_link();
		 
		//$this->detect_technoloy();
    } 
	public function index()
	{	
		$out['page'] = 'home';
		$out['seo'] = $this->seo_data();
		$this->load->view('header',$out);
		$output['records'] = $this->Home_model->total_records();
		$this->load->view('home/homepage',$output);
		$this->load->view('footer');
	}
	public function PageNotFound()
	{
		if(isset($_SERVER['HTTP_REFERER']))
		{
			$output['back'] = $_SERVER['HTTP_REFERER'];
		}else{
			$output['back'] = base_url();
		}
		$this->load->view('404.php' , $output);
	}
	public function developer()
	{
		$output['category'] = $this->Home_model->get_category();
		$out['page'] = 'home';
		$out['seo'] = $this->seo_data();
		$this->load->view('header',$out);
		$this->load->view('home/porfolio',$output);
		$this->load->view('footer');
	}
	public function remove_tags()
	{
		if($this->session->userdata('loggedIn') == false){
			 redirect(base_url('home'));
		}else{
		$data = $this->session->userdata('userData');
		$tags = $this->input->post('tag');
		$this->Home_model->remove_tags($data['data']->id,$tags);
		}
	}
	public function subscribe()
	{
		$email = $this->input->post('email');
		$this->Home_model->subscribe($email);
		
		$this->session->set_flashdata('success', 'Thanks For Subscribe');
		$output['success'] = $this->session->flashdata('success');
		echo json_encode($output); die;
	}
	public function seo_data()
	{
		$row = $this->Home_model->seo_get();
		foreach($row as $key=>$value)
		{
			foreach($value as $keys=>$values)
			{
				$arrays[] = array($values->meta_key =>$values->meta_value);
			}
		}
		//print_r($arrays); 
		$data =(object)array(
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
		return $data; 
	}
	public function delete_question()
	{
		if($this->session->userdata('loggedIn') == false){
			 redirect(base_url('login'));
		}else{
		$id = $this->input->post('id');
		$row = $this->session->userData('userData');
		$this->Home_model->delete_question($id,$row['data']->id);
		$this->session->set_flashdata('success', 'Question Delete Successfully.');
		$output['success'] = $this->session->flashdata('success');
		echo json_encode($output); die;
		}
	}
	public function delete_answer()
	{
		if($this->session->userdata('loggedIn') == false){
			 redirect(base_url('login'));
		}else{
		$id = $this->input->post('id');
		$row = $this->session->userData('userData');
		$this->Home_model->delete_answer($id,$row['data']->id);
		$this->session->set_flashdata('success', 'answer Delete Successfully.');
		$output['success'] = $this->session->flashdata('success');
		echo json_encode($output); die;
		}
	}
	public function get_images()
	{
		$row = $this->session->userData('userData');
		$data['gallary'] = $this->Home_model->get_images($row['data']->id);
		echo json_encode($data);
	}
	public function detele_image()
	{
		if($this->session->userdata('loggedIn') == false){
			 redirect(base_url('login'));
		}else{
		$id = $this->input->post('id');
		$img = $this->input->post('image');
		$this->Home_model->del_img($id);
		$path = 'assets/uploads/banner/'.$img;
		unlink($path);
		$this->session->set_flashdata('success', 'Image Delete Successfully.');
		$output['success'] = $this->session->flashdata('success');
		echo json_encode($output); die;
		}
	}
	public function profile_pic()
	{
		// print_r($_FILES);
		if($this->session->userdata('loggedIn') == false){
			redirect(base_url('login'));
		}
				$config['upload_path'] = 'assets/images'; // path where image will be saved
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
		        $this->load->library('upload', $config);
		       if(!$this->upload->do_upload('image'))
		       	{
		       	$output['errors'] = array('image'=>'Error! Select An Image');
        		echo json_encode($output); die;
		       	}else{
		       	$data_upload = $this->upload->data();
		        $img = $data_upload['file_name']; 
				$image = array('image'=>$img);
				$row = $this->session->userdata('userData');
				$this->Home_model->upload_profile($row['data']->id,$image);
				$this->session->set_flashdata('success', 'Banner Upload Successfully.');
				$output['success'] = $this->session->flashdata('success');
				echo json_encode($output); die;
				}
	}
	public function banner_pic()
	{
		$row = $this->session->userdata('userData');
		// print_r($_FILES); die;
		 if($this->session->userdata('loggedIn') == false){
			 redirect(base_url('login'));
		}else{
				$limits	 = $this->Home_model->check_adv($row['data']->id);
				//print_r($limits); die;
				$adv	 = $this->Home_model->adv($row['data']->id);
				if($limits->limits >= $adv->ads)
				{	
					$title = $this->input->post('title');
					$type = $this->input->post('type');
					$config['upload_path'] = 'assets/uploads/banner'; // path where image will be saved
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$this->load->library('upload', $config);
				   if(!$this->upload->do_upload('image'))
					{
					$output['errors'] = array('image'=>'Error! Select An Image');
					echo json_encode($output); die;
					}else{
					$data_upload = $this->upload->data();
					$img = $data_upload['file_name']; 
					$data = array(
									'user_id'=>$row['data']->id,
									'title'=>$title,
									'type'=>$type,
									'image'=>$img,
									'stoped'=>$limits->plan_duration,
									'status'=>'active'
								);
					$this->Home_model->upload_adv($data);
					$this->session->set_flashdata('success', 'Banner Upload Successfully.');
					$output['success'] = $this->session->flashdata('success');
					echo json_encode($output); die;
					}
				}else{
					echo "no";
				}die;
				
		}
	}
	public function detect_technoloy()
	{
		$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
		$os_platform    =   "Unknown OS Platform";
		$os_array       =   array(
						'/windows nt 10/i'     =>  'Windows 10',
						'/windows nt 6.3/i'     =>  'Windows 8.1',
						'/windows nt 6.2/i'     =>  'Windows 8',
						'/windows nt 6.1/i'     =>  'Windows 7',
						'/windows nt 6.0/i'     =>  'Windows Vista',
						'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
						'/windows nt 5.1/i'     =>  'Windows XP',
						'/windows xp/i'         =>  'Windows XP',
						'/windows nt 5.0/i'     =>  'Windows 2000',
						'/windows me/i'         =>  'Windows ME',
						'/win98/i'              =>  'Windows 98',
						'/win95/i'              =>  'Windows 95',
						'/win16/i'              =>  'Windows 3.11',
						'/macintosh|mac os x/i' =>  'Mac OS X',
						'/mac_powerpc/i'        =>  'Mac OS 9',
						'/linux/i'              =>  'Linux',
						'/ubuntu/i'             =>  'Ubuntu',
						'/iphone/i'             =>  'iPhone',
						'/ipod/i'               =>  'iPod',
						'/ipad/i'               =>  'iPad',
						'/android/i'            =>  'Android',
						'/blackberry/i'         =>  'BlackBerry',
						'/webos/i'              =>  'Mobile'
					);

		foreach ($os_array as $regex => $value) { 
				if (preg_match($regex, $user_agent)) {
						$os_platform    =   $value;
				}
		}   
		
		$browser        =   "Unknown Browser";
		$browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );
		foreach ($browser_array as $regex => $value) { 
				if (preg_match($regex, $user_agent)) {
					$browser    =   $value;
				}
		}

		
	$json = file_get_contents("https://www.geoip-db.com/json");
    $data = json_decode($json);
	
	$data = array(
					'country'=>$data->country_code,
					//'state'=>$data->state,
					'browser'=>$browser,
					'os'=>$os_platform,
					'ip_address'=>$_SERVER['REMOTE_ADDR'],
				);
		$this->Home_model->states($data);
   

	}
	public function question()
	{	
		if($this->session->userdata('BMS_loggedIn') != true)
		{
			if($this->session->userdata('loggedIn') == false){
				redirect(base_url('login'));
			}
		}
		$output['category'] = $this->Home_model->get_category();
		$out['page'] = 'home';
		$out['seo'] = $this->seo_data();
		$this->load->view('header',$out);
		$this->load->view('home/submit_question',$output);
		$this->load->view('footer');
	}
	public function question_approved()
	{
		$id = $this->input->post('id');
		
		$this->Home_model->question_approved($id);
	}
	public function question_submit()
	{
		
		$this->form_validation->set_rules('question','Question','required');
		$this->form_validation->set_rules('category','Category','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('tags','Tags','required');
		
		if($this->form_validation->run() == true)
		{
			$id = $this->input->post('id'); 
			if($id == 0){
			
			$data = $this->session->userdata('userData');
			$datas = array(
						  'question' 			=>	$this->input->post('question'),
						  'cats'				=>  $this->input->post('category'),
						  'description'			=>	json_encode($this->input->post('description')),
						  'creator_id'			=> 	$data['data']->id,
						);
			$tag 		= $this->input->post('tags');
			$category	= $this->input->post('category');
						  
			$question_id = $this->Home_model->insert_question($datas);
			$tags = explode(',', $tag);
			foreach($tags as $key=>$value)
			{
				$tag_id = $this->Home_model->insert_tags($value);
				$this->Home_model->insert_que_tags($tag_id,$question_id);
			}
			$this->Home_model->insert_que_cat($category,$question_id);
			
			$this->session->set_flashdata('success', 'Question is Submission Successfully.');
    		$output['success'] = $this->session->flashdata('success');
    		echo json_encode($output); die;
			
			}else{
			$datas = array(
						  'question' 			=>	$this->input->post('question'),
						  'cats' 				=>	$this->input->post('category'),
						  'description'			=>	json_encode($this->input->post('description')),
						);
			$tag = $this->input->post('tags');
			$this->Home_model->update_question($datas,$id);
			if($tag != ''){
					$this->Home_model->delete_tag_rel($id);
			}
			$tags = explode(',', $tag);
			foreach($tags as $key=>$value)
			{	
				$tag_id = $this->Home_model->insert_tags($value);
				
				$this->Home_model->insert_que_tags($tag_id,$id);
			}
			
			$this->session->set_flashdata('success', 'Question is Update Successfully.');
    		$output['success'] = $this->session->flashdata('success');
    		echo json_encode($output); die;
			}
			
			
		}else{
			$output['errors'] = array(
									'question'				=>form_error('question'),
									'category'				=>form_error('category'),
									'description'			=>form_error('password'),
									'confirm_password'		=>form_error('description'),
									'tags'					=>form_error('tags')
									);
			echo json_encode($output);
		}
	}
	public function get_questions()
	{
		$ajax = array();
		$limit 	= $this->input->post('limit');
		$page 	= $this->input->post('page');
		$search = $this->input->post('search');
		$filter = $this->input->post('filter');
		$start = ($page-1)*$limit;
		$total = $this->Home_model->count_all($search); 
		$total_pages = ceil($total / $limit);  
		
		$questions = $this->Home_model->get_questions_data($search,$filter,$limit,$start);
		//print_r($questions); die;
		foreach($questions['data'] as $key => $value)
		{
			$ajax[] = array(
							'id' 				=> $value->id,
							'creator_id'		=> $value->creator_id,
							'question' 			=> $value->question,
							'category' 			=> $value->category,
							'description' 		=> substr(json_decode($value->description),0,250).' ...',
							'tags' 				=> explode(',',$value->tags),
							'total_no_answer' 	=> $value->total_no_answer,
							'viewers' 			=> $value->viewers,
							'voters' 			=> $this->Home_model->votes_value($value->id,'question'),
							'level'				=> $value->level,
							'created'	 		=> substr($value->created,0,-8),
							'modified' 			=> substr($value->modified,0,-8),
							'object_link_ld' 	=> $value->object_link_ld,
							'name' 				=> $value->name,
							'image' 			=> $value->image,
							'profession' 		=> $value->profession
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
	public function count_link()
	{
		$this->Home_model->count_link();
	}
	public function tags_list()
	{
		$limit 	= $this->input->post('limit');
		$page 	= $this->input->post('page');
		$search = $this->input->post('search');
		$filter = $this->input->post('filter');
		$start = ($page-1)*$limit;
		$total = $this->Home_model->count_tags($search); 
		$total_pages = ceil($total / $limit);
		
		$ajax = $this->Home_model->tags_list($search,$filter,$limit,$start);
		$datas = array(
					"recordsTotal"		=>	$total,
					"total_page"		=>	$total_pages,
					"data"				=>	$ajax,
					"page_num" 			=>	$page,
		);
		echo json_encode($datas);
	}
	public function user_list()
	{	
		$limit 	= $this->input->post('limit');
		$page 	= $this->input->post('page');
		$search = $this->input->post('search');
		$filter = $this->input->post('filter');
		$start = ($page-1)*$limit;
		$total = $this->Home_model->count_user($search);
		$total_pages = ceil($total / $limit);
		
		$output = $this->Home_model->user_list($search,$filter,$limit,$start);
		foreach($output as $key => $value)
		{	
			
			$ajax[] = array(
							'id'			=>$value->id,
							'name'			=>$value->name,
							'profession'	=>$value->profession,
							'location'		=>json_decode($value->location)->location_name,
							'tags'			=>explode(',',$value->tags),
							'image'			=>$value->image,
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
	public function users()
	{
		$this->load->view("header");
		$this->load->view("home/users");
		$this->load->view('footer');
		
	}
	public function show_question($id)
	{	
		$answer_votes = array();
		$output['question'] = $this->Home_model->get_question($id);
		$output['question_votes'] = $this->Home_model->votes_value($id,'question');
		$answers  = $this->Home_model->get_answers($id);
		if($answers != false){
			foreach($answers as $key =>$value)
			{	
			$output['answers'][] = (object) array(
								'id'=>$value->id,
								'questions_id'=>$value->questions_id,
								'user_id'=>$value->user_id,
								'answer'=>$value->answer,
								'accepted'=>$value->accepted,
								'created'=>$value->created,
								'modified'=>$value->modified,
								'name'=>$value->name,
								'profession'=>$value->profession,
								'image'=>$value->image,
								'votes'=>$this->Home_model->votes_value($value->id,'answer'),
								);
						
			}
		}else{
			$output['answers'] = 'false';
		}
		
		$out['question'] = $output['question'];
		$out['page'] = 'question';
		$out['seo'] = $this->seo_data();
		$this->load->view('header',$out);
		$this->load->view('home/question',$output);
		$this->load->view('footer');
	}
	public function answer_submit()
	{	
		if($this->session->userdata('BMS_loggedIn') != true)
		{
			if($this->session->userdata('loggedIn') == false){
				redirect(base_url('login'));
			}
		}
		
		if(isset($_POST['answer_id'])){
			$data = array(
							'answer'		=>	$this->input->post('answer'),
						 );
			$id = $this->input->post('answer_id');
			$this->Home_model->update_answer($data,$id);
			$this->session->set_flashdata('success', ' Answer is Update Successfully.');
			$output['success_up'] = $this->session->flashdata('success');
			echo json_encode($output); die;
			
		}else{
		
			$data = array(
							'questions_id' 	=>	$this->input->post('question_id'),
							'user_id'		=>	$this->input->post('user_id'),
							'answer'		=>	$this->input->post('answer'),
						);
			$this->Home_model->insert_answer($data);
			$this->session->set_flashdata('success', ' Answer is Submission Successfully.');
			$output['success'] = $this->session->flashdata('success');
			echo json_encode($output); die;
		}
	}
	public function get_viewer()
	{
		if(isset($_POST['viewer_ip']))
		{
			$this->Home_model->update_viewer($this->input->post('question_id'));
		}
	}
	public function top_question()
	{
		$data = $this->Home_model->top_viewed_question();
		echo json_encode($data);
	}
	public function question_list()
	{
		$this->load->view('header');
		$output['records'] = $this->Home_model->total_records();
		$this->load->view('home/question_list',$output);
		$this->load->view('footer');
	}
	public function test()
	{
		$this->load->view('home/test');
	}
	public function tags()
	{
		$this->load->view('header');
		$this->load->view('home/tags');
		$this->load->view('footer');
	}
	public function category()
	{
		$this->load->view('header');
		$this->load->view('home/category');
		$this->load->view('footer');
	}
	public function category_list()
	{
		$limit 	= $this->input->post('limit');
		$page 	= $this->input->post('page');
		$search = $this->input->post('search');
		$filter = $this->input->post('filter');
		$start = ($page-1)*$limit;
		$total = $this->Home_model->count_all_category($search); 
		$total_pages = ceil($total / $limit); 
		$output = $this->Home_model->category_lists($search,$filter,$limit,$start);
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
	public function user_questions_list()
	{	
		echo json_encode($questions);
	}
	public function update_question($id)
	{
		
		if($this->session->userdata('BMS_loggedIn') != true)
		{
			if($this->session->userdata('loggedIn') == false){
				redirect(base_url('login'));
			}
		}
		$row = $this->session->userdata('userData');
		$output['question'] = $this->Home_model->data_question($id);
		$output['category'] = $this->Home_model->get_category();
		$user_id = $output['question']->creator_id;
		
		if(isset($row['data']->id) == $user_id){
			
			$this->load->view('header');
			$this->load->view('home/update_question',$output);
			$this->load->view('footer');
		}elseif($this->session->userdata('BMS_loggedIn') != false ){
			$this->load->view('header');
			$this->load->view('home/update_question',$output);
			$this->load->view('footer');
		}else{
			redirect(base_url('profile'));
		}
	}
	public function update_answer($id)
	{	
		$output['answer']  = $this->Home_model->getanswer($id);
		$output['question'] = $this->Home_model->get_question($output['answer']->questions_id);
		$output['votes']	= $this->Home_model->get_question_votes($output['answer']->questions_id);
		//print_r($output);
		$this->load->view('header');
		$this->load->view('home/edit_answer',$output);
		$this->load->view('footer');
	}
	public function votes()
	{
		$user_id = $this->input->post('user_id');
		$medium_id = $this->input->post('medium_id');
		$medium_type = $this->input->post('medium');
		$type = $this->input->post('type');
		$data = array(
						'medium_type'=>$medium_type,
						'medium_id'=>$medium_id,
						'user_id'=>$user_id
					);
		$this->Home_model->votes($data,$type);
		$this->session->set_flashdata('success', 'Votes is Successfully.');
		$output['success'] = $this->session->flashdata('success');
		echo json_encode($output); die;
		
	}
	public function get_tags()
	{
		$tags = $this->input->post('tag');
		$output['tags'] = $this->Home_model->get_tags($tags);
		echo json_encode($output);
	}
	public function add_interest()
	{
		$tag_id = $this->input->post('tag_id');
		$row = $this->session->userdata('userData');
		$this->Home_model->add_interest($tag_id,$row['data']->id);
		$this->session->set_flashdata('success', 'Interest Tag Insert is Successfully.');
		$output['success'] = $this->session->flashdata('success');
		echo json_encode($output); die;
	}
	public function contact()
	{
		//echo "yes";
		if(isset($_POST['email'])){
			
			$this->form_validation->set_rules('email','email','required');
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('message','message','required');
		
			if($this->form_validation->run() == true)
			{
				$data = array('email'=>$this->input->post('email'),'name'=>$this->input->post('name'),
							'message'=>$this->input->post('message') );
							$this->Home_model->contact_submit($data);
				$this->session->set_flashdata('success', 'Thanks For Contact Us.');
				$output['success_th'] = $this->session->flashdata('success');
				echo json_encode($output); die;
			}else{
				$output['errors'] = array(
										'email'				=>form_error('email'),
										'name'				=>form_error('name'),
										'message'			=>form_error('message'),
										);
				echo json_encode($output);
			}
		}else{
			$this->load->view('header');
			$this->load->view('home/contact');
			$this->load->view('footer');
		}
	}
	public function business()
	{
		if($this->session->userdata('business') != true){  
			$this->load->view('header');
			$this->load->view('home/business');
			$this->load->view('footer');
		}else{
			redirect('home');
		}
	}
}
