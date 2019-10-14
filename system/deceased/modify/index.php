
<?php require_once "../../../includes.php";
    include_layout('header');
    $deceased = Deceased::id($_GET['id']);
    if(isset($_POST['update'])){


        // $photo_d = $_POST['photo_d'];

        // $file = $_FILES['photo']['tmp_name'];
        // // print_r($_FILES);
        // if(!is_null($_FILES['photo']['tmp_name'])){
        //     $f_name = uniqid('deceased-').'.png';
        //     echo 'file';

        //     if(move_uploaded_file($file, '../../../app/assets/icons/deceased/'.$f_name)){

        //     }else{
        //         $f_name = 'no.png';
        //     }
        //     $photo_d = $f_name;
        // }
        
        $deceased_1 = Deceased::instantiate(validateFormData($_POST));
        $deceased_1->id = $deceased->id;
        // $deceased_1->photo = $photo_d;
        //printObject($deceased_1);
        if($deceased_1->update()){
           redirectPage(route('deceased').'?m=uo');
        }else{
            alertError('Sorry ! ',"Failed to update ".SQLQuery::$errorMessage);
        }
    }
?>

<div class="px-5">
    <?php if($deceased->burial_spot_id == -1){
        alertError('Oops ! ','The deceased person is not yet burried !');
    }?>
</div>
<div class="container  my-2  p-4  bg-white">
    <div class=" pull-center"> 
             <h3 class="text-danger" >Modify Deceased Person 
        <?php if($deceased->burial_spot_id == -1){ ?>
            <a onclick="" class="btn btn-sm btn-primary pull-right" 
                href="<?=route('deceased_alloc').'?id='.$deceased->id;?>"> <?=getIcon('plus')?> Allocate Spot</a>
            <?php } else { ?>
                <br>
                <label class="text-primary" >Burried at <?=$deceased->burial_spot?></label>
            <?php } ?>
             </h3>
    <hr>
            <form  action="" method="post" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-12" >
                        <div class="form-group">
                            <label for="my-input">Names</label>
                            <input id="my-input" class="form-control" value="<?=$deceased->names;?>" name="names" type="text" required>
                            <input id="my-input" class="form-control" value="<?=$deceased->burial_spot_id;?>" name="burial_spot_id" type="hidden" required>
                            <input id="my-input" class="form-control" value="<?=$deceased->burial_spot;?>" name="burial_spot" type="hidden" required>
                        </div>
                        <div class="form-group">
                            <label>Photo</label><br>
                            <img class="img-thumbnail" src="<?=getDeceasedPhoto($deceased->photo)?>">
                            <input type="hidden" name="photo_d" value="<?=$deceased->photo?>">
           <!--                  <br>
                            <label>Change</label>
                            <input type="file" name="photo" class="form-control"/> -->
                        </div>
                        <div class="form-group">
                            <label for="my-input">Age</label>
                            <input id="my-input" class="form-control" value="<?=$deceased->age;?>" name="age" type="number" required>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Description</label>
                            <textarea id="my-input" class="form-control" name="description" ><?=$deceased->description;?></textarea>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 col-sm-12" >
                        <div class="form-group">
                            <label for="my-input">Date Of Birth</label>
                            <input type="text"  id="my-input" class="form-control" name="d_o_birth" placeholder="dd/mm/yyy" value="<?=$deceased->d_o_birth;?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Date Of Burial</label>
                            <input type="text" id="my-input" class="form-control" name="d_o_burial" placeholder="dd/mm/yyy" value="<?=$deceased->d_o_burial;?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Owner Names</label>
                            <input id="my-input" class="form-control" value="<?=$deceased->owner;?>" name="owner" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Owner Address, Info & Contact</label>
                            <textarea id="my-input" class="form-control" name="owner_info"><?=$deceased->owner_info;?></textarea>
                        </div>
                        <div class="form-group">
                            <button class="my-4 btn btn-md btn-warning" type="submit" name="update" ><?=getIcon('pencil');?> Modify Deceased Record</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>

<?php include_layout('footer'); ?>