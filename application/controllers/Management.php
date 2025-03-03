<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management extends CI_Controller
{
public function __construct()
    {
        parent::__construct();
        $this->load->model('Manage_model'); // Load the model
    }
    // 1. Deshborad home page
  
// index page
public function index()
    {
        
        // cheack admin is logged in addStaff
        
        if ($this->session->userdata('desig_level')) {
            // echo $this->session->userdata('desig_leve');
           
            $this->load->view('asset/mainDashboard');
        } else {
            redirect(base_url() . 'Management/login');
        }
        
    }
public function OfficeDashboard($office_id)
    {
        $data['office_id'] = $office_id;  // Pass office_id to view
        // Fetch office details using office_id
        $data['office_name'] = $this->Manage_model->getOfficeName($office_id);
      
          // Pass office_name to the view
        $data['staff_count_off'] = $this->Manage_model->countStaffByOffice($office_id);
        
        $this->load->view('asset/office_dashboard', $data);
    }    
public function mainDashboard()
    {
        // $this->session->userdata('flag') == 3
        $this->load->view('asset/mainDashboard');
    }
    //  private login staff 
private function logged_in()
    {
        if (! $this->session->userdata('authenticated')) {
            redirect(base_url() . 'Management/login');
        }
    }
    //login staff
public function login()
    {
        $data['title'] = "Login";

        // Set validation rules
        $this->form_validation->set_rules('staff_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('staff_password', 'Password', 'required');

        // Set error delimiters for validation messages
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the login view
            $this->load->view('asset/login', $data);
        } else {
            // Validation passed, proceed with login
            $staff_email = $this->input->post('staff_email');
            $staff_password = $this->input->post('staff_password');     
            // Attempt to log in
            $staff = $this->Manage_model->login($staff_email, $staff_password);
            // getOrganisationName($org_id)
             $org_name = $this->Manage_model->getOrganisationName($staff->org_id);
             $office_name = $this->Manage_model->getOfficeName($staff->office_id);
             $designationName = $this->Manage_model->getDesignationName($staff->Designation_id);
            // $designationName = getDesignationName($staff->Designation_id);
            if ($staff) {
                // Successful login
                $staffdata = array(
                    'staff_id' => $staff->staff_id,
                    'staff_name' => $staff->staff_name,
                    'staff_email' => $staff->staff_email,
                    'staff_password' => $staff->staff_password, // This should be avoided; it's better to not store passwords in the session
                    'org_id'=>$staff->org_id,
                    'Designation_id' => $staff->Designation_id,
                    'office_id' => $staff->office_id,
                    'office_name' => $office_name,
                    'org_name'=>$org_name,
                    'Designation_name' => $designationName, // Add the designation name here
                    'desig_level'=>$staff->desig_level,
                    'authenticated' => TRUE,
                    'flag' => false
                ); 
            //    print_r('Print session data at login time '$staffdata);
            //    die();
                // Set session data
                $this->session->set_userdata($staffdata);
              
                // Redirect to management page
                $this->session->set_flashdata('message', 'Login successful.');
                 if ($this->session->userdata('desig_level') )
                //      {
                //         redirect(base_url() . 'Management/mainDashboard');
                //      }
                // elseif ($this->session->userDeshdata('desig_level') ) {
                // $this->load->view('asset/mainDashboard', $staffdata);
                redirect(base_url() . 'Management/mainDashboard');
                // }     
                
            } else {
                // Login failed
                $this->session->set_flashdata('message', 'Invalid email or password.');
                redirect(base_url() . 'Management/login');
            }
        }
    }

    // logout here
public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'Management/login');
    }
    
    //1.1 add Organisation data
