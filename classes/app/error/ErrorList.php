<?php 
namespace app\error;
class ErrorList {
      public function __construct(){
            http_response_code(400);
      }
      public function put(){
            $response["status"] = "failure";
            $response["reason"] = "Can not accept put request.";
            return $response;
      }
      public function post(){
            $response["status"] = "failure";
            $response["reason"] = "Can not accept post request.";
            return $response;
      }
      public function delete(){
            $response["status"] = "failure";
            $response["reason"] = "Can not accept delete request.";
            return $response;
      }
      public function get(){
            $response["status"] = "failure";
            $response["reason"] = "Can not accept get request.";
            return $response;
      }
      public function empty(){
            $response["status"] = "failure";
            $response["reason"] = "Values can not be empty.";
            return $response;
      }
      public function exists(){
            $response["status"] = "failure";
            $response["reason"] = "Project name already exists.";
            return $response;
      }
      public function notExists(){
            $response["status"] = "failure";
            $response["reason"] = "Project does not exists.";
            return $response;
      }
}