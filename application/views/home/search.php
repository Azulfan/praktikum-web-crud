<div class="container">
    <div class="row justify-content-center">
    	<div class="col-10">
          <div class="row justify-content-end">
          <h4 class="text-center mb-3 mt-3">DAFTAR MASHASISWA</h4>
          <hr>
          <div class="col-6">
          <button type="button" class="btn btn-outline-success" onclick="document.location.href='<?=base_url('Home/index')?>'">Kembali</button>
          </div>
                <div class="col-6">
                	<form action="<?php echo base_url(); ?>index.php/Home/search_keyword" method="post">
                    	<div class="input-group col-3">
                            <input class="form-control" type="text" name="keyword" placeholder="Masukan Kata Kunci">
                           	<span class="input-group-btn">
                            	<button class="btn btn-outline-success" type="submit">Cari</button>
                        	</span>
                    	</div>
                	</form>
              	</div>
          </div>
          <br>
          <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Agama</th>
                        <th colspan="3" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $count= 0;
                        foreach($result as $row){
                        $count += 1;
                    ?>
                    <tr>
                        <th scope="col"><?= $count ?></th>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->nim ?></td>
                        <td><?= $row->nama_kelas ?></td>
                        <td><?= $row->nama_agama ?></td>
                        <td><a href="<?= base_url('Home/formEdit/'). $row->nim?>">Edit</a></td>
                        <td><a href="<?= base_url('Home/aksiDelete/'). $row->nim?>">Hapus</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
          </div>
      </div>
	</div>
</div>