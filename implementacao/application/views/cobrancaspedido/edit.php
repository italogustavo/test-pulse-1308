<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Cobrancaspedido Edit</h3>
            </div>
			<?php echo form_open('cobrancaspedido/edit/'.$cobrancaspedido['idCobrancasPedido']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="PedidoEstoque_idPedidoEstoque" class="control-label">PedidoEstoque IdPedidoEstoque</label>
						<div class="form-group">
							<input type="text" name="PedidoEstoque_idPedidoEstoque" value="<?php echo ($this->input->post('PedidoEstoque_idPedidoEstoque') ? $this->input->post('PedidoEstoque_idPedidoEstoque') : $cobrancaspedido['PedidoEstoque_idPedidoEstoque']); ?>" class="form-control" id="PedidoEstoque_idPedidoEstoque" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="FormaPagamento_idFormaPagamento" class="control-label">FormaPagamento IdFormaPagamento</label>
						<div class="form-group">
							<input type="text" name="FormaPagamento_idFormaPagamento" value="<?php echo ($this->input->post('FormaPagamento_idFormaPagamento') ? $this->input->post('FormaPagamento_idFormaPagamento') : $cobrancaspedido['FormaPagamento_idFormaPagamento']); ?>" class="form-control" id="FormaPagamento_idFormaPagamento" />
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