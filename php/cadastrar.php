<?php
include("conexao.php");
$nome = mysqli_real_escape_string($conexao,$_POST['nome']);
$equipe = mysqli_real_escape_string($conexao,$_POST['equipe']);
$query = "insert into user(nome,equipe) values ('$nome','$equipe')";
$result = mysqli_query($conexao, $query);
    if($result){
        echo "Salvo com Sucesso";
        header('Location: admin.php?salvo=true');
    }
    else{
        echo "Deu ruim";
        header('Location: admin.php?salvo=false');
        exit();
    }
?>