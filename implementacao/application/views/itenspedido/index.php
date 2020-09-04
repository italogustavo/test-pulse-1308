<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Produto</th>
        <th>Qtd. Produto</th>
        <th>Vr. Unitario</th>
        <th>Vr. Desconto</th>
        <th>Vr. Frete</th> 
        <th>Vr. Total</th>
        <th>status</th>
        <th>Ações</th> 
    </tr>
    <?php 
        $cont = 1; 
        foreach($itenspedido as $I){
    ?>
    <tr>
        <td><?php echo $cont; ?></td>
        <td><?php echo $I['nmProduto']; ?></td> 
        <td align="right"><?php echo number_format($I['qtdProduto'],3,',','.'); ?></td>
        <td align="right"><?php echo number_format($I['vrUnitario'],2,',','.'); ?></td>
        <td align="right"><?php echo number_format($I['vrDesconto'],2,',','.'); ?></td>
        <td align="right"><?php echo number_format($I['vrFrete'],2,',','.'); ?></td>
        <td align="right"><?php echo number_format($I['vrTotalProduto'],2,',','.'); ?></td>
        <td><?php echo $I['status']; ?></td>
        <td>
            <a href="<?php echo site_url('itenspedido/remove/'.$I['idItensPedido']).'?pedidoestoque_id='.$pedidoestoque_id; ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Remover</a>
        </td>
    </tr>
    <?php 
            $cont ++; 
        }
    ?>
</table>

<hr>

<table class="table table-striped" style="font-size: 16px !important;">
    <tr> 
        <td align="center">Qtd Itens:<br><?php echo $pedido['qtdItens']; ?></td>
        <td align="center">Sub-Total:<br><?php echo number_format($pedido['vrBruto'], 2, ',', '.'); ?></td>
        <td align="center">Descontos:<br><?php echo number_format($pedido['vrDesconto'], 2, ',', '.'); ?></td>
        <td align="center">Frete:<br><?php echo number_format($pedido['vrFrete'], 2, ',', '.'); ?></td>
        <td align="center">Valor Total:<br><strong><?php echo number_format($pedido['vrTotal'], 2, ',', '.'); ?></strong></td>
    </tr>
</table>
<br> 
<a class="btn btn-lg btn-success pull-right" href="<?php echo site_url('cobrancaspedido/add'.'?pedidoestoque_id='.$pedidoestoque_id)?>"><i class="fa fa-check"></i> Finalizar Pedido</a>
