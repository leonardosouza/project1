<?php

try {
    $conexao = new PDO("mysql:host=localhost;dbname=codeeducation", "root", "default");
} catch (PDOException $e) {
    die("Erro código:" . $e->getCode() . ": ". $e->getMessage());
}

#var_dump($conexao);

$sql = "select * from conteudo";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($res);

foreach($res as $key => $cliente) {
    //print_r($cliente['id']." ");
    //print_r($cliente['login']."\n");
}

echo "<hr>";

$url = "/home";
$sql = "select * from conteudo where url = :url";
$stmt = $conexao->prepare($sql);
$stmt->bindValue("url", $url);
$stmt->execute();
$res = $stmt->fetch(PDO::FETCH_OBJ);

echo "<pre>";
print_r($res);


echo "<hr>";

$texto = "empresa";
$sql = "select * from conteudo where conteudo LIKE ?";
$stmt = $conexao->prepare($sql);
$stmt->execute(array('%'.$texto.'%'));
$res = $stmt->fetch(PDO::FETCH_OBJ);

echo "<pre>";
print_r($res);




?>