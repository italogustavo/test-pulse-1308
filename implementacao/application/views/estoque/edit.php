<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Estoque Edit</h3>
            </div>
			<?php echo form_open('estoque/edit/'.$estoque['idEstoque']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="Produto_idProduto" class="control-label">Produto IdProduto</label>
						<div class="form-group">
							<input type="text" name="Produto_idProduto" value="<?php echo ($this->input->post('Produto_idProduto') ? $this->input->post('Produto_idProduto') : $estoque['Produto_idProduto']); ?>" class="form-control" id="Produto_idProduto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="Filial_idFilial" class="control-label">Filial IdFilial</label>
						<div class="form-group">
							<input type="text" name="Filial_idFilial" value="<?php echo ($this->input->post('Filial_idFilial') ? $this->input->post('Filial_idFilial') : $estoque['Filial_idFilial']); ?>" class="form-control" id="Filial_idFilial" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="qtdEstoqueProduto" class="control-label">QtdEstoqueProduto</label>
						<div class="form-group">
							<input type="text" name="qtdEstoqueProduto" value="<?php echo ($this->input->post('qtdEstoqueProduto') ? $this->input->post('qtdEstoqueProduto') : $estoque['qtdEstoqueProduto']); ?>" class="form-control" id="qtdEstoqueProduto" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>