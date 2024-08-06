<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.htl
	 */

    //Constructor 
    function __construct() {
        parent::__construct();
    //     // $this->load->helper(array('url','form'));
	// 	// $this->load->library('form_validation');
		$this->load->model('Welcome_model');
	       $this->load->model('Role_model'); // Assume you have a Role_model to fetch roles
    }

	public function index()
	{
		$this->load->view('list');

	}

	public function home()
	{   
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		
        
		if ($this->form_validation->run()==false)
		{  // echo 'Error is here!!!';
			$this->session->set_flashdata('msg','Record not Add!!');

            $this->load->view('createform');
		}
	    else
		{   $data=array(
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email')
			 );
			
			$this->Welcome_model->add_data($data);
			$this->session->set_flashdata('msg','Record Added successfully!!');
			redirect(base_url()."welcome/index");  
			// $this->load->view('list');
		}

	}
	public function list(){
		$data['items']=$this->Welcome_model->get_data();
		print_r(json_encode($data));
		// print_r(items);
		$this->load->view('list',$data);
	}
    public function update_record()
	{
		$id=$this->input->post('Id');
		$data=array(
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email')
		);
		$this->Welcome_model->update_data($id,$data);
		$this->load->view('updateform',['row'=>$data]);

		
	}
	
	// method for show cms deshboard
    public function deshboard()
	{
		$this->load->view('deshboard');
	}
    
	// method for show usertable
	public function showUserTable()
	{
		$data['items']=$this->Welcome_model->get_user_data();
		$this->load->view('userview',$data);
	}
	//add role with user 
	public function add_user_form() {
        $data['roles'] = $this->Role_model->get_all_roles();
        $this->load->view('userform', $data);
    }
    // add user into database 
	public function add_user()

	{ 
		
	 $this->form_validation->set_rules('username','username', 'required');
	 $this->form_validation->set_rules('email','email', 'required|valid_email');
	 $this->form_validation->set_rules('password','password', 'required|min_length[8]');

	 if (!$this->form_validation->run())
	
	 
	{
		$data['roles'] = $this->Role_model->get_all_roles();
		// $this->load->view('header');
        $this->load->view('userform', $data);
		echo validation_errors();
	
	 }
	 else
	 {  
		 $data=[
		'username'=>$this->input->post('username'),
		'password'=>$this->input->post('password'),
		'email'=>$this->input->post('email'),
		'RoleId' => $this->input->post('RoleId')
         ];
		 
		if($this->Welcome_model->add_user_form($data))
		{ 
			redirect(base_url()."welcome/showUserTable");
		}
		else {echo "Error inserting data" ;}
		
	 }    
	}
    
	//  delete_user
	public function delete_user($id)
   {
	   if ($this->Welcome_model->delete_user($id)) {
              
	   	  $this->session->set_flashdata('success', 'User deleted successfully!');
	   } else {
	      
	   	  $this->session->set_flashdata('error', 'Failed to delete user.');
	   }   
	   redirect(base_url('welcome/showUserTable'));
   }

	// method for add Resources
	public function content_add_form()
{
    $this->form_validation->set_rules('content_title', 'Content Title', 'required');
    $this->form_validation->set_rules('catagoryId', 'Category ID');
    $this->form_validation->set_rules('created_date', 'Created Date', 'required');
    $this->form_validation->set_rules('content_description', 'Content Description', 'required');

    if (!$this->form_validation->run()) {
        $data['catagory'] = $this->Welcome_model->get_catagory();
        $this->session->set_flashdata('error', validation_errors());
        $this->load->view('contentForm', $data);
    } else {
        // Handle file upload
        $config['upload_path'] = './uploads/';  // Make sure the 'uploads' directory exists
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
        $config['max_size'] = 2048; // 2MB max size

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('filename')) {
            $data['catagory'] = $this->Welcome_model->get_catagory();
            $this->session->set_flashdata('error', $this->upload->display_errors());
            $this->load->view('contentForm', $data);
        } else {
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];

            $data = [
                'content_title' => $this->input->post('content_title'),
                'catagoryId' => $this->input->post('catagoryId'),
                'content_description' => $this->input->post('content_description'),
                'created_date' => $this->input->post('created_date'),
                'filename' => $filename // Include the filename in the data array
            ];

            if ($this->Welcome_model->add_content($data)) {
                $this->session->set_flashdata('success', 'Content added successfully!');
                redirect(base_url() . 'welcome/showcontent');
            } else {
                $this->session->set_flashdata('error', 'Error in inserting data');
                redirect(base_url() . 'welcome/content_add_form');
            }
        }
    }
}


   

	// method for show Resources
	public function showcontent()
   {
    $data['contents']=$this->Welcome_model->fetch_all_with_catagory();
    $this->load->view('navbar.php');

    $this->load->view('contentData',$data);
   }
   // delete content
   public function delete_content($id)
   {
      
       if ($this->Welcome_model->delete_content($id)) {
           
           $this->session->set_flashdata('success', 'Content deleted successfully!');
       } else {
          
           $this->session->set_flashdata('error', 'Failed to delete content.');
       }   
       redirect(base_url('welcome/showcontent'));
   }
   
  // method for add Catagory
   public function add_catagory()
   {
	   // Set validation rules
	   $this->form_validation->set_rules('catagoryName', 'Catagory Name', 'required');

	   if ($this->form_validation->run() == FALSE)
	   {
		   // Load the form again with errors
		   $data['validation_errors'] = validation_errors();
		   $this->load->view('catagory', $data);
	   }
	   else
	   {
		   // Prepare data for insertion
		   $data = ['catagoryName' => $this->input->post('catagoryName')];

		   // Insert data into database
		   if ($this->Welcome_model->insert_catagory($data))
		   {
			   // Redirect to show category page
			   redirect(base_url() . 'welcome/showcatagory');
		   }
		   else
		   {
			   // Show error message
			   $data['db_error'] = "Error in inserting data";
			   $this->load->view('catagory', $data);
		   }
	   }
   }

   // method for show catagory
   public function showcatagory()
   {
	// $this->load->view('catagory');
	$data['catagory']= $this->Welcome_model->get_catagory();
	// echo(json_encode($data));
	$this->load->view('show_catagory',$data);

   }

   //delete catagory
   public function delete_catagory($id)
   {
	   if ($this->Welcome_model->delete_catagory($id)) {
              
	   	  $this->session->set_flashdata('success', 'Content deleted successfully!');
	   } else {
	      
	   	  $this->session->set_flashdata('error', 'Failed to delete content.');
	   }   
	   redirect(base_url('welcome/showcatagory'));
   }

   // method for login user
   public function loginPage()
    {
	  if($this->input->post())
	  {
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		// call the loginPage method in model
		$result=$this->Welcome_model->loginPage($username,$password);

		//if login success
		if($result){
			$this->session->set_userdata('user_id',$result['user_id']);
			$this->session->set_userdata('username',$result['username']);
			$this->session->set_flashdata('success', 'Data inserted successfully');
			redirect(base_url('welcome/deshboard'));
			}
			else{
				//if login fail
				$this->session->set_flashdata('error', 'Invalid username or password');

		}
	  }
	  $this->load->view('loginPage');
    }   


	// method for logout
	public function logout() {
        // Destroy session data
        $this->session->sess_destroy();
        
        // Redirect to login page
        redirect('welcome/loginPage');
    }

   // method for registration'
   public function registrationPage()
   {
	$this->load->view('registration');
   }



   

}
