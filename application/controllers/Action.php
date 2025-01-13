
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('authenticated')) {
            redirect('Management/login');
        }
    }
    
    public function index()
    {
        $data['title'] = "Action";
        
        // $this->load->view('header', $data);
       echo "Welcome to Action";
       echo json_encode($data);
        // $this->load->view('dashboard/index', $data);
        // $this->load->view('footer', $data);
    }
    public function deleteOrg() {
 
        
    }
}
?>
