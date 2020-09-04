<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Forma de Pagamento</h3>
            </div>
			<?php echo form_open('formapagamento/edit/'.$formapagamento['idFormaPagamento']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="descricao" class="control-label">Descrição</label>
						<div class="form-group">
							<input type="text" name="descricao" value="<?php echo ($this->input->post('descricao') ? $this->input->post('descricao') : $formapagamento['descricao']); ?>" class="form-control" id="descricao" required />
						</div>
					</div>
					<div class="col-md-6">
						<label for="qtdMaxParcelas" class="control-label">Qtd Máxima de Parcelas</label>
						<div class="form-group"> 
							<input type="text" name="qtdMaxParcelas" value="<?php echo ($this->input->post('qtdMaxParcelas') ? $this->input->post('qtdMaxParcelas') : $formapagamento['qtdMaxParcelas']); ?>" class="form-control" id="qtdMaxParcelas" required/>
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