public function addOrg()
    {
        $this->form_validation->set_rules('org_name', 'Organization Name', 'required');
        $this->form_validation->set_rules('org_type', 'Organization Type', 'required');
        $this->form_validation->set_rules('org_level', 'Organization Level', 'required');
        // $this->form_validation->set_rules('state_name', 'State Name', 'required');
        // $this->form_validation->set_rules('city_name', 'City Name', 'required');
        // $this->form_validation->set_rules('created_at', 'Created at', 'required');
        
        if (!$this->form_validation->run()) {
            $data['validation_errors'] = validation_errors(); // Store validation errors
            // Fetch all states from the statesTable
            $data['states'] = $this->db->get('statesTable')->result_array();
            
            // Loop through each state
            foreach ($data['states'] as $state) {
            
                $state_id = $state['state_id']; // Make sure 'state_id' is the correct column name
            
                // Display the state_id (or use it as needed)
               
                
                // Fetch cities associated with the current state_id
                $data['cities'] = $this->db->get_where('citiesTable', array('state_id' => $state_id))->result_array();
                
            }
            // Check if user is an OrganisationAdmin
            if ($this->session->userdata('desig_level') == 1) {
                $this->load->view('asset/addOrg',$data);
            } else {
                redirect(base_url() . 'Management/login');
            }
        } else {
            // Fetch the state_name using the state_id
        $state_id = $this->input->post('states'); // The selected state_id
        $state_data = $this->db->get_where('statesTable', array('state_id' => $state_id))->row();

        // Fetch the city_name using the city_id
        $city_id = $this->input->post('cities');
        $city_data = $this->db->get_where('citiesTable', array('city_id' => $city_id))->row();
            // 1. Create organization
            $org_data = array(
                'org_name' => $this->input->post('org_name'),
                'org_type' => $this->input->post('org_type'),
                'org_level' => $this->input->post('org_level'),
                // 'created_at' => $this->input->post('created_at'),
                'state_name' => $state_data->state_name, // Store state_name instead of state_id
                'city_name' => $city_data->city_name, // Store city_name instead of city_id
                
                // 'created_by' => 1
            );
             
            
            $org_id = $this->Manage_model->addOrgData($org_data);
            if ($org_id) {
                // 2. Create the CompanyAdmin
                $admin_data = array(
                    'staff_name' => $this->input->post('admin_username'),
                    'staff_email' => $this->input->post('admin_email'),
                    'staff_password' => $this->input->post('admin_password'),
                     'Designation_id' => 2,  // Assuming 2 is the ID for CompanyAdmin
                    'desig_level'=>2,
                    'org_id' => $org_id,
                    'office_id' => NULL  // Admin is not tied to a specific office
                );
                $admin_id = $this->Manage_model->create_admin($admin_data);
               
                if ($admin_id) {
                    $data['org_admin_Data'] = array(
                        'org_id' => $org_id,
                        'admin_id' => $admin_id,
                        'admin_data' => $admin_data,
                        'org_data' => $org_data
                    );
                    $this->Manage_model->updateOrgData($org_id, $admin_id);
                    // $data['companies'] = $this->Manage_model->getOrgData();
                    // $data['companies'] = $this->Manage_model->updateOrgData($org_id, $admin_id);
                    
                    $this->session->set_flashdata('message', 'Your organization was added successfully.');
                    // $this->load->view('asset/orgTable', $data);
                    redirect(base_url() . 'Management/getOrg');
                    
                } else {
                    $this->session->set_flashdata('message', 'There was a problem creating the admin.');
                    redirect(base_url() . 'Management/addOrg');
                }
            } else {
                $this->session->set_flashdata('message', 'There was a problem adding the organization.');
                redirect(base_url() . 'Management/addOrg');
            }
        }
    }
