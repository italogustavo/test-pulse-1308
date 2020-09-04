<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Pedidoestoque Edit</h3>
            </div>
			<?php echo form_open('pedidoestoque/edit/'.$pedidoestoque['idPedidoEstoque']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="Filial_idFilial" class="control-label">Filial</label>
						<div class="form-group">
							<select name="Filial_idFilial" class="form-control">
								<option value="">select filial</option>
								<?php 
								foreach($all_filiais as $filial)
								{
									$selected = ($filial['idFilial'] == $pedidoestoque['Filial_idFilial']) ? ' selected="selected"' : "";

									echo '<option value="'.$filial['idFilial'].'" '.$selected.'>'.$filial['nmApelidoFilial'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Usuario_idUsuario" class="control-label">Usuario</label>
						<div class="form-group">
							<select name="Usuario_idUsuario" class="form-control">
								<option value="">select usuario</option>
								<?php 
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['idUsuario'] == $pedidoestoque['Usuario_idUsuario']) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['idUsuario'].'" '.$selected.'>'.$usuario['idUsuario'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tpPedido" class="control-label">TpPedido</label>
						<div class="form-group">
							<select name="tpPedido" class="form-control">
								<option value="">select</option>
								<?php 
								$tpPedido_values = array(
									'SAIDA'=>'VENDA',
									'ENTRADA'=>'COMPRA',
								);

								foreach($tpPedido_values as $value => $display_text)
								{
									$selected = ($value == $pedidoestoque['tpPedido']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Cliente_idCliente" class="control-label">Cliente</label>
						<div class="form-group">
							<select name="Cliente_idCliente" class="form-control">
								<option value="">select cliente</option>
								<?php 
								foreach($all_clientes as $cliente)
								{
									$selected = ($cliente['idCliente'] == $pedidoestoque['Cliente_idCliente']) ? ' selected="selected"' : "";

									echo '<option value="'.$cliente['idCliente'].'" '.$selected.'>'.$cliente['nmCliente'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="vrBruto" class="control-label">VrBruto</label>
						<div class="form-group">
							<input type="text" name="vrBruto" value="<?php echo ($this->input->post('vrBruto') ? $this->input->post('vrBruto') : $pedidoestoque['vrBruto']); ?>" class="form-control" id="vrBruto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="vrDesconto" class="control-label">VrDesconto</label>
						<div class="form-group">
							<input type="text" name="vrDesconto" value="<?php echo ($this->input->post('vrDesconto') ? $this->input->post('vrDesconto') : $pedidoestoque['vrDesconto']); ?>" class="form-control" id="vrDesconto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="vrFrete" class="control-label">VrFrete</label>
						<div class="form-group">
							<input type="text" name="vrFrete" value="<?php echo ($this->input->post('vrFrete') ? $this->input->post('vrFrete') : $pedidoestoque['vrFrete']); ?>" class="form-control" id="vrFrete" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="vrTotal" class="control-label">VrTotal</label>
						<div class="form-group">
							<input type="text" name="vrTotal" value="<?php echo ($this->input->post('vrTotal') ? $this->input->post('vrTotal') : $pedidoestoque['vrTotal']); ?>" class="form-control" id="vrTotal" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="qtdItens" class="control-label">QtdItens</label>
						<div class="form-group">
							<input type="text" name="qtdItens" value="<?php echo ($this->input->post('qtdItens') ? $this->input->post('qtdItens') : $pedidoestoque['qtdItens']); ?>" class="form-control" id="qtdItens" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dtPedido" class="control-label">DtPedido</label>
						<div class="form-group">
							<input type="text" name="dtPedido" value="<?php echo ($this->input->post('dtPedido') ? $this->input->post('dtPedido') : $pedidoestoque['dtPedido']); ?>" class="form-control" id="dtPedido" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dsObservacaoEntrega" class="control-label">DsObservacaoEntrega</label>
						<div class="form-group">
							<textarea name="dsObservacaoEntrega" class="form-control" id="dsObservacaoEntrega"><?php echo ($this->input->post('dsObservacaoEntrega') ? $this->input->post('dsObservacaoEntrega') : $pedidoestoque['dsObservacaoEntrega']); ?></textarea>
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