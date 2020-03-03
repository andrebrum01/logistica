<?php
	include("conexao.php");
	ini_set('display_errors', 0 );
	error_reporting(0);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>LOGISTICA 2020</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<link href="https://fonts.googleapis.com/css?family=Yeon+Sung&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/presenca.css">
    <link rel="icon" type="imagem/png" href="../img/lista.png">
	<body>
        <?php if(isset($_GET["salvo"])){?>
            <div class="alerta">
                <div class="mensagem">
                <?php 
                    if($_GET["salvo"]=="true"){ echo "Cadastrado com sucesso";}
                    else echo "Não pôde ser cadastrado";
                ?>
                </div>
                <div class="close">X</div>
            </div>    
        <?php } ?>
		<section class="grad">
			<div class="navbar">
				<div class="space"></div>
				<div class="admin"><</div>
			</div>
			<div class="boxTitle">
				<div class="titleGrad">presenca</div>
				<div class="legenda">
					<div class="titleMes">Meses</div>
					<div class="meses">
						<?php
							for($i=1;$i<13;$i++){
						?>
							<select class="mes">
							<option class="dia" value="" disabled selected hidden>
								<?php 	$dateObj   = DateTime::createFromFormat('m', $i);
										$dateObj->setTimezone(new DateTimeZone('America/Sao_Paulo'));
										$monthName = $dateObj->format('M');
										echo $monthName;?>
							</option>
							<?php
										$query = "select data from data";
										$result = mysqli_query($conexao, $query);
									for($j=0;$j<mysqli_num_rows($result);$j++){
										$data = time(mysqli_fetch_row($result));
										if(date('n',$data)==$i){
								?>
								<option  class="dia"> <?php echo date('d',$data);?> </option>
							<?php }}?>
							</select>
						<?php }?>
						
					</div>
					<form class="titleMes" action="addData.php" method="POST">
						<input name="data" type="date" require>
						<select name="tipo" require>
							<option value="normal">normal</option>
							<option value="especial">especial</option>
						</select>
						<input type="submit" class="add" value="+">
					</form>
				</div>
			</div>
			<div class="desc">
				<div>Nome</div>
				<div>M</div>
				<div>D</div>
				<div>O</div>
				<div>E</div>
			</div>
		</section>
		

		<section class="rank">
			<?php 
				$query = "select nome,equipe,total from user order by nome,equipe ";
				$result = mysqli_query($conexao, $query);
				for($i=0; $i<mysqli_num_rows($result); $i++){
					$user = mysqli_fetch_row($result);
			?>
				<div class="pessoa">
					<div class="name <?php echo $user[1] ?>"><?php echo $user[0] ?></div>
					<input type="number" name="m" class="mdo"></input>
					<input type="number" name="d" class="mdo"></input>
					<input type="number" name="o" class="mdo"></input>
					<input type="number" name="e" class="mdo"></input>
				</div>
            <?php } ?>
        </section>
        <!-- <form class="addPessoa" action="cadastrar.php" method="POST">
        <input type="text" name="nome" class="nome" placeholder="Novo nome" required />
        <select placeholder="Equipe" name=equipe class="time">
            <option value="chameleon" class="opcao chameleon" default>chameleon</option>
            <option value="subzero" class="opcao subzero">subzero</option>
            <option value="secktor" class="opcao secktor">secktor</option>
            <option value="scorpion" class="opcao scorpion">scorpion</option>
            <option value="lideres" class="opcao lideres">lideres</option>
        </select>
        <input type="submit" class="btCad"></input>
        </form> -->
        
	</body>
	<!-- javascripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
	<script type="text/javascript" src="../js/presenca.js"></script>
</html>