
<?php require_once "../../../includes.php";
    $deceased = Deceased::id(validateFormData($_GET['id']));
    if(!isset($deceased)){
    	redirectPage(route('deceased').'?m=onf');
    }
    if($deceased->delete()){
        redirectPage(route('deceased').'?m=do');
    }else{
         redirectPage(route('deceased').'?m=df');
    }
?>