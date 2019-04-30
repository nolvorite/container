<?php
class Tables_model extends MY_DB_Base
{
	protected $primaryKey = 'dbfid';
    public function getColumns(){
    	return $this->hasMany('Db_columns_model',  'dbtid_ref', 'dbfid' );
    }
    public function getData(){
    	return $this->hasMany('Db_columns_model',  'dbf_ref', 'dbfid' );
    }
}
?>