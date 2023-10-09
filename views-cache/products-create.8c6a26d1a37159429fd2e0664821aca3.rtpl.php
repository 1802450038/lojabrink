<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Produtos
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/admin/categories">Categorias</a></li>
      <li class="active"><a href="/admin/categories/create">Cadastrar</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Novo Produto</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/products/create" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="desproduct">Nome da produto</label>
                <input type="text" class="form-control" id="desproduct" name="desproduct"
                  placeholder="Digite o nome do produto">
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label for="vlprice">Preço</label>
                  <input type="number" class="form-control" id="vlprice" name="vlprice" step="0.01" placeholder="0.00"
                    onchange="calcTimes(this)">
                </div>

                <div class="form-group col-sm-4">
                  <label for="pricetimes">Numero de parcelas</label>
                  <select class="form-control" name="pricetimes" id="pricetimes">
                    <option value="1">1x</option>
                    <option value="2">2x</option>
                    <option value="3">3x</option>
                    <option value="4">4x</option>
                    <option value="5">5x</option>
                    <option value="6">6x</option>
                    <option value="7">7x</option>
                    <option value="8">8x</option>
                    <option value="9">9x</option>
                    <option value="10">10x</option>
                    <option value="11">11x</option>
                    <option value="12">12x</option>
                  </select>
                </div>

                <div class="form-group col-sm-2">
                  <label for="productquantity">Quantidade</label>
                  <input type="text" class="form-control" id="productquantity" name="productquantity"  placeholder="0">
                </div>

              </div>
              <div class="row">
                <div class="form-group col-sm-3">
                  <label for="vlwidth">Largura Cm</label>
                  <input type="number" class="form-control" id="vlwidth" name="vlwidth" step="0.01" placeholder="0.00">
                </div>
                <div class="form-group col-sm-3">
                  <label for="vlheight">Altura Cm</label>
                  <input type="number" class="form-control" id="vlheight" name="vlheight" step="0.01"
                    placeholder="0.00">
                </div>
                <div class="form-group col-sm-3">
                  <label for="vllength">Comprimento Cm</label>
                  <input type="number" class="form-control" id="vllength" name="vllength" step="0.01"
                    placeholder="0.00">
                </div>
                <div class="form-group col-sm-3">
                  <label for="vlweight">Peso Kg</label>
                  <input type="number" class="form-control" id="vlweight" name="vlweight" step="0.01"
                    placeholder="0.00">
                </div>
              </div>
              <!-- <div class="form-group">
              <label for="vlweight">Descrição</label>
              <input type="text" class="form-control" id="infoproduct" name="infoproduct"  placeholder="Informe descrição do produto">
            </div> -->

              <div class="form-group">
                <label for="infoproduct">Descrição</label>
                <textarea id="infoproduct" name="infoproduct"></textarea>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  const input = document.getElementById("vlprice");
  input.addEventListener("input", updateValue);
  const selector = document.getElementById('pricetimes');
  let elements = selector.children

  function formatLocale(value) {
    return value.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'});
  }

  function updateValue(e) {
    for (let index = 0; index < 12; index++) {
      elementValue = elements[index].value
      total = input.value / elementValue
      result = elementValue + "X de " + formatLocale(total)
      elements[index].text = result
    }
  }
</script>