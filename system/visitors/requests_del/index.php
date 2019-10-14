
<?php require_once "../../../includes.php";
    $request = VisitorRequest::id(validateFormData($_GET['id']));
    if(!isset($request)){
    	redirectPage(route('requests').'?m=onf');
    }
    if($request->delete()){
        redirectPage(route('requests').'?m=do');
    }else{
         redirectPage(route('requests').'?m=df');
    }
?>