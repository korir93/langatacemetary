
<?php require_once "../../../includes.php";
    include_layout('header');
    $staff = Staff::id($_GET['id']);
    if(isset($_POST['update'])){
        $staff_1 = Staff::instantiate(validateFormData($_POST));
        $staff_1->id = $staff->id;
        if($staff_1->update()){
            redirectPage(route('staff').'?m=uo');
        }else{
            alertError('Sorry ! ',"Failed to save ".SQLQuery::$errorMessage);
        }
    }
?>

<div class="container bg-white p-3">
    <div class="row">
    <div class="col-12"> 
         <h3>Modify Info</h3>
        <hr>
        <form class="p-2" action="" method="post">
            <div class="row">

                <div class="col-sm-12 col-mg-5 col-lg-5" >
                    
                    <div class="form-group">
                        <label for="my-input">Names</label>
                        <input id="my-input" class="form-control" name="names" type="text" value="<?=$staff->names?>"  required>
                    </div>

                    <div class="form-group">
                        <label for="my-input">Nationl / Alien ID</label>
                        <input id="my-input" value="<?=$staff->national_id?>" class="form-control" name="national_id" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="my-input">Phone</label>
                        <input id="my-input" class="form-control" name="phone" type="text" value="<?=$staff->phone?>" required>
                    </div>

                    <div class="form-group">
                        <label for="my-input">Description</label>
                        <textarea id="my-input" class="form-control" name="description" ><?=$staff->description?></textarea>
                    </div>

                </div>

                <div class="col-sm-12 col-mg-5 col-lg-5" >
                    <div class="form-group">
                        <label for="my-input">Address</label>
                        <input id="my-input" value="<?=$staff->address?>" class="form-control" name="address" type="address" required>
                    </div>

                    <div class="form-group">
                        <label for="my-input">Designation</label>
                        <input id="my-input" class="form-control" name="designation" type="text" value="<?=$staff->designation?>" required>
                    </div>


                    <div class="form-group">
                        <input class="btn btn-md y-3 btn-warning" type="submit" value="Update" name="update">
                    </div>

                </div>

            </div>

            
        </form>
    </div>
    </div>
</div>

<?php include_layout('footer'); ?>