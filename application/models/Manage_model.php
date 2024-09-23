<?php
 class Manage_model extends CI_Model {

    //get DesignationData
public function getDesignationdata($org_id)
 {   
    // Select all columns from the DesignationTable
    $this->db->select("*");
    // Specify the table to query from
    $this->db->from("DesignationTable");
    // Join with OrganisationTable on org_id, using left join
    $this->db->join("OrganisationTable", "OrganisationTable.org_id = DesignationTable.org_id", 'left'); 
    // Add a condition to filter by the provided org_id
    $this->db->where("DesignationTable.org_id", $org_id);
    // Execute the query
    $query = $this->db->get();
    // Return the result as an array
    return $query->result_array();
}
public function getStaffDataByorg($org_id)
    {   $this->db->select("staffTable.*,OfficeTable.office_name,OrganisationTable.org_name,DesignationTable.Designation_name");
        $this->db->from("staffTable");
        $this->db->join("DesignationTable", "staffTable.Designation_id = DesignationTable.Designation_id", 'left');
        $this->db->join("OfficeTable", "staffTable.office_id = OfficeTable.office_id", 'left');

        $this->db->join("OrganisationTable", "staffTable.org_id = OrganisationTable.org_id", 'left');

        // $this->db->where('staffTable.staff_id', $staff_id);
        // $this->db->where('staffTable.office_id', $office_id);

        $this->db->where('staffTable.org_id', $org_id);
        $this->db->where('is_active', 1);
        
        $query = $this->db->get();
        return $query->result_array();
    }
public function getStaffDataByOffice($org_id,$office_id)
    {   $this->db->select("staffTable.*,OfficeTable.office_name,OrganisationTable.org_name,DesignationTable.Designation_name");
        $this->db->from("staffTable");
        $this->db->join("DesignationTable", "staffTable.Designation_id = DesignationTable.Designation_id", 'left');
        $this->db->join("OfficeTable", "staffTable.office_id = OfficeTable.office_id", 'left');

        $this->db->join("OrganisationTable", "staffTable.org_id = OrganisationTable.org_id", 'left');

        // $this->db->where('staffTable.staff_id', $staff_id);
        $this->db->where('staffTable.office_id', $office_id);
        $this->db->where('staffTable.org_id', $org_id);
        $query = $this->db->get();
        return $query->result_array();
    }    
    
    //get Office
// public function getAdminData()
//     {
//         $this->db->select("*,adminTable.staff_id");
//         $this->db->from("adminTable");
//         $this->db->join("staffTable","adminTable.staff_id=staffTable.staff_id",'left');
//         $this->db->join("DesignationTable","staffTable.Designation_id=DesignationTable.Designation_id",'left');
//         $this->db->join("OfficeTable","staffTable.office_id=OfficeTable.office_id",'left');
//         $this->db->join("OrganisationTable","staffTable.org_id=OrganisationTable.org_id",'left');
//         $query=$this->db->get();
//         return $query->result_array();
        
//     }
public function getOfficeDataByOrg($org_id)
 {
    // Select relevant columns
    $this->db->select("OfficeTable.*, OrganisationTable.org_name, OfficeTable.staff_id ,Staff.staff_name" );
    $this->db->from("OfficeTable");
    
    // Join with OrganisationTable and staffTable
    $this->db->join("OrganisationTable", "OrganisationTable.org_id = OfficeTable.org_id", 'left');
    // $this->db->join("staffTable AS creator", "creator.staff_id = OfficeTable.staff_id", 'left');
    $this->db->join("staffTable AS Staff", "Staff.staff_id = OfficeTable.staff_id", 'left');

    
    // Filter by the given org_id
    $this->db->where("OfficeTable.org_id", $org_id);
    
    // Execute the query and get the result
    $query = $this->db->get();
    
    // Return the result as an array
    return $query->result_array();
 }


    // add staff data
public function addStaffData($data)
    {
        return $this->db->insert('staffTable', $data);
    }
    // method for create admin at the time of orgnisation
public function create_admin($admin_data)
    {
        $this->db->insert('staffTable',$admin_data);
        return $this->db->insert_id();
    }
    //get create admin
public function get_create_admin($admin_data)
    {
        
        $query=$this->db->get('staffTable',$admin_data);
        return $query->result_array(); // Return all create admin
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
public function addOrgData($org_data){
    if (!$this->db->insert('OrganisationTable', $org_data)) {
        log_message('error', 'Database insert failed: ' . $this->db->last_query());
    }
       else{
        $this->db->insert('OrganisationTable',$org_data);
        return $this->db->insert_id();
       } 
         
        
    }
        // Method to get organization (company) data
    // public function getOrgData($org_id=NULL) {
        
    //     // Specify the table to query from
        
    //     if ($org_id===NULL){
    //         $query=$this->db->get();
    //         return $query->result_array(); // Return all org
    //     }else {

    //     $query=$this->db->get_where('OrganisationTable',array('org_id'=> $org_id));
    //     return $query->row_array(); // Return single org
    //     }
    // }
    // Method to get company data with CompanyAdmin's email and name
public function getOrgData() {
        $this->db->select('OrganisationTable.org_id, OrganisationTable.org_name, staffTable.staff_email AS AdminEmail, staffTable.staff_name AS AdminName ,OrganisationTable.org_type,OrganisationTable.org_level,OrganisationTable.created_at,OrganisationTable.state_name,OrganisationTable.city_name ,OrganisationTable.staff_id');
        $this->db->from('OrganisationTable');
        $this->db->join('staffTable', 'OrganisationTable.staff_id = staffTable.staff_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    // get data by Org_id
public function getOrgDataById($org_id)
    {
        
        $this->db->where('org_id', $org_id);
        $query = $this->db->get('OrganisationTable');
        return $query->result_array();
        
    }
    //add  addOfficeData
public function addOfficeData($data)
    {
        $this->db->insert('OfficeTable',$data);
        return $this->db->insert_id();
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
    $this->db->where('is_active', 1);
    $query = $this->db->get('staffTable');
    echo (json_encode($query->row()));
    // die();
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
      $this->db->select('ContentTable.content_id, ContentTable.content_title,categoryTable.categoryId, categoryTable.categoryName, ContentTable.filename, ContentTable.content_description,ContentTable.created_at ');
      $this->db->from('ContentTable');
      $this->db->join('categoryTable', 'ContentTable.categoryId = categoryTable.categoryId');
      $query = $this->db->get();
      return $query->result(); 
    }

// get staff data as profile data ifuser is logged in
public function get_profile($user_id)
 {
    // Selecting specific columns if needed. Replace with actual column names.
    $this->db->select('staffTable.*, DesignationTable.Designation_name, OfficeTable.office_name, OrganisationTable.org_name');
    // Specifying the main table
    $this->db->from('staffTable');
    // Performing LEFT JOINs to include related information
    $this->db->join('DesignationTable', 'staffTable.Designation_id = DesignationTable.Designation_id', 'left');
    $this->db->join('OfficeTable', 'staffTable.office_id = OfficeTable.office_id', 'left');
    $this->db->join('OrganisationTable', 'staffTable.org_id = OrganisationTable.org_id', 'left');
    // Adding the WHERE clause to filter by user_id
    $this->db->where('staffTable.staff_id', $user_id);
    // Execute the query
    $query = $this->db->get();
    // Return the result as an array
    return $query->result_array();
 }    
public function updateOfficeData($office_id, $admin_id) {
    // Update office data with admin_id
    $this->db->where('office_id', $office_id);
    $this->db->update('OfficeTable', ['staff_id' => $admin_id]);

 }
 public function updateOrgData($org_id, $admin_id)
 {
    $this->db->where('org_id', $org_id);
    $this->db->update('OrganisationTable', ['staff_id' => $admin_id]);
 }
 public function delorg($org_id)
 {
    $this->db->where('org_id', $org_id);
    $this->db->delete('OrganisationTable');
 }

}