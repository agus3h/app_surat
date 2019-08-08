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
          <h3 class="card-title">Form Edit User </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          
          </div>
        </div>
        <div class="card-body">


            <form  class="form-horizontal" action="" method="post">
              <div class="box-body">
              <input type="hidden" name="Id" value="<?=$row->id?>">
              
                <div class="form-group has-error">
                  <label class="col-sm-4 control-label">Username</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Username" name="Username" value="<?= $this->input->post('Username') ?? $row->username?>">

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Password</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Password" name="Password" value="<?= $this->input->post('Password') ?? $row->password?>">
                    <i><?=form_error('Password')?></i>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">Nama</label>
                  <div class="col-md-12">
              <input type="text" class="form-control" placeholder="Nama" name="Nama" value="<?= $this->input->post('Nama') ?? $row->name?>">
                    <i><?=form_error('Nama')?></i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Level</label>
                  <div class="col-md-12">
                   <select name="Level" class="form-control">
                    <?php $level= $this->input->post('Level') ?$this->input->post('Level') : $row->level ?>
                    <option value="1"<?=$level == 1? 'selected' :null ?>>Level 1</option>
                    <option value="2"<?=$level == 2? 'selected' :null ?>>Level 2</option>
                    <option value="3"<?=$level == 3? 'selected' :null ?>>Level 3</option>
                  </select>
                  </div>
                </div>

      

        
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?=site_url('UserController')?>" class="btn btn-primary">Kembali</a>
                <button type="submit" class="btn btn-success">Submit</button>
              
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