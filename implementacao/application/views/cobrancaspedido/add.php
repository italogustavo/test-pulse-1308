<div class="row">
  <div class="col-md-12">
  	<div class="box box-info">
      <div class="box-header with-border">
        	<h3 class="box-title">Escolher Forma de Pagamento</h3>
      </div>
      <?php echo form_open('cobrancaspedido/add'); ?>
    	<div class="box-body">
    		<div class="row clearfix">

          <input type="hidden" name="PedidoEstoque_idPedidoEstoque" value="<?php echo $this->input->get('pedidoestoque_id'); ?>" class="form-control" id="PedidoEstoque_idPedidoEstoque" /> 

          <div class="col-md-12">
            <label for="FormaPagamento_idFormaPagamento" class="control-label">Forma de Pagamento</label>
            <div class="form-group">
              <select name="FormaPagamento_idFormaPagamento" id="FormaPagamento_idFormaPagamento" class="form-control" required>
                <option value="">Selecione uma forma de pagamento</option>
                <?php 
                foreach($all_formapagamento as $formapagamento)
                {
                  $selected = ($formapagamento['idFormaPagamento'] == $this->input->post('FormaPagamento_idFormaPagamento') || count($all_formapagamento) == 1) ? ' selected="selected"' : "";

                  echo '<option value="'.$formapagamento['idFormaPagamento'].'" '.$selected.'>'.$formapagamento['descricao'].'</option>';
                }
                ?>
              </select> 
            </div> 
          </div>

          <div class="col-md-12"> 
            <label for="vrCobranca" class="control-label">Valor</label>
            <div class="form-group"> 
              <input readonly type="text" name="vrCobranca" value="<?php echo number_format($pedido['vrTotal'], 2, ',', '.'); ?>" class="form-control" id="vrCobranca" required/>
            </div> 
          </div>

    		</div>
    	</div> 
    	<div class="box-footer">
      	<button type="submit" class="btn btn-success btn-lg">
      		<i class="fa fa-arrow-right"></i> Processar Pedido
      	</button>
    	</div>
      <?php echo form_close(); ?>
  	</div>
  </div>
</div>