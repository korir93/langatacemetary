<?php

require_once "../includes.php";

if (Session::isLoggedIn()) {
    redirectPage(route('system'));
}


include_layout('header');
?>
<?php
$admin = new Admin;
if (isset($_POST['login'])) {
    $data = validateFormData($_POST);
    $admin = Admin::where(['email' => $data['email']], 'LIMIT 1');
    //echo SQLQuery::$query;
    if (is_array($admin) && count($admin) > 0) {
        $admin = $admin[0];
        if (passwords_match($data['password'], $admin->password)) {
            Session::SetAuthenticatedUser($admin->toJson());
            redirectPage(route('system'));
        } else {
            alertError('Error !', 'Invalid Credentials');
        }
    } else {
        alertError('Error !', 'Account Not found');
    }
    $admin = Admin::instantiate($data);
}

?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3"></div>

        <div class="col-lg-6 col-md-6 col-sm-12 card text-dark bg-light">
            <div class="card-body">
                <h2 class="text-dark font-weight-lighter">Login
                </h2>
                <hr>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" value="<?= $admin->email ?>" type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" class="form-control" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-danger" type="submit" name="login"><?= getIcon('sign-in'); ?> Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_layout('footer');
?>