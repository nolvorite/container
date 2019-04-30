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
                            }
                        break;
                    }
                break;
            }
        }
        $this->load->view("dynamic/loaderStatic.php",(object) $info);
    }

    public function loaderDataForBits(){
        $db = $this->config->item("database");
        $this->load->helper('security');
        $this->load->model('Base_model','base_model',TRUE);

        $

        $this->db->query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '$db' AND table_name = 'db_columns' AND DATA_TYPE IN('varchar','mediumtext','text')");

        //better set up limits on which tables you can search in the future lol

        echo json_encode($_GET);

    }

    public function loaderDataNeedsLogin($content,$option1 = null){
        $this->load->model('Base_model','base_model',TRUE);
    	if(isset($content) && isset($_SESSION['login'])){
            $this->load->helper("security");
    		$data = [];
            //index 0: name, index 1 contentData, index 2 viewData
	    	switch($content){
                case "users":
                    $this->load->model('Databases_model','databasesModel');  
                    $users = $this->databasesModel->findOne(1)->getUsers()->get()->result_array();
                    $data = ["users",['users' => $users]];
                break;
                
                case "settings":
                    if(isset($option1)){
                        switch($option1){
                            case "general":
                            break;
                            case "personal":
                            break;
                        }
                        $data = ["settings",['type' => $option1, 'data' => []]];
                    }
                break;
                case "forms":
                case "dataFetch":
                    
                    $this->load->model('Databases_model','databasesModel');   
                    $this->load->model('Tables_model','tablesModel');   
                    $db = $this->databasesModel->findOne(1);
                    $tables = $db->getTables();
                    $tableData = $tables->get()->result_array();
                    $columns = [];
                    $dataContent = [];

                    foreach($tableData as $table){
                        $tableData2 = $this->tablesModel->findOne($table['dbfid']);
                        
                        switch($content){
                            case "forms":
                                $columnData = $tableData2->getColumns()->where("type !=","choice");
                                $columns[] = $columnData->get()->result_array();
                            break;
                            case "dataFetch":
                                $dcData = $tableData2->getData();
                                $dataContent[] = $dcData->get()->result_array();
                            break;
                        }
                    }

                    switch($content){
                        case "forms":             
                            $data = [$content,
                                [
                                    'tables' => $tableData,
                                    'columns' => $columns,
                                    'data' => []
                                ]
                            ];
                            if(!isset($_SESSION['formsToken'])) unset($_SESSION['formsToken']);
                            $_SESSION['formsToken'] = "placement";
                        break;
                        case "dataFetch":
                            $data = [$content,
                                [
                                    'contents' => $dataContent
                                ]
                            ];
                        break;
                    }
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

            if(!preg_match("#^userDataForController|tableData|dataFetch|settings$#",$content)){
                $data[2] = $this->config->item("dynamicControllerUrls")[$content];
            }
            switch($content){
                case "settings":
                    $data[2] = $this->config->item("dynamicControllerUrls")[$content.'/'.$option1];
                break;
            }
            $data = $this->base_model->convertToNull($data);
	    	$this->load->view("dynamic/loaderData.php",(object) ['data' => $data]);
	    }else{
	    	redirect(site_url());
	    }
    }

    public function loaderStaticNeedsLogin($content){
    	if(isset($content) && isset($_SESSION['login'])){
    		$data = [];

			$postData = isset($this->input->post()["data"]) ? $this->input->post()["data"] : [];
			switch($content){
                case "template":
				case "notes": 
                case "admin": 
                case "forms":
                case "tableData":
                case "users":
                    $info = ['type' => $this->input->post()['disp'], 'data' => $postData];

                    if($_POST['disp'] === "template"){
                        $info['view'] = $this->input->post()['view'];
                    }
					$this->load->view("dynamic/loaderStatic.php",(object) $info);
				break;
                case "settings":
                    $info = ['type' => 'settings', 'tab' => $this->input->post()['disp'], 'data' => $postData];
                    $this->load->view("dynamic/loaderStatic.php",(object) $info);
                break;
                default:
                    echo "";
                break;
			}
    	}else{
	    	redirect(site_url());
	    }
    }
}

?>