// Method to load the view with company data including admin details
public function getOrg() {
       
    $org_id = $this->session->userdata('org_id');
    // Fetch the company data with admin details
    $data['companies'] = $this->Manage_model->getOrgData();
    // print_r($data); // Debugging line
    // Load the view and pass the data
    $this->load->view('asset/orgTable', $data);
}
public function addStaff()
    {   
        $org_id = $this->session->userdata('org_id');
       // First try to get office_id from the session
        $office_id = $this->session->userdata('office_id');
        // If it's not available in the session, fall back to the POST data
        if (!$office_id) {
            $office_id = $this->input->post('office_id');
        }
        $this->form_validation->set_rules('staff_name', 'staff Name', 'required');
        $this->form_validation->set_rules('staff_email', 'staff Email', 'required');
        $this->form_validation->set_rules('staff_password', 'staff Password', 'required');
        $this->form_validation->set_rules('joining_date', 'joining Date', 'required');
        
        // $city_id = $this->input->post('city_id');
        if (! $this->form_validation->run()) {
            
            $data['org_data'] = $this->Manage_model->getOrgDataById($org_id);
            $data['selected_org_id'] = $org_id; // Pass the selected org_id
            $data['Designation_data'] = $this->Manage_model->getDesignationdata($org_id);
            $data['office'] = $this->Manage_model->getOfficeDataByOrg($org_id);
            // Fetch all states from the statesTable
            $data['states'] = $this->db->get('statesTable')->result_array();
            
            // Loop through each state
            foreach ($data['states'] as $state) {
            
                $state_id = $state['state_id']; // Make sure 'state_id' is the correct column name
            
                // Display the state_id (or use it as needed)
               
                
                // Fetch cities associated with the current state_id
                $data['cities'] = $this->db->get_where('citiesTable', array('state_id' => $state_id))->result_array();
                
            }

            // $staff_id = $this->session->userdata('staff_id');
            $desig_level= $this->session->userdata('desig_level');
             // Pass the selected org_id
            $Designation_id = $this->session->userdata('Designation_id');
            if ($this->session->userdata('desig_level')==2 ) 
            {   $data['org_data'] = $this->Manage_model->getOrgData($org_id);
                $data['selected_depart']= $this->session->userdata('office_id');
                $data['selected_org_id']= $this->session->userdata('org_id');
                // print_r($data);

                $this->load->view('asset/addStaff', $data);
            }
            elseif ($this->session->userdata('desig_level')==3) 
            {   $data['org_data'] = $this->Manage_model->getOrgData($org_id);
                $data['selected_depart']= $office_id;
                $data['selected_org_id']= $org_id;
                $this->load->view('asset/addStaff', $data);
            }
             
            else {
                redirect(base_url() . 'Management/login');
            }
            // $this->load->view('asset/addStaff',$data);
            $this->session->set_flashdata('error', validation_errors());
            
        } else {
            // Fetch the state_name using the state_id
        $state_id = $this->input->post('states'); // The selected state_id
        $state_data = $this->db->get_where('statesTable', array('state_id' => $state_id))->row();

        // Fetch the city_name using the city_id
        $city_id = $this->input->post('cities');
        $city_data = $this->db->get_where('citiesTable', array('city_id' => $city_id))->row();

            $data = [
                'staff_name' => $this->input->post('staff_name'),
                'staff_email' => $this->input->post('staff_email'),
                'staff_password' => $this->input->post('staff_password'),
                'joining_date' => $this->input->post('joining_date'),
                'org_id' => $org_id,
                'Designation_id' => $this->input->post('Designation_id'),
                'desig_level'=>4,
                'office_id' =>$office_id,
                'date_of_birth' => $this->input->post('date_of_birth'),
                'salary' => $this->input->post('salary'),
                'city_name' => $city_data->city_name, // Store city_name instead of city_id
                'state_name' => $state_data->state_name, // Store state_name instead of state_id
                'pincode' => $this->input->post('pincode'),
            ];
            print_r($data);
            // die();
            // $staff_data=$this->Manage_model->addStaffData($data);
            if ($this->Manage_model->addStaffData($data)) {

                $this->session->set_flashdata('message', 'Registration successful. You can now login.');

                redirect(base_url() . 'Management/getStaff');
            } else {
                $this->session->set_flashdata('message', 'Registration failed. Please try again.');
            }
        }
    }
  // Add staff based on officeId  
  public function addStaffByOfficeId($office_id)
  {   
      $org_id = $this->session->userdata('org_id');
      
      $this->form_validation->set_rules('staff_name', 'staff Name', 'required');
      $this->form_validation->set_rules('staff_email', 'staff Email', 'required');
      $this->form_validation->set_rules('staff_password', 'staff Password', 'required');
      $this->form_validation->set_rules('joining_date', 'joining Date', 'required');
      
      if (! $this->form_validation->run()) {
          
          $data['org_data'] = $this->Manage_model->getOrgDataById($org_id);
          $data['selected_org_id'] = $org_id; // Pass the selected org_id
          $data['selected_depart'] = $office_id;
          $data['Designation_data'] = $this->Manage_model->getDesignationdata($org_id);
          $data['office'] = $this->Manage_model->getOfficeDataByOrg($org_id);
          $data['states'] = $this->db->get('statesTable')->result_array();
          $data['office_name'] = $this->Manage_model->getOfficeName($office_id);
          

          
          // Loop through each state
          foreach ($data['states'] as $state) {
             $state_id = $state['state_id']; // Make sure 'state_id' is the correct column name
             $data['cities'] = $this->db->get_where('citiesTable', array('state_id' => $state_id))->result_array();   
          }
          $this->load->view('asset/addStaff', $data);
          $this->session->set_flashdata('error', validation_errors());
          
      } else {

          $state_id = $this->input->post('states'); // The selected state_id
          $state_data = $this->db->get_where('statesTable', array('state_id' => $state_id))->row();
          $city_id = $this->input->post('cities');
          $city_data = $this->db->get_where('citiesTable', array('city_id' => $city_id))->row();
          
          $data = [
              'staff_name' => $this->input->post('staff_name'),
              'staff_email' => $this->input->post('staff_email'),
              'staff_password' => $this->input->post('staff_password'),
              'joining_date' => $this->input->post('joining_date'),
              'org_id' => $org_id,
              'Designation_id' => $this->input->post('Designation_id'),
              'desig_level' => 4,
              'office_id' => $office_id,
              'date_of_birth' => $this->input->post('date_of_birth'),
              'salary' => $this->input->post('salary'),
              'city_name' => $city_data->city_name, // Store city_name instead of city_id
              'state_name' => $state_data->state_name, // Store state_name instead of state_id
              'pincode' => $this->input->post('pincode'),
          ];
          echo json_encode($data);
          die();
          if ($this->Manage_model->addStaffData($data)) {
              $this->session->set_flashdata('message', 'Registration successful. You can now login.');
              redirect(base_url() . 'Management/getStaff');
          } else {
              $this->session->set_flashdata('message', 'Registration failed. Please try again.');
          }
      }
  }
  
    // get state`city data while add staff
