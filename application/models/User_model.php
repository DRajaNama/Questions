<?php 
   class User_model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   // insert data into tables
      public function slider_image($image)
      {
        $this->db->insert('slider_image',$image);
        $this->db->trans_complete();
        return $this->db->insert_id();
      }

      public function slider_upload($data)
      {
        $this->db->insert('slider_setup',$data);

      }
      public function slider_exist($slider)
      { 
        $this->db->where('slider',$slider);
        $query = $this->db->get('slider_setup');
        return $query->num_rows();
      }

	 public function get_order_list()
	 {
		
		$query=$this->db->get('tbl_order');
		$output['data']=$query->result();
		//num row
		$output['filter_row_count'] =$query->num_rows();
		//used to total_row_count
		$query=$this->db->get('tbl_order');
		$output['total_row_count'] =$query->num_rows();
		return $output;
	 }
	 public function change_order_status($id,$status){
		$this->db->where('id',$id);
        $set = array('status'=>$status);
        $this->db->update('tbl_order',$set);
	 }
      public function insert($data) 
      { 
         $this->db->insert("user", $data);
      } 

      public function customer_signup($data)
      {
        $this->db->insert('tbl_customer',$data);
        return true;
      }
      public function insert_products($data)
      {
        $this->db->insert("tbl_products",$data);
        $this->db->trans_complete();
        return $this->db->insert_id();
      }

      public function insert_tags($data)
      { $this->db->select("*");
        $this->db->from('tbl_tags');
        $this->db->where('title',$data['title']);
        $query = $this->db->get();
        $value =$query->row();
        if($value == '')
        {
        $this->db->insert('tbl_tags',$data);
        $this->db->trans_complete();
        return $this->db->insert_id();
        }else{
          $id = $value->id;
          return $id;
        }
      }

      public function insert_category($data)
      {
        $this->db->insert("categries",$data);
      }
      public function insert_pro_cat($key,$id)
      {
        $data = array('product_id'=>$id,'categories_id'=>$key);
        $this->db->insert("tbl_pro_categories",$data);
      }

      public function insert_pro_tags($tags_id,$id)
      {
        $this->db->select("tags_id");
        $this->db->from('tbl_pro_tags');
        $this->db->where('product_id',$id);
        $this->db->where('tags_id',$tags_id);
        $query = $this->db->get();
        $data = $query->row();
        if($data == '')
        {
          $data = array('product_id'=>$id,'tags_id'=>$tags_id);
          $this->db->insert("tbl_pro_tags",$data);
        }
        
      }
