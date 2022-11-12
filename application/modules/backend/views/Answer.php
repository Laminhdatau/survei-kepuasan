<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Page : Jenis <?= $jtable; ?></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content ">
            <div class="row">
              <div class="col-sm-6">
                <div class="card-box table-responsive">

                  <table id="datatable" class="table table-striped table-bordered">
                    <?= $this->session->flashdata('message'); ?>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Objektif</th>
                        <th><a href="#" data-toggle="modal" data-target="#tambah_option" class="btn btn-primary btn-xs ml-3">+</a></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($answer as $a) : ?>

                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $a['answer']; ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#editOption<?= $a['id_answer']; ?>" class="btn btn-info btn-xs"><i class="fa fa-fw fa-pencil"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#deleteOption<?= $a['id_answer']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-trash-o"></i> </a>

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


<div class="modal fade " id="tambah_option" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('backend/fungsiInputAnswer'); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Option
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="hidden" name="id_answer" class="form-control ">
              <input type="text" name="answer" class="form-control" required>
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

<?php foreach ($answer as $a) { ?>
  <div class="modal fade " id="editOption<?= $a['id_answer']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('backend/fungsiEditAnswer/' . $a['id_answer']); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Option
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input type="hidden" name="id_answer" value="<?= $a['id_answer']; ?>" class="form-control ">
                <input type="text" name="answer" class="form-control" value="<?= $a['answer']; ?>" required>
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


<?php foreach ($answer as $a) { ?>
  <div class="modal fade " id="deleteOption<?= $a['id_answer']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('backend/deleteAnswer/' . $a['id_answer']); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <h5>Apakah anda yakin ingin menghapus data <?= $a['answer']; ?> ?</h5>
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