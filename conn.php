<?php

function connDb() {
  try {
    $config = include "config.php";

    if(!isset($config['db'])) {
      throw new Exception("Erro ao carregar configuração do BD", 1); 
    }

    return new \PDO("mysql:host=".$config['db']['host'].";dbname=".$config['db']['dbname'], $config['db']['user'], $config['db']['pass']);

  } catch (\PDOException $e) {
     echo "Erro código:" . $e->getCode() . ": ". $e->getMessage();
  }
}