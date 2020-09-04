<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Usuários</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success btn-sm">Adicionar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Login</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($usuario as $U){ ?>
                    <tr>
						<td><?php echo $U['idUsuario']; ?></td>
						<td><?php echo $U['nmUsuario']; ?></td>
						<td><?php echo $U['cdLogin']; ?></td>
						<td>
                            <a href="<?php echo site_url('usuario/edit/'.$U['idUsuario']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                            <a href="<?php echo site_url('usuario/remove/'.$U['idUsuario']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
