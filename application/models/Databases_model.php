<?php
class Databases_model extends MY_DB_Base
{
	private $dbId = -1;
	protected $primaryKey = 'dbid';
	public function findDb($dbId){
		$this->find()->where('dbid =',$dbId);

		if($this->MY_DB_Base->count() > 0){
			$this->dbId = $dbId;
			return true;
		}		
		return false;
	}
    public function getTables(){
    	return $this->hasMany('Tables_model', 'dbid_ref' , 'dbid');
    }
}
?>