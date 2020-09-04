<div class="row">

	<?php if ($pedidoFinalizado) { ?>

    <div class="col-md-12">
      	<div class="box box-info">
          	<div class="box-body">
          		PEDIDO JÁ FINALIZADO, NÃO PODE SER EDITADO.
          	</div>
        </div>
    </div>

	<?php die(); } ?>

    <div class="col-md-6">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Adicionar Itens do Pedido</h3>
            </div>
            <?php //echo form_open('itenspedido/add'); ?>
          	<div class="box-body">

          		<div class="row clearfix">

					<input type="hidden" name="PedidoEstoque_idPedidoEstoque" value="<?php echo $this->input->get('pedidoestoque_id'); ?>" class="form-control" id="PedidoEstoque_idPedidoEstoque" /> 

					<div class="col-md-12">
						<label for="Produto_queryProduto" class="control-label">Pesquisar Produto</label>
						<div class="form-group">
							<input type="text" class="form-control" id="Produto_queryProduto" />
						</div>
					</div> 

					<div class="col-md-2">
						<label for="Produto_idProduto" class="control-label">Código</label>
						<div class="form-group">
							<input type="text" name="Produto_idProduto" value="<?php echo $this->input->post('Produto_idProduto'); ?>" class="form-control" id="Produto_idProduto" readonly/>
						</div> 
					</div>
					<div class="col-md-10"> 
						<label for="Produto_idProduto" class="control-label">Descrição</label>
						<div class="form-group">
							<input type="text" class="form-control" id="Produto_nmProduto" readonly/>
						</div>
					</div>

					<div class="col-md-6">
						<label for="qtdProduto" class="control-label">Quantidade</label>
						<div class="form-group">
							<input type="number" min="0" name="qtdProduto" value="1" class="form-control" id="qtdProduto" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="vrUnitario" class="control-label">Valor Unitario</label>
						<div class="form-group">
							<input readonly type="text" name="vrUnitario" value="<?php echo $this->input->post('vrUnitario'); ?>" class="form-control" id="vrUnitario" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="vrDesconto" class="control-label">Descontos</label>
						<div class="form-group">
							<input type="number" name="vrDesconto" value="<?php echo $this->input->post('vrDesconto'); ?>" class="form-control" id="vrDesconto" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="vrFrete" class="control-label">Valor do Frete</label>
						<div class="form-group">
							<input type="number" name="vrFrete" value="<?php echo $this->input->post('vrFrete'); ?>" class="form-control" id="vrFrete" />
						</div>
					</div>

					<div class="col-md-12">
						<label for="vrTotalProduto" class="control-label">Valor Total do Produto</label>
						<div class="form-group">
							<input readonly type="text" name="vrTotalProduto" value="<?php echo $this->input->post('vrTotalProduto'); ?>" class="form-control" id="vrTotalProduto" />
						</div>
					</div>

				</div>
			</div>
          	<div class="box-footer"> 
            	<button type="button" class="btn btn-primary" onclick="enviar_formulario()">
            		<i class="fa fa-plus"></i> Adicionar Produto
            	</button>
          	</div>
            <?php //echo form_close(); ?>
      	</div>
    </div>

    <div class="col-md-6">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Lista de Itens do Pedido</h3>
            </div>
          	<div class="box-body" id="box-lista-itens">

			</div>
      	</div>
    </div>
</div>  


<script type="text/javascript">

	function carregar_itens() {
		$('#box-lista-itens').html("Carregando...");
		$.get('<?php echo site_url('itenspedido/index/'.$this->input->get('pedidoestoque_id'));?>', function (data) {
			$('#box-lista-itens').html(data);
		});
	}

	$( function() {

		carregar_itens();

		$( "#Produto_queryProduto" ).autocomplete({
			focus: true,
			source: "<?php echo site_url('produto/query_autocomplete/');?>", 
			minLength: 2, 
			select: function( event, ui ) {
				selecionar_produto(ui.item.id);
			}
		});

		function selecionar_produto(idProduto) {
			$.getJSON('<?php echo site_url('produto/get_json_produto');?>?idProduto='+idProduto, function (json) {
				$('#Produto_idProduto').val(json.idProduto);
				$('#Produto_nmProduto').val(json.nmProduto);
				$('#vrUnitario').val(number_format(json.vrPrecoVenda, 2, ',', '.'));
				$('#qtdProduto').select();
				calcular_total();
			});
		}

		$('#qtdProduto').on('keyup', function(event) {
			calcular_total();
		});

		$('#qtdProduto').on('keydown', function(event) {
			calcular_total();
			if (event.keyCode == 13) {
				$('#vrDesconto').select();
				event.preventDefault();
				return;
			}
		});

		$('#vrDesconto').on('keydown', function(event) {
			calcular_total();
			if (event.keyCode == 13) { 
				$('#vrFrete').select();
				event.preventDefault();
				return;
			}
		});

		$('#vrFrete').on('keydown', function(event) {
			calcular_total();
			if (event.keyCode == 13) { 
				enviar_formulario();
				event.preventDefault();
				return;
			}
		});

		function calcular_total() { 
			var qtdProduto = $('#qtdProduto').val(); 
			var vrUnitario = new Number($('#vrUnitario').val().replace('.' , '').replace(',', '.'));
			var vrDesconto = new Number($('#vrDesconto').val());
			var vrFrete = new Number($('#vrFrete').val());
			var vrTotalProduto = (qtdProduto * vrUnitario) - vrDesconto + vrFrete;

			$('#vrTotalProduto').val(number_format(vrTotalProduto, 2, ',', '.'));
		}

	});


	function enviar_formulario() { 

		var PedidoEstoque_idPedidoEstoque = $('#PedidoEstoque_idPedidoEstoque').val();
		var Produto_idProduto = $('#Produto_idProduto').val();
		var qtdProduto = $('#qtdProduto').val();
		var vrUnitario = $('#vrUnitario').val().replace('.', '').replace(',', '.');
		var vrDesconto = $('#vrDesconto').val() ? $('#vrDesconto').val() : 0;
		var vrFrete = $('#vrFrete').val() ? $('#vrFrete').val() : 0; 

		if (!PedidoEstoque_idPedidoEstoque) {
			alert('Pedido não informado.');
			return;
		}
		if (!Produto_idProduto) {
			alert('Produto não informado.');
			return;
		}
		if (!qtdProduto > 0) {
			alert('Quantidade não informado.'); 
			return;
		}
		if (qtdProduto < 0) { 
			alert('Quantidade não pode ser negativa.');
			return;
		}
		if (!vrUnitario > 0) {
			alert('Produto sem preço de venda.');
			return;
		}
		if (vrDesconto < 0) {
			alert('Desconto não pode ser negativo.');
			return;
		}
		if (vrFrete < 0) { 
			alert('Frete não pode ser negativo.');
			return;
		}

		var item_pedido = {
			PedidoEstoque_idPedidoEstoque: PedidoEstoque_idPedidoEstoque,
			Produto_idProduto: Produto_idProduto,
			qtdProduto: qtdProduto,
			vrUnitario: vrUnitario,
			vrDesconto: vrDesconto,
			vrFrete: vrFrete,
			status: 'ativo',
		};

		$.post('<?php echo site_url('itenspedido/add');?>', item_pedido, function (retorno) {

			var retornoJSON = JSON.parse(retorno);

			alert(retornoJSON.msg);
			if (retornoJSON.sucesso) {
				carregar_itens();	
			}
		});

	}
</script>