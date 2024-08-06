<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {
    public function __construct() {
        parent::__construct();  
        $this->load->model('Manage_model'); // Load the model
    }
// 1. Deshborad home page
    public function home() {
        
    }
// index page
    public function index()
    {
        // cheack admin is logged in addStaff
        $data['admindata']=$this->Manage_model->getAdminData();
        $this->load->view('asset/index copy',$data); 
        // $this->load->view('asset/sidebar');   
    }
//1.1 add Organisation data
public function addOrg()
{

    $this->form_validation->set_rules('org_name', 'Organization Name', 'required');
    $this->form_validation->set_rules('org_type', 'Organization Type', 'required');
    $this->form_validation->set_rules('org_level', 'Organization Level', 'required');
    $this->form_validation->set_rules('created_at', 'Created at', 'required');
    $this->form_validation->set_rules('org_location', 'Location', 'required');

    // Check if user is logged in and has permission (staff_id is 0)
    // $staff_id =$this->session->userdata('staff_id');
       
    if (!$this->form_validation->run()) {
        
        if ($this->session->userdata('Designation_id')==111)
            {
                $this->load->view('asset/addOrg');
            }
            else
            {
                redirect(base_url().'Management/login');
            }
        }

    else {
        $data = [
            'org_name' => $this->input->post('org_name'),
            'org_type' => $this->input->post('org_type'),
            'org_level' => $this->input->post('org_level'),
            'created_at' => $this->input->post('created_at'),
            'org_location' => $this->input->post('org_location'),
        ];

        if ($this->Manage_model->addOrgData($data)) {
            $this->session->set_flashdata('message', 'Your organization was added successfully.');
            redirect(base_url().'Management/addOrg');
        } else {
            $this->session->set_flashdata('message', 'There was a problem adding the organization.');
            redirect(base_url().'Management/addOrg'); // Redirecting back to addOrg page on failure might not be ideal; consider handling differently
        }
    }
}

//1.2  Get Organisation data
     
    public function getOrg() {
        $data['org_data'] = $this->Manage_model->getOrgData();
        // echo json_encode($data);
        $this->load->view('asset/orgTable',$data);
    }
     
    //2.1 add Designation data
    public function addDesignation()
    {
        $this->form_validation->set_rules('Designation_name' ,'Designation Name', 'required');
        if (!$this->form_validation->run())
        {
            $data['org_data'] = $this->Manage_model->getOrgData();
            // echo json_encode($data);
            if ($this->session->userdata('staff_id')==1)
            {
                $this->load->view('asset/addDesignation',$data);
            }
            else
            {
                redirect(base_url().'Management/login');
            }
        }
        else
	   {  
		 $data=[
		   'Designation_name'=>$this->input->post('Designation_name'),
		   'org_id' => $this->input->post('org_id')
            ];
		 
		if($this->Manage_model->addDesignationData($data))
		{ 
            $this->session->set_flashdata('message', 'Designation  inserted successfully');
			redirect(base_url()."Management/addDesignation");
            
		}
		else {$this->session->set_flashdata('message', ' There is any problem to add Designation ');
             redirect(base_url()."Management/addDesignation");
        }
    }
    }
    //2.2 get DesignationTable
    public function getDesignation()
    {
        $data['Designation_data']=$this->Manage_model->getDesignationdata();
        // echo json_encode($data);
        $this->load->view('asset/DesignationTable',$data);
    }
     //3.1 add Staff record
     public function addStaff()
     {  
         $this->form_validation->set_rules('staff_name','staff Name','required');
         $this->form_validation->set_rules('staff_email','staff Email','required');
         $this->form_validation->set_rules('staff_password','staff Password','required');
         $this->form_validation->set_rules('joining_date','joining Date','required');
 
         if (! $this->form_validation->run())
         {
             $data['org_data'] = $this->Manage_model->getOrgData();
             $data['Designation_data']=$this->Manage_model->getDesignationdata();
             $data['department']=$this->Manage_model->getDepartmentData();

             $staff_id =$this->session->userdata('staff_id');
             $Designation_id=$this->session->userdata('Designation_id');
             if (! $staff_id)
             {   
                redirect(base_url().'Management/login');
                
             }
             else{
                $this->load->view('asset/addStaff',$data);
             }
             // $this->load->view('asset/addStaff',$data);
             $this->session->set_flashdata('error', validation_errors());
             // echo validation_errors(); 
         }
         else
         {
             $data=[
                 'staff_name'=>$this->input->post('staff_name'),
                 'staff_email'=>$this->input->post('staff_email'),
                 'staff_password'=>$this->input->post('staff_password'),
                 'joining_date'=>$this->input->post('joining_date'),
                 'org_id'=>$this->input->post('org_id'),
                 'Designation_id'=>$this->input->post('Designation_id'),
                 'department_id'=>$this->input->post('department_id'),
                 'date_of_birth'=>$this->input->post('date_of_birth'),
                 'salary'=>$this->input->post('salary'),
                 'address'=>$this->input->post('address'),
                 'state'=>$this->input->post('state'),
                 'pincode'=>$this->input->post('pincode'),
                  ];
             if ($this->Manage_model->addStaffData($data))
             {   
                 $this->session->set_flashdata('message', 'Registration successful. You can now login.');
                 
                 redirect(base_url().'Management/addStaff');
             }     
             else{
                 $this->session->set_flashdata('message', 'Registration failed. Please try again.');
             }     
         }
     }
    //3.2 get staff   records
    public function getStaff()
    {   
            // Check if user is logged in and determine their staff_id
            $staff_id =$this->session->userdata('staff_id');
            $Designation_id=$this->session->userdata('Designation_id');
            // echo $Designation_id;
            if (!$staff_id) {
                 redirect(base_url().'Management/login');  //Redirect to login page if admin is not logged in
            }
            else{
                // Retrieve department from session
            if ($Designation_id==1 || $Designation_id== 0  )
            {
            $department_id = $this->session->userdata('department_id');
            
            $data['staffdata']=$this->Manage_model->getStaffData($department_id);
            // echo json_encode($data);
             $this->load->view('asset/staffTable',$data);
            }
            else
            {
                redirect(base_url().'Management/showCategory');
            } 
            }    
        }
            
 
    //3.3 get staff   records
    public function getAdmin()
    {     //  $staff_id = $this->session->userdata('staff_id');
        
            $data['admindata']=$this->Manage_model->getAdminData();
            // echo json_encode($data);
            // echo json_encode($data);is_admin

            $this->load->view('asset/adminTable',$data);
    }

    //  private login staff 
    private function logged_in()
    {
        if( ! $this->session->userdata('authenticated')){
            redirect(base_url().'Management/login');
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
            
            if ($staff) {
                // Successful login
                $staffdata = array(
                    'staff_id' => $staff->staff_id,
                    'staff_name' => $staff->staff_name,
                    'staff_email' => $staff->staff_email,
                    'staff_password' => $staff->staff_password, // This should be avoided; it's better to not store passwords in the session
                    'Designation_id' => $staff->Designation_id,
                    'department_id' => $staff->department_id,
                    'authenticated' => TRUE
                );
                
                // Set session data
                $this->session->set_userdata($staffdata);
                
                // Redirect to management page
                $this->session->set_flashdata('message', 'Login successful.');
                redirect(base_url() . 'Management/');
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
        redirect(base_url().'Management/');
    }
    //4.1 create Department
public function addDepartment()
    {
        $this->form_validation->set_rules('department_name','Department name','required');
        $this->form_validation->set_rules('department_level','Department level','required');
        $this->form_validation->set_rules('department_location', 'Location','required');
        $this->form_validation->set_rules('created_at', 'Date','required');
       
        if (!$this->form_validation->run())
        {   $data['org_data'] = $this->Manage_model->getOrgData();
            if ($this->session->userdata('staff_id')==1)
            {
                $this->load->view('asset/addDepartment',$data);
            }
            else
            {
                redirect(base_url().'Management/login');
            }
            
            echo validation_errors();
        }
        else
          {
            $data=[
               
                'department_name'=>$this->input->post('department_name'),
                'org_id'=>$this->input->post('org_id'),
                'department_level'=>$this->input->post('department_level'),
                'department_location'=>$this->input->post('department_location'), 
                'created_at'=>$this->input->post('created_at'),
            ];
            if ($this->Manage_model->addDepartmentData($data))
            {   $this->session->set_flashdata('message', ' successful Department Add .');
                redirect(base_url().'Management/addDepartment');

            }
            else{ $this->session->set_flashdata('message', ' fail Department add .');
                  $this->load->view('asset/addDepartment');
            
            }
          }
        
    }
    //4.2  get department records
public function getDepartment()
    {
        $data['department']=$this->Manage_model->getDepartmentData();
        $this->load->view('asset/DepartmentTable',$data);
    }
    
    // Delete staff user record
public function delete_user($staff_id) 
    {
        // Check if admin is logged in with staff_id=1
        if ($this->session->userdata('staff_id') == 1) {
            // Proceed with deleting the user record
            $data['item'] = $this->Manage_model->delete_record($staff_id);
            redirect(base_url().'Management/getStaff'); // Redirect to a list page or wherever you need
        } else {
            // Redirect to the login page or wherever appropriate
            redirect(base_url().'Management/login'); // Assuming 'Auth/login' is your login page route
        }
    }  

     // method for add Catagory
public function addCategory()
   {
	  // Set validation rules
	   $this->form_validation->set_rules('categoryName', 'Catagory Name', 'required');

	   if ($this->form_validation->run() == FALSE)
	   {
		   // Load the form again with errors
		   $data['validation_errors'] = validation_errors();
		   $this->load->view('asset/category', $data);
	   }
	   else
	   {
		   // Prepare data for insertion
		   $data = ['categoryName' => $this->input->post('categoryName')];

		   // Insert data into database
		   if ($this->Manage_model->insert_catagory($data))
		   {
			   // Redirect to show category page
               $this->session->set_flashdata('message', 'Successful to insert data');
			   redirect(base_url() . 'Management/addCategory');
		   }
		   else
		   {
			   // Show error message
			   $data['db_error'] = "Error in inserting data";
               $this->session->set_flashdata('message', 'Failed to insert data');
			   $this->load->view('category',$data);
		   }
	   }
       
   }
      // method for show catagory
public function showCategory()
      {
       // $this->load->view('catagory');
       $data['category']= $this->Manage_model->getCategory();
       // echo(json_encode($data));
       $this->load->view('asset/show_catagory',$data);
   
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
   
   // method for add Resources
//    public function content_add_form()
//    {
//        $this->form_validation->set_rules('content_title', 'Content Title', 'required');
//        $this->form_validation->set_rules('categoryId', 'Category ID');
//        $this->form_validation->set_rules('created_date', 'Created Date', 'required');
//        $this->form_validation->set_rules('content_description', 'Content Description');
   
//        if (!$this->form_validation->run()) {
//            $data['category'] = $this->Manage_model->getCategory();
//            $this->session->set_flashdata('error', validation_errors());
//            $this->load->view('asset/addContent', $data);
//        } elseif (!empty($_FILES['file']['name'])) {
//            // Handle file upload
//            $config['upload_path'] = './uploads/images/';  // Ensure the 'uploads' directory exists
//            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
//            $config['max_size'] = 2048; // 2MB max size
   
//            $this->load->library('upload', $config);
   
//            if (!$this->upload->do_upload('file')) {
//                $data['category'] = $this->Manage_model->getCategory();
//                $this->session->set_flashdata('error', $this->upload->display_errors());
//                $this->load->view('asset/addContent', $data);
//            } else {
//                $upload_data = $this->upload->data();
//                $filename = $upload_data['file_name'];
   
//                $data = [
//                    'content_title' => $this->input->post('content_title'),
//                    'categoryId' => $this->input->post('categoryId'),
//                    'content_description' => $this->input->post('content_description'),
//                    'created_date' => $this->input->post('created_date'),
//                    'filename' => $filename // Include the filename in the data array
//                ];
   
//                if ($this->Manage_model->add_content($data)) {
//                    $this->session->set_flashdata('message', 'Content added successfully!');
//                    $this->session->set_flashdata('success', 'Content added successfully!');
//                    redirect(base_url() . 'Management/showcontent');
//                } else {
//                    $this->session->set_flashdata('error', 'Error in inserting data');
//                    $this->session->set_flashdata('message', 'Failed to insert data');
//                    redirect(base_url() . 'Management/content_add_form');
//                }
//            }
//        } else {
//            // Handle the case where the file is not uploaded
//            $data['category'] = $this->Manage_model->getCategory();
//            $this->session->set_flashdata('error', 'No file uploaded');
//            $this->load->view('asset/addContent', $data);
//        }
//    }
public function content_add_form()
{
    // Set validation rules
    $this->form_validation->set_rules('content_title', 'Content Title', 'required');
    $this->form_validation->set_rules('categoryId', 'Category ID');
    $this->form_validation->set_rules('created_date', 'Created Date', 'required');
    $this->form_validation->set_rules('content_description', 'Content Description');

    // Set upload configuration
    $config['upload_path']   = FCPATH . 'uploads/images/'; // Directory where files will be uploaded
    $config['allowed_types'] = 'gif|jpg|png|pdf|docx'; // Allowed file types
    $config['max_size']      = 2048; // Maximum fil'uploads/images/';// Encrypt the file name to avoid conflicts
    // $config['file_name']=$_FILES['filename']['name'];

    $this->load->library('upload', $config);
    // $this->upload->set_debug(TRUE);

    if (!$this->form_validation->run()) {
        // Validation failed
        $data['category'] = $this->Manage_model->getCategory();
        $this->session->set_flashdata('error', validation_errors());
        $this->load->view('asset/addContent', $data);
    } else {
        if (!$this->upload->do_upload('filename')) {
            // Upload failed
            $data['category'] = $this->Manage_model->getCategory();
            $this->session->set_flashdata('error', $this->upload->display_errors());
            $this->load->view('asset/addContent', $data);
        } else {
            // File uploaded successfully
           
            $upload_data = $this->upload->data();
            $file_path = $upload_data['file_name'];

            // Prepare data for insertion
            $data = [
                'content_title'       => $this->input->post('content_title'),
                'categoryId'          => $this->input->post('categoryId'),
                'content_description' => $this->input->post('content_description'),
                'created_date'        => $this->input->post('created_date'),
                'filename'            => $file_path, // Save the file name to the database
            ];

            if ($this->Manage_model->add_content($data)) {
                // Successfully inserted data
                $this->session->set_flashdata('message', 'Content added successfully!');
                $this->session->set_flashdata('success', 'Content added successfully!');
                redirect(base_url() . 'Management/showcontent');
            } else {
                // Error in inserting data
                $this->session->set_flashdata('error', 'Error in inserting data');
                $this->session->set_flashdata('message', 'Failed to insert data');
                redirect(base_url() . 'Management/content_add_form');
            }
        }
    }
}

 
    
        // method for show Resources
public function showcontent()
       {
        $data['contents']=$this->Manage_model->fetch_all_with_catagory();
        
    
        $this->load->view('asset/contentTable',$data);
       }
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


}