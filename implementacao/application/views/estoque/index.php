<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Estoque</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Código Estoque</th>
						<th>Produto</th>
						<th>Filial</th> 
						<th>Quantidade</th>
                    </tr>
                    <?php foreach($estoque as $E){ ?>
                    <tr>
						<td><?php echo $E['idEstoque']; ?></td>
						<td><?php echo $E['Produto_idProduto']; ?></td>
						<td><?php echo $E['Filial_idFilial']; ?></td>
						<td><?php echo $E['qtdEstoqueProduto']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