public function getCities()
    {
        $state_id = $this->input->post('state_id'); // Retrieve the state_id from the AJAX request
        print_r($state_id);
        // echo 'get city call ajax method';
        // Check if state_id is provided
        if ($state_id) {
            // Fetch cities associated with the selected state_id
            $cities = $this->db->get_where('citiesTable', ['state_id' => $state_id])->result_array();
    
            // Prepare the HTML to send back to the view
            $options = '<option value="">Select your City</option>'; // Default option
            foreach ($cities as $city) {
                $options .= '<option value="' . $city['city_id'] . '">' . $city['city_name'] . '</option>';
            }
    
            // Send the response back to the AJAX call
            echo $options;
        } else {
            // In case of an invalid state_id, return a default option
            echo '<option value=""> please Select City</option>';
        }
    }
    

//3.3 get staff   records
public function getStaff($office_id = null)
{
    $staff_id = $this->session->userdata('staff_id');
    $desig_level = $this->session->userdata('desig_level');

    // Ensure the user is logged in
    if (!$staff_id) {
        redirect(base_url() . 'Management/login');  
        return;
    }

    $org_id = $this->session->userdata('org_id');

    // Pass office_id to the view
    $data['office_id'] = $office_id;  
    // Fetch office details using office_id
    $data['office_name'] = $this->Manage_model->getOfficeName($office_id);
   
    if ($office_id !== null) {
        // Fetch staff by office_id
        $data['staffdata'] = $this->Manage_model->getStaffDataByOffice($org_id, $office_id);
    } else {
        // Fetch staff based on desig_level
        if ($desig_level == 2) {   
            $data['staffdata'] = $this->Manage_model->getStaffDataByOrg($org_id);
        } elseif ($desig_level == 3) {
            $office_id = $this->session->userdata('office_id');
            $data['staffdata'] = $this->Manage_model->getStaffDataByOffice($org_id, $office_id);
        } else {
            redirect(base_url() . 'Management/showCategory');
            return;
        }
    }

    // Load the view with office_id
    $this->load->view('asset/staffTable', $data);
}


public function addOffice()
    {    $org_id = $this->session->userdata('org_id');
        $this->form_validation->set_rules('office_name', 'office name', 'required');
    
        // $this->form_validation->set_rules('created_at', 'Date', ');

        if (!$this->form_validation->run()) {
            
            $data['org_data'] = $this->Manage_model->getOrgDataById($org_id);
            $data['selected_org_id'] = $this->session->userdata('org_id'); // Pass the selected org_id
            $data['states'] = $this->db->get('statesTable')->result_array();
            
            // Loop through each state
            foreach ($data['states'] as $state) {
            
                $state_id = $state['state_id']; // Make sure 'state_id' is the correct column name
            
                // Display the state_id (or use it as needed)
               
                
                // Fetch cities associated with the current state_id
                $data['cities'] = $this->db->get_where('citiesTable', array('state_id' => $state_id))->result_array();
                
            }
            $desig_level = $this->session->userdata('desig_level');
            if ($this->session->userdata('desig_level') == 2) {  
                $this->load->view('asset/addOffice', $data);
            } else {
                redirect(base_url() . 'Management/login');
            }

            echo validation_errors();
        } else {
        // Fetch the state_name using the state_id
        $state_id = $this->input->post('states'); // The selected state_id
        $state_data = $this->db->get_where('statesTable', array('state_id' => $state_id))->row();

        // Fetch the city_name using the city_id
        $city_id = $this->input->post('cities');
        $city_data = $this->db->get_where('citiesTable', array('city_id' => $city_id))->row();
        $office_data = [
                
                'office_name' => $this->input->post('office_name'),
                'org_id' => $org_id,
                'city_name' => $city_data->city_name, // Store city_name instead of city_id
                'state_name' => $state_data->state_name, // Store state_name instead of state_id
                // 'created_at' => $this->input->post('created_at'),
                // 'created_by'=>2,
            ];
            $office_id=$this->Manage_model->addOfficeData($office_data);
            if ($office_id) {
                $admin_data = array(
                    'staff_name' => $this->input->post('admin_username'),
                    'staff_email' => $this->input->post('admin_email'),
                    'staff_password' => $this->input->post('admin_password'),
                    'Designation_id' => 3,  // Assuming 2 is the ID for CompanyAdmin
                    'office_id' => $office_id,  // Admin is not tied to a specific office
                    'desig_level'=>3,
                    'org_id' => $org_id,
                );
                $admin_id = $this->Manage_model->create_admin($admin_data);
                if ($admin_id) {
                    // Update officeTabe to office_data
                    
                
                    $data = array(
                        'office_id' => $office_id,
                        'admin_id' => $admin_id,
                        'admin_data' => $admin_data,
                        'office_data' => $office_data
                    );
                    $this->Manage_model->updateOfficeData($office_id, $admin_id);
                    // $data['office'] = $this->Manage_model->getOfficeDataByOrg($org_id);
                    // print_r($data);
                        $this->session->set_flashdata('message', ' successful office Add .');
                        redirect(base_url() . 'Management/getOffice');
                    } 
                else {
                        $this->session->set_flashdata('message', ' fail office add .');
                        $data['org_data'] = $this->Manage_model->getOrgData();
                        $data['selected_org_id'] = $this->session->userdata('org_id'); // Re-pass the selected org_id
                        $this->load->view('asset/addOffice');
                     }
        }
            else{
                $this->session->set_flashdata('message', 'There was a problem adding the organization.');
                $data['org_data'] = $this->Manage_model->getOrgData();
                $data['selected_org_id'] = $this->session->userdata('org_id'); // Re-pass the selected org_id
                redirect(base_url() . 'Management/addOffice');
            }
        }
    }
        //4.2  get office records
