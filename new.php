<?php
class AddSection{
    function __construct($a){
        $this->project = $a['name'];
        $this->email = $a['email'];
    }
    public function addData(){
        $db = new Database;
        $mysqli = $db->connect();
        $pkey = md5(uniqid($this->email, true));
        if($this->project != null && $this->email != null){
            if($result = $mysqli->query("INSERT INTO project (pname, emailid, pkey) VALUES ('$this->project','$this->email', '$pkey')"))
            {
                $response["status"] = "success"; 
                $response["key"] = $pkey;
                $response["note"] = 'Use the key for future query.';
            }
        }else{
            $response["status"] = "failure";
            $response["reason"] = "Parameters can't be empty.";
        }
        $mysqli -> close();
        return json_encode($response, JSON_PRETTY_PRINT);
    }
}

$add = new AddSection($_DATA);
echo $add -> addData();