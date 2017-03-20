<?php
class UpdateProject{
    function __construct($a){
        $this->newproject = $a['new name'];
        $this->oldproject = $a['old name'];
        $this->key = $a['key'];
    }

    public function upProject(){
        $db = new Database;
        $mysqli = $db->connect();
        if($this->newproject != null && $this->key != null && $this->oldproject != null){
            $result = $mysqli->query("SELECT * FROM project WHERE pkey = '$this->key'");
            
            if(mysqli_num_rows($result)>0){
                if($mysqli->query("UPDATE project SET pname='$this->newproject' WHERE pkey='$this->key' AND pname = '$this->oldproject'"))
                {
                    $response["status"] = "success"; 
                }
            }else{
             http_response_code(400);
            $response["status"] = "failure";
            $response["reason"] = "No such project exists.";
        }
        }else{
             http_response_code(400);
            $response["status"] = "failure";
            $response["reason"] = "Parameters can't be empty.";
        }
        $mysqli -> close();
        return json_encode($response, JSON_PRETTY_PRINT);
    }
}

$del = new UpdateProject($_DATA);
echo $del->upProject();