public function getOffice()
        {   $org_id = $this->session->userdata('org_id');
            $data['office'] = $this->Manage_model->getOfficeDataByOrg($org_id);
            $this->load->view('asset/OfficeTable', $data);
        }

public function get_create_admin($admin_data)
    {
        $data['admin_data'] = $this->Manage_model->get_create_admin($admin_data);

        // echo json_encode($data);
        $this->load->view('asset/orgTable', $data);
    }
        //4.1 create office

    //2.1 add Designation data
// public function addDesignation()
//     {   $org_id = $this->session->userdata('org_id');
//         $this->form_validation->set_rules('Designation_name', 'Designation Name', 'required');
//         $this->form_validation->set_rules('desig_level', 'desig Level ', 'required');
//         if (!$this->form_validation->run()) {
//             $data['org_data'] = $this->Manage_model->getOrgData();
//             // echo json_encode($data);
//             $desig_level = $this->session->userdata('desig_level');
//             $staff_id = $this->session->userdata('staff_id');

//             $data['selected_org_id'] = $this->session->userdata('org_id'); // Pass the selected org_id
//             if ($this->session->userdata(('staff_id') )) {
//                 $data['companies'] = $this->Manage_model->getOrgDataBystaffId($staff_id);
                

//                 $this->load->view('asset/addDesignation', $data);
//             } else {
//                 redirect(base_url() . 'Management/login');
//             }
//         } else {
//             $data = [
//                 'Designation_name' => $this->input->post('Designation_name'),
//                 'desig_level' => $this->input->post('desig_level'),
//                 'org_id' => $org_id
//             ];

//             if ($this->Manage_model->addDesignationData($data)) {
//                 $this->session->set_flashdata('message', 'Designation  inserted successfully');
//                 redirect(base_url() . "Management/getDesignation");
//             } else {
//                 $this->session->set_flashdata('message', ' There is any problem to add Designation ');
//                 redirect(base_url() . "Management/addDesignation");
//             }
//         }
//     }


