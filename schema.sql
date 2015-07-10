CREATE SCHEMA `codeeducation` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

CREATE TABLE `codeeducation`.`conteudo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `secao` VARCHAR(255) NOT NULL,
  `conteudo` LONGTEXT NULL,
  `url` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `url_UNIQUE` (`url` ASC));


INSERT INTO `codeeducation`.`conteudo` (`secao`, `conteudo`, `url`) VALUES ('Home', 'Conteúdo da Home', '/home');
INSERT INTO `codeeducation`.`conteudo` (`secao`, `conteudo`, `url`) VALUES ('Empresa', 'Conteúdo da empresa', '/business');
INSERT INTO `codeeducation`.`conteudo` (`secao`, `conteudo`, `url`) VALUES ('Produtos', 'Conteúdo de produtos', '/products');
INSERT INTO `codeeducation`.`conteudo` (`secao`, `conteudo`, `url`) VALUES ('Serviços', 'Conteúdo de serviços', '/services');
