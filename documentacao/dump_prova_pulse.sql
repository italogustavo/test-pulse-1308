-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema prova_pulse
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema prova_pulse
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `prova_pulse` DEFAULT CHARACTER SET utf8 ;
USE `prova_pulse` ;

-- -----------------------------------------------------
-- Table `prova_pulse`.`Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova_pulse`.`Produto` (
  `idProduto` INT NOT NULL AUTO_INCREMENT,
  `nmProduto` VARCHAR(45) NULL,
  `vrPrecoVenda` DECIMAL(16,6) NOT NULL,
  `vrPrecoCusto` DECIMAL(16,6) NOT NULL,
  `nrCodigoBarras` VARCHAR(20) NULL,
  PRIMARY KEY (`idProduto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prova_pulse`.`Filial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova_pulse`.`Filial` (
  `idFilial` INT NOT NULL AUTO_INCREMENT,
  `dsRazaoSocial` VARCHAR(120) NULL,
  `nmApelidoFilial` VARCHAR(60) NULL,
  `nrCNPJ` VARCHAR(45) NULL,
  `cdCEP` VARCHAR(45) NULL,
  `nmEstado` VARCHAR(45) NULL,
  `nmCidade` VARCHAR(45) NULL,
  `nmBairro` VARCHAR(45) NULL,
  `dsEndereco` VARCHAR(45) NULL,
  PRIMARY KEY (`idFilial`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prova_pulse`.`Estoque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova_pulse`.`Estoque` (
  `idEstoque` INT NOT NULL AUTO_INCREMENT,
  `Produto_idProduto` INT NOT NULL,
  `Filial_idFilial` INT NOT NULL,
  `qtdEstoqueProduto` DECIMAL(16,6) NULL,
  PRIMARY KEY (`idEstoque`),
  INDEX `fk_Estoque_Produto1_idx` (`Produto_idProduto` ASC) VISIBLE,
  INDEX `fk_Estoque_Filial1_idx` (`Filial_idFilial` ASC) VISIBLE,
  CONSTRAINT `fk_Estoque_Produto1`
    FOREIGN KEY (`Produto_idProduto`)
    REFERENCES `prova_pulse`.`Produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estoque_Filial1`
    FOREIGN KEY (`Filial_idFilial`)
    REFERENCES `prova_pulse`.`Filial` (`idFilial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prova_pulse`.`FormaPagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova_pulse`.`FormaPagamento` (
  `idFormaPagamento` INT NOT NULL,
  `descricao` VARCHAR(60) NOT NULL,
  `qtdMaxParcelas` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`idFormaPagamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prova_pulse`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova_pulse`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nmUsuario` VARCHAR(60) NOT NULL,
  `cdLogin` VARCHAR(60) NOT NULL,
  `cdSenha` VARCHAR(60) NOT NULL,
  `ativo` INT(1) NULL DEFAULT 1,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prova_pulse`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova_pulse`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nmCliente` VARCHAR(60) NULL,
  `nmApelido` VARCHAR(45) NULL,
  `nrTelefone` VARCHAR(45) NULL,
  `dsEmail` VARCHAR(45) NULL,
  `nmEstado` VARCHAR(45) NULL,
  `nmCidade` VARCHAR(45) NULL,
  `nmBairro` VARCHAR(45) NULL,
  `cdCEP` VARCHAR(45) NULL,
  `dsEndereco` VARCHAR(60) NULL,
  `tpCliente` ENUM('PF', 'PJ') NULL DEFAULT 'PF',
  `nrCPF` VARCHAR(45) NULL,
  `nrCNPJ` VARCHAR(45) NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prova_pulse`.`PedidoEstoque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova_pulse`.`PedidoEstoque` (
  `idPedidoEstoque` INT NOT NULL AUTO_INCREMENT,
  `Filial_idFilial` INT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  `tpPedido` ENUM('SAIDA', 'ENTRADA') NOT NULL,
  `dsObservacaoEntrega` VARCHAR(120) NULL,
  `vrBruto` DECIMAL(16,6) NULL,
  `vrDesconto` DECIMAL(16,6) NULL,
  `vrFrete` DECIMAL(16,6) NULL,
  `vrTotal` DECIMAL(16,6) NULL,
  `qtdItens` INT(11) NULL,
  `dtPedido` TIMESTAMP NULL,
  `Cliente_idCliente` INT NOT NULL,
  `statusPedido` ENUM('digitando', 'finalizado') NULL DEFAULT 'digitando',
  PRIMARY KEY (`idPedidoEstoque`),
  INDEX `fk_PedidoEstoque_Filial1_idx` (`Filial_idFilial` ASC) VISIBLE,
  INDEX `fk_PedidoEstoque_Usuario1_idx` (`Usuario_idUsuario` ASC) VISIBLE,
  INDEX `fk_PedidoEstoque_Cliente1_idx` (`Cliente_idCliente` ASC) VISIBLE,
  CONSTRAINT `fk_PedidoEstoque_Filial1`
    FOREIGN KEY (`Filial_idFilial`)
    REFERENCES `prova_pulse`.`Filial` (`idFilial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PedidoEstoque_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `prova_pulse`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PedidoEstoque_Cliente1`
    FOREIGN KEY (`Cliente_idCliente`)
    REFERENCES `prova_pulse`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prova_pulse`.`CobrancasPedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova_pulse`.`CobrancasPedido` (
  `idCobrancasPedido` INT NOT NULL AUTO_INCREMENT,
  `PedidoEstoque_idPedidoEstoque` INT NOT NULL,
  `FormaPagamento_idFormaPagamento` INT NOT NULL,
  `vrCobranca` DECIMAL(16,6) NOT NULL,
  PRIMARY KEY (`idCobrancasPedido`),
  INDEX `fk_CobrancasPedido_PedidoEstoque1_idx` (`PedidoEstoque_idPedidoEstoque` ASC) VISIBLE,
  INDEX `fk_CobrancasPedido_FormaPagamento1_idx` (`FormaPagamento_idFormaPagamento` ASC) VISIBLE,
  CONSTRAINT `fk_CobrancasPedido_PedidoEstoque1`
    FOREIGN KEY (`PedidoEstoque_idPedidoEstoque`)
    REFERENCES `prova_pulse`.`PedidoEstoque` (`idPedidoEstoque`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CobrancasPedido_FormaPagamento1`
    FOREIGN KEY (`FormaPagamento_idFormaPagamento`)
    REFERENCES `prova_pulse`.`FormaPagamento` (`idFormaPagamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prova_pulse`.`ItensPedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova_pulse`.`ItensPedido` (
  `idItensPedido` INT NOT NULL AUTO_INCREMENT,
  `PedidoEstoque_idPedidoEstoque` INT NOT NULL,
  `Produto_idProduto` INT NOT NULL,
  `qtdProduto` DECIMAL(16,6) NULL,
  `vrUnitario` DECIMAL(16,6) NULL,
  `vrDesconto` DECIMAL(16,6) NULL,
  `vrFrete` DECIMAL(16,6) NULL,
  `vrTotalProduto` DECIMAL(16,6) NULL,
  `nrSequencial` INT(11) NULL,
  `cdUnidade` VARCHAR(45) NULL,
  `status` ENUM('ativo', 'cancelado', 'processado') NULL DEFAULT 'ativo',
  PRIMARY KEY (`idItensPedido`),
  INDEX `fk_ItensPedido_PedidoEstoque1_idx` (`PedidoEstoque_idPedidoEstoque` ASC) VISIBLE,
  INDEX `fk_ItensPedido_Produto1_idx` (`Produto_idProduto` ASC) VISIBLE,
  CONSTRAINT `fk_ItensPedido_PedidoEstoque1`
    FOREIGN KEY (`PedidoEstoque_idPedidoEstoque`)
    REFERENCES `prova_pulse`.`PedidoEstoque` (`idPedidoEstoque`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ItensPedido_Produto1`
    FOREIGN KEY (`Produto_idProduto`)
    REFERENCES `prova_pulse`.`Produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
