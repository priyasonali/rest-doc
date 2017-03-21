<?php
namespace app;

class Database {
    public function __construct() {
        $this->db_name = 'rest';
	    $this->db_user = 'admin';
	    $this->db_pass = '12345';
	    $this->db_host = 'localhost';
    }

	public function connect() {
		$mysqli = new \mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
        if ($mysqli->connect_error) {
            return FALSE;
        } else {
            return $mysqli;
        }
	}

}