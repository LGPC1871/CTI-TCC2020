CREATE TABLE IF NOT EXISTS `mydb`.`HA_carrossel` (
  `HA_id` INT NOT NULL AUTO_INCREMENT,
  `HA_status` TINYINT NOT NULL DEFAULT 0,
  `HA_imagem` BLOB NULL,
  `HA_imagemalt` VARCHAR(45) NULL,
  `HA_legendatitulo` VARCHAR(100) NULL,
  `HA_legendatexto` MEDIUMTEXT NULL,
  PRIMARY KEY (`HA_id`))