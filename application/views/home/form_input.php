<!doctype html>
<html lang="en">
  <head>
    <title><?= $judul ?></title>
  </head>
  <body>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-10">
                        <h4>FORM TAMBAH MASHASISWA</h4>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-outline-success" onclick="document.location.href='<?=base_url('Home/index')?>'">Kembali</button>
                    </div>
                </div>
                <hr><br>
                <form class="row g-3" action="<?=base_url('Home/insertData')?>" method="POST">

                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control invalid">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= form_error('nama') ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control invalid">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?=form_error('nim') ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Kelas</label>
                        <select id="inputState" class="form-select" name="kelas">
                            <option value=0>Pilih Kelas</option>
                                <?php foreach ($kelas as $value) {
                                    echo "<option value='$value[id_kelas]'>$value[nama_kelas]</option>";
                                } ?> 
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Agama</label>
                        <select id="inputState" class="form-select" name="agama">
                            <option value=0>Pilih Agama</option>
                                <?php foreach ($agama as $value) {
                                    echo "<option value='$value[id_agama]'>$value[nama_agama]</option>";
                                } ?> 
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" name="submit" class="btn btn-outline-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>
<script src="<?=base_url('tema/')?>js/script.js"></script>