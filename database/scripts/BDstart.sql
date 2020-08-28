-- -----------------------------------------------------
-- INSERTS INICIAIS
-- -----------------------------------------------------
INSERT INTO `cl19467`.`admin` (`usuario`, `senha`) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `cl19467`.`sexo` (`nome`) VALUES ('masculino');
INSERT INTO `cl19467`.`sexo` (`nome`) VALUES ('feminino');

/*MODALIDADES*/
INSERT INTO `cl19467`.`modalidade` (`nome`, `descricao`,`limite_jogadores_time`, `status`) VALUES ('Futebol', 'futebol teste', '5', '1');
INSERT INTO `cl19467`.`modalidade` (`nome`, `descricao`,`limite_jogadores_time`, `status`) VALUES ('Basquete', 'Basquete teste', '5', '1');
INSERT INTO `cl19467`.`modalidade` (`nome`, `descricao`,`limite_jogadores_time`, `status`) VALUES ('Volei', 'volei teste', '4', '1');
INSERT INTO `cl19467`.`modalidade` (`nome`, `descricao`,`limite_jogadores_time`, `status`) VALUES ('teste', 'teste','1', '0');

/*MODALIDADE_EDICAO_STATUS*/
INSERT INTO `cl19467`.`modalidade_edicao_status` (`nome`) VALUES ('inscrições abertas');
INSERT INTO `cl19467`.`modalidade_edicao_status` (`nome`) VALUES ('inscrições finalizadas');
INSERT INTO `cl19467`.`modalidade_edicao_status` (`nome`) VALUES ('finalizado');
INSERT INTO `cl19467`.`modalidade_edicao_status` (`nome`) VALUES ('preparando');
INSERT INTO `cl19467`.`modalidade_edicao_status` (`nome`) VALUES ('cancelado');

/*EDICAO*/
INSERT INTO `cl19467`.`edicao` (`ano`, `titulo`) VALUES ('2020', 'COTIL JOGOS');
INSERT INTO `cl19467`.`edicao` (`ano`, `titulo`) VALUES ('2019', 'COTIL JOGOS');

/*EDICAO MODALIDADE*/
INSERT INTO `cl19467`.`modalidade_edicao` (`edicao_id`, `modalidade_id`, `status`, `modalidade_edicao_status_id`) VALUES ('1', '1', '1', '3');
INSERT INTO `cl19467`.`modalidade_edicao` (`edicao_id`, `modalidade_id`, `status`, `modalidade_edicao_status_id`) VALUES ('2', '1', '1', '5');
