<?php require_once "../../includes.php";
include_layout('header');
$all_staff = Staff::all();
?>

<?php if (Session::isLoggedIn()) {
    $user = Session::GetAuthenticatedUser(Admin::class);
}
?>
<div class="px-5">
    <?php
    if (isset($_GET['m'])) {
        if ($_GET['m'] == 'do') {
            alertSuccess('Ok !', 'Staff was successfully deleted  ');
        } else if ($_GET['m'] == 'df') {
            alertError('Sorry !', 'Failed add staff ');
        } else if ($_GET['m'] == 'uo') {
            alertSuccess('Ok !', 'Staff staff was updated successfully ');
        } else if ($_GET['m'] == 'as') {
            alertSuccess('Ok !', 'Staff was added successfully ');
        }
    }
    ?>
</div>
<div class="container bg-light p-5">
    <div class="">
        <h3>Cemetary Staff (<?= count($all_staff); ?>)
            <a class="btn btn-sm btn-success pull-right" href="<?= route('staff_add') ?>">
                <?= getIcon('plus'); ?> Add Staff </a></h3>
        <hr>
    </div>
    <div class="">
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>Names</th>
                    <th>Nat / Alien ID</th>
                    <th>Phone</th>
                    <th>Description</th>
                    <th>Designation</th>
                    <th>Address</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $x = 0;
                foreach ($all_staff as $staff) {
                    $x++; ?>
                    <tr>
                        <td scope="row"><?= $staff->names; ?></td>
                        <td><?= $staff->national_id; ?></td>
                        <td><?= $staff->phone; ?></td>
                        <td><?= $staff->description; ?></td>
                        <td><?= $staff->designation; ?></td>
                        <td><?= $staff->address; ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning" href="<?= route('staff_mod') . '?id=' . $staff->id; ?>"> <?= getIcon('scissors') ?> Modify</a>
                            <a onclick="return confirm('Are you sure you want to delete ? This is irreversible !!')" class="btn btn-sm btn-danger" href="<?= route('staff_del') . '?id=' . $staff->id; ?>"> <?= getIcon('trash-o') ?> Delete</a>
                        </td>
                    </tr>
                <?php }
                if ($x == 0) { ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            <h5>No staff staff was found !<a class="btn btn-sm btn-success ml-3" href="<?= route('staff_add') ?>">
                                    <?= getIcon('user-plus'); ?> Add Staff </a></h5>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<?php include_layout('footer'); ?>