<?php
class Content_model extends MY_DB_Base
{
    protected $timestamps = true;
    public function getContents($typeOfSearch,$settings1 = null,$settings2 = null,$settings3 = null){
        $contents = [];
        switch($typeOfSearch){
            case "single":

            break;
            case "multiple":
                $settings2 = isset($settings2) ? $settings2 : "content_id";
                $settings3 = isset($settings3) ? $settings3 : "DESC";
                $contents = 
                    isset($settings1) ?

                    $this->find()
                    ->select("*")
                    ->where("content_type",$settings1)
                    ->order_by($settings2,$settings3)
                    ->get()
                    ->result_array()

                    :

                    $this->find()
                    ->select("*")
                    ->get()
                    ->result_array()
                ;
                foreach($contents as $key => $val){
                    foreach($val as $key2 => $val2){
                        if($key2 === "properties"){
                            $contents[$key][$key2] = json_decode($contents[$key][$key2]);
                        }
                    }
                }
            break;
        }
        return $contents;
    }

    public function rules()
    {
        $this->lang->load('error_messages', 'en-US');
        return [
            [
                'field' => 'content_type',
                'rules' => 'required|min_length[15]',
                'errors' => [
                    'required' => $this->lang->line('required'),
                    'min_length' => $this->lang->line('min_length')
                ]
            ],
            [
                'field' => 'content',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => $this->lang->line('required'),
                    'min_length' => $this->lang->line('min_length')
                ]
            ]
        ];
    }

    public function addToContents($typeofContent,$content,$properties = null){

        $postData = [
            "content_type" => $typeofContent,
            "content" => $content,
            "properties" => isset($properties) ? $properties : ""
        ];
        $postAttempt = $this->insert($postData);
    }
}
?>