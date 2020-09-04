<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Iniciar Pedido de Estoque</h3>
            </div>
            <?php echo form_open('pedidoestoque/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="Filial_idFilial" class="control-label">Filial</label>
						<div class="form-group">
							<select name="Filial_idFilial" class="form-control" required>
								<option value="">Selecione uma filial</option>
								<?php 
								foreach($all_filiais as $filial)
								{
									$selected = ($filial['idFilial'] == $this->input->post('Filial_idFilial') || count($all_filiais) == 1) ? ' selected="selected"' : "";

									echo '<option value="'.$filial['idFilial'].'" '.$selected.'>'.$filial['nmApelidoFilial'].'</option>';
								} 
								?>
							</select>
						</div> 
					</div>
					<div class="col-md-6">
						<label for="Usuario_idUsuario" class="control-label">Usuário</label>
						<div class="form-group">
							<select name="Usuario_idUsuario" class="form-control" required>
								<option value="">Selecione um usuário</option>
								<?php 
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['idUsuario'] == $this->input->post('Usuario_idUsuario') || count($all_usuario) == 1) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['idUsuario'].'" '.$selected.'>'.$usuario['nmUsuario'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Cliente_idCliente" class="control-label">Cliente</label>
						<div class="form-group">
							<select name="Cliente_idCliente" class="form-control" required>
								<option value="">Selecione um cliente</option>
								<?php 
								foreach($all_clientes as $cliente)
								{
									$selected = ($cliente['idCliente'] == $this->input->post('Cliente_idCliente') || count($all_clientes) == 1) ? ' selected="selected"' : "";

									echo '<option value="'.$cliente['idCliente'].'" '.$selected.'>'.$cliente['nmCliente'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tpPedido" class="control-label">Tipo de Pedido</label>
						<div class="form-group">
							<select name="tpPedido" class="form-control" required>
								<option value="">Selecione o tipo de pedido</option>
								<?php 
								$tpPedido_values = array(
									'SAIDA'=>'SAÍDA',
									'ENTRADA'=>'ENTRADA',
								);

								foreach($tpPedido_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('tpPedido')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<label for="dsObservacaoEntrega" class="control-label">Observação de Entrega</label>
						<div class="form-group">
							<textarea name="dsObservacaoEntrega" class="form-control" id="dsObservacaoEntrega"><?php echo $this->input->post('dsObservacaoEntrega'); ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Iniciar Pedido
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>