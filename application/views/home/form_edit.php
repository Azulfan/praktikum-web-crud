<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-10">
                    <h4>FORM EDIT DATA MASHASISWA</h4>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-outline-success" onclick="document.location.href='<?=base_url('Home/index')?>'">Kembali</button>
                </div>
            </div><br>
            <form class="row g-3" action="<?= base_url('Home/aksiEdit')?>" method="POST">
                <div class="col-md-6">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $data_mhs->nama?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" value="<?= $data_mhs->nim?>" disabled>
                    <input type="hidden" name="nim" class="form-control" value="<?= $data_mhs->nim?>">
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Kelas</label>
                    <select id="inputState" class="form-select" name="kelas">
                        <option value=0>Pilih Kelas</option>
                            <?php foreach ($kelas as $value) {
                                if($value[id_kelas]==$data_mhs->kelas){
                                    echo "<option value='$value[id_kelas]' selected=''>$value[nama_kelas]</option>"; }
                                else { 
                                    echo "<option value='$value[id_kelas]'>$value[nama_kelas]</option>"; } 
                            } ?>  
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Agama</label>
                    <select id="inputState" class="form-select" name="agama">
                    <option value=0>Pilih Agama</option>
                        <?php foreach ($agama as $value) {
                            if($value[id_agama]==$data_mhs->agama){
                                echo "<option value='$value[id_agama]' selected=''>$value[nama_agama]</option>"; }
                            else { 
                                echo "<option value='$value[id_agama]'>$value[nama_agama]</option>"; } 
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