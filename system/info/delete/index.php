
<?php require_once "../../../includes.php";
    $info = Info::id(validateFormData($_GET['id']));
    if($info->delete()){
        redirectPage(route('info').'?m=do');
    }else{
         redirectPage(route('info').'?m=df');
    }
?>