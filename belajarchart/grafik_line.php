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
	<title> Line Chart Perbandingan COVID-19 di 10 Negara </title>
	<script type="text/javascript" src="Chart.js"></script>
	<style type="text/css">
		.main{
			background-color: rgba(175, 238, 239, 0.3);
		}
		.main1{
			padding-left: 62%;
		}
		.h1{
			text-align: center; font-weight: bolder; font-family: arial; color: black;
		}
	</style>
</head>
<body class="main">
	<br><h1 class="h1"> Line Chart Perbandingan COVID-19 di 10 Negara </h1><br><br>
	<div style="width: 700px;height: 700px;">
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
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara1); ?>,
				datasets: [{
					label: 'Grafik Total Cases COVID-19 di 10 Negara',
					data: <?php echo json_encode($total_cases); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

	<script>
		var ctx = document.getElementById("myChart2").getContext('2d');
		var myChart2 = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara2); ?>,
				datasets: [{
					label: 'Grafik New Cases COVID-19 di 10 Negara',
					data: <?php echo json_encode($new_cases); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
<br>
	<script>
		var ctx = document.getElementById("myChart3").getContext('2d');
		var myChart3 = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara3); ?>,
				datasets: [{
					label: 'Grafik Total Deaths COVID-19 di 10 Negara',
					data: <?php echo json_encode($total_deaths); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
<br>
	<script>
		var ctx = document.getElementById("myChart4").getContext('2d');
		var myChart4 = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara4); ?>,
				datasets: [{
					label: 'Grafik New Deaths COVID-19 di 10 Negara',
					data: <?php echo json_encode($new_deaths); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
<br>
	<script>
		var ctx = document.getElementById("myChart5").getContext('2d');
		var myChart5 = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara5); ?>,
				datasets: [{
					label: 'Grafik Total Recovered COVID-19 di 10 Negara',
					data: <?php echo json_encode($total_recovered); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
<br>
	<script>
		var ctx = document.getElementById("myChart6").getContext('2d');
		var myChart6 = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara6); ?>,
				datasets: [{
					label: 'Grafik Active Cases COVID-19 di 10 Negara',
					data: <?php echo json_encode($active_cases); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>