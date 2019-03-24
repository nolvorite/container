<?php
class Databases_model extends MY_DB_Base
{
    public function getTables(){
    	return $this->hasMany('Tables_model', ['dbid' => 'dbid_ref']);
    }
}
?>