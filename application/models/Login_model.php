<?php 
   class Login_model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   // insert data into tables
     
      public function insert_register($data) 
      { $row = $this->count_row($data);
		if(!$row == '1'){
		$this->db->insert("tbl_user", $data);
		}
      } 

     public function check_user($email)
	 {	$output = array();
		$query = $this->db->get_where('tbl_user',array("email"=>$email));
        $datas=$query->row();
		if($datas->password === ''){
			 $output['check'] = 'reset';
		}else{
			$output['check'] = 'forget';
		}
		return $output;
	 }
      public function page_detail($id){
		$query = $this->db->get_where('tbl_bs_page',array('user_id'=>$id));
		return $query->row();
	  }
      public function fetch_record($data)
      {	
        $query = $this->db->get_where('tbl_user',array("email"=>$data['email']));
        $datas = $query->row();
		
        if($datas->password === $data['password']){
			if($datas->profession != 'business'){
				if($datas->status != 'inactive'){
			return $datas;
				}else{ 	 
				$error['errors'] = array('email'=>"Your Account is Block, Please contact Us For Activate Again"); 
				echo json_encode($error); die; 
				}
			}else{
				echo "Please Login In Business"; die;
			}
		}else{
			$output['errors'] = array('password'	=>"wrong! Password" );
			echo json_encode($output);die;
		}
      }
	  public function BMS_record($data)
	  {
		$query = $this->db->get_where('tbl_bms_user',array("email"=>$data['email']));
        $datas = $query->row();
		if($datas->password === $data['password']){
			return $datas;
		}else{
			$output['errors'] = array('password'	=>"wrong! Password" );
			echo json_encode($output);die;
		}
	  }
	  public function fetch_data($data)
	  {
		  $query = $this->db->get_where('tbl_user',array("email"=>$data['email']));
		  $datas['check']=$query->row();
		  return $datas;
	  }
      public function count_row($data)
	  {	
			$this->db->where('email',$data['email']);
			$query = $this->db->get('tbl_user');
			return $query->num_rows();
	  }
	  public function update_profile($data)
	 {	
			$this->db->where('id',$data['id']);
			$this->db->update('tbl_user',$data);
	 }
	 public function user_states($id)
	 {
		  $query = $this->db->get_where('tbl_questions',array("creator_id"=>$id));
		  $output['questions'] =  $query->num_rows();
		  
		  $query = $this->db->get_where('tbl_answers',array("user_id"=>$id));
		  $output['answers'] =  $query->num_rows();
		  
		  
		  $query = $this->db->get_where('tbl_user_visitor',array("user_id"=>$id));
		  $output['visitor'] =  $query->num_rows(); 
		  if($this->session->userdata('loggedIn')== true){
			  $userData = $this->session->userdata('userData');
		
		  if($id != $userData['data']->id){
			  $this->db->where('following_id',$id);
			  $this->db->where('follower_id',$userData['data']->id);
			  $query = $this->db->get('tbl_follow');
			  $n =  $query->num_rows();
			  if($n === 1){
				  $output['follow'] = 'yes';
			  }else{
				$output['follow'] = 'no';
			  }
		  } 
		  }else{
			$output['follow'] = 'no';
		  }
		  //print_r($output['visitor']); die;
		  return $output; 
		}
		public function follow_status($user_id,$user)
		{	
			if($user=='other_user'){
				$query = $this->db->get_where('tbl_follow',array("following_id"=>$user_id));
				$output['follower'] = $query->num_rows();
				$query = $this->db->get_where('tbl_follow',array("follower_id"=>$user_id));
				$output['following'] = $query->num_rows();
				return $output; 
			}
			if($user==='login_user'){
				$query = $this->db->get_where('tbl_follow',array("following_id"=>$user_id));
				$output['follower'] = $query->num_rows();
				$query = $this->db->get_where('tbl_follow',array("follower_id"=>$user_id));
				$output['following'] = $query->num_rows();
				return $output; 
			}
			
		}
		public function followed_activity($id)
		{	
			$output = array();
			$this->db->select('follower_id');
			$query = $this->db->get_where('tbl_follow',array("following_id"=>$id));
			$ids = $query->result();
			foreach($ids as $key=>$value)
			{
				//print_r($value->follower_id);
				$output[] = $this->follower_data($value->follower_id); 
			}
			//print_r($output); die;
			return $output;
		}
		public function follower_data($id)
		{	
			$this->db->select("tbl_answers.*,tbl_questions.question,tbl_questions.creator_id,tbl_questions.id as ids");
			$this->db->join('tbl_questions', "tbl_questions.id = tbl_answers.questions_id","LEFT");
			$this->db->where('tbl_questions.creator_id',$id);
			$query = $this->db->get("tbl_answers");
			$data = $query->result();
			return $data;
		}
		public function follow($following,$follower)
		{	
			$this->db->where('following_id',$following);
			$this->db->where('follower_id',$follower);
			$query = $this->db->get('tbl_follow');
			$n =  $query->num_rows();
			//echo $this->db->last_query(); die;
			if($n === 0)
			{
			 $data = array('following_id'=>$following,'follower_id'=>$follower);
			 $this->db->insert('tbl_follow',$data);
			}
		}
		
		public function user_viewer($id,$ip)
		{	
			$this->db->where('user_id',$id);
			$this->db->where('visitor_ip',$ip);
			$query = $this->db->get('tbl_user_visitor');
			$n =  $query->num_rows();
			//echo $this->db->last_query(); die;
			if($n === 0)
			{
				$data = array('user_id'=>$id,'visitor_ip'=> $ip);
				$this->db->insert('tbl_user_visitor',$data);
			}
			//echo $n."=== 0 ";
				
		}
		
		public function user_data($id)
		{	
			$this->db->select('tbl_user.*');
			$this->db->join('tbl_fav_tag',"tbl_user.id = tbl_fav_tag.user_id","LEFT");
			$this->db->join('tbl_tags',"tbl_fav_tag.tag_id = tbl_tags.id","LEFT");
			$this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags');
			$this->db->group_by('tbl_user.id');
        	$this->db->where('tbl_user.id',$id);
			$query = $this->db->get('tbl_user');
			return $query->row();
		}
		public function update_location($data,$id)
		{
			$this->db->where('id',$id);
			$set = array('location'=> json_encode($data));
			$this->db->update('tbl_user',$set);
		}
		public function update_about($data,$id)
		{
			$this->db->where('id',$id);
			$set = array('about'=> $data['about']);
			$this->db->update('tbl_user',$set);
		}
		public function user_questions_data($id)
		{
			$this->db->select("tbl_questions.id, tbl_questions.question, tbl_questions.description,tbl_questions.created");
			 $this->db->where('tbl_questions.creator_id',$id);
			 $query = $this->db->get("tbl_questions");
			 $data = $query->result();
			 return $data;
		}
		
		public function user_answers_data($id)
		{	
			$this->db->select("tbl_answers.*,tbl_questions.question");
			$this->db->join('tbl_questions', "tbl_questions.id = tbl_answers.questions_id","LEFT");
			$this->db->where('user_id',$id);
			$query = $this->db->get("tbl_answers");
			$data = $query->result();
			return $data;
		}
}


