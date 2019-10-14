
<?php require_once "../../includes.php";
    include_layout('header');
    $request = new VisitorRequest;
    if(isset($_POST['add'])){
        $request_1 = VisitorRequest::instantiate(validateFormData($_POST));
        $request = $request_1;
        if($request_1->save()){
            redirectPage(route('root').'?m=as');
        }else{
            alertError('Sorry ! ',"Failed to save ".SQLQuery::$errorMessage);
        }
    }
?>

<div class="container  my-2  p-4  bg-white">
    <div class=" pull-center"> 
            <h3>Place a Request</h3>
            <hr>
            <form  action="" method="post">

                <div class="form-group">
                    <label for="my-input">Yor Names</label>
                    <input id="my-input" class="form-control" value="<?=$request->names;?>" name="names" type="text" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Your Request</label>
                    <textarea id="my-input" class="form-control" name="request" ><?=$request->request;?></textarea>
                </div>
                <div class="form-group">
                    <label for="my-input">Your Phone Number</label>
                    <input type="text"  id="my-input" class="form-control" name="phone"  value="<?=$request->phone;?>" required/>
                </div>
                <div class="form-group">
                    <label for="my-input">Your Email</label>
                    <input type="text" id="my-input" class="form-control" name="email" value="<?=$request->email;?>" required/>
                </div>

                <div class="form-group">
                    <button class="btn btn-md btn-danger" type="submit" name="add" ><?=getIcon('check');?> Submit Request</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include_layout('footer'); ?>