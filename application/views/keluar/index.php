 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Surat Keluar</h1>
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
            <a href="<?=site_url('KeluarController/add')?>" class="btn btn-success"><i class="fas fa-plus-square"></i>Tambah</a>
          </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
        
        <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?>
        </div>
        <?php endif ?>

        <?php if ($this->session->flashdata('hapus')): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('hapus'); ?>
        </div>
        <?php endif ?>

          <table class="table table-bordered" id="table_id">
                  <thead>                  
                    <tr>
                      <th>No</th>
                      <th>No Surat</th>
                      <th>Kepada</th>
                      <th>Perihal</th>
                      <th>Tgl Terima Surat</th>
                      <th>Kategori Surat</th>
                      <th>Catatan</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php 
                      $no = 1;
                      foreach ($row->result() as $key => $data) {?>  
        
                    <tr>
                      <td><?= $no++?></td>
                      <td><?=$data->no_surat?></td>
                      <td><?=$data->kepada?></td>
                      <td><?=$data->perihal?></td>
                      <td><?=$data->created?></td>
                      <td><?=$data->nama?></td>
                      <td><?=$data->catatan?></td>
                      <td>
                      <?php if ($data->image != null) { ?>
                       <img src="<?=base_url('uploads/'.$data->image)?>" style="width: 100px">
                      <?php } ?>
                      
                      </td>
                      <td><?=$data->status == 0 ?"Diproses":"Selesai"?></td>
                      <td>   
                       
                       <form action="<?=site_url('KeluarController/del/'.$data->id_keluar)?>" method="post">
                       <a href="<?=site_url('KeluarController/edit/'.$data->id_keluar)?>" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></a>
                        <input type="hidden" name="Id" value="<?=$data->id_keluar?>">
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