public function addDesignation($office_id = null)
{    
    $org_id = $this->session->userdata('org_id');
    $desig_level = $this->session->userdata('desig_level');
    $staff_id = $this->session->userdata('staff_id');

    // Prioritize office_id from URL, fallback to session
    if ($office_id === null) {
        $office_id = $this->session->userdata('office_id');
    }

    // For desig_level > 2, office_id is mandatory
    if (!$office_id && $desig_level > 2) {
        $this->session->set_flashdata('message', 'Office selection is required.');
        redirect(base_url() . 'Management/login');
        return;
    }
    $data['office_name'] = $this->Manage_model->getOfficeName($office_id);
    $this->form_validation->set_rules('Designation_name', 'Designation Name', 'required');
    $this->form_validation->set_rules('desig_level', 'Designation Level', 'required');

    if (!$this->form_validation->run()) {
        $data['org_data'] = $this->Manage_model->getOrgData();
        $data['selected_org_id'] = $org_id;
        $data['office_id'] = $office_id; // Pass office_id to the view

        if ($staff_id) {
            $data['companies'] = $this->Manage_model->getOrgDataBystaffId($staff_id);
            $this->load->view('asset/addDesignation', $data);
        } else {
            redirect(base_url() . 'Management/login');
        }
    } else {
        $submitted_desig_level = $this->input->post('desig_level');

        // Ensure submitted desig_level is valid
        if ($submitted_desig_level <= $desig_level || $submitted_desig_level > 4) {
            $this->session->set_flashdata('message', 'Invalid designation level selected.');
            redirect(base_url() . "Management/addDesignation");
            return;
        }

        // Get office_id from form submission
        $submitted_office_id = $this->input->post('office_id');

        // If desig_level = 2, allow office_id to be NULL or from form
        if ($desig_level == 2) {
            $final_office_id = $submitted_office_id ?: null;  // Allow NULL
        } else {
            // For desig_level > 2, office_id is mandatory
            $final_office_id = $submitted_office_id ?: $office_id;
            if (!$final_office_id) {
                $this->session->set_flashdata('message', 'Office ID is required for this designation level.');
                redirect(base_url() . "Management/addDesignation");
                return;
            }
        }

        $data = [
            'Designation_name' => $this->input->post('Designation_name'),
            'desig_level' => $submitted_desig_level,
            'org_id' => $org_id,
            'office_id' => $final_office_id  // Store either office_id or NULL
        ];

        if ($this->Manage_model->addDesignationData($data)) {
            $this->session->set_flashdata('message', 'Designation inserted successfully');

            // Redirect based on whether office_id is set
            if ($final_office_id) {
                redirect(base_url() . "Management/getDesignationByOffice/" . $final_office_id);
            } else {
                redirect(base_url() . "Management/getDesignation");
            }
        } else {
            $this->session->set_flashdata('message', 'There was a problem adding the designation');
            redirect(base_url() . "Management/addDesignation");
        }
    }
}

    //2.2 get DesignationTable
public function getDesignation()
    {   $org_id = $this->session->userdata('org_id');
        $staff_id = $this->session->userdata('staff_id');
        $data['Designation_data'] = $this->Manage_model->getDesignationdata($org_id);
        // echo json_encode($data);
        $data['companies'] = $this->Manage_model->getOrgDataBystaffId($staff_id);
        $data['office_name'] = $this->Manage_model->getOfficeName($office_id);
        $this->load->view('asset/DesignationTable', $data);
        
    }
    // Working Area
public function addDesignationByOfficeId($office_id)
    {   
        $org_id = $this->session->userdata('org_id');
        $desig_level = $this->session->userdata('desig_level'); // Get session desig_level
        $staff_id = $this->session->userdata('staff_id');

        $this->form_validation->set_rules('Designation_name', 'Designation Name', 'required');
        $this->form_validation->set_rules('desig_level', 'Designation Level', 'required');

        if (!$this->form_validation->run()) {
            $data['org_data'] = $this->Manage_model->getOrgData();
            $data['selected_org_id'] = $org_id; // Pass the selected org_id
            $data['selected_depart'] = $office_id;
            $data['office'] = $this->Manage_model->getOfficeDataByOrg($org_id);

            if ($staff_id) {
                $data['companies'] = $this->Manage_model->getOrgDataBystaffId($staff_id);
                $this->load->view('asset/addDesignation', $data);
            } else {
                redirect(base_url() . 'Management/login');
            }
        } else {
            // Get the submitted designation level
            $submitted_desig_level = $this->input->post('desig_level');

            // Ensure the submitted level is within the valid range
            if ($submitted_desig_level <= $desig_level || $submitted_desig_level > 4) {
                $this->session->set_flashdata('message', 'Invalid designation level selected.');
                redirect(base_url() . "Management/addDesignation");
                return;
            }
          
            $data = [
                'Designation_name' => $this->input->post('Designation_name'),
                'desig_level' => $submitted_desig_level,
                'org_id' => $org_id,
                'office_id' => $office_id
            ];
            $data['office_name'] = $this->Manage_model->getOfficeName($office_id);

            if ($this->Manage_model->addDesignationData($data)) {
                $this->session->set_flashdata('message', 'Designation inserted successfully');
                redirect(base_url() . "Management/getDesignation");
            } else {
                $this->session->set_flashdata('message', 'There was a problem adding the designation');
                redirect(base_url() . "Management/addDesignation");
            }
        }
        
    }    
public function getDesignationByOffice($office_id = null)
    {
        // Prioritize office_id from URL, fallback to session
        if ($office_id === null) {
            $office_id = $this->session->userdata('office_id');
        }
        $data['office_id'] = $office_id;
        
        // Fetch office details using office_id
        $data['office_name'] = $this->Manage_model->getOfficeName($office_id);
        $staff_id = $this->session->userdata('staff_id');
        // Get Designation Data
        $Designation_data = $this->Manage_model->getDesignationByOffice($office_id);
        $data['Designation_data'] = $Designation_data;
    
        // Count the number of records
        $result_count = count($Designation_data);
        // Load organization data and view (Only reachable if debugging is removed)
        $data['companies'] = $this->Manage_model->getOrgDataBystaffId($staff_id);
        $this->load->view('asset/DesignationTable', $data);
    }
    
