.
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Pengisian Kuisioner</h3>
      </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="x_panel ">
          <div class="x_title">
            <h2>Halaman Kuisioner Dosen</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>

              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <!-- =============================== -->
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <div class="clearfix"></div>

                </div>
                <div class="bs-example" data-example-id="simple-jumbotron">
                  <div class="jumbotron jumbotron-fluid row-1 text-center">
                    <h3>Kuisioner Pengajaran Dosen</h3>

                    <h5>[KODE MK] - [MK] - [CLASS] <br></h5>
                    <h5>[NAMA DOSEN] [KODE DOSEN]</h5>
                    <a class="text-danger" href="<?= base_url('quisioner/getquismk'); ?>">&lt;&lt; Kembali Ke Kuis Dosen</a>
                  </div>




                  <div class="clearfix"></div>
                  <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">

                      <div class="x_content">


                        <div class="clearfix"></div>
                        <div class="card card-header bg-white bg-block mx-auto">

                        </div>

                        <div class="clearfix"></div>
                        <?php echo form_open_multipart('frontend/inputquisdosen/'); ?>
                        <div class="x_content">
                          <input type="hidden" name="nim">
                          <input type="hidden" name="kd_dosen_pengampuh">
                          <input type="text" name="name">
                          <input type="text" name="dosen">
                          <div class="table-responsive">

                            <?php if (!empty($quisdosen)) { ?>
                              <table class="table table-striped bulk_action">
                                <thead class="text-white" style="background-color: #e19ee4;">
                                  <tr class="headings">
                                    <th class="column-title">NO </th>
                                    <th class="column-title" width="65%">KUIS </th>
                                    <th class="column-title">KURANG </th>
                                    <th class="column-title">CUKUP</th>
                                    <th class="column-title">BAIK </th>
                                    <th class="column-title">SANGAT BAIK</th>
                                  </tr>


                                </thead>

                                <?php $no = 1;
                                foreach ($quisdosen as $qd) {
                                  # code...

                                ?>


                                  <tbody>
                                    <tr class="even pointer">
                                      <td><?= $no ?></td>
                                      <td>
                                        <input type="hidden" class="form-check" name="kd_answer_quisioner" value="<?= $qd['kd_answer_quisioner']; ?>">

                                        <input type="hidden" class="form-check" name="kd_quisioner" value="<?= $qd['kd_quisioner']; ?>">
                                        <?= $qd['quisioner']; ?>
                                      </td>
                                      <td>
                                        <input type="radio" name="id_answer<?= $qd['id_answer']; ?><?= $no; ?>" value="1" <?php if ($qd['id_answer'] == 1) {
                                                                                                                            echo "checked = 'true'";
                                                                                                                          } ?>>
                                      </td>
                                      <td>
                                        <input type="radio" name="id_answer<?= $qd['id_answer']; ?><?= $no; ?>" value="2" <?php if ($qd['id_answer'] == 2) {
                                                                                                                            echo "checked = 'true'";
                                                                                                                          } ?>>
                                      </td>
                                      <td>
                                        <input type="radio" name="id_answer<?= $qd['id_answer']; ?><?= $no; ?>" value="3" <?php if ($qd['id_answer'] == 3) {
                                                                                                                            echo "checked = 'true'";
                                                                                                                          } ?>>
                                      </td>
                                      <td>
                                        <input type="radio" name="id_answer<?= $qd['id_answer']; ?><?= $no; ?>" value="4" <?php if ($qd['id_answer'] == 4) {
                                                                                                                            echo "checked = 'true'";
                                                                                                                          } ?>>
                                      </td>
                                      </td>


                                    </tr>

                                  </tbody>

                              <?php $no++;
                                }
                              } ?>
                              </table>
                          </div>
                        </div>


                        <div class="clearfix"></div>
                        <h2>Komentar Untuk Mata kuliah ini</h2>
                        <div class="jumbotron">
                          <textarea name="comments[]" rows="5"></textarea>
                        </div>

                        <div class="card bg-white"></div>
                        <div class="jumbotron jumbotron-fluid text-left">
                          <div class="row ml-2 text-black-50">
                            <table>
                              <thead>
                                <tr>
                                  <th>Keterangan</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="col-md-11">
                                  <td>
                                    1) Rencana Pembelajaran(RP) berisi paparan tentang kompetensi dan subkompetensi yang sesuai dengan materi kuliahnya. <br>
                                    2) Metode SCL dapat berbentuk diskusi/tanya jawab/asistensi/pembelajaran berbasis laboratorium/tugas/studi kasus/pembelajaran berbasis proyek/praktek kerja/kuliah lapangan/pengalaman belajar on-line/studio,dll. <br>
                                    3) Sumber belajar meliputi buku teks, buku ajar,modul ajar,jurnal,petunjuk praktikum,multimedia seperti virtual laboratory,video,simulasi,software,materi belajar di share its, dll. <br>
                                    4) Kompetensi adalah kemampuan yang dicapai mahasiswa dari hasil belajar mata kuliah ini. <br>

                                  </td>

                                </tr>
                              </tbody>
                            </table>
                            <!-- =======================================================  -->
                          </div>
                          <div class="jumbotron">
                            <p class="text-danger">PERHATIAN <br></p>
                            <p>* Anda hanya bisa mengisi kuesioner satu kali. <br></p>
                            <p>* Data yang sudah disimpan tidak dapat diedit jadi pastikan data yang and inputkan sudah benar. <br></p>
                            <p>* Berikanlah tanda centang pada checkbox berikut untuk menyimpan. <br></p>

                            <h5>
                              <p class="text-center">
                                <input type="checkbox"> Data yang saya input sudah sesuai
                              </p>
                            </h5>
                            <br>
                            <div>
                              <button class="btn btn-danger float-md-right">Reset</button>
                              <button class="btn btn-info float-md-right" type="submit">Simpan</button>
                            </div>

                          </div>

                        </div>

                      </div>
                    </div>
                  </div>



                  <!-- /page content -->




                </div>

              </div>
            </div>
          </div>

          <!-- ================================= -->
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->