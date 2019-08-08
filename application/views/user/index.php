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
          <div class="pull-left">
            <a href="<?=site_url('UserController/create')?>" class="btn btn-success"><i class="fas fa-plus-square"></i>Tambah</a>
          </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered" id="table_id">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Level</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;
                    foreach ($row->result() as $key => $data) {?>
                    <tr>
                      
                      <td><?= $no++?></td>
                      <td><?=$data->username?></td>
                      <td><?=$data->name?></td>
                      <td><?=$data->level ?></td>
                      <td>
                         <form action="<?=site_url('UserController/delete')?>" method="post">
                       <a href="<?=site_url('UserController/edit/'.$data->id)?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <input type="hidden" name="Id" value="<?=$data->id?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                      </form>
                      </td>
                    </tr>
                   
                    <?php } ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
       
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>