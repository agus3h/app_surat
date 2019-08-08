 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data User</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

       <!-- /.content-header -->
   <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Tambah User </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          
          </div>
        </div>
        <div class="card-body">
      <!--    <?php echo validation_errors(); ?> -->
            <form  class="form-horizontal" action="<?=base_url('UserController/store') ?>" method="post">
              <div class="box-body">
                <div class="form-group has-error">
                  <label class="col-sm-4 control-label">Username</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Username" name="Username" value="<?=set_value('Username')?>">
                    <i><?=form_error('Username')?></i>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Password</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Password" name="Password" value="<?=set_value('Password')?>">
                    <i><?=form_error('Password')?></i>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">Nama</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Nama" name="Nama" value="<?=set_value('Nama')?>">
                    <i><?=form_error('Nama')?></i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Level</label>
                  <div class="col-md-12">
                   <select class="form-control" name="Level">
                    <option value="">Pilih level</option>
                    <option value="1">Level 1</option>
                    <option value="2">Level 2</option>
                    <option value="3">Level 3</option>
                  </select>
                  <i><?=form_error('Level')?></i>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-success">Submit</button>
              <a href="<?=site_url('UserController')?>" class="btn btn-primary">Kembali</a>
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