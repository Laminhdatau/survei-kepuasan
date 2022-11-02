
<div class="container container-fluid">
    <div class="row">
        <div class="container">
            <h2 class="h3">Form Tambah Jenis</h2>
            <form action="<?= base_url('backend/fungsiInputJenis'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_jenis_quisioner">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Quisioner</label>
                        <input type="text" class="form-control" name="jenis_quisioner" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url(); ?>" class="btn btn-danger" >Batal</a>
                    </div>
            </form>
        </div>
    </div>
</div>
