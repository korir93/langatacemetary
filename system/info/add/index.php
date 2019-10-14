
<?php require_once "../../../includes.php";
    include_layout('header');

    if(isset($_POST['add'])){
        $info = Info::instantiate(validateFormData($_POST));
        if($info->save()){
            redirectPage(route('info'));
        }else{
            alertError('Sorry ! ',"Failed to save ".SQLQuery::$errorMessage);
        }
    }
?>

<div class="container ">
    <div class="row">
    <div class="col-5 card p-3"> 
         <h3>Add Info</h3>
        <hr>
        <form class="p-3" action="" method="post">

            <div class="form-group">
                <label for="my-input">Title</label>
                <input id="my-input" class="form-control" name="title" type="text" required>
            </div>

            <div class="form-group">
                <label for="my-input">Description</label>
                <textarea id="my-input" class="form-control" name="info" ></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-md btn-danger my-2" type="submit" name="add" ><?=getIcon('check');?> Save Information</button>
            </div>

        </form>
    </div>
    </div>
</div>

<?php include_layout('footer'); ?>