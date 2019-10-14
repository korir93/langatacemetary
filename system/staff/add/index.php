
<?php require_once "../../../includes.php";
    include_layout('header');

    if(isset($_POST['add'])){
        $info = Staff::instantiate(validateFormData($_POST));
        if($info->save()){
            redirectPage(route('staff').'?m=as');
        }else{
            alertError('Sorry ! ',"Failed to save ".SQLQuery::$errorMessage);
        }
    }
?>

<div class="container bg-white p-3">
    <div class="row">
    <div class="col-12"> 
         <h3>Add Info</h3>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12">
                    
                    <div class="form-group">
                        <label for="my-input">Names</label>
                        <input id="my-input" class="form-control" name="names" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="my-input">Nationl / Alien ID</label>
                        <input id="my-input" class="form-control" name="national_id" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="my-input">Phone</label>
                        <input id="my-input" class="form-control" name="phone" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="my-input">Description</label>
                        <textarea id="my-input" class="form-control" name="description" ></textarea>
                    </div>

                </div>
                <div class="col-md-5 col-lg-5 col-sm-12">
                    <div class="form-group">
                        <label for="my-input">Address</label>
                        <input id="my-input" class="form-control" name="address" type="address" required>
                    </div>

                    <div class="form-group">
                        <label for="my-input">Designation</label>
                        <input id="my-input" class="form-control" name="designation" type="text" required>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-md btn-danger" type="submit" name="add" ><?=getIcon('check');?> Register Staff</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
    </div>
</div>

<?php include_layout('footer'); ?>