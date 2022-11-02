
<div class="container container-fluid">
    <div class="row">
        <div class="container">
            <h2 class="h3">Form Tambah Jawaban Quisioner</h2>
            <form action="<?= base_url('backend/FungsiInputAnswerQuis'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="kd_answer_quisioner">
                    </div>
                        <div class="form-group">
                            <label>Pilih Mahasiswa</label>
                            <select name="nim" class="custom-select">
                                <?php foreach ($mhs as $m) : ?>
                                    <option value="<?= $m->nim; ?>"><?= $m->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pilih Mata Kuliah</label>
                            <select name="kd_mk" class="custom-select">
                                <?php foreach ($mk as $mk) : ?>
                                    <option value="<?= $mk->kd_mk; ?>"><?= $mk->mk; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pilih Dosen</label>
                            <select name="kd_dosen_pengampu" class="custom-select">
                                <?php foreach ($dosen as $d) : ?>
                                    <option value="<?= $d->kd_dosen_pengampu; ?>"><?= $d->nama_dosen; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pilih Quisioner</label>
                            <select name="kd_quisioner" class="custom-select">
                                <?php foreach ($quisioner as $q) : ?>
                                    <option value="<?= $q->kd_quisioner; ?>"><?= $q->quisioner; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pilih Jawaban</label>
                            <select name="id_answer" class="custom-select">
                                <?php foreach ($answer as $a) : ?>
                                    <option value="<?= $a->id_answer; ?>"><?= $a->answer; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Komentar</label>
                                 <select name="kd_comments" class="custom-select">
                                <?php foreach ($comments as $c) : ?>
                                    <option value="<?= $c->kd_comments; ?>"><?= $c->comments; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="<?= base_url(); ?>" class="btn btn-danger" >Batal</a>
                        </div>
            </form>
        </div>
    </div>
</div>
