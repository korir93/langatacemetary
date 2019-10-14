
<?php require_once "../../../includes.php";
    include_layout('header');
    $spots = BurialSpot::where(['status' => 0]);
    $deceased = Deceased::id($_GET['id']);
    if(isset($_GET['spot_id'])){
        $spot = BurialSpot::id($_GET['spot_id']);
        $spot->status = 1;
        
        $deceased->burial_spot_id = $spot->id;
        $deceased->burial_spot = $spot->name; 

       if($spot->update() && $deceased->update()) {
            redirectPage(route('deceased').'?m=dao');
       }else{
            alertError('Sorry ! ','Failed to allocate the slot .'.$SQLQuery::$errorMessage);
       }


    }
?>
      
<?php if(Session::isLoggedIn()){
    $user = Session::GetAuthenticatedUser(Admin::class);
}
?>

<div class="container bg-light p-5">
    <div class=""> 
         <h5>Allocate Burial Spots to </h5>
         <h2 class="text-danger" ><?=$deceased->names;?></h2>
          <hr>
    </div>
    <div class="">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $x=0; foreach ($spots as $spot) { $x++;?>
                <tr>
                    <td scope="row"><?=$spot->name;?></td>
                    <td scope="row"><?=$spot->description;?></td>
                    <td><?=$spot->getStatus();?></td>
                    <td>
    <a class="btn btn-sm btn-primary" href="<?=route('deceased_alloc').'?id='.$deceased->id.'&spot_id='.$spot->id;?>"> <?=getIcon('check')?> Select Spot</a>
                    </td>
                </tr>
            <?php } if($x==0){?>
                <tr> <td colspan="6" >
                    <h5>No free spot's were found !<a class="btn btn-sm btn-success ml-3" href="<?=route('spot_add')?>">
    <?=getIcon('user-plus');?> Add BurialSpot </a></h5>
                </td></tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>

<?php include_layout('footer'); ?>