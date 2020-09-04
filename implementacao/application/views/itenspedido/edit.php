<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Itenspedido Edit</h3>
            </div>
			<?php echo form_open('itenspedido/edit/'.$itenspedido['idItensPedido']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="PedidoEstoque_idPedidoEstoque" class="control-label">PedidoEstoque IdPedidoEstoque</label>
						<div class="form-group">
							<input type="text" name="PedidoEstoque_idPedidoEstoque" value="<?php echo ($this->input->post('PedidoEstoque_idPedidoEstoque') ? $this->input->post('PedidoEstoque_idPedidoEstoque') : $itenspedido['PedidoEstoque_idPedidoEstoque']); ?>" class="form-control" id="PedidoEstoque_idPedidoEstoque" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="Produto_idProduto" class="control-label">Produto IdProduto</label>
						<div class="form-group">
							<input type="text" name="Produto_idProduto" value="<?php echo ($this->input->post('Produto_idProduto') ? $this->input->post('Produto_idProduto') : $itenspedido['Produto_idProduto']); ?>" class="form-control" id="Produto_idProduto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="qtdProduto" class="control-label">QtdProduto</label>
						<div class="form-group">
							<input type="text" name="qtdProduto" value="<?php echo ($this->input->post('qtdProduto') ? $this->input->post('qtdProduto') : $itenspedido['qtdProduto']); ?>" class="form-control" id="qtdProduto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="vrUnitario" class="control-label">VrUnitario</label>
						<div class="form-group">
							<input type="text" name="vrUnitario" value="<?php echo ($this->input->post('vrUnitario') ? $this->input->post('vrUnitario') : $itenspedido['vrUnitario']); ?>" class="form-control" id="vrUnitario" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="vrDesconto" class="control-label">VrDesconto</label>
						<div class="form-group">
							<input type="text" name="vrDesconto" value="<?php echo ($this->input->post('vrDesconto') ? $this->input->post('vrDesconto') : $itenspedido['vrDesconto']); ?>" class="form-control" id="vrDesconto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="vrFrete" class="control-label">VrFrete</label>
						<div class="form-group">
							<input type="text" name="vrFrete" value="<?php echo ($this->input->post('vrFrete') ? $this->input->post('vrFrete') : $itenspedido['vrFrete']); ?>" class="form-control" id="vrFrete" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="vrTotalProduto" class="control-label">VrTotalProduto</label>
						<div class="form-group">
							<input type="text" name="vrTotalProduto" value="<?php echo ($this->input->post('vrTotalProduto') ? $this->input->post('vrTotalProduto') : $itenspedido['vrTotalProduto']); ?>" class="form-control" id="vrTotalProduto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nrSequencial" class="control-label">NrSequencial</label>
						<div class="form-group">
							<input type="text" name="nrSequencial" value="<?php echo ($this->input->post('nrSequencial') ? $this->input->post('nrSequencial') : $itenspedido['nrSequencial']); ?>" class="form-control" id="nrSequencial" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cdUnidade" class="control-label">CdUnidade</label>
						<div class="form-group">
							<input type="text" name="cdUnidade" value="<?php echo ($this->input->post('cdUnidade') ? $this->input->post('cdUnidade') : $itenspedido['cdUnidade']); ?>" class="form-control" id="cdUnidade" />
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