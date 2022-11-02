<!--  page content  -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Page : <small><?= $jtable; ?></small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <?= $this->session->flashdata('message'); ?>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Quis</th>
                        <th>Status</th>
                        <th>Jenis</th>
                        <th width="20%"><a href="" data-toggle="modal" data-target="#tambahkuisdosen" class="btn btn-primary btn-xs ml-3">+</a></th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($quisdosendetail as $q) { ?>
                        <tr>
                          <td><?= $no++;; ?></td>
                          <td><?= $q['quisioner']; ?></td>
                          <td><?php if ($q['status'] == 1) : ?>
                              <?php echo "Aktif"; ?>
                            <?php else : ?>
                              <?php echo "Tidak Aktif"; ?>
                            <?php endif; ?></td>
                          <td><?= $q['jenis_quisioner']; ?></td>
                          <td>
                            <a href="" data-toggle="modal" data-target="#editquisdosen<?= $q['kd_quisioner']; ?>" class="btn btn-warning btn-xs ml-3"><i class="fa fa-fw fa-pencil"></i></a>
                            <a href="" data-toggle="modal" data-target="#deletequisdosen<?= $q['kd_quisioner']; ?>" class="btn btn-danger btn-xs ml-3"><i class="fa fa-fw fa-trash"></i></a>

                          </td>

                        </tr>
                      <?php } ?>
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
<!-- /page content 

 =====================================================modal tambah  -->
<div class="modal fade " id="tambahkuisdosen" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('backend/fungsiInputQuisDosen'); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kuis">Kuis<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="hidden" id="kuis" name="kd_quisioner" class="form-control ">
              <input type="text" id="kuis" name="quisioner" required="required" class="form-control ">
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status</label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="status" required>
                <option value="">Pilih</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
              </select>
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

<!-- ============================================================end -['

 ====================================edit  -->
<?php
foreach ($quisdosen as $q) :
?>
  <div class="modal fade" id="editquisdosen<?= $q['kd_quisioner']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">
          <form method="post" action="<?= base_url('backend/fungsieditquisdosen/'); ?><?= $q['kd_quisioner']; ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <div class="item form-group">
              <label class="col-form-label col-md-1 col-sm-1 label-align">
                <span>Kuis</span>
              </label>
              <div class="col-md-10 col-sm-10 ">
                <input type="hidden" name="kd_quisioner" value="<?= $q['kd_quisioner']; ?>">
                <input type="text" name="quisioner" class="form-control" value="<?= $q['quisioner']; ?>">
              </div>
            </div>

            <div class="item form-group">
              <label class="col-form-label col-md-1 col-sm-1 label-align">
                <span>Status</span>
              </label>
              <div class="col-md-10 col-sm-10 ">
                <select name="status" class="form-control">
                  <option value="">Pilih</option>
                  <option value="1" <?php if ($q['status'] == "1") {
                                      echo "SELECTED";
                                    } ?>>Aktif</option>
                  <option value="0" <?php if ($q['status'] == "0") {
                                      echo "SELECTED";
                                    } ?>>Non Aktif</option>
                </select>
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
  </div>
<?php endforeach; ?>

<!--  ======================================end  -->



<?php
foreach ($quisdosendetail as $q) :
?>
  <div class="modal fade" id="deletequisdosen<?= $q['kd_quisioner']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('backend/deletequisdosen/'); ?><?= $q['kd_quisioner']; ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <h5 class="text-center">Apakah anda yakin ingin Menghapus data <?= $q['quisioner']; ?> ?</h5>


            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-warning">Yes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>