// update data into tables
      public function slider_update($data,$slider)
      {
        $this->db->where('slider',$slider);
        $set = array('status'=>$data['status'],'heading'=>$data['heading'],'heading_font_size'=>$data['heading_font_size'],'heading_font_color'=>$data['heading_font_color'],'text'=>$data['text'],'text_font_size'=>$data['text_font_size'],'text_font_color'=>$data['text_font_color'],'btn_text'=>$data['btn_text'],'btn_link'=>$data['btn_link']);
        $this->db->update('slider_setup',$set);
        $query = $this->db->last_query();
      }
      public function slider_image_update($image,$image_id)
      {
        $this->db->where('id_',$image_id);
        $set = array('image'=>$image);
        $this->db->update('slider_image',$set);
        $query = $this->db->last_query();
      }
      public function update($data) 
      { 
    $this->db->where('id', $data['id']);
    $set = array('name'=>$data['name'],'lastname'=>$data['lastname'],'email'=>$data['email'],'password'=>$data['password'],'image'=>$data['image'],'modify'=>$data['modify']);
    $this->db->update('user',$set);
    $query= $this->db->last_query();

      } 

      public function categories_update($data)
      {
        $this->db->where('id_', $data['id']);
        $set = array('title'=>$data['title'],'description'=>$data['description'],'image'=>$data['image']);
        $this->db->update('categries',$set);
        $query= $this->db->last_query();
      }

      public function update_pro_cat($key,$id)
      {
        $this->db->select('categories_id');
        $this->db->from('tbl_pro_categories');
        $this->db->where('product_id',$id);
        $this->db->where('categories_id',$key);
        $query = $this->db->get();
        $data = $query->row();
        //echo "<pre>"; print_r($data); 
       /// echo $this->db->last_query();
        if($data == '')
        {  
          $data = array('product_id'=>$id,'categories_id'=>$key);
          $this->db->insert("tbl_pro_categories",$data);
        }
      }

     

	public function products_update($data)
	{
		$this->db->where('id',$data['id']);
		 $set = array(
      'title'=>$data['title'],
      'description'=>$data['description'],
      'price'=>$data['price'],
      'sell_price'=>$data['sell_price'],
      'modify'=>$data['modify']);
		$this->db->update('tbl_products',$data);
		$query = $this->db->last_query();
	}
      public function change_password($email,$pass)
      {
        $this->db->where('email',$email);
        $set = array('password'=>$pass);
        $this->db->update('user',$set);
        $query = $this->db->last_query();
        //echo $query; die;
      }

      public function categories_status($id)
      {
        $row = $this->fetch_categories($id);
        foreach($row as $r)
        {       
          $status =  $row->status;
        }
          if($status == 0)
          {
            $this->db->where('id_', $id);
            $set = array('status'=>'1');
            $this->db->update('categries',$set);
            $query= $this->db->last_query();
          }else{
            $this->db->where('id_', $id);
            $set = array('status'=>'0');
            $this->db->update('categries',$set);
            $query= $this->db->last_query();
          } 

      }
      
      public function fetch_products_status($id)
      {
        $query = $this->db->get_where('tbl_products',array("id"=>$id));
        $data=$query->row();
        return $data;
      }
      
      public function products_status($id)
      {
        $row = $this->fetch_products_status($id);
        foreach($row as $r)
        { 

          $status =  $row->status;
          //echo $status; die;
        }
          if($status == 0)
          {
            $this->db->where('id', $id);
            $set = array('status'=>'1');
            $this->db->update('tbl_products',$set);
            $query= $this->db->last_query();
          }else{
            $this->db->where('id', $id);
            $set = array('status'=>'0');
            $this->db->update('tbl_products',$set);
            $query= $this->db->last_query();
          } 

      }

      public function fetch_products_features($id)
      {
        $query = $this->db->get_where('tbl_products',array("id"=>$id));
        $data=$query->row();
        return $data;
      }
      

      public function products_features($id)
      {
        $row = $this->fetch_products_features($id);
        foreach($row as $r)
        { 

          $status =  $row->features;
          //echo $status; die;
        }
          if($status == 0)
          {
            $this->db->where('id', $id);
            $set = array('features'=>'1');
            $this->db->update('tbl_products',$set);
            $query= $this->db->last_query();
          }else{
            $this->db->where('id', $id);
            $set = array('features'=>'0');
            $this->db->update('tbl_products',$set);
            $query= $this->db->last_query();
          } 

      }

      public function activate($email)
      {
        $this->db->where('email',$email);
        $set = array('verify_status'=>'active');
        $this->db->update('user',$set);
        $query = $this->db->last_query();
      }


