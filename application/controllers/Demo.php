<?php
class Demo extends CI_Controller {

        public function index()
        {       
                $this->load->view('demo/home');
        }

        public function comments()
        {
                echo 'Look at this!';
        }
        
        public function privatePage()
        {
            $this->load->view('demo/privacyPage');
        }
        public function teamCenter()
        {
            $this->load->view('demo/servicePage');
        }
}