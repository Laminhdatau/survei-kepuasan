<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Page : <?= $utable; ?></h2>
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
                                                <th>User</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th><a href="" data-toggle="modal" data-target="#tambahuser" data class="btn btn-primary btn-xs ml-3">+</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($user as $u) : ?>

                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $u['user']; ?></td>
                                                    <td><?= $u['password']; ?></td>
                                                    <td><?= $u['status']; ?></td>
                                                    <td><?= $u['level']; ?></td>
                                                    <td>
                                                        <a href="" data-toggle="modal" data-target="#edituser<?= $u['kd_user']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                                        <a href="" data-toggle="modal" data-target="#deleteuser<?= $u['kd_user']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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



<!-- =============================tambah user==================== -->


<div class="modal fade " id="tambahuser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('backend/fungsiinputuser'); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Username
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="hidden" name="kd_user" class="form-control">
                            <input type="text" name="user" class="form-control" required>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Password
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Password
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="password" name="pass" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Level</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_level" class="form-control">
                                <?php foreach ($userl as $u) { ?>
                                    <option value="<?= $u['id_level']; ?>"><?= $u['level']; ?></option>
                                <?php } ?>
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


<!-- =========================================end============================ -->


<!-- =============================edit user==================== -->

<?php foreach ($user as $u) { ?>
    <div class="modal fade " id="edituser<?= $u['kd_user']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('backend/fungsiupdateuser/' . $u['kd_user']); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">User
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="hidden" name="kd_user" value="<?= $u['kd_user']; ?>" class="form-control ">
                                <input type="text" name="user" class="form-control" value="<?= $u['user']; ?>" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Password
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="password" name="password" class="form-control" value="<?= $u['password']; ?>" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Pass
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="password" name="pass" class="form-control" value="<?= $u['pass']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Level</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="id_level" class="form-control">
                                    <?php foreach ($userl as $u) {?>
                                        <option value="<?= $u['id_level']; ?>"><?= $u['level']; ?></option>
                                    <?php } ?>
                                </select>
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


<?php foreach ($user as $u) { ?>
    <div class="modal fade " id="deleteuser<?= $u['kd_user']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('backend/deleteuser/' . $u['kd_user']); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <h5>Apakah anda yakin ingin menghapus data <?= $u['user_quisioner']; ?> ?</h5>
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