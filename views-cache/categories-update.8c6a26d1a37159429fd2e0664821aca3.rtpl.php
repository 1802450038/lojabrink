<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Categorias
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Editar Categoria</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="descategory">Nome da categoria</label>
                <input type="text" class="form-control" id="descategory" name="descategory"
                  placeholder="Digite o nome da categoria" value="<?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="iconcategory">Selecione o icone da categoria</label>
                <select class="form-control" name="iconcategory" id="iconcategory">
                  <option value="<?php echo htmlspecialchars( $category["iconcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="<?php echo htmlspecialchars( $category["iconcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></option>
                  <option value="fas fa-calculator">Calculadora <i class="fas fa-calculator"></i></option>
                  <option value="fas fa-star">Estrela <i class="fas fa-star"></i></option>
                  <option value="fas fa-hammer">Matelo <i class="fas fa-hammer"></i></option>
                  <option value="fas fa-screwdriver">Chaves <i class="fas fa-screwdriver"></i></option>
                </select>
              </div>
              <div class="form-group">
                <label for="file">Foto</label>
                <input type="file" class="form-control" id="photocategory" name="photocategory" value="">
                <div class="box box-widget">
                  <div class="box-body">
                    <img class="img-responsive" id="image-preview" src="<?php echo htmlspecialchars( $category["photocategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">
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
  document.querySelector('#file').addEventListener('change', function () {

    var file = new FileReader();

    file.onload = function () {

      document.querySelector('#image-preview').src = file.result;

    }

    file.readAsDataURL(this.files[0]);

  });
</script>