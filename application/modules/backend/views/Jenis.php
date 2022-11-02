<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Page : <?= $jtable; ?></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th width="50%">Jenis</th>
                        <th><a href="" data-toggle="modal" data-target="#tambahJenis" data class="btn btn-primary btn-xs ml-3">+</a></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($jenis as $j) : ?>

                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $j['jenis_quisioner']; ?></td>
                          <td>
                            <a href="" data-toggle="modal" data-target="#editJenis<?= $j['id_jenis_quisioner']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="" data-toggle="modal" data-target="#deleteJenis<?= $j['id_jenis_quisioner']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                      <?php endforeach;  ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>




        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->



<!-- =============================tambah jenis==================== -->


<div class="modal fade " id="tambahJenis" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('backend/fungsiInputJenis'); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="hidden" name="id_jenis_quisioner" class="form-control ">
              <input type="text" name="jenis_quisioner" class="form-control" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- =========================================end============================ -->


<!-- =============================edit jenis==================== -->

<?php foreach ($jenis as $j) { ?>
  <div class="modal fade " id="editJenis<?= $j['id_jenis_quisioner']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('backend/fungsiEditJenis/' . $j['id_jenis_quisioner']); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input type="hidden" name="id_jenis_quisioner" value="<?= $j['id_jenis_quisioner']; ?>" class="form-control ">
                <input type="text" name="jenis_quisioner" class="form-control" value="<?= $j['jenis_quisioner']; ?>" required>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>


<!-- =========================================end============================ -->


<?php foreach ($jenis as $j) { ?>
  <div class="modal fade " id="deleteJenis<?= $j['id_jenis_quisioner']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('backend/deleteJenis/' . $j['id_jenis_quisioner']); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
<h5>Apakah anda yakin ingin menghapus data <?= $j['jenis_quisioner']; ?> ?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-warning">Ya</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>