<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dynamic extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->lang->load('all_lang.php', 'english');
    }

    public function loaderDataNeedsLogin($content){
    	if(isset($content) && isset($_SESSION['login'])){
    		$data = [];
            //index 0: name, index 1 contentData, index 2 viewData
	    	switch($content){
                
                case "admin":
                    $this->load->model('Content_model', 'content_model', TRUE);
                    $contentData = [];
                    $contentData['menu'] = $this->content_model->getContents("multiple","menu","content_id","ASC");
                    for($i = 0; $i < count($contentData['menu']); $i++){
                        $contentData['menu'][$i]["text"] = $this->lang->line("menu",FALSE)[$contentData['menu'][$i]['content']];
                    }
                    $data = [$content,$contentData];
                break;
	    		case "notes":
	    			$this->load->model('Notes_model', 'notes_model', TRUE);
	    			$data = [$content,$this->notes_model->notesFromUser($_SESSION['login']['id'])];
	    		break;
                case "userDataForController":
                    $this->load->model('User_model', 'user_model', TRUE);
                    $userInfo = $this->user_model->getUserInfo($_SESSION['login']['id'],"dynamic");
                    $data = [$content,$userInfo];
                    $data[1]->redirUrl = $this->config->item('dynamicControllerUrls')[$userInfo->defaultView][0];
                break;
	    	}
            if($content !== "userDataForController"){
                $data[2] = $this->config->item("dynamicControllerUrls")[$content];
            }
	    	$this->load->view("dynamic/loaderData.php",(object) ['data' => $data]);
	    }else{
	    	redirect(site_url());
	    }
    }

    public function loaderStaticNeedsLogin($content){
    	if(isset($content) && isset($_SESSION['login'])){

    		$data = [];

    		if(isset($_POST['disp'])){
    			$postData = isset($this->input->post()["data"]) ? $this->input->post()["data"] : [];
    			switch($_POST['disp']){
                    case "template":
    				case "notes": 
                    case "admin": 
                        $info = ['type' => $this->input->post()['disp'], 'data' => $postData];
                        if($_POST['disp'] === "template"){
                            $info['view'] = $this->input->post()['view'];
                        }
    					$this->load->view("dynamic/loaderStatic.php",(object) $info);
					break;
                    default:
                        echo "";
                    break;
    			}
    		}
    	}else{
	    	redirect(site_url());
	    }
    }
}

?>