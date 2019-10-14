<?php require_once "../includes.php";
include_layout('header');
$spots = count(BurialSpot::all());
$n_free_spots = count(BurialSpot::where(['status' => 0]));
$n_occupied_spots = count(BurialSpot::where(['status' => 1]));
$free_spots = ($n_free_spots / $spots) * 100;
$occupied_spots = ($n_occupied_spots / $spots) * 100;
?>

<?php if (Session::isLoggedIn()) {

	$user = Session::GetAuthenticatedUser(Admin::class);
}

?>

<div class="container">

	<?php

	$dataPoints = array(
		array("label" => "Occupied", "y" => $occupied_spots),
		array("label" => "Free", "y" => $free_spots)
	)

	?>

	<script>
		window.onload = function() {


			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				title: {
					text: ""
				},
				subtitles: [{
					text: ""
				}],
				data: [{
					type: "pie",
					yValueFormatString: "#,##0.00\"%\"",
					indexLabel: "{label} ({y})",
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();

		}
	</script>

	<div class="bg-white p-5">
		<h3 class="my-2  text-center">Langata Cemetary Occupied (<?= $n_occupied_spots; ?>) & Free (<?= $n_free_spots; ?>) Burial Spots</h3>
		<hr>
		<div id="chartContainer" style="height: 370px; width: 100%; padding:20px"></div>
	</div>


	<?php include_layout('footer'); ?>

	<script src="../app/assets/js/canvasjs.min.js"></script>