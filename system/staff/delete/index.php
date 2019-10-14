
<?php require_once "../../../includes.php";
    $staff = Staff::id(validateFormData($_GET['id']));
    if($staff->delete()){
        redirectPage(route('staff').'?m=do');
    }else{
         redirectPage(route('staff').'?m=df');
    }
?>