// count records from tables
      function count_categories($search)
      {
        $this->db->select("*");
        $this->db->like('title',$search);
        $query = $this->db->get("categries");
        return $query->num_rows();
      }

      function count_products($search)
      {
        $this->db->select("*");
        $this->db->like('title',$search);
        $query = $this->db->get("tbl_products");
        return $query->num_rows();
      }

      function total_record($limit, $start, $search)
      {
        $this->db->select("*");
        $this->db->from("categries");
        $this->db->like('title',$search);
        $this->db->or_like(array('description'=>$search,'status'=>$search));
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
      }

      function total_products($limit, $start, $search)
      {
        $this->db->select("tbl_products.*");
        $this->db->join('tbl_pro_categories', "tbl_products.id = tbl_pro_categories.product_id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT categries.title) as categories');
        $this->db->join('categries', "tbl_pro_categories.categories_id = categries.id_","LEFT");
        $this->db->join("tbl_pro_tags","tbl_products.id = tbl_pro_tags.product_id");
        $this->db->join('tbl_tags',"tbl_pro_tags.tags_id = tbl_tags.id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags',"LEFT");
        $this->db->group_by('tbl_products.id');
        $this->db->like("tbl_products.title",$search);
        $this->db->or_like(array('tbl_products.description'=>$search,'tbl_products.price'=>$search,'tbl_products.sell_price'=>$search,'tbl_products.created'=>$search,'tbl_products.modify'=>$search));
        $this->db->limit($limit,$start);
        $query = $this->db->get('tbl_products');
        $data = $query->result();
        return $data;
        //echo "<pre>"; print_r($data); die;
       // echo $this->db->last_query();die;
      }

      function count_user()
      {
        $this->db->select("*");
        $this->db->from('user');
        $query = $this->db->get();
        $data['total_user'] = $query->num_rows();

        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('verify_status','active');
        $query1 = $this->db->get();
        $data['active_user'] = $query1->num_rows();

        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('verify_status','inactive');
        $query1 = $this->db->get();
        $data['inactive_user'] = $query1->num_rows();

        return $data;
         
      }

      function count_all($search)
      {
        $this->db->select("*");
        $this->db->like('name',$search);
        $this->db->or_like("lastname",$search);
        $this->db->or_like("email",$search);
        $this->db->or_like("password",$search);
        $this->db->or_like("gender",$search);
        $this->db->or_like("create_date",$search);
        $query = $this->db->get("user");
        return $query->num_rows();
      }


// delete records from tables

      public function del_categories($id)
      {
        if ($this->db->delete("categries", "id=".$id)) { 
            return true; 
         } 
      }

      public function del_products($id)
      { 
        if($this->db->delete("tbl_products",'id='.$id))
        { $this->db->delete("tbl_pro_categories",'product_id='.$id);
          $this->db->delete("tbl_pro_tags",'product_id='.$id);
          return true;
        }
      }

      public function delete($id) 
      { 
         if ($this->db->delete("user", "id=".$id)) { 
            return true; 
         } 
      } 

      public function update_relation_pro($id)
      {
        $this->db->delete("tbl_pro_tags",'product_id='.$id);
        $this->db->delete("tbl_pro_categories",'product_id='.$id);
        return true;
      }
// fetching Data from tables 
      public function customer_signin($email)
      {
        $query = $this->db->get_where('tbl_customer',array("email"=>$email));
        $data=$query->row();
        return $data;
      }
      public function fetch_categories($id)
      {
        $query = $this->db->get_where('categries',array("id_"=>$id));
        $data=$query->row();
        return $data;
      }
      public function all_products($search,$cat,$limit,$start)
      {
        $this->db->select("tbl_products.*");
        //$this->db->where('tbl_products.status','1');
        
        $this->db->join('tbl_pro_categories', "tbl_products.id = tbl_pro_categories.product_id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT categries.title) as categories');
        $this->db->where('categries.id_',$cat);
        $this->db->join('categries', "tbl_pro_categories.categories_id = categries.id_","LEFT");
        $this->db->join("tbl_pro_tags","tbl_products.id = tbl_pro_tags.product_id");
        $this->db->join('tbl_tags',"tbl_pro_tags.tags_id = tbl_tags.id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags',"LEFT");
        $this->db->group_by('tbl_products.id');
        $this->db->like("tbl_products.title",$search);
        $this->db->or_like(array('tbl_products.description'=>$search,'tbl_products.price'=>$search,'tbl_products.sell_price'=>$search,'tbl_products.created'=>$search,'tbl_products.modify'=>$search,));
        $this->db->limit($limit,$start);
        $query = $this->db->get('tbl_products');
        $data = $query->result();
        return $data;
        //echo "<pre>"; print_r($data); die;
       //echo $this->db->last_query();die;
      }
      public function get_products($cat,$min,$max,$search)
      { 
      $sql = "select `tbl_products`.*, GROUP_CONCAT(DISTINCT categries.title) as categories FROM `tbl_products` LEFT JOIN `tbl_pro_categories` ON `tbl_products`.`id` = `tbl_pro_categories`.`product_id` LEFT JOIN `categries` ON `tbl_pro_categories`.`categories_id` = `categries`.`id_` WHERE `categries`.`id_` = '".$cat."' or `sell_price` BETWEEN '".$min."' AND '".$max."' or `tbl_products`.`title` Like '".$search."' or `categries`.`title` like '".$search."' GROUP BY `tbl_products`.`id`"; 

        // $sql = "select `tbl_products`.*, GROUP_CONCAT(DISTINCT categries.title) as categories FROM `tbl_products` LEFT JOIN `tbl_pro_categories` ON `tbl_products`.`id` = `tbl_pro_categories`.`product_id` LEFT JOIN `categries` ON `tbl_pro_categories`.`categories_id` = `categries`.`id_` WHERE `categries`.`id_` = '".$cat."' or `sell_price` BETWEEN '".$min."' AND '".$max."' GROUP BY `tbl_products`.`id` ";
        $query =$this->db->query($sql);
        $data = $query->result();
        return $data;
        //echo "<pre>"; print_r($data); die;
       //echo $this->db->last_query();die;
      }
       public function get_products_search($search,$limit,$start)
      { 
        $this->db->select("tbl_products.*");
        $this->db->join('tbl_pro_categories', "tbl_products.id = tbl_pro_categories.product_id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT categries.title) as categories');
        $this->db->where('categries.title',$search);
        $this->db->or_where('tbl_products.title',$search);
        $this->db->join('categries', "tbl_pro_categories.categories_id = categries.id_","LEFT");
        $this->db->join("tbl_pro_tags","tbl_products.id = tbl_pro_tags.product_id");
        $this->db->join('tbl_tags',"tbl_pro_tags.tags_id = tbl_tags.id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags',"LEFT");
        $this->db->group_by('tbl_products.id');
        
        $this->db->limit($limit,$start);
        $query = $this->db->get('tbl_products');
        $data = $query->result();
        return $data;
        
       //echo $this->db->last_query();die;
      }

      public function get_single_product($id)
      {
         $this->db->select("tbl_products.*");
        $this->db->join('tbl_pro_categories', "tbl_products.id = tbl_pro_categories.product_id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT categries.title) as categories');
        $this->db->join('categries', "tbl_pro_categories.categories_id = categries.id_","LEFT");
        $this->db->join("tbl_pro_tags","tbl_products.id = tbl_pro_tags.product_id");
        $this->db->join('tbl_tags',"tbl_pro_tags.tags_id = tbl_tags.id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags',"LEFT");
        $this->db->group_by('tbl_products.id');
        $this->db->where('tbl_products.id',$id);
        $query = $this->db->get('tbl_products');
        $data = $query->result();
        return $data;
        
        
      }
      public function fetch_products($id)
      {
        
        $this->db->select("tbl_products.*");
        $this->db->where('tbl_products.id',$id);
        $this->db->join('tbl_pro_categories', "tbl_products.id = tbl_pro_categories.product_id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT categries.title) as categories');
        $this->db->select('GROUP_CONCAT(DISTINCT categries.id_) as cat_id');
        $this->db->join('categries', "tbl_pro_categories.categories_id = categries.id_","LEFT");
        $this->db->join("tbl_pro_tags","tbl_products.id = tbl_pro_tags.product_id");
        $this->db->join('tbl_tags',"tbl_pro_tags.tags_id = tbl_tags.id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags',"LEFT");
        $this->db->group_by('tbl_products.id');
        
        $query = $this->db->get('tbl_products');
		return $query->result();
        
      }
	  
	  public function gets_product($id,$quantity)
      {	
        $this->db->select("tbl_products.*");
        $this->db->where('tbl_products.id',$id);
        $this->db->join('tbl_pro_categories', "tbl_products.id = tbl_pro_categories.product_id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT categries.title) as categories');
        $this->db->select('GROUP_CONCAT(DISTINCT categries.id_) as cat_id');
        $this->db->join('categries', "tbl_pro_categories.categories_id = categries.id_","LEFT");
        $this->db->join("tbl_pro_tags","tbl_products.id = tbl_pro_tags.product_id");
        $this->db->join('tbl_tags',"tbl_pro_tags.tags_id = tbl_tags.id","LEFT");
        $this->db->select('GROUP_CONCAT(DISTINCT tbl_tags.title) as tags',"LEFT");
        $this->db->group_by('tbl_products.id');
        $query = $this->db->get('tbl_products');
        $data = $query->row();
        return $data;
		//$output['quantity'] = $quantity;
		//return $output;
      }
		
	  public function item_order($data,$quantity,$customer_id,$i,$payment)
	  {		$shipping_charge = 30;
			$sub_total = $data[$i]->sell_price * $quantity;
			$vat = 	$data[$i]->sell_price*5/100;
			$total = $sub_total + $vat + $shipping_charge;
		   $set = array(
					 'product_id' =>  $data[$i]->id,
					 'customer_id'=>$customer_id,
					 'product_title'=>$data[$i]->title,
					 'product_image'=>$data[$i]->thumb_img,
					 'product_price'=>$data[$i]->sell_price,
					 'quantity'=>$quantity,
					 'sub_total'=>$sub_total,
					 'status'=>'pandding',
					 'vat'=> $vat,
					 'shipping_charge'=>$shipping_charge,
					 'delivery_time'=>date("d.m.Y",strtotime(date("d.m.Y")."+5 day")),
					 'payment_type' =>$payment,
					 'total'=>$total
					);
			$this->db->insert('tbl_order',$set);
	  }
	  public function get_place_order($id)
	  {
		  $this->db->where('customer_id',$id);
		  $data = $this->db->get('tbl_place_order');
		  return $data->row();
	  }
	  public function get_my_order($id)
	  {	
		  $this->db->where('customer_id',$id);
		  $this->db->where('status != ','cancel');
		  $query = $this->db->get('tbl_order');
		  return $query->result();
	  }
	  public function delet_order($id)
	  {
		 $this->db->delete('tbl_order',array('id'=>$id));
	  }
      public function get_tab_pro($cat,$limit,$start)
      { 
        $this->db->select("tbl_products.*");
        $this->db->join('tbl_pro_categories', "tbl_products.id = tbl_pro_categories.product_id","LEFT");
        $this->db->where('categries.title',$cat);
        $this->db->select('GROUP_CONCAT(DISTINCT categries.title) as categories');
        $this->db->select('GROUP_CONCAT(DISTINCT categries.id_) as cat_id');
        $this->db->join('categries', "tbl_pro_categories.categories_id = categries.id_","LEFT");
        $this->db->group_by('tbl_products.id');
        $this->db->limit($limit,$start);
        $query = $this->db->get('tbl_products');
        $data = $query->result();
        return $data;
        //echo $this->db->last_query();die;
      }

      public function fetch_slider()
      {
        $this->db->select("*");
        $this->db->from('slider_setup');
        $this->db->join('slider_image', "slider_setup.image_id = slider_image.id_","LEFT");
        $query = $this->db->get();
        $data = $query->result();
        return $data;
      }
      public function fetch_slider_index()
      {
        $this->db->select("*");
        $this->db->from('slider_setup');
        $this->db->where('status','1');
        $this->db->join('slider_image', "slider_setup.image_id = slider_image.id_","LEFT");
        $query = $this->db->get();
        $data = $query->result();
        return $data;
      }
      public function fetch_categories_items()
      {
        $this->db->select("title,id_");
        $this->db->from('categries');
        $this->db->where('status','1');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
      }

      

      public function update_view($id)
      {
        $query = $this->db->get_where('user',array("id"=>$id));
        $data=$query->result();
        return $data;
      }
      
   function fetch_details($limit, $start, $search,$filter,$sort)
   {
    $email = $this->session->userdata('userData');
   
    $this->db->select("*");
    $this->db->from("user");
    $this->db->where("verify_status","active");
    $this->db->like('name',$search);
    $this->db->or_like(array('lastname'=>$search,'email'=>$search,'email'=>$search,'gender'=>$search,'create_date'=>$search));
    $this->db->order_by($filter,$sort);
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    $data = $query->result();
    return $data;
    //echo $this->db->last_query();
    }

    function get_live($search)
    {
      //echo $search; die;
      $this->db->select("name,email");
      $this->db->from('user');
      $this->db->like('name',$search);
    $this->db->or_like(array('lastname'=>$search,'email'=>$search,'email'=>$search,'gender'=>$search,'create_date'=>$search));
      $query = $this->db->get();
      $data = $query->result();
      return $data;
      //echo $this->db->last_query();
    }
    
    public function fetch_cat()
    {
      $this->db->select("*");
      $query = $this->db->get('tbl_pro_categories');
      $data = $query->result();
      return $data;
    }

    

  public function fetch_get_val()
  { $this->db->select("*");
    $query = $this->db->get('categries');
    $data=$query->result();
    return $data;
  }

  public function get_slider_image($slider)
  {//echo $slider;
    $this->db->select("image_id");
    $this->db->from("slider_setup");
    $this->db->where("slider",$slider);
    $query = $this->db->get();
    $data = $query->result();
    foreach($data as $key)
    {
     $image =  $key->image_id;
    }
    
    $this->db->select("*");
    $this->db->from('slider_image');
    $this->db->where('id_',$image);
    $query = $this->db->get();
    $row = $query->result();

    return $row;


  }

  public function place_order($data)
  {
	  $this->db->select("customer_id");
	  $this->db->where('customer_id',$data['customer_id']);
	  $query = $this->db->get('tbl_place_order');
	  $n = $query->num_rows();
	  if($n == 1)
	  {
		  $this->db->where('customer_id',$data['customer_id']);
		  $set = array(
				'landmark' 	=> $data['landmark'],
				'pin' 		=> $data['pin'],
				'country' 	=> $data['country'],
				'state' 	=> $data['state'],
				'city' 		=> $data['city'],
				'mobile' 	=> $data['mobile'],
				);
		  $this->db->update('tbl_place_order',$set);
	  }else{
		 $this->db->insert('tbl_place_order',$data);
	  }
   }

}


