<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Pedidos de Estoque</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('pedidoestoque/add'); ?>" class="btn btn-success btn-sm">Novo Pedido</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Código</th>
						<th>Filial</th>
						<th>Usuario</th>
						<th>Tipo</th>
						<th>Cliente</th>
						<th>Vr. Bruto</th>
						<th>Vr. Desconto</th>
						<th>Vr. Frete</th>
						<th>Vr. Total</th>
						<th>Qtd Itens</th>
						<th>Dt. Pedido</th>
						<th>Observação Entrega</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($pedidoestoque as $P){ ?>
                    <tr>
						<td><?php echo $P['idPedidoEstoque']; ?></td>
						<td><?php echo $P['Filial_idFilial']; ?></td>
						<td><?php echo $P['nmUsuario']; ?></td>
						<td><?php echo $P['tpPedido']; ?></td>
						<td><?php echo $P['nmCliente']; ?></td>
						<td align="right"><?php echo number_format($P['vrBruto'],2, ',', '.'); ?></td>
						<td align="right"><?php echo number_format($P['vrDesconto'],2, ',', '.'); ?></td>
						<td align="right"><?php echo number_format($P['vrFrete'],2, ',', '.'); ?></td>
						<td align="right"><?php echo number_format($P['vrTotal'],2, ',', '.'); ?></td>
						<td><?php echo $P['qtdItens']; ?></td>
						<td><?php echo $P['dtPedido']; ?></td>
						<td><?php echo $P['dsObservacaoEntrega']; ?></td>
						<td>
                            <a href="<?php echo site_url('itenspedido/add/?pedidoestoque_id='.$P['idPedidoEstoque']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
