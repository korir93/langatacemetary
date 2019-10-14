<?php require_once "../../../includes.php";
include_layout('header');
$spot = new BurialSpot;
if (isset($_POST['add'])) {
    $spot = BurialSpot::instantiate(validateFormData($_POST));
    $spot->status = 0;

    if ($spot->save()) {
        redirectPage(route('spots') . '?m=as');
    } else {
        alertError('Sorry ! ', "Failed to save " . SQLQuery::$errorMessage);
    }
}
?>

<div class="container  my-2  p-4  bg-white">
    <div class="row pull-center">
        <div class="col-12">
            <h3>Add Burial Spot</h3>
            <hr>
            <form action="" method="post">

                <div class="form-group">
                    <label for="my-input">Name</label>
                    <input id="my-input" class="form-control" value="<?= $spot->name; ?>" name="name" type="text" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Description</label>
                    <textarea id="my-input" class="form-control" name="description"><?= $spot->description; ?></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-md btn-danger" type="submit" name="add"><?= getIcon('plus'); ?> Add Spot</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include_layout('footer'); ?>