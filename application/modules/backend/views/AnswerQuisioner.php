
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
                                <th>Nama Mahasiswa</th>
                                <th>Nama Dosen</th>
                                <th>Kuis</th>
                                <th>Jawaban</th>
                                <th>Waktu Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1;
                                foreach($answer as $a) { ?>
                            
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $a['nim']; ?></td>
                                <td><?= $a['kd_dosen_pengampuh']; ?></td>
                                <td><?= $a['quisioner']; ?></td>
                                <td><?= $a['answer']; ?></td>
                                <td><?= $a['created_up']; ?></td>
                                <td>
                                    <a href="<?= base_url('quisioner'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                               
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
        <!-- /page content -->

       