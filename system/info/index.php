
<?php require_once "../../includes.php";
    include_layout('header');
?>
      
<?php if(Session::isLoggedIn()){
    $user = Session::GetAuthenticatedUser(Admin::class);
}
?>
<div class="px-5">
    <?php
        if(isset($_GET['m'])){
            if($_GET['m'] == 'do'){
                alertSuccess('Ok !','The info was successfully deleted  ');
            }else if($_GET['m'] == 'df'){
                alertError('Sorry !','Failed to delete the info ');
            }else if($_GET['m'] == 'uo'){
                alertSuccess('Ok !','The info was updated successfully ');
            }
        }
     ?>
</div>  
<div class="container bg-light p-5">
    <div class=""> 
         <h3>Cemetary Information / Details 
    <a class="btn btn-sm btn-success pull-right" href="<?=route('info_add')?>">
    <?=getIcon('check');?> Add More </a></h3> <hr>
    </div>
    <div class="">
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $x=0; foreach (Info::all() as $info) { $x++;?>
                <tr>
                    <td scope="row"><?=$info->title;?></td>
                    <td><?=$info->info;?></td>
                    <td class="text-center">
    <a class="btn btn-sm btn-warning" href="<?=route('info_mod').'?id='.$info->id;?>"> <?=getIcon('scissors')?> Modify</a>
    <a onclick="return confirm('Are you sure you want to delete ? This is irreversible !!')" class="btn btn-sm btn-danger" href="<?=route('info_del').'?id='.$info->id;?>"> <?=getIcon('trash-o')?> Delete</a>
                    </td>
                </tr>
            <?php } if($x==0){?>
                <tr> <td colspan="3" class="text-center" >
                    <h5>No info was found !<a class="btn btn-sm btn-success ml-3" href="<?=route('info_add')?>">
    <?=getIcon('check');?> Add More </a></h5>
                </td></tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>

<?php include_layout('footer'); ?>