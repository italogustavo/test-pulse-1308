<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Produtos</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('produto/add'); ?>" class="btn btn-success btn-sm">Adicionar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Código</th>
						<th>Produto</th>
						<th>Preço de Venda</th>
						<th>Preço de Custo</th>
						<th>Código Barras</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($produto as $P){ ?>
                    <tr>
						<td><?php echo $P['idProduto']; ?></td>
						<td><?php echo $P['nmProduto']; ?></td>
						<td><?php echo $P['vrPrecoVenda']; ?></td>
						<td><?php echo $P['vrPrecoCusto']; ?></td>
						<td><?php echo $P['nrCodigoBarras']; ?></td>
						<td>
                            <a href="<?php echo site_url('produto/edit/'.$P['idProduto']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                            <a href="<?php echo site_url('produto/remove/'.$P['idProduto']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
