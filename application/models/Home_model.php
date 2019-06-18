<?php 
   class Home_model extends CI_Model {
	
    function __construct() { 
         parent::__construct(); 
		
      } 
   // insert data into tables
    public function question_approved($id)
	{
		$this->db->select("id,accepted");
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_answers');
		$value =$query->result();
		if($value[0]->accepted == 'yes'){
		  $set = array('accepted'=>'no');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_answers',$set);
		}else{
		  $set = array('accepted'=>'yes');
		  $this->db->where('id',$id);
		  $query = $this->db->update('tbl_answers',$set);
		}
	}
	public function remove_tags($id,$tag)
	{
		$this->db->select('id');
		$this->db->where('title',$tag);
		$query = $this->db->get('tbl_tags');
		$data = $query->row();
		if($data->id !='')
		{
			$this->db->where('tag_id',$data->id);
			$this->db->where('user_id',$id);
			$this->db->delete('tbl_fav_tag');
		}
	}
	public function subscribe($email)
	{
		$data = array('email'=>$email);
		$this->db->insert('tbl_subscribe',$data);
	}		
	public function seo_get()
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
	public function delete_question($id,$user_id)
	 {
		 $this->db->where('id',$id);
		 $this->db->where('creator_id',$user_id);
		 $this->db->delete('tbl_questions');
		 
		 $this->db->where('questions_id',$id);
		 $this->db->where('user_id',$user_id);
		 $this->db->delete('tbl_answers');
		 
		 $this->db->where('question_id',$id);
		 $this->db->delete('tbl_tags_question');
		 
		 $this->db->where('medium_id',$id);
		 $this->db->where('medium_type','question');
		 $this->db->where('user_id',$user_id);
		 $this->db->delete('tbl_votes');
	}
	public function delete_answer($id,$user_id)
	 {
		 $this->db->where('id',$id);
		 $this->db->where('user_id',$user_id);
		 $this->db->delete('tbl_answers');
		 
		 $this->db->where('question_id',$id);
		 $this->db->delete('tbl_tags_question');
		 
		 $this->db->where('medium_id',$id);
		 $this->db->where('medium_type','answer');
		 $this->db->where('user_id',$user_id);
		 $this->db->delete('tbl_votes');
	}
	public function upload_profile($id,$image)
	{	
		$query = $this->db->get_where('tbl_user',array('id'=>$id));
		$data = $query->row();
		if($data->image !='' and $data->image != 'avatar.png')
		{
			$path = 'assets/images/'.$data->image;
		    unlink($path);
			$this->db->where('id',$id);
			$this->db->update('tbl_user',$image);
		}else{
			$this->db->where('id',$id);
			$this->db->update('tbl_user',$image);
		}
		 
	}
	public function check_adv($id)
	{
		$query = $this->db->get_where('tbl_bs_page',array('user_id'=>$id));
		return $query->row();
	}
	public function adv($id)
	{
		$this->db->select('COUNT(1) as ads');
		$this->db->where('user_id',$id);
		$query = $this->db->get('tbl_adv');
		return $query->row();
	}
	public function upload_adv($data)
	{
		$this->db->insert('tbl_adv',$data);
	}
	public function get_images($id)
	{
		$query = $this->db->get_where('tbl_adv',array('user_id'=>$id));
		return $query->result();
	}
	public function del_img($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('tbl_adv');
	}
	public function get_category()
	{	
		 $this->db->select('id,title');
		 $this->db->where('status','active');
		 $query = $this->db->get('tbl_category');
		 return $query->result();
	 }
	public function count_link()
	{
		 //select tags_id, count(`question_id`) as total from `tbl_tags_question` GROUP BY `tags_id`
		 $this->db->select('tags_id,COUNT("question_id") as total' );
		 $this->db->from('tbl_tags_question');
		 $this->db->group_by('tags_id');
		 $query = $this->db->get();
		 $data = $query->result();
		 
		 foreach($data as $key=>$value){
			 $this->db->where('id',$value->tags_id);
			 $this->db->set('total_linked_question',$value->total);
			 $this->db->update('tbl_tags');
			//echo $value->tags_id."=".$value->total.'<br/>';
		 }
		 //select tag_id, count(`user_id`) as total from `tbl_fav_tag` GROUP BY `tag_id`
		 
		 $this->db->select('tag_id,COUNT("user_id") as total' );
		 $this->db->from('tbl_fav_tag');
		 $this->db->group_by('tag_id');
		 $query = $this->db->get();
		 $datas = $query->result();
		 
		 foreach($datas as $key=>$value){
			 //print_r($value);
			 $this->db->where('id',$value->tag_id);
			 $this->db->set('total_intrest_user',$value->total);
			 $this->db->update('tbl_tags');
			//echo $value->tags_id."=".$value->total.'<br/>';
		 }//die;
		 
	 }
    public function insert_question($data) 
    { 
		$this->db->insert("tbl_questions", $data);
		return $this->db->insert_id();
	  } 
	public function insert_tags($key)
    { 
		$this->db->where('title',$key);
        $query = $this->db->get('tbl_tags');
        $value =$query->row();
		$n = $query->num_rows(); 
		
        if($n != 1 )
        {	$data = array('title'=>$key); 
			$this->db->insert('tbl_tags',$data);
			$this->db->trans_complete();
			return $this->db->insert_id();
        }else{
			$id = $value->id;
			return $id;
        }
      }
	public function delete_tag_rel($id)
	{
		  $this->db->where('question_id',$id);
		  $this->db->delete('tbl_tags_question');
	  }
	public function insert_que_tags($tags_id,$id)
    {
        $this->db->select("tags_id");
        $this->db->where('question_id',$id);
        $this->db->where('tags_id',$tags_id);
        $query = $this->db->get('tbl_tags_question');
        $n = $query->num_rows();
        if($n == 0)
        {
          $data = array('question_id'=>$id,'tags_id'=>$tags_id);
          $this->db->insert("tbl_tags_question",$data);
        }
        
      } 
	public function insert_que_cat($cat_id,$id)
    {
        $this->db->where('question_id',$id);
        $this->db->where('category_id',$cat_id);
        $query = $this->db->get('tbl_cate_ques');
        $n = $query->num_rows();
        if($n == 0)
        {
          $data = array('question_id'=>$id,'category_id'=>$cat_id);
          $this->db->insert("tbl_cate_ques",$data);
        }
        
      } 
    public function update_question($data,$id) 
    { 
		$set = array(
					'question'=> $data['question'],
					'description'=> $data['description'],
					'cats'=> $data['cats'],
		);
		//print_r($set); die;
		$this->db->set($set);
		$this->db->where('id', $id);
		$this->db->update('tbl_questions'); 
		
	  } 
	public function data_question($id)
	{
		$this->db->select('tbl_questions.*');
		$this->db->join("tbl_tags_question","tbl_questions.id = tbl_tags_question.question_id" ,"LEFT");
        $this->db->join('tbl_tags',"tbl_tags_question.tags_id = tbl_tags.id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags');
		$this->db->group_by('tbl_questions.id');
        $this->db->where("tbl_questions.id",$id);
		$query = $this->db->get('tbl_questions');
        $data=$query->row();
		return $data;
	 }
	function count_all($search)
    {
        $this->db->select("tbl_questions.*, tbl_user.id as user,tbl_user.name,tbl_user.image,tbl_user.profession");
		$this->db->join('tbl_user', "tbl_questions.creator_id = tbl_user.id");
		$this->db->join("tbl_tags_question","tbl_questions.id = tbl_tags_question.question_id" ,"LEFT");
        $this->db->join('tbl_tags',"tbl_tags_question.tags_id = tbl_tags.id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags');
		$this->db->group_by('tbl_questions.id');
		$this->db->like('tbl_questions.question',$search);
		$this->db->or_like('tbl_questions.cats',$search);
		$this->db->or_like('tbl_questions.created',$search);
		$this->db->or_like('tbl_questions.modified',$search);
		$this->db->or_like('tbl_user.name',$search);
		$this->db->or_like('tbl_user.profession',$search);
		$query = $this->db->get("tbl_questions");
		return $query->num_rows();
		//echo $this->db->last_query(); die;
	 }
	function count_tags($search)
	{
		  $this->db->like('title',$search);
		  $this->db->or_like('description',$search);
		  $query = $this->db->get("tbl_tags");
		  return $query->num_rows();
	  }
	function count_user($search)
	{
		  $this->db->like('name',$search);
		  $this->db->or_like('location',$search);
		  $this->db->or_like('profession',$search);
		  $this->db->or_like('institute_name',$search);
		  $query = $this->db->get("tbl_user");
		  return $query->num_rows();
	  }
    public function check_user($email)
	{	
		$output = array();
		$query = $this->db->get_where('tbl_user',array("email"=>$email));
        $datas=$query->row();
		if($datas->password === ''){
			 $output['check'] = 'reset';
		}else{
			$output['check'] = 'forget';
		}
		return $output;
	 }
    public function fetch_record($data)
    {	
        $query = $this->db->get_where('tbl_user',array("email"=>$data['email']));
        $datas = $query->row();
		
        if($datas->password === $data['password']){
			return $datas;
		}else{
			echo "wrong! Password"; die;
			//return $this->check_user($datas->email);
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
	public function total_records()
	{
		  $query = $this->db->get('tbl_user');
		  $output['total_user'] = $query->num_rows();
		  
		  $query = $this->db->get('tbl_questions');
		  $output['total_question'] = $query->num_rows();
		  
		  $query = $this->db->get('tbl_answers');
		  $output['total_answer'] = $query->num_rows();
		  
		  return $output;
	  }
	public function get_questions_data($search,$filter,$limit,$start)
	{	
		$this->db->select("tbl_questions.*, tbl_user.id as user,tbl_user.name,tbl_user.image,tbl_user.profession, tbl_category.title as category");
		$this->db->join('tbl_user', "tbl_questions.creator_id = tbl_user.id");
		$this->db->join("tbl_tags_question","tbl_questions.id = tbl_tags_question.question_id" ,"LEFT");
        $this->db->join('tbl_tags',"tbl_tags_question.tags_id = tbl_tags.id","LEFT");
		$this->db->join('tbl_cate_ques',"tbl_questions.id = tbl_cate_ques.question_id","LEFT");
        $this->db->join('tbl_category',"tbl_cate_ques.category_id = tbl_category.id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags');
		$this->db->group_by('tbl_questions.id');
		$this->db->group_start();
		$this->db->like('tbl_questions.question',$search);
		$this->db->or_like('tbl_questions.cats',$search);
		$this->db->or_like('tbl_questions.created',$search);
		$this->db->or_like('tbl_questions.modified',$search);
		$this->db->or_like('tbl_user.name',$search);
		$this->db->or_like('tbl_user.profession',$search);
		$this->db->or_like('tbl_questions.taags',$search);
		$this->db->group_end();
		$this->db->where('tbl_questions.status','active');
		$this->db->order_by($filter,"desc");
		$this->db->limit($limit, $start);
		$query = $this->db->get("tbl_questions");
		//echo $this->db->last_query(); die;
		$data['data'] = $query->result();
		return $data;
	 }
	public function tags_list($search,$filter,$limit,$start)
	{
		$this->db->select('*');
		$this->db->like('title',$search);
		$this->db->or_like('description',$search);
		//$this->db->where('status','active');
		$this->db->order_by($filter,'asc');
		$this->db->limit($limit,$start);
		$query = $this->db->get('tbl_tags');
		$data = $query->result();
		return $data;
		//echo $this->db->last_query();
	}
	public function user_list($search,$filter,$limit,$start)
	{
		$this->db->select('tbl_user.*');
		$this->db->join('tbl_fav_tag',"tbl_user.id = tbl_fav_tag.user_id","LEFT");
		$this->db->join('tbl_tags',"tbl_fav_tag.tag_id = tbl_tags.id","LEFT");
		$this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags');
		$this->db->group_by('tbl_user.id');
		$this->db->like('name',$search);
		$this->db->or_like('location',$search);
		$this->db->or_like('profession',$search);
		$this->db->or_like('institute_name',$search);
		$this->db->where('tbl_user.status','active');
		$this->db->order_by($filter,'asc');
		$this->db->limit($limit,$start);
		$query = $this->db->get('tbl_user');
		$data = $query->result();
		return $data;
		//echo $this->db->last_query();
	}
	public function get_question($id)
	{
		 $this->db->select("tbl_questions.id, tbl_questions.creator_id, tbl_questions.question,tbl_category.title as category ,tbl_questions.description, tbl_questions.total_no_answer, tbl_questions.viewers, tbl_questions.level, tbl_questions.created, tbl_questions.modified, tbl_questions.object_link_ld,tbl_user.id as user,tbl_user.name,tbl_user.image,tbl_user.profession");
		 $this->db->join('tbl_user', "tbl_questions.creator_id = tbl_user.id","LEFT");
		 $this->db->join("tbl_tags_question","tbl_questions.id = tbl_tags_question.question_id");
         $this->db->join('tbl_tags',"tbl_tags_question.tags_id = tbl_tags.id","LEFT");
		 $this->db->join('tbl_cate_ques',"tbl_questions.id = tbl_cate_ques.question_id","LEFT");
         $this->db->join('tbl_category',"tbl_cate_ques.category_id = tbl_category.id","LEFT");
		 $this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags',"LEFT");
		 $this->db->where('tbl_questions.id',$id);
		 $this->db->where('tbl_questions.status','active');
         $query = $this->db->get("tbl_questions");
		 $data = $query->row();
		 return $data;
	}
	public function states($data)
	{
		$this->db->insert('tbl_site_states',$data);
	}
	public function get_question_votes($id)
	{
		$this->db->where('medium_id',$id);
		$this->db->where('medium_type','question');
		$query = $this->db->get('tbl_votes');
		return $query->num_rows(); 
	}
	public function count_all_category($search)
	{
			
			$this->db->where('status','active');
			$this->db->like('title',$search);
			$this->db->like('description',$search);
			$query = $this->db->get("tbl_category");
			//echo $this->db->last_query(); die;
			return $query->num_rows();
			
	 }
	public function category_lists($search,$filter,$limit,$start)
	{		
			$this->db->select('*');
			$this->db->where('status','active');
			$this->db->like('title',$search);
			$this->db->like('description',$search);
			$this->db->where('status','active');
			$this->db->order_by($filter,'abs');
			$this->db->limit($limit,$start);
			$query = $this->db->get('tbl_category');
			//echo $this->db->last_query(); die;
			$data = $query->result();
			return $data;
	  }
	public function votes_value($id,$type)
	{
		$this->db->where('medium_id',$id);
		$this->db->where('medium_type',$type);
		$query = $this->db->get('tbl_votes');
		return $query->num_rows();
	}
	public function getanswer($id)
	{
		 $this->db->select("tbl_answers.id,tbl_answers.questions_id,tbl_answers.user_id,tbl_answers.answer,tbl_answers.accepted,tbl_answers.created,tbl_answers.modified,tbl_user.name,tbl_user.profession,tbl_user.image");
		 $this->db->join('tbl_user', "tbl_answers.user_id = tbl_user.id","LEFT");
		 $this->db->where('tbl_answers.id',$id);
         $query = $this->db->get("tbl_answers");
		 return $query->row();
		 //echo $this->db->last_query(); die;
	}
	public function insert_answer($data)
	{	
		$this->db->insert("tbl_answers", $data);
		$this->db->set('total_no_answer','total_no_answer + ' . (int) 1, FALSE);
		$this->db->where('id', $data['questions_id']);
		$this->db->update('tbl_questions'); 
	}
	public function update_answer($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_answers',$data);
	}
	public function get_answers($id)
	{
		$this->db->select("tbl_answers.id,tbl_answers.questions_id,tbl_answers.user_id,tbl_answers.answer,tbl_answers.accepted,tbl_answers.created,tbl_answers.modified,tbl_user.name,tbl_user.profession,tbl_user.image");
		 $this->db->join('tbl_user', "tbl_answers.user_id = tbl_user.id","LEFT");
		 $this->db->where('tbl_answers.questions_id',$id);
		 //$this->db->where('tbl_answers.status','active');
         $query = $this->db->get("tbl_answers");
		 $data = $query->result();
		 $n = $query->num_rows();
		 if($n!= 0){
			  return $data;
		 }else{
			 return false;
		 }
		//echo $this->db->last_query(); die;
	}
	public function update_viewer($id)
	{
		$this->db->set('viewers', 'viewers + '.(int) 1 , FALSE);
		$this->db->where('id', $id);
		$this->db->update('tbl_questions'); 
	}
	public function top_viewed_question()
	{
		$this->db->select('id,question,viewers');
		$this->db->order_by('viewers','DESC');
		$query = $this->db->get('tbl_questions',10,0);
		return $query->result();
	}
	public function votes($data,$type)
	{
		if($type =='up')
		{	
			$this->db->where('medium_type',$data['medium_type']);
			$this->db->where('medium_id',$data['medium_id']);
			$this->db->where('user_id',$data['user_id']);
			$query = $this->db->get('tbl_votes'); 
			$n = $query->num_rows();
			if($n != 1){
				$this->db->insert('tbl_votes',$data);
			}
		}else{
			$this->db->where('medium_type',$data['medium_type']);
			$this->db->where('medium_id',$data['medium_id']);
			$this->db->where('user_id',$data['user_id']);
			$this->db->delete('tbl_votes');
		}
		
	}
	public function get_tags($tags)
	{
		$this->db->select('id,title');
		$this->db->like('title',$tags);
		$query = $this->db->get('tbl_tags');
		return $query->result();
		//echo $this->db->last_query();
	}
	public function add_interest($tag_id,$user_id)
	{
		$data = array('tag_id'=>$tag_id,'user_id'=>$user_id);
		$this->db->insert('tbl_fav_tag',$data);
	}
	public function contact_submit($data)
	{
		$this->db->insert('tbl_contact',$data);
	}
}


