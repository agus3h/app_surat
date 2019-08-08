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
          <h3 class="card-title"><?=ucfirst($page)?> Surat Keluar</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          
          </div>

           <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?>
        </div>
      <?php endif ?>


        </div>
        <div class="card-body">
    
            <form  class="form-horizontal" action="<?=site_url('KeluarController/process') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">


                <div class="form-group has-error">
                  <input type="hidden" name="Id" value="<?=$row->id_keluar?>"> 
                  <label class="col-sm-4 control-label" for="surat_kepada">Surat Kepada</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control" id="surat_kepada" placeholder="Surat Kepada" name="surat_kepada" value="<?=$row->kepada?>" required>
                  </div>
                </div>

                <div class="form-group has-error">
                  <label class="col-sm-4 control-label">Perihal</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Perihal" name="Perihal" value="<?=$row->perihal?>" required>
                  </div>
                </div>

                <div class="form-group has-error">
                  <label class="col-sm-4 control-label">Nomor Surat</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Nomor Surat" name="Nomor_Surat" value="<?=$row->no_surat?>">
                  </div>
                </div>
                

                <div class="form-group has-error" hidden="">
                <label class="col-sm-4 control-label">Kategori Surat</label>
                <select name="kategori_surat" class="form-control" required="">
                   <?php foreach ($kategori->result() as $key => $data) {  ?>
              <option value="<?=$data->id?>" <?= $data->id == $row->kategori_id ? "selected":null ?> ><?=$data->nama?>
                
              </option>
                  <?php } ?>
                 </select>
                </div>

                <div class="form-group has-error">
                  <label class="col-sm-4 control-label">Catatan Surat</label>
                  <div class="col-md-12">
                    <textarea name="Catatan" rows="5" cols="145" value="<?=$row->catatan?>"><?=$row->catatan?></textarea>
                  </div>
                </div>

                <div class="form-group has-error" hidden="">
                  <label class="col-sm-4 control-label">Status</label>
                  <div class="col-md-12">
                    <select class="form-control" name="Status">
                    <option value="0" selected="">Diproses</option>
                    <option value="1">Selesai</option>
                  </select>
                  </div>
                </div>

                  <div class="form-group has-error">
                  <label class="col-sm-4 control-label">Image</label>
                  <div class="col-md-12">
                    <?php if ($page=='edit') { ?>
                      <?php if ($row->image != null) { ?>
                          <div>
                            <img src="<?=base_url('uploads/'.$row->image)?>" style="width: 100px">
                          </div>
                      <?php } ?>
                    <?php } ?>
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>

              </div>

        <!-- /.card-body -->
                  <div class="card-footer">
                   <!-- /.box-body -->
                        <div class="box-footer">
                          <button type="submit" name="<?=$page?>" class="btn btn-success">Submit</button>
                          <a href="<?=site_url('KeluarController')?>" class="btn btn-primary">Kembali</a>
                        </div>

                        <!-- /.box-footer -->
                  </div>

            </form>

        </div>
         
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>