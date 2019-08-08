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
          <div class="pull-left">
            <a href="<?=site_url('KategoriController/create')?>" class="btn btn-success"><i class="fas fa-plus-square"></i>Tambah</a>
          </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <?php if($this->session->flashdata('tambah')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('tambah') ?>
        </div>
      <?php endif ?>

      <?php if ($this->session->flashdata('edit')): ?>
        <div class="alert alert-info"><?php echo $this->session->flashdata('edit'); ?>
        </div>
      <?php endif ?>


      <?php if ($this->session->flashdata('hapus')): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('hapus'); ?>
        </div>
      <?php endif ?>


        <div class="card-body">
          <table class="table table-bordered" id="table_id">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Kategori</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;
                    foreach ($row->result() as $key => $data) {?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?=$data->nama?></td>
                      <td>
                        
                       <form action="<?=site_url('KategoriController/delete')?>" method="post">
                       <a href="<?=site_url('KategoriController/edit/'.$data->id)?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
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