// method for add Catagory
public function addCategory($office_id = null)
{   
    echo 'office_id',$office_id;
    // Retrieve organization ID from session
    $org_id = $this->session->userdata('org_id');

    // Check if office_id is coming from URL; otherwise, get it from session
    if ($office_id === null) {
        $office_id = $this->session->userdata('office_id');
    }

    // Ensure office_id is available
    if (!$office_id) {
        $this->session->set_flashdata('message', 'Invalid office selected.');
        redirect(base_url() . 'Management/login'); // Redirect if office_id is missing
        return;
    }

    // Set validation rules
    $this->form_validation->set_rules('categoryName', 'Category Name', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Load the form again with errors
        $data['validation_errors'] = validation_errors();
        $this->load->view('asset/category', $data);
    } else {
        // Prepare data for insertion, including office_id
        $data = [
            'categoryName' => $this->input->post('categoryName'),
            'office_id' => $office_id,  // Ensure office_id is stored with category
            'org_id' => $org_id         // Associate category with the organization
        ];

        // Insert data into database
        if ($this->Manage_model->insert_category($data)) {
            // Redirect to show category page
            $this->session->set_flashdata('message', 'Successfully inserted data');
            redirect(base_url() . 'Management/addCategory/' . $office_id);
        } else {
            // Show error message
            $data['db_error'] = "Error in inserting data";
            $this->session->set_flashdata('message', 'Failed to insert data');
            $this->load->view('asset/category', $data);
        }
    }
}

    // method for show catagory
public function showCategory($office_id = null)
    {
        // Retrieve office_id from session if not provided in URL
        if ($office_id === null) {
            $office_id = $this->session->userdata('office_id');
        }
    
        // Ensure office_id is available
        if (!$office_id) {
            $this->session->set_flashdata('message', 'Invalid office selected.');
            redirect(base_url() . 'Management/login'); // Redirect if office_id is missing
            return;
        }
        $data['office_id'] = $office_id;
        // Fetch categories filtered by office_id
        $data['category'] = $this->Manage_model->getCategoryByOffice($office_id);
    
        // Load the view with filtered categories
        $this->load->view('asset/show_catagory', $data);
    }
    
    // method for delete catagory
public function delete_category($id)
    {
        if ($this->Manage_model->delete_category($id)) {

            $this->session->set_flashdata('success', 'Content deleted successfully!');
        } else {

            $this->session->set_flashdata('error', 'Failed to delete content.');
        }
        redirect(base_url('Management/showcategory'));
    }


public function content_add_form()
    {
        // Load the file upload library
        $this->load->library('upload');

        // Set validation rules
        $this->form_validation->set_rules('content_title', 'Content Title', 'required');
        $this->form_validation->set_rules('categoryId', 'Category ID');
        $this->form_validation->set_rules('content_description', 'Content Description');
        $this->form_validation->set_rules('book_type', 'book_type');
        $this->form_validation->set_rules('ISBN', 'ISBN Number');
        $this->form_validation->set_rules('num_of_pages', 'Number of Pages');
        $this->form_validation->set_rules('genre', 'Content Genretion');
        // Get selected file type from form
        $selected_type = $this->input->post('image_type');  
        // Allowed extensions mapping
        $allowed_extensions = [
            'png'  => 'png',
            'jpg'  => 'jpg|jpeg',
            'gif'  => 'gif',
            'pdf'  => 'pdf',
            'txt'  => 'txt',
            'mp4'  => 'mp4',
            'mov'  => 'mov',
            'avi'  => 'avi',
            'apk'  => 'apk'
        ];
        // Validate file type
        // if (!array_key_exists($selected_type, $allowed_extensions)) {
        //         $this->session->set_flashdata('error', 'Invalid file type selected.');
        //         redirect(base_url() . 'Management/content_add_form');
        //     }
        if (!$this->form_validation->run()) {
            
            // die();
            $data['category'] = $this->Manage_model->getCategory();
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('asset/addContent', $data);
        } else {
            // File upload configuration
            $config['upload_path']   = './uploads/';  // Folder where files will be saved
            // $config['allowed_types'] = 'gif|jpg|png|pdf|txt';  
            $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|txt|mp4|mov|avi|apk';  // Allowed file types
            $config['max_size']      = 30000;  // Max file size in kilobytes (2MB) 30MB
            $config['encrypt_name']  = TRUE;  // Encrypt the file name to prevent overwriting

            $this->upload->initialize($config);

            // Perform file upload
            if ($this->upload->do_upload('userfile')) {
                // Get the uploaded file data
                $file_data = $this->upload->data();
                $file_name = $file_data['file_name'];
            } else {
                // Handle upload errors
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $data['category'] = $this->Manage_model->getCategory();
                $this->load->view('asset/addContent', $data);
                return;
            }
            // Get the staff_id from session
              $staff_id = $this->session->userdata('staff_id');
              $office_id = $this->session->userdata('office_id');
              $org_id = $this->session->userdata('org_id');

            // Prepare data for insertion
            $data = [
                'content_title'       => $this->input->post('content_title'),
                'categoryId'          => $this->input->post('categoryId'),
                'content_description' => $this->input->post('content_description'),
                'book_type'           => $this->input->post('book_type'),
                'ISBN'               => $this->input->post('ISBN'),
                'num_of_pages'       => $this->input->post('num_of_pages'),
                'genre'              => $this->input->post('genre'),
                'filename'            => $file_name,  // Save the filename to the database
                'staff_id'            => $staff_id,    // Add the staff_id to the data
                'org_id'            => $org_id, 
                'office_id'            => $office_id, 
            ];

            if ($this->Manage_model->add_content($data)) {
                // Successfully inserted data
                $this->session->set_flashdata('message', 'Content added successfully!');
                $this->session->set_flashdata('success', 'Content added successfully!');
                // print_r($data);
                // die();
                redirect(base_url() . 'Management/showcontent');
            } else {
                // Error in inserting data
                $this->session->set_flashdata('error', 'Error in inserting data');
                $this->session->set_flashdata('message', 'Failed to insert data');
                redirect(base_url() . 'Management/content_add_form');
            }
        }
    }

    // method for show Resources
