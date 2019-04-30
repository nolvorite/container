<?php
class Base_model extends CI_Model {
    public $pageProperties;
    public $defaultTitle;
    public $fileBundles;
    
    public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 

    public function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }       
    
    public function addToRender(&$viewVar,$view,$data = []){
        $viewVar .= $this->load->view($view,$data, TRUE);
    }

    public function pageRender($pageProperty, $bundle, $content = null,$dataForOne = [],$headerData = []){
        $data1 = [];
        $data2 = [];
        $data3 = [];

        if(isset($bundle)){
            switch(gettype($bundle)){
                case "string":
                    switch($bundle){
                        case "defaultAll":
                            $data1['cssFiles'] = $this->fileBundles['defaultAll']['css'];
                            $data1['jsFiles'] = $this->fileBundles['defaultAll']['js'];
                        break;
                    }
                break;
            }
        }

        if(isset($pageProperty)){
            switch(gettype($pageProperty)){
                case "string":
                    if(isset($this->pageProperties[$pageProperty])){
                        $data1['title'] = $this->pageProperties['index']['title'];
                        $data2['label'] = $this->pageProperties['index']['label'];
                    }
                break;
            }
        }

        if(!empty($headerData)){
            foreach($headerData as $key => $headerDataa){
                $data1[$key] = $headerDataa;
            }
        }

        if(isset($content)){
            switch(gettype($content)){
                case "string":
                    $data2['content'] = $this->load->view($content,(isset($dataForOne) && getType($dataForOne) === "array") ? $dataForOne : [], TRUE);
                break;
                case "array":
                    $data2['content'] = "";
                    foreach($content as $contentt){ 
                        switch(gettype($contentt)){ // ["index.php"] vs [["index.php",$data]]
                            case "string":
                                $this->addToRender($data2['content'],$contentt);
                            break;
                            case "array":
                                //$this->userData->defaultView;
                                //['userDefaultView'];

                                $this->addToRender($data2['content'],$contentt[0],$contentt[1]);
                            break;

                        }
                        
                    }
                   
                break;
            }
        }


        $this->load->view('header',$data1);       
        $this->load->view('content.php', $data2);
        $this->load->view('footer',$data3);
    }

    protected function _islocal(){
        return strpos($_SERVER['HTTP_HOST'], 'local');
    }

}
?>