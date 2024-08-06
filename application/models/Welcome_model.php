<?php
class Welcome_model extends CI_Model {
  public function __construct() {
    // $this->load->database();
  } 
   public function add_data($data)
   {
     $this->db->insert('asset',$data);
      
   }
   public function get_data()
   {
     return $this->db->get('asset')->result_array();
   }
   public function delete_data($id)
   {
     $this->db->where('id',$id);
     $this->db->delete('asset');
   }
   public function update_data($id,$data)
   {
    $this->db->where('id',$id);
    $this->db->update('asset',$data);
   }
   public function demoData($id)
   {
    // $data=array();
    // $data['name']=$this->input->post('name');
    // $data['email']=$this->input->post('email');
    $response=$this->db->get_where('asset',['id'=>'$id']);
    return $response;
   }
   // method for get all users  of cms 
   public function get_user_data()
   {
    $query=$this->db->get('user');
    return $query->result_array();
   }
   // method for add user
   public function add_user_form($data)
   {
     print_r($data);

    $result=$this->db->insert('user',$data);
    return $result;
  
   }
    public function fetch_all_with_catagory()
    {
      $this->db->select('ContentTable.content_id, ContentTable.content_title,catagorytable.catagoryId, catagorytable.catagoryName,ContentTable.content_description');
      $this->db->from('ContentTable');
      $this->db->join('catagorytable', 'ContentTable.catagoryId = catagorytable.catagoryId');
      $query = $this->db->get();
      return $query->result(); 
    }

    public function insert_catagory($data)
    {
        return $this->db->insert('catagorytable', $data);
    }
  public function get_catagory() {
      $query = $this->db->get('categoryTable');
      return $query->result_array();
    }

  public function add_content($data) {
      return $this->db->insert('ContentTable', $data);
  }
  public function delete_content($id)
    {
        // Ensure you have the correct table name and primary key column
        return $this->db->delete('ContentTable', ['content_id' => $id]);
    }
    public function delete_catagory($id)
    {
        // Ensure you have the correct table name and primary key column
        return $this->db->delete('catagorytable', ['catagoryId' => $id]);
    }  
    public function delete_user($id)
    {
      return $this->db->delete('user', ['user_id' => $id]);
    }
    //login model
    public function loginPage($username, $password){
			$query = $this->db->get_where('user', array('username'=>$username, 'password'=>$password));
			return $query->row_array();
		}
 
}
?>