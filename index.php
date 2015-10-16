<!doctype html>
<?php
session_start();
if(@$_SESSION['logged'] == True){
} else {
	header("location:login.php");
}
if(@$_SESSION['acesso'] < 2){

} else {
	header("location:painel.php");
}
?>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Fontus</title>
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/tabela.css" />
	<script src="js/vendor/modernizr.js"></script>
</head>
<body>
	<?php include 'header.php'; ?>
	<div class="row">
		<div class="large-12 columns">
			<h1> Bem-vindo ao Waterbox-o-Matic</h1>
			<br>
			<h2> Últimos Alertas </h2>
			<table>
				<thead>
					<tr>
						<td>
							Data
						</td>
						<td>
							Alerta
						</td>
					</tr>
				</thead>
				<tbody>
					<?php
					include 'config.php';
					$sql = "SELECT hora, alerta FROM alertas where cod_caixa = ".$_SESSION['cod_caixa']." order by hora desc limit 10";
					$result = mysqli_query($con, $sql);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							echo "<tr><td>" . $row["hora"]. "</td><td>" . $row["alerta"]. "</td></tr>";
						}
					} else {
						echo "<tr><td>sem</td><td>alertas</td></tr>";
					}
					mysqli_close($con);
					?>
				</tbody>
			</table>
			<br>
			<h2>Últimos Registros </h2>
			<table>
				<thead>
					<tr>
						<td>
							Data
						</td>
						<td>
							Fluxo
						</td>
						<td>
							Nível
						</td>
					</tr>
				</thead>
				<tbody>
					<?php
					include 'config.php';
					$sql = "SELECT hora, fluxo, nivel FROM log_caixa where cod_caixa = ".$_SESSION['cod_caixa']." order by hora desc limit 10";
					$result = mysqli_query($con, $sql);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							echo "<tr><td>" . $row["hora"]. "</td><td>" . $row["fluxo"]. "</td><td>" . $row["nivel"]. "</td></tr>";
						}
					} else {
						echo "<tr><td>nenhum</td><td>registro</td><td>encontrado</td></tr>";
					}
					mysqli_close($con);
					?>
				</tbody>
			</table>
		</div>
	</div>

	<script src="js/vendor/jquery.js"></script>
	<script src="js/foundation.min.js"></script>
	<script>
	$(document).foundation();
	</script>
</body>
</html>
