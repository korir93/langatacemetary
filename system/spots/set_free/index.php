
<?php require_once "../../../includes.php";
    include_layout('header');
    $spot = BurialSpot::id($_GET['id']);
    $spot->status = 0;
    if($spot->update()){
        redirectPage(route($_GET['b']).'?id='.$spot->id.'&m=fs');
    } else {
        redirectPage(route($_GET['b']).'?id='.$spot->id.'&m=ff');
    }?>
?>
