<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Clientes</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('cliente/add'); ?>" class="btn btn-success btn-sm">Adicionar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Apelido</th>
						<th>Telefone</th>
						<th>Email</th>
						<th>Estado</th>
						<th>Cidade</th>
						<th>Bairro</th>
						<th>CEP</th>
						<th>Tipo</th>
						<th>CPF/CNPJ</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($clientes as $C){ ?>
                    <tr>
						<td><?php echo $C['idCliente']; ?></td>
						<td><?php echo $C['nmCliente']; ?></td>
						<td><?php echo $C['nmApelido']; ?></td>
						<td><?php echo $C['nrTelefone']; ?></td>
						<td><?php echo $C['dsEmail']; ?></td>
						<td><?php echo $C['nmEstado']; ?></td>
						<td><?php echo $C['nmCidade']; ?></td>
						<td><?php echo $C['nmBairro']; ?></td>
						<td><?php echo $C['cdCEP']; ?></td>
						<td><?php echo $C['tpCliente']; ?></td>
						<td><?php echo ($C['tpCliente'] == 'PF' ? $C['nrCPF'] : $C['nrCNPJ']); ?></td>
						<td>
                            <a href="<?php echo site_url('cliente/edit/'.$C['idCliente']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                            <a href="<?php echo site_url('cliente/remove/'.$C['idCliente']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
