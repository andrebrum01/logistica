<?php
	include("conexao.php");
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
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
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
				<div class="titleGrad">rank</div>
				<div class="legenda">
					<span class="presenca"><img src="../img/lista.png">presenca</span>
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
        <form class="addPessoa" action="cadastrar.php" method="POST">
        <input type="text" name="nome" class="nome" placeholder="Novo nome" required />
        <select placeholder="Equipe" name=equipe class="time">
            <option value="chameleon" class="opcao chameleon" default>chameleon</option>
            <option value="subzero" class="opcao subzero">subzero</option>
            <option value="secktor" class="opcao secktor">secktor</option>
            <option value="scorpion" class="opcao scorpion">scorpion</option>
            <option value="lideres" class="opcao lideres">lideres</option>
        </select>
        <input type="submit" class="btCad"></input>
        </form>
        
	</body>
	<!-- javascripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
	<script type="text/javascript" src="../js/admin.js"></script>
</html>