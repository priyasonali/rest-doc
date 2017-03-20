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
            $result = $mysqli->query("SELECT * FROM project WHERE pkey = '$this->key'");
            
            if(mysqli_num_rows($result)>0){
                if($mysqli->query("DELETE FROM project WHERE pkey='$this->key'"))
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

$del = new DeleteProject($_DATA);
echo $del->delProject();