public function showcontent()
    {  // Initialize $data array
        $data = array();
        $staff_id = $this->session->userdata('staff_id');
        $office_id = $this->session->userdata('office_id');
        $desig_level = $this->session->userdata('desig_level');
    
        if ($desig_level == 3) {
            $data['contents'] = $this->Manage_model->show_all_contentbyOffice($office_id);
        } 
        elseif ($desig_level == 4) {
            $data['contents'] = $this->Manage_model->show_catentbystaff($staff_id);
        }
    
        $this->load->view('asset/contentTable', $data);
    }
// public function showcontentbyOffice()    // methdd to show content by officeAdmin
    // {  $office_id = $this->session->userdata('office_id');
    //     $data['contents'] = $this->Manage_model->show_all_contentbyOffice($office_id);
    //     $this->load->view('asset/contentTable', $data);
    // }    
        
// delete content
public function delete_content($id)
    {

        if ($this->Manage_model->delete_content($id)) {

            $this->session->set_flashdata('success', 'Content deleted successfully!');
        } else {

            $this->session->set_flashdata('error', 'Failed to delete content.');
        }
        redirect(base_url('Management/showcontent'));
    }

public function profile()
    {
        $user_id = $this->session->userdata('staff_id');
        $data['profile'] = $this->Manage_model->get_profile($user_id);
        $this->load->view('asset/profile', $data);
    }
public function user_info($user_id)
    {
        // $user_id = $this->session->userdata('staff_id');
        $data['profile'] = $this->Manage_model->get_profile($user_id);
        $this->load->view('asset/profile', $data);
    }    
    // Select nested options    
public function delOrg($org_id)
    {
        if ($this->Manage_model->delorg($org_id)) {

            $this->session->set_flashdata('success', 'Content deleted successfully!');
        } else {

            $this->session->set_flashdata('error', 'Failed to delete content.');
        }
        redirect(base_url('Management/getOrg'));
    }    


public function delOffice($office_id)
    {
        if ($this->Manage_model->delOffice($office_id)) {
                                                  
            $this->session->set_flashdata('success', 'Content deleted successfully!');
        } else {

            $this->session->set_flashdata('error', 'Failed to delete content.');
        }
        redirect(base_url('Management/getOffice'));
    }  
public function delStaff($staff_id)
    {
        if ($this->Manage_model->delStaff($staff_id)) {

            $this->session->set_flashdata('success', 'Content deleted successfully!');
        } else {

            $this->session->set_flashdata('error', 'Failed to delete content.');
        }
        // redirect(base_url('Management/getStaff'));
        redirect($_SERVER['HTTP_REFERER']);
    }  
    

public function delDesig($Designation_id)
    {
        if ($this->Manage_model->delDesig($Designation_id)) {

            $this->session->set_flashdata('success', 'Designation deleted successfully!');
        } else {

            $this->session->set_flashdata('error', 'Failed to delete Designation.');
        }
        // Redirect to the same page (previous URL
        redirect($_SERVER['HTTP_REFERER']);
        // redirect(base_url('Management/getDesignation'));
     
    }  
    
}
