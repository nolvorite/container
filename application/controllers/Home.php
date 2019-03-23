<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        require_once("defaultConstructConfig.php");
        $this->load->model('Notes_model', 'notes_model');
        $this->load->model('Content_model', 'content_model');
    }
    
    public function index(){              
        
        $view = (isset($_SESSION['login'])) ? "user" : "guest";

        $loads = [];
        $header = [];


        switch($view){
            case "user":
                $userSession = $this->session->login; 
                $defaultData = "";
                $redirTo = "";
                //$notes = $this->notes_model->notesFromUser($userData['id']);
                $userData = new User_model($userSession['id']);
                $menuData = $this->content_model->getContents("multiple","menu","content_id","ASC");
                switch($userData->loggedDetails()['defaultView']){
                    case "notes":
                        $defaultData = $this->notes_model->notesFromUser($userSession['id']);
                        $redirTo = "#/panel/notes";
                    break;
                }
                //var_dump($userData->loggedDetails());
                $defaultView = $userData->loggedDetails()['defaultView'];
                $header = ['userData' => $userData];
                $data = [ 
                    'main.php' => ['userData' => $userData,'defaultView' => $this->config->item('userContentTemplate')[$defaultView],'defaultData'=> $defaultData, 'menuData' => $menuData]

                    //subarray level 1 has a reference to the each filelist in homeindex, 
                    //subarray level 2 is its references in the view

                ];
            break;

        }

   

        if($this->uri->segment(2) === NULL){ //redirect to last saved state or default view
            //redirect(site_url().$redirTo);
        }

        if(isset($this->config->item("fileList")["homeindex"][$view])){
            for($i = 0; $i < count($this->config->item("fileList")["homeindex"][$view]); $i++){
                $pageData = $this->config->item("fileList")["homeindex"][$view][$i];
                $pageName = is_array($pageData) ? $pageData[0] : $pageData;
                array_push($loads,
                    [

                    $pageName,
                    
                    isset($data[$pageName]) ?

                    $data[$pageName]
                    :
                    []

                    ]);
            }
        }


        $this->base_model->pageRender($view === "user" ? "panel" : "index" ,"defaultAll",$loads,[],$header);
    }  
    
}
