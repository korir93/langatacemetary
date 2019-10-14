
<?php require_once "../../includes.php";
    include_layout('header');
    $spots = BurialSpot::all();
    $free_spots = BurialSpot::where(['status' => 0]);
    $occupied_spots = BurialSpot::where(['status' => 1]);
    $q = '';
    if(isset($_GET['q'])){
        

            $spots = array();
            $q = $_GET['q'];
            $deceased_people = Deceased::resultSetToModelArray(
                SQLQuery::query("SELECT * FROM deceased WHERE  
                    names LIKE '%$q%' OR description OR owner LIKE '%$q%' OR owner_info LIKE '%$q%'  OR burial_spot LIKE '%$q%'
                    ")); 
            foreach ($deceased_people as $deceased) {
                if($deceased->burial_spot_id != -1){
                    array_push($spots,BurialSpot::id($deceased->burial_spot_id));
                }
            }

    }
?>
      
<?php if(Session::isLoggedIn()){
    $user = Session::GetAuthenticatedUser(Admin::class);
}
?>
<div class="px-5">
    <?php
        if(isset($_GET['m'])){
            if($_GET['m'] == 'do'){
                alertSuccess('Ok !','BurialSpot was successfully deleted  ');
            }else if($_GET['m'] == 'df'){
                alertError('Sorry !','Failed add spot ');
            }else if($_GET['m'] == 'uo'){
                alertSuccess('Ok !','BurialSpot spot was updated successfully ');
            }else if($_GET['m'] == 'as'){
                alertSuccess('Ok !','BurialSpot was added successfully ');
            }else if($_GET['m'] == 'onf'){
                alertError('Sorry !','The BurialSpot was not found !');
            }
        }
     ?>
</div>  
<div class="container bg-light p-5">
    <div class=""> 
         <h3>Cemetary Burial Spots (Free Spots :: <?=count($free_spots);?>)</h3> 
        <hr>
        <form method="get" action="">
            <div class="form-group">
                <input class="" type="text" name="q" value="<?=$q?>" placeholder="Search Here">
                <input type="submit" name="p" value="Search">
            </div>
        </form>

         <hr>
    </div>


    <div class="">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>Deceased</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php $x=0; foreach ($spots as $spot) { $x++;?>
                <tr>
                    <td scope="row"><?=$spot->name;?></td>
                    <td scope="row"><?=$spot->description;?></td>
                    <td><?=$spot->getDeceasedName();?></td>
                    <td><?=$spot->getStatus();?></td>
                </tr>
            <?php } if($x==0){?>
                <tr> <td colspan="6" >
                    <h5>No spot spot was found !<a class="btn btn-sm btn-success ml-3" href="<?=route('spot_add')?>">
    <?=getIcon('user-plus');?> Add BurialSpot </a></h5>
                </td></tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>

<?php include_layout('footer'); ?>