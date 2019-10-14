
<?php require_once "../../../includes.php";
    include_layout('header');
    $request = VisitorRequest::id($_GET['id']);
    if(!isset($request)){
        redirectPage(route('requests').'?m=onf');
    }
?>

<div class="container bg-white p-4">
    <div class="row">
    <div class="col-12"> 
         <h3>Details
    <a onclick="return confirm('Are you sure you want to delete ? This is irreversible !!')" class="btn pull-right btn-sm btn-danger" href="<?=route('request_del').'?id='.$request->id;?>"> <?=getIcon('trash-o')?> Delete</a>

         </h3>
        <hr>
            <div class="form-group">
                <label for="my-input">Names</label>
                <input id="my-input" class="form-control" type="text" value="<?=$request->names?>"  readonly>
            </div>

            <div class="form-group">
                <label for="my-input">Request</label>
                <teatarea id="my-input" class="form-control" type="text" readonly>
                    <?=$request->request?></teatarea>
            </div>

            <div class="form-group">
                <label for="my-input">Phone</label>
                <input id="my-input" class="form-control" name="phone" type="text" value="<?=$request->phone?>" readonly>
            </div>

            <div class="form-group">
                <label for="my-input">Email</label>
                <input id="my-input" class="form-control" name="description" value="<?=$request->email?>" readonly/>
            </div>

    </div>
    </div>
</div>

<?php include_layout('footer'); ?>