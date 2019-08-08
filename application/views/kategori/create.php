 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Kategori</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

       <!-- /.content-header -->
   <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Kategori</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          
          </div>
        </div>
        <div class="card-body">
    
            <form  class="form-horizontal" action="<?=site_url('KategoriController/store') ?>" method="post">
              <div class="box-body">
                <div class="form-group has-error">
                  <label class="col-sm-4 control-label">Nama Kategori</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Nama Kategori" name="Nama">
                    <i><?=form_error('Nama')?></i>

                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="<?=site_url('KategoriController')?>" class="btn btn-primary">Kembali</a>
                
              
              <!-- /.box-footer -->
            </form>

        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
         
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>