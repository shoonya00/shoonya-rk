<?php
class database {
	
	protected $db_con;
	public $DB_TYPE = 'mysql';
	public $DB_HOST = 'localhost';
	public $DB_NAME = 'ratan-kalyan';
	public $DB_USER = 'root';
	public $DB_PASS = 'root*123';
	
	public function connect(){
		try {
			$this->db_con = new PDO($this->DB_TYPE.':host='.$this->DB_HOST.';dbname='.$this->DB_NAME, $this->DB_USER, $this->DB_PASS);
			return $this->db_con;
		}catch (PDOException $e){
			echo 'DATABASE NOT CONNECTED';
			echo $e->getMessage();
		}
	}
}