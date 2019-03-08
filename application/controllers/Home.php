<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        require_once("defaultConstructConfig.php");
        $this->load->model('Notes_model', 'notes_model');
    }
    
    public function index(){               
        $data = $this->session->userdata; 
        $loads = [
            (!isset($_SESSION['login'])) ? "login.php" : "main.php"
        ];
        $this->base_model->pageRender((!isset($_SESSION['login'])) ? "index" : "panel","defaultAll",$loads);
    }  
    
}
