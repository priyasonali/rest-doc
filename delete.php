<?php
class DeleteProject{
    function __construct($a){
        $this->project = $a['name'];
        $this->key = $a['key'];
    }

    public function delProject(){
        $db = new Database;
        $mysqli = $db->connect();
        if($this->project != null && $this->key != null){
            if($mysqli->query("DELETE FROM project WHERE pkey='$this->key'"))
            {
                $response["status"] = "success"; 
            }
        }else{
            $response["status"] = "failure";
            $response["reason"] = "Parameters can't be empty.";
        }
        $mysqli -> close();
        return json_encode($response, JSON_PRETTY_PRINT);
    }
}

$del = new DeleteProject($_DATA);
echo $del->delProject();
