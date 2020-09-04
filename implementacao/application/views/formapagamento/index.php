<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista das Formas de Pagamento</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('formapagamento/add'); ?>" class="btn btn-success btn-sm">Adicionar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Código</th>
						<th>Descrição</th>
						<th>Qtd Max Parcelas</th>
						<th>Ações</th>
                    </tr>
                    <?php foreach($formapagamento as $F){ ?>
                    <tr>
						<td><?php echo $F['idFormaPagamento']; ?></td>
						<td><?php echo $F['descricao']; ?></td>
						<td><?php echo $F['qtdMaxParcelas']; ?></td>
						<td>
                            <a href="<?php echo site_url('formapagamento/edit/'.$F['idFormaPagamento']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                            <a href="<?php echo site_url('formapagamento/remove/'.$F['idFormaPagamento']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deletar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
