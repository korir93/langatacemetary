
<?php require_once "../../includes.php";
    include_layout('header');
    $deceased_people = Deceased::all();
?>
      
<?php if(Session::isLoggedIn()){
    $user = Session::GetAuthenticatedUser(Admin::class);
}
?>
<div class="px-5">
    <?php
        if(isset($_GET['m'])){
            if($_GET['m'] == 'do'){
                alertSuccess('Ok !','Deceased was successfully deleted  ');
            }else if($_GET['m'] == 'df'){
                alertError('Sorry !','Failed add deceased ');
            }else if($_GET['m'] == 'uo'){
                alertSuccess('Ok !','Deceased deceased was updated successfully ');
            }else if($_GET['m'] == 'as'){
                alertSuccess('Ok !','Deceased was added successfully ');
            }else if($_GET['m'] == 'dao'){
                alertSuccess('Ok !','The Deceased has been alocated a spot successfully ');
            }else if($_GET['m'] == 'onf'){
                alertError('Sorry !','The Deceased was not found !');
            }
        }
     ?>
</div>  
<div class="container bg-light p-5">
    <div class=""> 
         <h3>Cemetary Deceased persons (<?=count($deceased_people);?>)
    <a class="btn btn-sm btn-success pull-right" href="<?=route('deceased_add')?>">
    <?=getIcon('plus');?> Add Deceased </a></h3> <hr>
    </div>
    <div style="">
        <table class="table  table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th>Names</th>
                    <th>Desc</th>
                    <th>Owner</th>
                    <th>Burried</th>
                    <th>Burial Spot</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $x=0; foreach ($deceased_people as $deceased) { $x++;?>
                <tr>
                    <td scope="row"><?=$deceased->names;?></td>
                    <td scope="row"><?=$deceased->description;?></td>
                    <td><?=$deceased->owner;?></td>
                    <td><?=$deceased->isBurried();?></td>
                    <td><?=$deceased->burial_spot;?></td>
                    <td class="">
    <a class="btn btn-sm btn-warning" href="<?=route('deceased_mod').'?id='.$deceased->id;?>"> <?=getIcon('scissors')?> Modify</a>
    <a onclick="return confirm('Are you sure you want to delete ? This is irreversible !!')" class="btn btn-sm btn-danger" 
    href="<?=route('deceased_del').'?id='.$deceased->id;?>"> <?=getIcon('trash-o')?> Delete</a>
    <?php if($deceased->burial_spot_id == -1) { ?>
    <a onclick="" class="btn btn-sm btn-primary" 
    href="<?=route('deceased_alloc').'?id='.$deceased->id;?>"> <?=getIcon('plus')?> Allocate Spot</a>
    <?php } ?>
                    </td>
                </tr>
            <?php } if($x==0){?>
                <tr> <td colspan="6" class="text-center">
                    <h5>No deceased persons record was found !<a class="btn btn-sm btn-success ml-3" href="<?=route('deceased_add')?>">
    <?=getIcon('user-plus');?> Add Deceased </a></h5>
                </td></tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>

<?php include_layout('footer'); ?>
<script type="text/javascript">
    $('table').on('scroll', function() {
  $("#" + this.id + " > *").width($(this).width() + $(this).scrollLeft());
});
</script>