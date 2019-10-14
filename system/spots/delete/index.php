
<?php require_once "../../../includes.php";
    $spot = BurialSpot::id(validateFormData($_GET['id']));
    if(!isset($spot)){
    	redirectPage(route('spots').'?m=onf');
    }
    if($spot->delete()){
        redirectPage(route('spots').'?m=do');
    }else{
         redirectPage(route('spots').'?m=df');
    }
?>