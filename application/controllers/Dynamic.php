<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dynamic extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->lang->load('all_lang.php', 'english');
    }

    public function loaderStatic($content){
        $info = [];
        if(isset($_POST['disp']) && isset($_POST['data'])){
            $postData = isset($this->input->post()["data"]) ? $this->input->post()["data"] : [];
            switch($content){
                case "tableDisplay":
                    $info['view'] = $content;
                    switch($content){
                        case "tableDisplay":
                            if(isset($_SESSION['formsToken'])){
                                $info['type'] = $_POST['disp'];
                                $info['data'] = $_POST['data'];

                                unset($_SESSION['formsToken']);
                                
                            }
                        break;
                    }
                break;
            }
        }
        $this->load->view("dynamic/loaderStatic.php",(object) $info);
    }

    public function loaderDataNeedsLogin($content){
    	if(isset($content) && isset($_SESSION['login'])){
            $this->load->helper("security");
    		$data = [];
            //index 0: name, index 1 contentData, index 2 viewData
	    	switch($content){
                case "forms":
                    $this->load->model('Databases_model','databasesModel');   
                    $this->load->model('Tables_model','tablesModel');   

                    $db = $this->databasesModel->findOne(1);

                    $tables = $db->getTables();

                    $tableData = $tables->get()->result_array();

                    $columns = [];

                    foreach($tableData as $table){
                        $tableData2 = $this->tablesModel->findOne($table['dbfid']);
                        $columnData = $tableData2->getColumns()->where("type !=","choice");
                        $columns[] = $columnData->get()->result_array();
                    }
                    
                    $data = [$content,
                        [
                            'tables' => $tableData,
                            'columns' => $columns,
                            'data' => []
                        ]
                    ];
                    $_SESSION['formsToken'] = "placement";
                    //$this->sesssion->set_userdata("formsToken", "placement");
                break;
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
                case "tableData":
                    if($this->input->post("data") !== null){
                        $getData = $this->security->xss_clean($this->input->post("data"));
                        $content2 = $getData;
                        
                        $data = [$content,$content2];
                    }

                break;
	    	}
            if(!preg_match("#^userDataForController|tableData|dataFetch$#",$content)){
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
                    case "forms":
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