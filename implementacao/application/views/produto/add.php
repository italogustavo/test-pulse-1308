<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Adicionar Produto</h3>
            </div> 
            <?php echo form_open('produto/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nmProduto" class="control-label"><span class="text-danger">*</span>Descrição</label>
						<div class="form-group">
							<input type="text" name="nmProduto" value="<?php echo $this->input->post('nmProduto'); ?>" class="form-control" id="nmProduto" />
							<span class="text-danger"><?php echo form_error('nmProduto');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="vrPrecoVenda" class="control-label">Preço de venda</label>
						<div class="form-group">
							<input type="number" name="vrPrecoVenda" value="<?php echo $this->input->post('vrPrecoVenda'); ?>" class="form-control" id="vrPrecoVenda" />
							<span class="text-danger"><?php echo form_error('vrPrecoVenda');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="vrPrecoCusto" class="control-label">Preço de Custo</label>
						<div class="form-group">
							<input type="number" name="vrPrecoCusto" value="<?php echo $this->input->post('vrPrecoCusto'); ?>" class="form-control" id="vrPrecoCusto" />
							<span class="text-danger"><?php echo form_error('vrPrecoCusto');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nrCodigoBarras" class="control-label">Codigo de Barras</label>
						<div class="form-group">
							<input type="number" name="nrCodigoBarras" value="<?php echo $this->input->post('nrCodigoBarras'); ?>" class="form-control" id="nrCodigoBarras" />
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