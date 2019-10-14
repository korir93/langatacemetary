<?php
function customError($errno, $errstr,$error_file,$error_line,$error_context) {
    die(json_encode(['Type'=>'ERROR','Message' => '['.$errno.'] '.$errstr.' in '.$error_file.' on line '.$error_line,'Data'=>null]));
  }
  
  //set error handler
  set_error_handler("customError");
    


    require_once "app/core/config.php";
    require_once "app/core/functions.php";
    require_once "app/core/DBConn.php";
    require_once "app/core/SQLQuery.php";
    require_once "app/core/DBObject.php";
    require_once "app/core/Session.php";
    

    
    function __autoload($class_name){
        
        $pathModels = DOCUMENT_ROOT.'/app/models/'.ucfirst($class_name).'.php';
        
        if(file_exists($pathModels)){
            require_once($pathModels);
        }

    }