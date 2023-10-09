<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Categorias
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
          <h3 class="box-title">Novo Categoria</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/categories/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="descategory">Nome da categoria</label>
              <input type="text" class="form-control" id="descategory" name="descategory" placeholder="Digite o nome da categoria">
            </div>
            <div class="form-group">
              <label for="iconcategory">Selecione o icone da categoria</label>
              <select class="form-control" name="iconcategory" id="iconcategory">
                <option value="fas fa-calculator">Calculadora <i class="fas fa-calculator"></i></option>
                <option value="fas fa-star">Estrela <i class="fas fa-star"></i></option>
                <option value="fas fa-hammer">Matelo <i class="fas fa-hammer"></i></option>
                <option value="fas fa-screwdriver">Chaves <i class="fas fa-screwdriver"></i></option>
              </select>
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