<?php 
   class BMS_model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   // insert data into tables
	  public function user_states()
	  {
		  $query = $this->db->get_where('tbl_user');
		  $data['total'] = $query->num_rows();
		  
		  $this->db->where('status','active');
		  $query = $this->db->get_where('tbl_user');
		  $data['active_user'] = $query->num_rows();
		  
		  $this->db->where('status','inactive');
		  $query = $this->db->get_where('tbl_user');
		  $data['inactive_user'] = $query->num_rows();
		   
		  return $data;
	  }
	  public function map_data()
	  {
		  $this->db->select('COUNT(1) as total, country');
		  $this->db->group_by('country');
		  $query  = $this->db->get('tbl_site_states');
		  return $query->result();
	  }
	  public function direct_login($id)
	  {
		  $this->db->where('id',$id);
		  $query = $this->db->get('tbl_user');
		  return $query->row();
	  }
	  public function insert_seo($data,$meta_key)
	  {
		$this->db->select('*');
		$this->db->where('meta_key',$meta_key);
		$query = $this->db->get('tbl_seo');
		//echo $this->db->last_query(); die;
		$n = $query->num_rows();
		
		if($n <= 0)
		{	
			foreach($data as $key => $value)
			{
				$set = array('meta_key'=>$key,'meta_value'=>$value);
				$this->db->insert('tbl_seo',$set);
				
			}
		}else{
			
			foreach($data as $key => $value)
			{
				$this->db->set('meta_value',$value);
				$this->db->where('meta_key',$key);
				$this->db->update('tbl_seo');
			}
		}
	 }
	  public function seo_data()
	  {	
		$this->db->like('meta_key', 'site', 'after');
		$query = $this->db->get('tbl_seo');
		$row['site_seo'] = $query->result();
		
		$this->db->like('meta_key', 'question', 'after');
		$query = $this->db->get('tbl_seo');
		$row['question_seo'] = $query->result();
		
		$this->db->like('meta_key', 'page', 'before');
		$query = $this->db->get('tbl_seo');
		$row['page_seo'] = $query->result();
		
		return $row;
	 }
	  public function all_states()
	  {
		  $query = $this->db->get('tbl_questions');
		  $output['questions'] = $query->num_rows();
		  
		  $query = $this->db->get('tbl_answers');
		  $output['answers'] = $query->num_rows();
		  
		  $query = $this->db->get('tbl_user');
		  $output['users'] = $query->num_rows();
		  
		  $query = $this->db->get('tbl_site_states');
		  $output['visitor'] = $query->num_rows();
		  
		  $query = $this->db->get('tbl_contact');
		  $output['contacts'] = $query->num_rows();
		  
		  $query = $this->db->get('tbl_adv');
		  $output['adv'] = $query->num_rows();
		  
		  return $output;
	  }
	  public function graph_data()
	  {	
		  $this->db->select('COUNT(*)as total, MONTH(created) as month');
		  $this->db->where('YEAR(`created`)','2018');
		  $this->db->group_by('MONTH(`created`)');
		  $query  = $this->db->get('tbl_site_states');
		  return $query->result();
	  }
	  public function question_states()
	  {
		  $query = $this->db->get_where('tbl_questions');
		  $data['total'] = $query->num_rows();
		  
		  $this->db->where('status','active');
		  $query = $this->db->get_where('tbl_questions');
		  $data['active_user'] = $query->num_rows();
		  
		  $this->db->where('status','inactive');
		  $query = $this->db->get_where('tbl_questions');
		  $data['inactive_user'] = $query->num_rows();
		   
		  return $data;
	  }
	  public function answer_states()
	  {
		  $query = $this->db->get_where('tbl_answers');
		  $data['total'] = $query->num_rows();
		  
		  $this->db->where('status','active');
		  $query = $this->db->get_where('tbl_answers');
		  $data['active_user'] = $query->num_rows();
		  
		  $this->db->where('status','inactive');
		  $query = $this->db->get_where('tbl_answers');
		  $data['inactive_user'] = $query->num_rows();
		   
		  return $data;
	  }
	  public function ads_states()
	  {
		  $query = $this->db->get_where('tbl_adv');
		  $data['total'] = $query->num_rows();
		  
		  $this->db->where('status','active');
		  $query = $this->db->get_where('tbl_adv');
		  $data['active_user'] = $query->num_rows();
		  
		  $this->db->where('status','inactive');
		  $query = $this->db->get_where('tbl_adv');
		  $data['inactive_user'] = $query->num_rows();
		   
		  return $data;
	  }
	  public function contact_states()
	  {
		  $query = $this->db->get_where('tbl_contact');
		  $data['total'] = $query->num_rows();
		  
		  $this->db->where('action!=','done');
		  $query = $this->db->get_where('tbl_contact');
		  $data['pending'] = $query->num_rows();
		  
		  $this->db->where('action','done');
		  $query = $this->db->get_where('tbl_contact');
		  $data['done'] = $query->num_rows();
		   
		  return $data;
	  }
	  public function tags_states()
	  {
		  $query = $this->db->get_where('tbl_tags');
		  $data['total'] = $query->num_rows();
		  
		  $this->db->where('status','active');
		  $query = $this->db->get_where('tbl_tags');
		  $data['active'] = $query->num_rows();
		  
		  $this->db->where('status','inactive');
		  $query = $this->db->get_where('tbl_tags');
		  $data['inactive'] = $query->num_rows();
		   
		  return $data;
	  }
	  public function category_states()
	  {
		  $query = $this->db->get_where('tbl_category');
		  $data['total'] = $query->num_rows();
		  
		  $this->db->select_sum('total_link_question');
		  $query = $this->db->get_where('tbl_category');
		  $row = $query->row();
		  $data['total_link_question'] = $row->total_link_question;
		  
		  return $data;
	  }
	  public function questions_lists($search,$filter,$limit,$start)
	  {		
			$this->db->select('tbl_questions.*,tbl_user.name,tbl_category.title as category  ');
			$this->db->join('tbl_user','tbl_questions.creator_id = tbl_user.id','LEFT');
			$this->db->join('tbl_cate_ques',"tbl_questions.id = tbl_cate_ques.question_id","LEFT");
			$this->db->join('tbl_category',"tbl_cate_ques.category_id = tbl_category.id","LEFT");
			$this->db->group_by('tbl_questions.question');
			$this->db->group_start();
			$this->db->like('tbl_questions.question',$search);
			$this->db->or_like('tbl_questions.cats',$search);
			$this->db->or_like('tbl_questions.description',$search);
			$this->db->or_like('tbl_questions.taags',$search);
			$this->db->or_like('tbl_questions.created',$search);
			$this->db->or_like('tbl_questions.status',$search);
			$this->db->or_like('tbl_questions.viewers',$search);
			$this->db->or_like('tbl_user.name',$search);
			$this->db->or_like('tbl_category.title',$search);
			$this->db->group_end();
			$this->db->order_by($filter,'abs');
			$this->db->limit($limit,$start);
			$query = $this->db->get('tbl_questions');
			$data = $query->result();
			return $data;
	  }
	  public function answers_lists($search,$filter,$limit,$start)
	  {		
			$this->db->select('tbl_answers.*,tbl_user.name,tbl_user.id as user_id');
			$this->db->join('tbl_user',"tbl_answers.user_id = tbl_user.id","LEFT");
			$this->db->group_start();
			$this->db->like('tbl_answers.answer',$search);
			$this->db->or_like('tbl_answers.accepted',$search);
			$this->db->or_like('tbl_answers.created',$search);
			$this->db->or_like('tbl_answers.modified',$search);
			$this->db->or_like('tbl_user.name',$search);
			$this->db->group_end();
			$this->db->order_by($filter,'abs');
			$this->db->limit($limit,$start);
			$query = $this->db->get('tbl_answers');
			$data = $query->result();
			return $data;
	  }
	  public function adv_lists($search,$filter,$limit,$start)
	  {		
			$this->db->select('tbl_adv.*,tbl_user.name');
			$this->db->join('tbl_user','tbl_adv.user_id = tbl_user.id','LEFT');
			$this->db->like('tbl_adv.title',$search);
			$this->db->or_like('tbl_adv.type',$search);
			$this->db->or_like('tbl_adv.stoped',$search);
			$this->db->or_like('tbl_adv.created',$search);
			$this->db->or_like('tbl_adv.status',$search);
			$this->db->order_by($filter,'abs');
			$this->db->limit($limit,$start);
			$query = $this->db->get('tbl_adv');
			$data = $query->result();
			return $data;
	  }
	  public function contact_lists($search,$filter,$limit,$start)
	  {		
			$this->db->select('*');
			$this->db->like('email',$search);
			$this->db->or_like('name',$search);
			$this->db->or_like('message',$search);
			$this->db->or_like('created',$search);
			$this->db->or_like('action',$search);
			$this->db->order_by($filter,'abs');
			$this->db->limit($limit,$start);
			$query = $this->db->get('tbl_contact');
			//echo $this->db->last_query(); die;
			$data = $query->result();
			return $data;
	  }
	  public function tags_lists($search,$filter,$limit,$start)
	  {		
			$this->db->select('*');
			$this->db->like('title',$search);
			$this->db->or_like('description',$search);
			$this->db->or_like('status',$search);
			$this->db->order_by($filter,'abs');
			$this->db->limit($limit,$start);
			$query = $this->db->get('tbl_tags');
			//echo $this->db->last_query(); die;
			$data = $query->result();
			return $data;
	  }
	  public function category_lists($search,$filter,$limit,$start)
	  {		
			$this->db->select('*');
			$this->db->like('title',$search);
			$this->db->or_like('description',$search);
			
			$this->db->order_by($filter,'abs');
			$this->db->limit($limit,$start);
			$query = $this->db->get('tbl_category');
			//echo $this->db->last_query(); die;
			$data = $query->result();
			return $data;
	  }
	  public function lists($search,$filter,$limit,$start)
	  {		
			$this->db->like('name',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('profession',$search);
			$this->db->or_like('gender',$search);
			$this->db->or_like('created',$search);
			$this->db->or_like('status',$search);
			$this->db->or_like('location',$search);
			$this->db->or_like('mobile',$search);
			$this->db->or_like('institute_name',$search);
			$this->db->order_by($filter,'abs');
			$this->db->limit($limit,$start);
			$query = $this->db->get('tbl_user');
			$data = $query->result();
			return $data;
	  }
	  public function get_user_data($id)
	  {		
			$this->db->select("id,name,gender,profession, email,dob, institute_name,mobile,");
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_user');
			$value =$query->row();
			return $value; 
	  }
	  public function count_all($search)
	  {
			$this->db->like('name',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('profession',$search);
			$this->db->or_like('gender',$search);
			$this->db->or_like('created',$search);
			$this->db->or_like('status',$search);
			$this->db->or_like('location',$search);
			$this->db->or_like('institute_name',$search);
			$this->db->or_like('dob',$search);
			//$this->db->where('status','active');
			$query = $this->db->get("tbl_user");
			//echo $this->db->last_query(); die;
			return $query->num_rows();
			
	  }
	  public function count_all_question($search)
	  {
			$this->db->like('question',$search);
			$this->db->or_like('cats',$search);
			$this->db->or_like('description',$search);
			$this->db->or_like('created',$search);
			$this->db->or_like('status',$search);
			$this->db->or_like('taags',$search);
			//$this->db->where('status','active');
			$query = $this->db->get("tbl_questions");
			//echo $this->db->last_query(); die;
			return $query->num_rows();
			
	  }
	  public function count_all_answer($search)
	  {
			$this->db->like('answer',$search);
			$this->db->or_like('questions_id',$search);
			$this->db->or_like('user_id',$search);
			$this->db->or_like('created',$search);
			$this->db->where('accepted','active');
			$query = $this->db->get("tbl_answers");
			//echo $this->db->last_query(); die;
			return $query->num_rows();
			
	  }
	  public function count_all_adv($search)
	  {
			$this->db->like('title',$search);
			$this->db->or_like('type',$search);
			$this->db->or_like('stoped',$search);
			$this->db->or_like('created',$search);
			$this->db->or_like('status',$search);
			//$this->db->where('status','active');
			$query = $this->db->get("tbl_adv");
			//echo $this->db->last_query(); die;
			return $query->num_rows();
			
	  }
	  public function count_all_category($search)
	  {
			$this->db->like('title',$search);
			$this->db->or_like('description',$search);
			//$this->db->where('status','active');
			$query = $this->db->get("tbl_category");
			//echo $this->db->last_query(); die;
			return $query->num_rows();
			
	  }
	  public function count_all_contact($search)
	  {
			$this->db->like('email',$search);
			$this->db->or_like('name',$search);
			$this->db->or_like('message',$search);
			$this->db->or_like('created',$search);
			$this->db->or_like('action',$search);
			$query = $this->db->get("tbl_contact");
			return $query->num_rows();
			
	  }
	  public function count_all_tags($search)
	  {
			$this->db->like('title',$search);
			$this->db->or_like('description',$search);
			$this->db->or_like('status',$search);
			$query = $this->db->get("tbl_tags");
			return $query->num_rows();
			
	  }
	  public function update_user($id,$data)
	  {		
			
			$this->db->where('id',$id);
			$this->db->update('tbl_user',$data);
	  }
	  public function delete_user($id)
	  {
		  $set = array('status'=>'inactive');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_user',$set);
	  }
	  public function delete_tags($id)
	  {
		  $this->db->where('id',$id);
		  $this->db->where('total_linked_question','0');
		  $this->db->where('total_intrest_user','0');
		  $query = $this->db->delete('tbl_tags');
	  }
	  public function delete_adv($id)
	  {
		  $this->db->where('id',$id);
		  $this->db->delete('tbl_adv');
	  }
	  public function category_submit($data)
	  {
		  $this->db->where('title',$data['title']);
		  $query = $this->db->get('tbl_category');
		  $n = $query->num_rows();
		  $row = $query->row();
		  if($n!=1){
			  $this->db->insert('tbl_category',$data);
		  }else{
			$this->db->where('id',$row->id);
			$this->db->update('tbl_category',$data);
		  }
	  }
	  public function get_category($id)
	  {
		  $this->db->where('id',$id);
		  $query= $this->db->get('tbl_category');
		  return $query->row();
	  }
	  public function delete_contact($id)
	  {
		  $this->db->delete('tbl_contact',array('id'=>$id));
	  }
	  public function delete_category($id)
	  {
		  $this->db->delete('tbl_category',array('id'=>$id));
	  }
	  public function change_status($id)
	  {
		$this->db->select("id,status");
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_user');
		$value =$query->result();
		if($value[0]->status == 'active'){
		  $set = array('status'=>'inactive');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_user',$set);
		}else{
		  $set = array('status'=>'active');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_user',$set);
		}
	  }
	  public function category_status($id)
	  {
		$this->db->select("id,status");
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_category');
		$value =$query->result();
		if($value[0]->status == 'active'){
		  $set = array('status'=>'inactive');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_category',$set);
		}else{
		  $set = array('status'=>'active');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_category',$set);
		}
	  }
	   public function adv_status($id)
	  {
		$this->db->select("id,status");
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_adv');
		$value =$query->result();
		if($value[0]->status == 'active'){
		  $set = array('status'=>'inactive');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_adv',$set);
		}else{
		  $set = array('status'=>'active');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_adv',$set);
		}
	  }
	  public function repeat_action($id)
	  {
		  $query = $this->db->get_where('tbl_contact',array('id'=>$id));
		  $row = $query->row();
		  $this->db->where('id',$id);
		  $this->db->update('tbl_contact',array('action'=>'pending'));
	  }
	  public function change_action($id)
	  {
		  $query = $this->db->get_where('tbl_contact',array('id'=>$id));
		  $row = $query->row();
		  if($row->action ==='pending'){
			 $this->db->where('id',$id);
			 $this->db->update('tbl_contact',array('action'=>'process'));
		  }elseif($row->action ==='process'){
			 $this->db->where('id',$id);
			 $this->db->update('tbl_contact',array('action'=>'approved'));
		  }elseif($row->action ==='approved'){
			   $this->db->where('id',$id);
			   $this->db->update('tbl_contact',array('action'=>'done'));
		  }die;
			  
	  }
	  public function question_status($id)
	  {
		$this->db->select("id,status");
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_questions');
		$value =$query->result();
		if($value[0]->status == 'active'){
		  $set = array('status'=>'inactive');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_questions',$set);
		}else{
		  $set = array('status'=>'active');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_questions',$set);
		}
	  }
	  public function answer_status($id)
	  {
		$this->db->select("id,status");
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_answers');
		$value =$query->result();
		if($value[0]->status == 'active'){
		  $set = array('status'=>'inactive');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_answers',$set);
		}else{
		  $set = array('status'=>'active');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_answers',$set);
		}
	  }
	   public function tags_status($id)
	  {
		$this->db->select("id,status");
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_tags');
		$value =$query->result();
		if($value[0]->status == 'active'){
		  $set = array('status'=>'inactive');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_tags',$set);
		}else{
		  $set = array('status'=>'active');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_tags',$set);
		}
	  }
}


