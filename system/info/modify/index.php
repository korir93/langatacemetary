
<?php require_once "../../../includes.php";
    include_layout('header');
    $info = Info::id($_GET['id']);
    if(isset($_POST['update'])){
        $info->title = $_POST['title'];
        $info->info = $_POST['info'];
        if($info->update()){
            redirectPage(route('info').'?m=uo');
        }else{
            alertError('Sorry ! ',"Failed to save ".SQLQuery::$errorMessage);
        }
    }
?>

<div class="container">
    <div class="row">
    <div class="col-5 card p-3"> 
         <h3>Modify Info</h3>
        <hr>
        <form class="p-3" action="" method="post">

            <div class="form-group">
                <label for="my-input">Title</label>
                <input id="my-input" class="form-control" name="title" type="text" value="<?=$info->title;?>" required>
            </div>

            <div class="form-group">
                <label for="my-input">Description</label>
                <textarea id="my-input" class="form-control" name="info" ><?=$info->info;?></textarea>
            </div>
            <div class="form-group">
                <input class="btn my-2 btn-md btn-warning" type="submit" value="Update" name="update" >
            </div>

        </form>
    </div>
    </div>
</div>

<?php include_layout('footer'); ?>