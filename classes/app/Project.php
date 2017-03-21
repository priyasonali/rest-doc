<?php
namespace app;

class Project{
    function __construct($a){
        $this->project = $a['name'];
        $this->email = $a['email'];
        $this->newproject = $a['new name'];
        $this->key = $a['key'];
        $db = new Database();
        $this->mysqli = $db->connect();  
    }
    public function addData(){
        $pkey = md5(uniqid($this->email, true));
        $mysqli = $this->mysqli;
        if($this->project != null && $this->email != null){
            if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = $mysqli->query("SELECT * FROM project WHERE pname = '$this->project'");
                if(mysqli_num_rows($result)>0){
                    $response =  error\Errorlist::exists();

                } else if($result = $mysqli->query("INSERT INTO project (pname, emailid, pkey) VALUES ('$this->project','$this->email', '$pkey')"))
                {
                    $response["status"] = "success"; 
                    $response["key"] = $pkey;
                    $response["note"] = 'Use the key for future query.';
                }
            }else{
            $response = error\ErrorList::invalidEmail();
            }
        }else{
            $response = error\ErrorList::empty();
        }
        $mysqli -> close();
        return json_encode($response, JSON_PRETTY_PRINT);
    }

    public function upProject(){
        $mysqli = $this->mysqli;
        if($this->newproject != null && $this->key != null && $this->project != null){
            $result = $mysqli->query("SELECT * FROM project WHERE pkey = '$this->key'");
            if(mysqli_num_rows($result)>0){
                if($mysqli->query("UPDATE project SET pname='$this->newproject' WHERE pkey='$this->key' AND pname = '$this->project'"))
                {
                    $response["status"] = "success"; 
                }
            }else{
                $response = error\ErrorList::notExists();
            }
        }else{
            $response = error\ErrorList::empty();
        }
        $mysqli -> close();
        return json_encode($response, JSON_PRETTY_PRINT);
    }

    public function delProject(){
        $mysqli = $this->mysqli;
        if($this->project != null && $this->key != null){
            $result = $mysqli->query("SELECT * FROM project WHERE pkey = '$this->key'");
            if(mysqli_num_rows($result)>0){
                if($mysqli->query("DELETE FROM project WHERE pkey='$this->key'"))
                {
                    $response["status"] = "success"; 
                }
            }else{
                $response = error\ErrorList::notExists();
            }
        }else{
            $response = error\ErrorList::empty();
        }
        $mysqli -> close();
        return json_encode($response, JSON_PRETTY_PRINT);
    }
}