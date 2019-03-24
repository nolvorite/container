<?php
class Tables_model extends MY_DB_Base
{
    public function getColumns(){
    	return $this->hasMany('Db_columns_model', ['dbfid' => 'dbtid_ref']);
    }
    public function getData(){
    	return $this->hasMany('Db_columns_model', ['dbfid' => 'dbf_ref']);
    }
}
?>