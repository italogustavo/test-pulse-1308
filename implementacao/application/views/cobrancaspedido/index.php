<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cobrancaspedido Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('cobrancaspedido/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>IdCobrancasPedido</th>
						<th>PedidoEstoque IdPedidoEstoque</th>
						<th>FormaPagamento IdFormaPagamento</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($cobrancaspedido as $C){ ?>
                    <tr>
						<td><?php echo $C['idCobrancasPedido']; ?></td>
						<td><?php echo $C['PedidoEstoque_idPedidoEstoque']; ?></td>
						<td><?php echo $C['FormaPagamento_idFormaPagamento']; ?></td>
						<td>
                            <a href="<?php echo site_url('cobrancaspedido/edit/'.$C['idCobrancasPedido']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('cobrancaspedido/remove/'.$C['idCobrancasPedido']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
