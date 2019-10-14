
<?php require_once "../../../includes.php";
    include_layout('header');
    $deceased = new Deceased;
    if(isset($_POST['add'])){

        $file = $_FILES['photo']['tmp_name'];
        $f_name = uniqid('deceased-').'.png';


        if(move_uploaded_file($file, '../../../app/assets/icons/deceased/'.$f_name)){

        }else{
            $f_name = 'no.png';
        }


        $deceased_1 = Deceased::instantiate(validateFormData($_POST));
        $deceased_1->burial_spot = "N/A";
        $deceased_1->burial_spot_id = -1;
        $deceased_1->photo = $f_name;
        $deceased = $deceased_1;
        if($deceased_1->save()){
            redirectPage(route('deceased').'?m=as');
        }else{
            alertError('Sorry ! ',"Failed to save ".SQLQuery::$errorMessage);
        }
    }
?>

<div class="container  my-2  p-4  bg-white">
    <div class=" pull-center"> 
             <h3>Add Deceased Person</h3>
            <hr>
            <form  action="" method="post" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-12" >
                        <div class="form-group">
                            <label for="my-input">Names</label>
                            <input id="my-input" class="form-control" value="<?=$deceased->names;?>" name="names" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Age</label>
                            <input id="my-input" class="form-control" value="<?=$deceased->age;?>" name="age" type="number" required>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Description</label>
                            <textarea id="my-input" class="form-control" name="description" ><?=$deceased->description;?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Date Of Birth</label>
                            <input type="text"  id="my-input" class="form-control" name="d_o_birth" placeholder="dd/mm/yyy" value="<?=$deceased->d_o_birth;?>" required/>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 col-sm-12" >
                        <div class="form-group">
                            <label for="my-input">Photo</label>
                            <input type="file" id="my-input" class="form-control" name="photo"  required/>
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
                            <textarea id="my-input" class="form-control" value="<?=$deceased->owner_info;?>" name="owner_info" type="text" ></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn my-3 btn-md btn-danger" type="submit" name="add" ><?=getIcon('check');?> Save Deceased</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>

<?php include_layout('footer'); ?>