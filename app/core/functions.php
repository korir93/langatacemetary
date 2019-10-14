<?php

/*
    * This methods receives an object or associative array and clean it
    */

function validateFormData($formData)
{
  if (is_array($formData)) {
    $cleanData = array();
    foreach ($formData as $key => $value) {
      if (is_array($value)) {
        $cleanData[$key] = cleanElement($value);
      } else {
        $cleanData[$key] = trim(stripslashes(htmlspecialchars($value)));
      }
    }
    return $cleanData;
  } else {

    return trim(stripslashes(htmlspecialchars($formData)));
  }
}

/*
      * This methods receives an associative array and clean it loops for inner
      */

function cleanElement($element)
{
  $cleanData = array();
  foreach ($element as $key => $value) {
    if (is_array($value)) {
      $cleanData[$key]  = cleanElement($value);
    } else {
      $cleanData[$key] = trim(stripslashes(htmlspecialchars($value)));
    }
  }
  return $cleanData;
}

/*
       *  Returns the current url if no args or creates an appropriate url with args as from root point
       */
function url($ref = null)
{
  //check if server has https otherwise give an http url
  if (isset($_SERVER['HTTPS'])) {
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
  } else {
    $protocol = 'http';
  }
  if ($ref == '/') {
    $ref = '/';
  }
  //check if the function has args if so
  else if (func_num_args() != 0 && $ref != 'root') {
    $ref = '/' . $ref . '/';
  } else  if ($ref == null) {
    $ref = '/';
    $ref =  $_SERVER['REQUEST_URI'];
  } else if ($ref == 'root') {
    $ref = '/';
  }
  //return a well formatted url
  if ($_SERVER['SERVER_NAME'] == 'localhost') {
    //return $protocol . '://' . SERVER_ROOT .$ref ;
  } else {
    // / return $protocol . '://' . $_SERVER['SERVER_NAME'] .$ref ;
  }
  return $protocol . '://' . SERVER_ROOT . $ref;
}
/**
 * URL from routes
 * @param definedroute
 */
function route($route)
{
  return url(ROUTES[$route]);
  //return url(ROUTES[$route]);
}
/**
 * 
 * Route with args
 * @param definedroute
 * @param getParamArgs
 */
/**
 * URL for assets
 */
function assets_route($asset)
{
  return 'http://' . SERVER_ROOT . '/app/assets/' . $asset . '/';
}
function getDeceasedPhoto($photo)
{
  return assets_route('icons/deceased') . $photo;
}
/*
       *  Pass a link argument and the server redirect to it
       */
function getServerRoot()
{
  return 'http://' . SERVER_ROOT;
}
function redirectPage($page = '')
{
  if ($page == '') {
    $page = $_SERVER['REQUEST_URI'];
  }
  header("Location:$page");
  exit;
}

/*
       *  the function returns to us the current subtitle or an approptiote title
       *  for the page/resource the user is currently viewing
       */

function getTitle()
{

  /*
           *  Lets get the current page/request
           */
  $current_uri = $_SERVER['REQUEST_URI'];
  $title       = APP_PREFIX . ' - ';

  //slit url to chunks using / as split char
  $uriArr = explode('/', $current_uri);
  //remove last index of array since it is blank
  array_pop($uriArr);
  //get the last element of new array
  $stitle = end($uriArr);
  if ($stitle == '') {
    $stitle = 'Home';
  }
  $title = strtoupper($title);
  //Converts the first character of each word in a string to uppercase
  $stitle = ucwords($stitle);
  return $title .= $stitle;
}

function isTab($route)
{
  //echo $route;
  $current_uri =  'http://' . SERVER_BASE . $_SERVER['REQUEST_URI'];
  //slit url to chunks using / as split char
  $uriArr = explode('/', $current_uri);
  //remove last index of array since it is blank
  array_pop($uriArr);

  $reqUri =  implode('/', $uriArr);
  // echo $route;
  // echo $reqUri;
  // echo route($route);
  // echo "<br>";
  //  // echo $reqUri;
  // echo $reqUri;
  if (route($route) == $reqUri . '/') {

    echo "style='font-size:15px;color:#ffffff;'";
  }
  //  echo "style='font-size:17px;'";

}
function getAppName()
{
  return APP_NAME;
}
function showError($title, $message)
{
  echo "
          <div class='alert alert-error' role='alert'>
            <strong>$title</strong>$message
          </div>";
}/*
      function showError($message){
        echo "
          <div class='alert alert-success' role='alert'>
            $message
          </div>
          ";
      }*/

function printJson($arr)
{
  echo '<pre>' . json_encode($arr) . '</pre>';
}
function printObject($obj)
{
  echo var_export($obj);
}

function include_layout($layout)
{
  include_once DOCUMENT_ROOT . '/app/layouts/' . $layout . '.php';
}
function getLayout($layout)
{
  return DOCUMENT_ROOT . '/app/layouts/' . $layout . '.php';
}
function include_image($name)
{
  return url('app/assets/icons/') . $name;
}
function passwords_match($raw_password, $hash_password)
{
  return password_verify($raw_password, $hash_password);
}
function createHashPassword($raw_password)
{
  return password_hash($raw_password, PASSWORD_DEFAULT);
}
function friendlyTime($hr)
{
  if ($hr > 12) {
    return ($hr - 12) . ' PM';
  }
  if ($hr == 0) {
    $hr = 12;
  }
  return $hr . ' AM';
}
function activateTab($page)
{
  $current_uri = $_SERVER['REQUEST_URI'];
  if (strpos($current_uri, $page) > 0) {
    return 'active';
  }
  return '';
}
function alert($title = '', $ms, $type = 'dark')
{
  echo "<div class='m-2 alert alert-{$type} alert-dismissible fade show' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      <span class='sr-only'>Close</span>
    </button>
    <strong>{$title}</strong> {$ms}.
  </div>";
}
function alertError($title = null, $ms)
{
  alert($title, $ms, 'danger');
}

function alertSuccess($title = null, $ms)
{
  alert($title, $ms, 'success');
}




function getIcon($icon)
{
  return "<i class='fa fa-{$icon}'></i>";
}
function sendResponse($type, $msg, $data)
{
  echo json_encode(['Type' => $type, 'Message' => $msg, 'Data' => $data]);
}
function sendSuccessResponse($msg, $data = null)
{
  die(json_encode(['Type' => 'SUCCESS', 'Message' => $msg, 'Data' => $data]));
}
function sendWarningResponse($msg, $data = null)
{
  echo json_encode(['Type' => 'warning', 'Message' => $msg, 'Data' => $data]);
}
function sendErrorResponse($msg, $data = null)
{
  die(json_encode(['Type' => 'ERROR', 'Message' => $msg, 'Data' => $data]));
}
