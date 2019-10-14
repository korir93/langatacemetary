
<?php require_once "../../includes.php";
    include_layout('header');
    $requests = VisitorRequest::all();
?>
      
<?php if(Session::isLoggedIn()){
    $user = Session::GetAuthenticatedUser(Admin::class);
}
?>
<div class="px-5">
    <?php
        if(isset($_GET['m'])){
            if($_GET['m'] == 'do'){
                alertSuccess('Ok !','VisitorRequest was successfully deleted  ');
            }else if($_GET['m'] == 'df'){
                alertError('Sorry !','Failed add request ');
            }else if($_GET['m'] == 'uo'){
                alertSuccess('Ok !','VisitorRequest request was updated successfully ');
            }else if($_GET['m'] == 'as'){
                alertSuccess('Ok !','VisitorRequest was added successfully ');
            }else if($_GET['m'] == 'onf'){
                alertError('Sorry !','VisitorRequest does not exist !');
            }
        }
     ?>
</div>  
<div class="container bg-light p-5">
    <div class=""> 
         <h3>Cemetary Visitor Requests (<?=count($requests);?>)</h3> <hr>
    </div>
    <div class="">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Names</th>
                    <th>Request</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $x=0; foreach ($requests as $request) { $x++;?>
                <tr>
                    <td scope="row"><?=$request->names;?></td>
                    <td><?=$request->request;?></td>
                    <td><?=$request->phone;?></td>
                    <td><?=$request->email;?></td>
                    <td class="text-center">
    <a class="btn btn-sm btn-primary" href="<?=route('request_view').'?id='.$request->id;?>">View</a>
    <a onclick="return confirm('Are you sure you want to delete ? This is irreversible !!')" class="btn btn-sm btn-danger" href="<?=route('request_del').'?id='.$request->id;?>"> <?=getIcon('trash-o')?> Delete</a>
                    </td>
                </tr>
            <?php } if($x==0){?>
                <tr> <td colspan="5" class="text-center" >
                    <h5 style="font-weight : 400!important; " >No request was found !</h5>
                </td></tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>

<?php include_layout('footer'); ?>