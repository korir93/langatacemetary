<?php
include_once "includes.php";
include_layout('header');
?>
    <div >
        <div  style="margin:auto" class="container card mcard p-3 mt-3">
        <br>
            <h2 class="text-danger text-center"><?=getIcon('exclamation-triangle');?>   ERROR (404)</h2>
            <hr>
            <h3>Sorry ! The Specified Resource or Page Was Not found</h3>
            <hr>
           
            <h4>The resource is  <h5 class=" text-primary text-underline"><?= $_SERVER['REQUEST_URI'];?></h5> </h4>
            <hr>
        </div>
        <h5 class="text-center mt-3" ><?=$_SERVER['SERVER_SOFTWARE'];?></h5>
    </div>
<?php include_layout('footer');?>
