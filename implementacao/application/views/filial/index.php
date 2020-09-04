<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Filiais</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('filial/add'); ?>" class="btn btn-success btn-sm">Adicionar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Código</th>
						<th>Razão Social</th>
						<th>Apelido da Filial</th>
						<th>CNPJ</th>
						<th>CEP</th>
						<th>Estado</th>
						<th>Cidade</th>
						<th>Bairro</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($filiais as $F){ ?>
                    <tr>
						<td><?php echo $F['idFilial']; ?></td>
						<td><?php echo $F['dsRazaoSocial']; ?></td>
						<td><?php echo $F['nmApelidoFilial']; ?></td>
						<td><?php echo $F['nrCNPJ']; ?></td>
						<td><?php echo $F['cdCEP']; ?></td>
						<td><?php echo $F['nmEstado']; ?></td>
						<td><?php echo $F['nmCidade']; ?></td>
						<td><?php echo $F['nmBairro']; ?></td>
						<td>
                            <a href="<?php echo site_url('filial/edit/'.$F['idFilial']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                            <a href="<?php echo site_url('filial/remove/'.$F['idFilial']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
