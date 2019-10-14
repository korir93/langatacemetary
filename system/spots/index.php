<?php require_once "../../includes.php";
include_layout('header');
$spots = BurialSpot::all();
?>

<?php if (Session::isLoggedIn()) {
    $user = Session::GetAuthenticatedUser(Admin::class);
}
?>
<div class="px-5">
    <?php
    if (isset($_GET['m'])) {
        if ($_GET['m'] == 'do') {
            alertSuccess('Ok !', 'BurialSpot was successfully deleted  ');
        } else if ($_GET['m'] == 'df') {
            alertError('Sorry !', 'Failed add spot ');
        } else if ($_GET['m'] == 'uo') {
            alertSuccess('Ok !', 'BurialSpot spot was updated successfully ');
        } else if ($_GET['m'] == 'as') {
            alertSuccess('Ok !', 'BurialSpot was added successfully ');
        } else if ($_GET['m'] == 'onf') {
            alertError('Sorry !', 'The BurialSpot was not found !');
        }
    }
    ?>
</div>
<div class="container bg-light p-5">
    <div class="">
        <h3>Cemetary Burial Spots (<?= count($spots); ?>)
            <a class="btn btn-sm btn-success pull-right" href="<?= route('spots_add') ?>">
                <?= getIcon('plus'); ?> Add Burial Spot </a></h3>
        <hr>
    </div>
    <div class="">
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Deceased</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $x = 0;
                foreach ($spots as $spot) {
                    $x++; ?>
                    <tr>
                        <td scope="row"><?= $spot->name; ?></td>
                        <td scope="row"><?= $spot->description; ?></td>
                        <td><?= strtoupper($spot->getDeceasedName()); ?></td>
                        <td><?= $spot->getStatus(); ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning" href="<?= route('spots_mod') . '?id=' . $spot->id; ?>"> <?= getIcon('scissors') ?> Modify</a>
                            <a onclick="return confirm('Are you sure you want to delete ? This is irreversible !!')" class="btn btn-sm btn-danger" href="<?= route('spots_del') . '?id=' . $spot->id; ?>"> <?= getIcon('trash-o') ?> Delete</a>
                        </td>
                    </tr>
                <?php }
                if ($x == 0) { ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            <h5>No spot spot was found !<a class="btn btn-sm btn-success ml-3" href="<?= route('spot_add') ?>">
                                    <?= getIcon('user-plus'); ?> Add BurialSpot </a></h5>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<?php include_layout('footer'); ?>