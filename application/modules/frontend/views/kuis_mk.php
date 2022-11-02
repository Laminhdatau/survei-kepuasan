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
            <h2>Halaman Kuisioner Mata Kuliah</h2>
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
                    <h3>Kuisioner Evaluasi Matakulia (IPM)</h3>


                    <div class="alert  mx-auto ">

                      <label for="">Periode</label>
                      <select name="" id="">
                        <option value="">Genap</option>
                        <option value="">Ganjil</option>
                      </select>


                      <select name="" id="">
                        <option value="">2021</option>
                        <option value="">2022</option>
                        <option value="">2023</option>
                      </select>
                      <button class="badge badge-success">Tampil</button>

                    </div>

                    <h3>Riwayat Pengisian Kuisioner</h3>
                    <h5><b>Info:</b> Data diupdate setiap jam</h5>
                    <!-- ================================= -->
                  </div>


                  <div class="clearfix"></div>
                  <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">

                      <div class="x_content">
                        <div class="table-responsive">
                          <table class="table table-striped bulk_action">
                            <thead class="text-white" style="background-color: #e19ee4;">
                              <tr class="headings">
                                <th class="column-title" rowspan="1">NO </th>
                                <th class="column-title" rowspan="1">MATA KULIAH </th>
                                <th class="column-title" rowspan="1">DOSEN PENGAMPUH </th>
                                <th class="column-title" colspan="2">KUISIONER </th>
                              </tr>
                              <tr>
                                <th colspan="3"></th>
                                <th class="column-title">Mata Kuliah </th>
                                <th class="column-title">Dosen </th>
                              </tr>

                            </thead>

                            <tbody>
                              <tr class="even pointer">
                                <td>MK</td>
                                <td><?= $qm['mk']; ?></td>
                                <td><?= $qm['nama_dosen']; ?></td>
                                <td>
                                  <a href="" class="fa fa-edit"></a>
                                </td>
                                <td class="last">
                                  <a href="" class="fa fa-edit"></a>
                                </td>
                              </tr>

                            </tbody>
                          </table>
                        </div>

                        <div class="clearfix"></div>
                        <div class="card card-header bg-white bg-block mx-auto">

                        </div>

                        <div class="clearfix"></div>
                        <form action="<?= base_url('frontend/inputquismk'); ?>" method="post">
                          <div class="x_content">
                            <div class="table-responsive">

                              <table class="table table-striped bulk_action">
                                <thead class="text-white" style="background-color: #e19ee4;">
                                  <tr class="headings">
                                    <th class="column-title">NO </th>
                                    <th class="column-title">KUIS </th>
                                    <th class="column-title">SANGAT BAIK </th>
                                    <th class="column-title">BAIK </th>
                                    <th class="column-title">CUKUP </th>
                                    <th class="column-title">KURANG </th>
                                  </tr>


                                </thead>

                                <?php $no = 1;
                                foreach ($quismk as $qd) { ?>
                                  <tbody>
                                  <tbody>
                                    <tr class="even pointer">
                                      <td><?= $no ?></td>
                                      <td>
                                        <input type="hidden" name="kd_answer_quisioner" value="<?= $qd['kd_answer_quisioner']; ?>">
                                        <input type="hidden" name="nim" value="111316001">
                                        <input type="hidden" name="kd_dosen_pengampuh" value="1586c70b-08f3-11ec-a26e-0800275896b5">
                                        <input type="hidden" name="kd_quisioner <?= $no ?>" value="<?= $qd['kd_quisioner']; ?>"><?= $qd['quisioner']; ?>

                                      </td>
                                      <td class="custom-radio text-center">
                                        <input type="radio" id="id_answer4<?= $no ?>" name="id_answer <?= $no ?>" value="4" class="custom-control-input" required>
                                        <label class="custom-control-label" for="id_answer4<?= $no ?>"></label>
                                      </td>
                                      <td class="custom-radio text-center">
                                        <input type="radio" id="id_answer3<?= $no ?>" name="id_answer <?= $no ?>" value="3" class="custom-control-input" required>
                                        <label class="custom-control-label" for="id_answer3<?= $no ?>"></label>
                                      </td>
                                      <td class="custom-radio text-center">
                                        <input type="radio" id="id_answer2<?= $no ?>" name="id_answer <?= $no ?>" value="2" class="custom-control-input" required>
                                        <label class="custom-control-label" for="id_answer2<?= $no ?>"></label>
                                      </td>
                                      <td class="custom-radio text-center">
                                        <input type="radio" id="id_answer1<?= $no ?>" name="id_answer <?= $no ?>" value="1" class="custom-control-input" required>
                                        <label class="custom-control-label" for="id_answer1<?= $no ?>"></label>
                                      </td>
                                    </tr>

                                  </tbody>
                                <?php $no++; } ?>
                              </table>
                            </div>
                          </div>


                          <div class="clearfix"></div>
                          <h2>Komentar Untuk Mata kuliah ini</h2>
                          <div class="jumbotron">
                            <textarea name="comments" id="comments" rows="2"></textarea>
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


                        </form>
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