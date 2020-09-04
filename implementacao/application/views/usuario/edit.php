<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Usuário</h3>
            </div>
			<?php echo form_open('usuario/edit/'.$usuario['idUsuario']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-12">
						<label for="nmUsuario" class="control-label"><span class="text-danger">*</span>Nome</label>
						<div class="form-group">
							<input type="text" name="nmUsuario" value="<?php echo ($this->input->post('nmUsuario') ? $this->input->post('nmUsuario') : $usuario['nmUsuario']); ?>" class="form-control" id="nmUsuario" />
							<span class="text-danger"><?php echo form_error('nmUsuario');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cdLogin" class="control-label"><span class="text-danger">*</span>Login</label>
						<div class="form-group">
							<input type="text" name="cdLogin" value="<?php echo ($this->input->post('cdLogin') ? $this->input->post('cdLogin') : $usuario['cdLogin']); ?>" class="form-control" id="cdLogin" />
							<span class="text-danger"><?php echo form_error('cdLogin');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cdSenha" class="control-label"><span class="text-danger">*</span>Senha</label>
						<div class="form-group"> 
							<input type="password" name="cdSenha" class="form-control" id="cdSenha" />
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