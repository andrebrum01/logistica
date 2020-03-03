<?php
	include("php/conexao.php");
	ini_set('display_errors', 0 );
	error_reporting(0);
    $query = "select nome,equipe,total from user order by total";
	$result = mysqli_query($conexao, $query);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>LOGISTICA 2020</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<link href="https://fonts.googleapis.com/css?family=Yeon+Sung&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/stile.css">
	<link rel="icon" type="imagem/png" href="img/lista.png">
	<body>
		<section class="grad">
			<div class="navbar">
				<div class="space"></div>
				<div class="admin"><img src="img/user.png">ADMIN</div>
			</div>
			<div class="boxTitle">
				<div class="titleGrad">rank</div>
				<div class="legenda">
					<span class="chameleon">chameleon</span>
					<span class="scorpion">scorpion</span>
					<span class="secktor">secktor</span>
					<span class="subzero">subzero</span>
					<span class="celestial">celestial</span>
					<span class="lideres">lideres</span>
				</div>
			</div>
			<div class="desc">
				<div>POS</div>
				<div>Nome</div>
				<div class="equipe">Equipe</div>
				<div>Pontos</div>
			</div>
		</section>
		

		<section class="rank">
			<div class="pessoa">
				<div class="pos"></div>
				<div class="name celestial">Jesus Cristo</div>
				<div class="equipe celestial">Celestial</div class="equipe">
				<div>1000</div>
			</div>
			<?php 
				for($i=0; $i<mysqli_num_rows($result); $i++){
					$user = mysqli_fetch_row($result);
			?>
				<div class="pessoa">
					<div class="pos"></div>
					<div class="name <?php echo $user[1] ?>"><?php echo $user[0] ?></div>
					<div class="equipe <?php echo $user[1] ?>"> <?php echo $user[1] ?> </div>
					<div><?php echo intval($user[2]) ?></div>
				</div>
			<?php } ?>
		</section>
	</body>
	<!-- javascripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
	<script type="text/javascript" src="js/actions.js"></script>
</html>