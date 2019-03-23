<?php
class Notes_model extends MY_DB_Base
{
    public function notesFromUser($userId,$page = null){
    	$page = isset($page) ? intval($page) : 0;
    	$noteSpan = [$page,($page+1)*25]; //25 pages per
    	$notes = $this->find()
    		->select("*")
    		->where("note_by",$userId)
    		->limit($noteSpan[0],$noteSpan[1]) 
    		->order_by("note_id","DESC")
    		->get()
    		->result_array()
    	;
    	return $notes;
    }
}
?>