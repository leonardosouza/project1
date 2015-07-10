<?php
header('Content-type: text/plain; charset=utf-8');
require_once("conn.php");
$conn = connDb();

echo "##### Executando fixture #####\n";

echo "##### Removendo database #####\n";
$conn->exec("DROP DATABASE IF EXISTS codeeducation");
echo "OK!\n";

echo "##### Criando schema #####\n";
$conn->exec("CREATE SCHEMA codeeducation DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;");
echo "OK!\n"; 

echo "##### Criando tabelas #####\n";
$conn->exec("CREATE TABLE codeeducation.conteudo (
  id INT NOT NULL AUTO_INCREMENT,
  secao VARCHAR(255) NOT NULL,
  conteudo LONGTEXT NULL,
  url VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX url_UNIQUE (url ASC));");
echo "OK!\n"; 

echo "##### Inserindo dados #####\n";
$conn->exec("INSERT INTO codeeducation.conteudo (secao, conteudo, url) VALUES ('Home', 'Conteudo da home', '/home');");
$conn->exec("INSERT INTO codeeducation.conteudo (secao, conteudo, url) VALUES ('Empresa', 'Conteudo da empresa', '/business');");
$conn->exec("INSERT INTO codeeducation.conteudo (secao, conteudo, url) VALUES ('Produtos', 'Conteudo de produtos', '/products');");
$conn->exec("INSERT INTO codeeducation.conteudo (secao, conteudo, url) VALUES ('Serviços', 'Conteudo de servicos', '/services');");
echo "OK!\n";
