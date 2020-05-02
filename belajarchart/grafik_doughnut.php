<?php
include('koneksi.php');
$negara1 = mysqli_query($koneksi,"select * from country");
$negara2 = mysqli_query($koneksi,"select * from country");
$negara3 = mysqli_query($koneksi,"select * from country");
$negara4 = mysqli_query($koneksi,"select * from country");
$negara5 = mysqli_query($koneksi,"select * from country");
$negara6 = mysqli_query($koneksi,"select * from country");
while($row1 = mysqli_fetch_array($negara1)){
	$nama_negara1[] = $row1['country'];
	$query1 = mysqli_query($koneksi,"select sum(total_cases) as total_cases from coronavirus where id_country='".$row1['id_country']."'");
	$row1 = $query1->fetch_array();
	$total_cases[] = $row1['total_cases'];

	while ($row2 = mysqli_fetch_array($negara2)) {
		$nama_negara2[] = $row2['country'];
		$query2 = mysqli_query($koneksi,"select sum(new_cases) as new_cases from coronavirus where id_country='".$row2['id_country']."'");
		$row2 = $query2->fetch_array();
		$new_cases[] = $row2['new_cases'];
	
	while ($row3 = mysqli_fetch_array($negara3)) {
		$nama_negara3[] = $row3['country'];
		$query3 = mysqli_query($koneksi,"select sum(total_deaths) as total_deaths from coronavirus where id_country='".$row3['id_country']."'");
		$row3 = $query3->fetch_array();
		$total_deaths[] = $row3['total_deaths'];

	while ($row4 = mysqli_fetch_array($negara4)) {
		$nama_negara4[] = $row4['country'];
		$query4 = mysqli_query($koneksi,"select sum(new_deaths) as new_deaths from coronavirus where id_country='".$row4['id_country']."'");
		$row4 = $query4->fetch_array();
		$new_deaths[] = $row4['new_deaths'];
	
	while ($row5 = mysqli_fetch_array($negara5)) {
		$nama_negara5[] = $row5['country'];
		$query5 = mysqli_query($koneksi,"select sum(total_recovered) as total_recovered from coronavirus where id_country='".$row5['id_country']."'");
		$row5 = $query5->fetch_array();
		$total_recovered[] = $row5['total_recovered'];
	
	while ($row6 = mysqli_fetch_array($negara6)) {
		$nama_negara6[] = $row6['country'];
		$query6 = mysqli_query($koneksi,"select sum(active_cases) as active_cases from coronavirus where id_country='".$row6['id_country']."'");
		$row6 = $query6->fetch_array();
		$active_cases[] = $row6['active_cases'];
					}
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Doughnut Chart Perbandingan COVID-19 di 10 Negara </title>
	<script type="text/javascript" src="Chart.js"></script>
	<style type="text/css">
		.main{
			background-color: rgba(221, 160, 221, 0.3);}
		.main1{
			padding-left: 80%;}
		.h1{
			text-align: center; font-weight: bolder; font-family: arial; color: black;}
	</style>
</head>
<body class="main">
	<br><h1 class="h1"> Doughnut Chart Perbandingan COVID-19 di 10 Negara </h1><br>
	<div style="width: 600px;height: 600px;">
		<canvas class="main1" id="myChart1"></canvas><br><br><br>
		<canvas class="main1" id="myChart2"></canvas><br><br><br>
		<canvas class="main1" id="myChart3"></canvas><br><br><br>
		<canvas class="main1" id="myChart4"></canvas><br><br><br>
		<canvas class="main1" id="myChart5"></canvas><br><br><br>
		<canvas class="main1" id="myChart6"></canvas><br><br><br>
	</div>

	<script>
		var ctx = document.getElementById("myChart1").getContext('2d');
		var myChart1 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: <?php echo json_encode($nama_negara1); ?>,
				datasets: [{
					label: 'Grafik Total Cases COVID-19 di 10 Negara',
					data: <?php echo json_encode($total_cases); ?>,
					backgroundColor: [
					'rgba(255, 0, 0, 0.5)',
					'rgba(128, 0, 128, 0.7)',
					'rgba(199, 21, 133, 0.5)',
					'rgba(252, 165, 3, 0.8)',
					'rgb(255, 255, 0)',
					'rgb(27, 128, 1)',
					'rgb(144, 238, 144)',
					'rgb(0,0,139)',
					'rgb(30, 144, 255)',
					'rgb(135, 206, 235)'],
					borderColor: [
					'rgba(252, 192, 203, 1)',
					'rgba(221, 160, 221, 1)',
					'rgb(254, 228, 225)',
					'rgba(254, 222, 173, 0.5)',
					'rgb(254, 228, 181)',
					'rgb(240, 255, 140)',
					'rgb(144, 238, 144)',
					'rgb(0, 0, 255)',
					'rgb(43, 191, 254)',
					'rgb(135, 206, 250)'],
					borderWidth: 1
				}]
			},
			options: {
				title : {
					display : true,
					text : 'Grafik Total Cases COVID-19 di 10 Negara'
				}
			}
		});

		var ctx = document.getElementById("myChart2").getContext('2d');
		var myChart2 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: <?php echo json_encode($nama_negara2); ?>,
				datasets: [{
					label: 'Grafik New Cases COVID-19 di 10 Negara',
					data: <?php echo json_encode($new_cases); ?>,
					backgroundColor: [
					'rgba(255, 0, 0, 0.5)',
					'rgba(128, 0, 128, 0.7)',
					'rgba(199, 21, 133, 0.5)',
					'rgba(252, 165, 3, 0.8)',
					'rgb(255, 255, 0)',
					'rgb(27, 128, 1)',
					'rgb(144, 238, 144)',
					'rgb(0,0,139)',
					'rgb(30, 144, 255)',
					'rgb(135, 206, 235)'],
					borderColor: [
					'rgba(252, 192, 203, 1)',
					'rgba(221, 160, 221, 1)',
					'rgb(254, 228, 225)',
					'rgba(254, 222, 173, 0.5)',
					'rgb(254, 228, 181)',
					'rgb(240, 255, 140)',
					'rgb(144, 238, 144)',
					'rgb(0, 0, 255)',
					'rgb(43, 191, 254)',
					'rgb(135, 206, 250)'],
					borderWidth: 1
				}]
			},
			options: {
				title : {
					display : true,
					text : 'Grafik New Cases COVID-19 di 10 Negara'
				}
			}
		});
		var ctx = document.getElementById("myChart3").getContext('2d');
		var myChart3 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: <?php echo json_encode($nama_negara3); ?>,
				datasets: [{
					label: 'Grafik Total Deaths COVID-19 di 10 Negara',
					data: <?php echo json_encode($total_deaths); ?>,
					backgroundColor: [
					'rgba(255, 0, 0, 0.5)',
					'rgba(128, 0, 128, 0.7)',
					'rgba(199, 21, 133, 0.5)',
					'rgba(252, 165, 3, 0.8)',
					'rgb(255, 255, 0)',
					'rgb(27, 128, 1)',
					'rgb(144, 238, 144)',
					'rgb(0,0,139)',
					'rgb(30, 144, 255)',
					'rgb(135, 206, 235)'],
					borderColor: [
					'rgba(252, 192, 203, 1)',
					'rgba(221, 160, 221, 1)',
					'rgb(254, 228, 225)',
					'rgba(254, 222, 173, 0.5)',
					'rgb(254, 228, 181)',
					'rgb(240, 255, 140)',
					'rgb(144, 238, 144)',
					'rgb(0, 0, 255)',
					'rgb(43, 191, 254)',
					'rgb(135, 206, 250)'],
					borderWidth: 1
				}]
			},
			options: {
				title : {
					display : true,
					text : 'Grafik Total Deaths Cases COVID-19 di 10 Negara'
				}
			}
		});
		var ctx = document.getElementById("myChart4").getContext('2d');
		var myChart4 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: <?php echo json_encode($nama_negara4); ?>,
				datasets: [{
					label: 'Grafik New Deaths COVID-19 di 10 Negara',
					data: <?php echo json_encode($new_deaths); ?>,
					backgroundColor: [
					'rgba(255, 0, 0, 0.5)',
					'rgba(128, 0, 128, 0.7)',
					'rgba(199, 21, 133, 0.5)',
					'rgba(252, 165, 3, 0.8)',
					'rgb(255, 255, 0)',
					'rgb(27, 128, 1)',
					'rgb(144, 238, 144)',
					'rgb(0,0,139)',
					'rgb(30, 144, 255)',
					'rgb(135, 206, 235)'],
					borderColor: [
					'rgba(252, 192, 203, 1)',
					'rgba(221, 160, 221, 1)',
					'rgb(254, 228, 225)',
					'rgba(254, 222, 173, 0.5)',
					'rgb(254, 228, 181)',
					'rgb(240, 255, 140)',
					'rgb(144, 238, 144)',
					'rgb(0, 0, 255)',
					'rgb(43, 191, 254)',
					'rgb(135, 206, 250)'],
					borderWidth: 1
				}]
			},
			options: {
				title : {
					display : true,
					text : 'Grafik New Deaths COVID-19 di 10 Negara'
				}
			}
		});

		var ctx = document.getElementById("myChart5").getContext('2d');
		var myChart5 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: <?php echo json_encode($nama_negara5); ?>,
				datasets: [{
					label: 'Grafik Total Recovered COVID-19 di 10 Negara',
					data: <?php echo json_encode($total_recovered); ?>,
					backgroundColor: [
					'rgba(255, 0, 0, 0.5)',
					'rgba(128, 0, 128, 0.7)',
					'rgba(199, 21, 133, 0.5)',
					'rgba(252, 165, 3, 0.8)',
					'rgb(255, 255, 0)',
					'rgb(27, 128, 1)',
					'rgb(144, 238, 144)',
					'rgb(0,0,139)',
					'rgb(30, 144, 255)',
					'rgb(135, 206, 235)'],
					borderColor: [
					'rgba(252, 192, 203, 1)',
					'rgba(221, 160, 221, 1)',
					'rgb(254, 228, 225)',
					'rgba(254, 222, 173, 0.5)',
					'rgb(254, 228, 181)',
					'rgb(240, 255, 140)',
					'rgb(144, 238, 144)',
					'rgb(0, 0, 255)',
					'rgb(43, 191, 254)',
					'rgb(135, 206, 250)'],
					borderWidth: 1
				}]
			},
			options: {
				title : {
					display : true,
					text : 'Grafik Total Recovered COVID-19 di 10 Negara'
				}
			}
		});

		var ctx = document.getElementById("myChart6").getContext('2d');
		var myChart6 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: <?php echo json_encode($nama_negara6); ?>,
				datasets: [{
					title: 'Grafik Active Cases COVID-19 di 10 Negara',
					data: <?php echo json_encode($active_cases); ?>,
					backgroundColor: [
					'rgba(255, 0, 0, 0.5)',
					'rgba(128, 0, 128, 0.7)',
					'rgba(199, 21, 133, 0.5)',
					'rgba(252, 165, 3, 0.8)',
					'rgb(255, 255, 0)',
					'rgb(27, 128, 1)',
					'rgb(144, 238, 144)',
					'rgb(0,0,139)',
					'rgb(30, 144, 255)',
					'rgb(135, 206, 235)'],
					borderColor: [
					'rgba(252, 192, 203, 1)',
					'rgba(221, 160, 221, 1)',
					'rgb(254, 228, 225)',
					'rgba(254, 222, 173, 0.5)',
					'rgb(254, 228, 181)',
					'rgb(240, 255, 140)',
					'rgb(144, 238, 144)',
					'rgb(0, 0, 255)',
					'rgb(43, 191, 254)',
					'rgb(135, 206, 250)'],
					borderWidth: 1
				}]
			},
			options: {
				title : {
					display : true,
					text : 'Grafik Active Cases COVID-19 di 10 Negara'
				}
			}
		});
	</script>
</body>
</html>