
<?php require_once "includes.php";
// /redirectPage(route('admin'));
include_layout('header');
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=getAppName();?></title>
    <link rel="stylesheet" href="<?=assets_route('css').'bootstrap.css';?>"/>
    <link rel="stylesheet" href="<?=assets_route('css').'font-awesome.min.css';?>"/>
</head>
<body>
    <div class="container">
        <div class="jumbotron bg-white">
            <h3 class="display-4 text-center"><?=getAppName()?></h3>
            <hr>
            <!-- <p class="lead">Jumbo helper text</p> -->
            <?php if(isset($_GET['m'])){
                if($_GET['m'] == 'as'){
                    alertSuccess('Thank your ! ','Your request has been posted successfully ');
                }
            }?>
            <h2 class="text-center" >
                <a class="btn btn-primary" href="<?=route('visitor_request')?>">Place a request</a>
                <a class="btn btn-dark" href="<?=route('diceased_search')?>">Search</a>
            </h2>
            <hr class="my-2">
        </div>
    </div>
</body>
</html>

<?php include_layout('footer'); ?> 
