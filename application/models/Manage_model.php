<?php
 class Manage_model extends CI_Model {

    // Get orgnisation data
    public function getOrgData() {
        $query=$this->db->get('OrganisationTable');
        return $query->result_array();
    
    }
    //get DesignationData
    public function getDesignationdata()
    {   
        $this->db->select("*");
        $this->db->from("DesignationTable");
        $this->db->join("OrganisationTable","OrganisationTable.org_id=DesignationTable.org_id",'left');
        $query=$this->db->get();
        return $query->result_array();
        // $query=$this->db->get("DesignationTable");
        // return $query->result_array();
    }
    //get user data
    public function getStaffData($department_id)
    {   
       
        $this->db->select("*");
        $this->db->from("staffTable");
        $this->db->join("DesignationTable","staffTable.Designation_id=DesignationTable.Designation_id",'left');
        $this->db->join("DepartmentTable","staffTable.department_id=DepartmentTable.department_id",'left');
        $this->db->join("OrganisationTable","staffTable.org_id=OrganisationTable.org_id",'left');
        // $this->db->where('DesignationTable.Designation_name', $Designation_name);
        $this->db->where('DepartmentTable.department_id', $department_id);
        $query=$this->db->get();
        return $query->result_array();

    }
    //get Department
    public function getAdminData()
    {
        $this->db->select("*");
        $this->db->from("adminTable");
        $this->db->join("staffTable","adminTable.staff_id=staffTable.staff_id",'left');
        $this->db->join("DesignationTable","staffTable.Designation_id=DesignationTable.Designation_id",'left');
        $this->db->join("DepartmentTable","staffTable.department_id=DepartmentTable.department_id",'left');
        $this->db->join("OrganisationTable","staffTable.org_id=OrganisationTable.org_id",'left');
        $query=$this->db->get();
        return $query->result_array();
        
    }
    public function getDepartmentData()
    {
        $query=$this->db->get('DepartmentTable');
        return $query->result_array();
    }
    // add staff data
    public function addStaffData($data)
    {
        $query=$this->db->insert('staffTable',$data);
        return $query;
    }
    // add designation data
    public function addDesignationData($data)
    {
        $query=$this->db->insert('DesignationTable',$data);
        return $query;
        }

    // delete staff data
    public function delete_record($staff_id) {
        $this->db->where('staff_id', $staff_id);
        $this->db->delete('staffTable');
    }
     
    //  add Organisation data
    public function addOrgData($data){
        $query=$this->db->insert('OrganisationTable',$data);
        return $query;
    }
    //add  addDepartmentData
    public function addDepartmentData($data)
    {
        $query=$this->db->insert('DepartmentTable',$data);
        return $query;
    }
    public function joinData()
    {
        
        $this->db->select("*");
        $this->db->from("OrganisationTable");
        $this->db->join("DesignationTable","OrganisationTable.org_id=DesignationTable.org_id",'left');
        $query=$this->db->get();
        return $query->result_array();


    }
    // login model; 
    public function login($staff_email, $staff_password)
{
    $this->db->where('staff_email', $staff_email);
    $this->db->where('staff_password', $staff_password);
    // $this->db->where('active', 1);
    $query = $this->db->get('staffTable');

    if($query->num_rows() == 1) {
        return $query->row();
    }

    return false;
}
     // add your category
public function getCategory() {
        $query = $this->db->get('categoryTable');
        return $query->result_array();
     }
      // get data of CategoryTable
public function insert_catagory($data)
    {
        return $this->db->insert('categoryTable', $data);
    }
public function delete_category($id)
    {
        // Ensure you have the correct table name and primary key column
        return $this->db->delete('categoryTable', ['categoryId' => $id]);
    } 
    public function add_content($data) {
        return $this->db->insert('ContentTable', $data);
    }
    public function fetch_all_with_catagory()
    {
      $this->db->select('ContentTable.content_id, ContentTable.content_title,categoryTable.categoryId, categoryTable.categoryName,ContentTable.content_description');
      $this->db->from('ContentTable');
      $this->db->join('categoryTable', 'ContentTable.categoryId = categoryTable.categoryId');
      $query = $this->db->get();
      return $query->result(); 
    }
 }
 