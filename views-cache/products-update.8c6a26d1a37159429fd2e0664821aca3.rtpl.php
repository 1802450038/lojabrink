<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Produtos
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Editar Produto</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/products/<?php echo htmlspecialchars( $product["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="desproduct">Nome da produto</label>
                <input type="text" class="form-control" id="desproduct" name="desproduct"
                  placeholder="Digite o nome do produto" value="<?php echo htmlspecialchars( $product["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label for="vlprice">Preço</label>
                  <input type="number" class="form-control" id="vlprice" name="vlprice" step="0.01" placeholder="0.00"
                    value="<?php echo htmlspecialchars( $product["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="form-group col-sm-4">
                  <label for="pricetimes">Numero de parcelas</label>
                  <!-- <input type="number" class="form-control" id="pricetimes" name="pricetimes" step="1" placeholder="0"> -->
                  <select class="form-control" name="pricetimes" id="pricetimes">
                    <option selected value="<?php echo htmlspecialchars( $product["pricetimes"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></option>
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
                  <input type="number" class="form-control" id="productquantity" name="productquantity" step="1"
                    placeholder="0" value="<?php echo htmlspecialchars( $product["productquantity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-3">
                  <label for="vlwidth">Largura cm</label>
                  <input type="number" class="form-control" id="vlwidth" name="vlwidth" step="0.01" placeholder="0.00"
                    value="<?php echo htmlspecialchars( $product["vlwidth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="form-group col-sm-3">
                  <label for="vlheight">Altura cm</label>
                  <input type="number" class="form-control" id="vlheight" name="vlheight" step="0.01" placeholder="0.00"
                    value="<?php echo htmlspecialchars( $product["vlheight"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="form-group col-sm-3">
                  <label for="vllength">Comprimento cm</label>
                  <input type="number" class="form-control" id="vllength" name="vllength" step="0.01" placeholder="0.00"
                    value="<?php echo htmlspecialchars( $product["vllength"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="form-group col-sm-3">
                  <label for="vlweight">Peso Kg</label>
                  <input type="number" class="form-control" id="vlweight" name="vlweight" step="0.01" placeholder="0.00"
                    value="<?php echo htmlspecialchars( $product["vlweight"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="infoproduct">Descrição</label>
                <textarea id="infoproduct" name="infoproduct">
                  <?php echo printRich($product["infoproduct"]); ?>

                </textarea>
              </div>
              <div class="row">
                <div class="form-group col-sm-3">
                  <label for="photoone">Foto 1</label>
                  <input type="file" class="form-control file-input" id="photoone" name="photoone"
                    value="<?php echo htmlspecialchars( $product["photoone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <div class="box box-widget">
                    <div class="box-body">
                      <img class="image-preview" src="<?php echo htmlspecialchars( $product["photoone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo"
                        style="aspect-ratio: 1/1; width: 100%; object-fit: cover; padding: 20px;">
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-3">
                  <label for="phototwo">Foto 2</label>
                  <input type="file" class="form-control file-input" id="phototwo" name="phototwo"
                    value="<?php echo htmlspecialchars( $product["phototwo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <div class="box box-widget">
                    <div class="box-body">
                      <img class="image-preview" src="<?php echo htmlspecialchars( $product["phototwo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo"
                        style="aspect-ratio: 1/1; width: 100%; object-fit: cover; padding: 20px;">
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-3">
                  <label for="photothree">Foto 3</label>
                  <input type="file" class="form-control file-input" id="photothree" name="photothree"
                    value="<?php echo htmlspecialchars( $product["photothree"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <div class="box box-widget">
                    <div class="box-body">
                      <img class="image-preview" src="<?php echo htmlspecialchars( $product["photothree"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo"
                        style="aspect-ratio: 1/1; width: 100%; object-fit: cover; padding: 20px;">
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-3">
                  <label for="photofour">Foto 4</label>
                  <input type="file" class="form-control file-input" id="photofour" name="photofour"
                    value="<?php echo htmlspecialchars( $product["photofour"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <div class="box box-widget">
                    <div class="box-body">
                      <img class="image-preview" id="photofourprev" src="<?php echo htmlspecialchars( $product["photofour"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo"
                        style="aspect-ratio: 1/1; width: 100%; object-fit: cover; padding: 20px;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
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
    for (let index = 0; index < 13; index++) {
      elementValue = elements[index].value
      total = input.value / elementValue
      result = elementValue + "X de " + formatLocale(total)
      elements[index].text = result
    }
  }



  document.querySelector('#photoone').addEventListener('change', function () {
    var file = new FileReader();
    file.onload = function () {
      console.log(file.result);
      document.querySelector('#photooneprev').src = file.result;
    }
    file.readAsDataURL(this.files[0]);
  });
  
  document.querySelector('#phototwo').addEventListener('change', function () {
    var file = new FileReader();
    file.onload = function () {
      console.log(file.result);
      document.querySelector('#phototwoprev').src = file.result;
    }
    file.readAsDataURL(this.files[0]);
  });

  document.querySelector('#photothree').addEventListener('change', function () {
    var file = new FileReader();
    file.onload = function () {
      console.log(file.result);
      document.querySelector('#photothreeprev').src = file.result;
    }
    file.readAsDataURL(this.files[0]);
  });

  document.querySelector('#photofour').addEventListener('change', function () {
    var file = new FileReader();
    file.onload = function () {
      console.log(file.result);
      document.querySelector('#photofourprev').src = file.result;
    }
    file.readAsDataURL(this.files[0]);
  });



  updateValue()



</script>