<?php 
   class Business_model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   // insert data into tables
     
      public function insert_register($data) 
      { $row = $this->count_row($data);
		if(!$row == '1'){
		$this->db->insert("tbl_user", $data);
		$id = $this->db->insert_id();
		$datas = array('user_id'=>$id,'status'=>'inactive','time_status'=>'inactive');
		$this->db->insert('tbl_bs_page',$datas);
		}
      } 
	 public function disabled_plan($id)
	 {
		 $this->db->where('id',$id);
		 $this->db->update('tbl_bs_page',array('status'=>'inactive','time_status'=>'inactive','plan'=>NULL));
	 }
     public function check_plan($id)
	 {	
		$output = array();
		$query = $this->db->get_where('tbl_bs_page',array("user_id"=>$id));
        $datas=$query->row();
		$output['data'] = $datas;
		if($datas->plan === NULL){
			$output['status'] = 'inactive';
		}else{
			$output['status'] =  'active';
		}
		return $output;
	 }
     public function add_plan($id,$data)
	 {
		 $this->db->where('user_id',$id);
		 $this->db->update('tbl_bs_page',$data);
	 }
	 public function graph_value($id)
	 { 
		//SELECT COUNT(1) AS follow, DATE(`created`) as date FROM `tbl_follow` WHERE `following_id` = '6' GROUP BY DATE(`created`)
		
		//select count(1) as value, created from tbl_site_states where created between date_sub(now(),INTERVAL 1 WEEK) and now() GROUP BY DATE(`created`)
		$this->db->select('COUNT(1) AS follow,DATE(created) as date');
		$this->db->where('following_id',$id);
		$this->db->group_by('DATE(created)');
		$query = $this->db->get('tbl_follow');
		$output['follow'] = $query->result();
		
		$this->db->select('COUNT(1) AS visitor,DATE(created) as date');
		$this->db->where('user_id',$id);
		$this->db->group_by('DATE(created)');
		$query = $this->db->get('tbl_user_visitor');
		$output['visitor'] = $query->result();
		return $output;
	 }
      public function fetch_record($data)
      {	
		$this->db->where('email',$data['email']);
		$this->db->where('password',$data['password']);
		$query = $this->db->get('tbl_user');
        $datas = $query->row();
		//echo $this->db->last_query(); die;
        $n = $query->num_rows();
	
        if($n === 1){
			if($datas->profession === 'business'){
			return $datas;
			}else{
				return $data = 'business';
			}
		}else{
			return $data = '';
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
				return $output; 
			}
			if($user==='login_user'){
				$query = $this->db->get_where('tbl_follow',array("following_id"=>$user_id));
				$output['follower'] = $query->num_rows();
				return $output; 
			}
			
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


