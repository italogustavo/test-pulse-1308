<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Cliente</h3>
            </div>
			<?php echo form_open('cliente/edit/'.$cliente['idCliente']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nmCliente" class="control-label">Nome do Cliente</label>
						<div class="form-group">
							<input type="text" name="nmCliente" value="<?php echo ($this->input->post('nmCliente') ? $this->input->post('nmCliente') : $cliente['nmCliente']); ?>" class="form-control" id="nmCliente" />
							<span class="text-danger"><?php echo form_error('nmCliente');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nmApelido" class="control-label">Apelido</label>
						<div class="form-group">
							<input type="text" name="nmApelido" value="<?php echo ($this->input->post('nmApelido') ? $this->input->post('nmApelido') : $cliente['nmApelido']); ?>" class="form-control" id="nmApelido" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tpCliente" class="control-label">Tipo</label>
						<div class="form-group">
							<select name="tpCliente" class="form-control" id="tpCliente" required onchange="validarTipoCliente(this.value)">
								<option value="" <?php echo (($this->input->post('tpCliente') ? $this->input->post('tpCliente') : $cliente['tpCliente']) == "" ? "selected" : ""); ?>>Selecione</option>
								<option value="PJ" <?php echo (($this->input->post('tpCliente') ? $this->input->post('tpCliente') : $cliente['tpCliente']) == "PJ" ? "selected" : ""); ?>>Jurídica</option>
								<option value="PF" <?php echo (($this->input->post('tpCliente') ? $this->input->post('tpCliente') : $cliente['tpCliente']) == "PF" ? "selected" : ""); ?>>Física</option>
							</select>
						</div> 
					</div>
					<div class="col-md-6" id="input-cpf">
						<label for="nrCPF" class="control-label">CPF</label>
						<div class="form-group">
							<input type="text" name="nrCPF" value="<?php echo ($this->input->post('nrCPF') ? $this->input->post('nrCPF') : $cliente['nrCPF']); ?>" class="form-control" id="nrCPF" />
						</div>
					</div>
					<div class="col-md-6" id="input-cnpj">
						<label for="nrCNPJ" class="control-label">CNPJ</label>
						<div class="form-group">
							<input type="text" name="nrCNPJ" value="<?php echo ($this->input->post('nrCNPJ') ? $this->input->post('nrCNPJ') : $cliente['nrCNPJ']); ?>" class="form-control" id="nrCNPJ" />
						</div>
					</div>
					<script type="text/javascript"> 
						
						validarTipoCliente('<?php echo ($this->input->post('tpCliente') ? $this->input->post('tpCliente') : $cliente['tpCliente']); ?>');

						function validarTipoCliente(element) { 
							var input_cpf = document.querySelector('#input-cpf'); 
							var input_cnpj = document.querySelector('#input-cnpj');
							if (element == 'PJ') {
								input_cpf.style.display = 'none';
								input_cnpj.style.display = 'block';
							} else if (element == 'PF') {
								input_cpf.style.display = 'block'; 
								input_cnpj.style.display = 'none';
							}
						}
					</script>
					<div class="col-md-6">
						<label for="nrTelefone" class="control-label">Telefone</label>
						<div class="form-group">
							<input type="text" name="nrTelefone" value="<?php echo ($this->input->post('nrTelefone') ? $this->input->post('nrTelefone') : $cliente['nrTelefone']); ?>" class="form-control" id="nrTelefone" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dsEmail" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="dsEmail" value="<?php echo ($this->input->post('dsEmail') ? $this->input->post('dsEmail') : $cliente['dsEmail']); ?>" class="form-control" id="dsEmail" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cdCEP" class="control-label">CEP</label>
						<div class="form-group">
							<input type="text" name="cdCEP" value="<?php echo ($this->input->post('cdCEP') ? $this->input->post('cdCEP') : $cliente['cdCEP']); ?>" class="form-control" id="cdCEP" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nmEstado" class="control-label">Estado</label>
						<div class="form-group">
							<input type="text" name="nmEstado" value="<?php echo ($this->input->post('nmEstado') ? $this->input->post('nmEstado') : $cliente['nmEstado']); ?>" class="form-control" id="nmEstado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nmCidade" class="control-label">Cidade</label>
						<div class="form-group">
							<input type="text" name="nmCidade" value="<?php echo ($this->input->post('nmCidade') ? $this->input->post('nmCidade') : $cliente['nmCidade']); ?>" class="form-control" id="nmCidade" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nmBairro" class="control-label">Bairro</label>
						<div class="form-group">
							<input type="text" name="nmBairro" value="<?php echo ($this->input->post('nmBairro') ? $this->input->post('nmBairro') : $cliente['nmBairro']); ?>" class="form-control" id="nmBairro" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="dsEndereco" class="control-label">Endereço</label>
						<div class="form-group">
							<input type="text" name="dsEndereco" value="<?php echo ($this->input->post('dsEndereco') ? $this->input->post('dsEndereco') : $cliente['dsEndereco']); ?>" class="form-control" id="dsEndereco" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Salvar
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>