

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
                            <div class="card-box table-responsive" >
                    
                    <table id="datatable" class="table table-striped table-bordered" >
                      <thead>
                    <tr>
                        <th>No</th>
                        <th>Objektif</th>
                        <th><a href="<?= base_url('backend/formInputAnswer'); ?>" class="btn btn-primary btn-xs ml-3">+</a></th>
                    </tr>
                </thead>
                <tbody>
                   <?php $no=1;
                        foreach($answer as $a) : ?>
                     
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $a->answer; ?></td>
                        <td>

                            <a href="<?= base_url('quisioner'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-eye "></i> </a>
                            <a href="<?= base_url('backend/formeditanswer'); ?>/<?= $a->id_answer; ?>" class="btn btn-info btn-xs"><i class="fa fa-fw fa-pencil"></i> </a>
                            <a href="<?= base_url('backend/deleteAnswer'); ?>/<?= $a->id_answer; ?>" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-trash-o"></i> </a>

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

       
