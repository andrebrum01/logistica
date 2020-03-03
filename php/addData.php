<?php
include("conexao.php");
$data =mysqli_real_escape_string($conexao,$_POST['data']);
$tipo = mysqli_real_escape_string($conexao,$_POST['tipo']);
$query = "insert into data(data,tipo) values ('$data','$tipo')";
$result = mysqli_query($conexao, $query);
    if($result){
        echo "Salvo com Sucesso";
        header('Location: presenca.php?salvo=true');
    }
    else{
        echo "Deu ruim";
        header('Location: presenca.php?salvo=false');
        exit();
    }
?>