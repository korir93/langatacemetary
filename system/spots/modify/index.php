
<?php require_once "../../../includes.php";
    include_layout('header');
    $spot = BurialSpot::id($_GET['id']);
    if(isset($_POST['update'])){
        $spot_1 = BurialSpot::instantiate(validateFormData($_POST));
        $spot_1->id = $spot->id;
        if($spot_1->update()){
            redirectPage(route('spots').'?m=uo');
        }else{
            alertError('Sorry ! ',"Failed to save ".SQLQuery::$errorMessage);
        }
    }
?>

<div class="px-5">
    <?php
        if(isset($_GET['m'])){
            if($_GET['m'] == 'fs'){
                alertSuccess('Ok !','The spot has been freed');
            }else if($_GET['m'] == 'ff'){
                alertError('Sorry !','Failed free th spot ');
            }
        }
     ?>
</div>  
<div class="container bg-white p-4">
    <div class=""> 
         <h3>Modify Burial Spot</h3>
        <form class="p-2" action="" method="post">

            <div class="form-group">
                <label for="my-input">Name</label>
                <input id="my-input" class="form-control" name="name" type="text" value="<?=$spot->name?>"  required>
            </div>

            <div class="form-group">
                <label for="my-input">Description</label>
                <textarea id="my-input" class="form-control" name="description" ><?=$spot->description?></textarea>
            </div>

            <div class="form-group ">
                <label for="my-input">Deceased Occupant </label>
                <br>
                <?php if($spot->status == 1) { ?>
                    
                    <label id="my-input" class="badge badge-danger" name="designation" value="<?=$spot->getDeceasedName()?>" required>
                ?>
                <?php } else { ?>
                    <a class="btn btn-outline-dark" href="<?=route('deceased_add').'?slot_id='.$spot->id?>"> <?=getIcon('plus');?> Add Deceased </a>
                <?php }?>
                <br>
            </div>


            <div class="form-group py-3">
                <button class="btn btn-md btn-warning" type="submit" name="update"><?=getIcon('pencil');?> Update</button>
    <a class="btn btn-md btn-primary" href="<?=route('spots_set_free').'?id='.$spot->id.'&b=spots_mod'?>">Set Free</a>
            </div>

        </form>
    </div>
</div>

<?php include_layout('footer'); ?>