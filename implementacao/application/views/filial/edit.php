<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Filial</h3>
            </div>
			<?php echo form_open('filial/edit/'.$filial['idFilial']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="dsRazaoSocial" class="control-label">Razão Social</label>
						<div class="form-group">
							<input type="text" name="dsRazaoSocial" value="<?php echo ($this->input->post('dsRazaoSocial') ? $this->input->post('dsRazaoSocial') : $filial['dsRazaoSocial']); ?>" class="form-control" id="dsRazaoSocial" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nmApelidoFilial" class="control-label">Apelido da Filial</label>
						<div class="form-group">
							<input type="text" name="nmApelidoFilial" value="<?php echo ($this->input->post('nmApelidoFilial') ? $this->input->post('nmApelidoFilial') : $filial['nmApelidoFilial']); ?>" class="form-control" id="nmApelidoFilial" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nrCNPJ" class="control-label">CNPJ</label>
						<div class="form-group">
							<input type="text" name="nrCNPJ" value="<?php echo ($this->input->post('nrCNPJ') ? $this->input->post('nrCNPJ') : $filial['nrCNPJ']); ?>" class="form-control" id="nrCNPJ" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cdCEP" class="control-label">CEP</label>
						<div class="form-group">
							<input type="text" name="cdCEP" value="<?php echo ($this->input->post('cdCEP') ? $this->input->post('cdCEP') : $filial['cdCEP']); ?>" class="form-control" id="cdCEP" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="nmEstado" class="control-label">Estado</label>
						<div class="form-group">
							<input type="text" name="nmEstado" value="<?php echo ($this->input->post('nmEstado') ? $this->input->post('nmEstado') : $filial['nmEstado']); ?>" class="form-control" id="nmEstado" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="nmCidade" class="control-label">Cidade</label>
						<div class="form-group">
							<input type="text" name="nmCidade" value="<?php echo ($this->input->post('nmCidade') ? $this->input->post('nmCidade') : $filial['nmCidade']); ?>" class="form-control" id="nmCidade" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="nmBairro" class="control-label">Bairro</label>
						<div class="form-group">
							<input type="text" name="nmBairro" value="<?php echo ($this->input->post('nmBairro') ? $this->input->post('nmBairro') : $filial['nmBairro']); ?>" class="form-control" id="nmBairro" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="dsEndereco" class="control-label">Endereço</label>
						<div class="form-group">
							<input type="text" name="dsEndereco" value="<?php echo ($this->input->post('dsEndereco') ? $this->input->post('dsEndereco') : $filial['dsEndereco']); ?>" class="form-control" id="dsEndereco" />
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