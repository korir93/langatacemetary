<?php
ob_start();
//get the current file uri
$curr_uri = $_SERVER['REQUEST_URI'];

//echo $curr_uri;
//string query_params  i.e from ?
$pos = strpos($curr_uri, '?');
//echo $pos;
 if($pos !== false){
     $curr_uri = substr($curr_uri, 0,$pos);
 }else{
    $curr_uri = $_SERVER['REQUEST_URI'];
 }

//echo "<br>".$string;
 //echo $curr_uri;
//check if we  are logged in if not redirect users to  login page if they are not already there
if(!(Session::isLoggedIn())   
    && $curr_uri !=  '/cemetary//'
    && $curr_uri !=  '/cemetary/login/'
    && $curr_uri !=  '/cemetary/visitors/request/'
    && $curr_uri !=  '/cemetary/visitors/search/'

){
   redirectPage(route('login'));
   exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=getTitle();?></title>
    <link rel="stylesheet" href="<?=assets_route('css').'font-awesome.min.css'?>">
    <link rel="stylesheet" href="<?=assets_route('css').'bootstrap.css'?>">
    <link rel="stylesheet" href="<?=assets_route('css').'simple-sidebar.css'?>">
    <link rel="stylesheet" href="<?=assets_route('css').'app.css'?>">
    <link rel="stylesheet" href="<?=assets_route('timepicker').'tempusdominus-bootstrap-4.min.css'?>" />
  
    <link rel="icon" href="<?=assets_route('icons').'ic.png'?>"   type="image/x-icon">
</head>
<body id="body" >
    
    <nav class="navbar navbar-expand-md navbar-dark bg-dark   sticky-top">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="<?=route('root');?>">
                
                <?=getAppName()?>
            </a>
            <button class="navbar-toggler hidden-lg-up float-left" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
           

            
            <div class="collapse navbar-collapse" id="collapsibleNavId">


                <ul class="navbar-nav m-auto text-dark">
                    <?php
                    if(Session::isLoggedIn()){ 
                       ?>
                            
            <li  class="nav-item"> <a <?=isTab('system');?> href="<?=route('system');?>" class="nav-link"> System </a> </li>

            <li  class="nav-item"> <a <?=isTab('diceased_search');?> href="<?=route('diceased_search');?>" class="nav-link"> Search </a> </li>

            <li  class="nav-item"> <a <?=isTab('deceased');?> href="<?=route('deceased');?>" class="nav-link"> Deceased </a> </li>
               
            <li  class="nav-item"> <a <?=isTab('spots');?> href="<?=route('spots');?>" class="nav-link"> Burial Spots </a> </li>

            <li  class="nav-item"> <a <?=isTab('staff');?> href="<?=route('staff');?>" class="nav-link"> Staff </a> </li>

            <li  class="nav-item"> <a <?=isTab('requests');?> href="<?=route('requests');?>" class="nav-link"> Requests </a> </li>

            <li  class="nav-item"> <a <?=isTab('info');?> href="<?=route('info');?>" class="nav-link"> Cemetary Info </a> </li>
                          
                    <?php } else { ?>

            <li  class="nav-item"> <a <?=isTab('login');?> href="<?=route('login');?>" class="nav-link"> Login </a> </li>

                    <?php } ?>

                </ul>

                <ul class="navbar-nav ml-auto" style="margin-right:100px;" >
                <?php if(Session::isLoggedIn()){ 
                        $admin = Session::GetAuthenticatedUser(Admin::class);
                    ?>
                        
                    <li class='nav-item dropdown'>
                        <a class='nav-link'  id="acc" href='#' id='dropdownId' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                             <?=getIcon('user').'  Admin '.getIcon('angle-down ');?>
                        </a>
                        <div class='dropdown-menu' id="drop" aria-labelledby='dropdownId'>
                            <a id="log_out" class='dropdown-item' href="<?=route('logout')?>"><?=getIcon('sign-out');?> Log out</a>
                        </div>
                    </li>
                
                <?php } else {?>
                    
                <?php } ?>
                
                 
                </ul>
            </div>



        </div>
    </nav> 
