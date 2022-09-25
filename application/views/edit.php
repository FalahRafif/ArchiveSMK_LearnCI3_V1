<div class="content-wrapper">
    <section class="content">
        <?php foreach($mahasiswa as $mhs) : ?>
        <?= form_open_multipart('mahasiswa/update'); ?>
                
                <div class="form-group">
                    <label for="">Nama Mahasiswa</label>
                    <input type="hidden" name="id" class="form-control" value="<?=$mhs->id ?>">
                    <input type="text" name="nama" class="form-control" value="<?=$mhs->nama ?>">
                </div>
                <div class="form-group">
                    <label for="">NIM</label>
                    
                    <input type="text" name="nim" class="form-control" value="<?=$mhs->nim ?>">
                </div>
                <div class="form-group">
                    <label for="">tanggal lahir</label>
                    
                    <input type="date" name="tgl_lahir" class="form-control" value="<?=$mhs->tgl_lahir ?>">
                </div>
                <div class="form-group">
                    <label for="">jurusan</label>
                    
                    <select class="form-control" name="jurusan" value="<?=$mhs->tgl_jurusan ?>">
                            <option value="Sistem Informatika">Sistem Informatika</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="">alamat</label>
                    
                    <input type="text" name="alamat" class="form-control" value="<?=$mhs->nim ?>">
                </div>
                <div class="form-group">
                    <label for="">email</label>
                    
                    <input type="text" name="email" class="form-control" value="<?=$mhs->nim ?>">
                </div>
                <div class="form-group">
                    <label for="">no_telp</label>
                    
                    <input type="text" name="no_telp" class="form-control" value="<?=$mhs->nim ?>">
                </div>
                <div class="form-groub">
                    <label for="">Foto</label>
                    <input type="hidden" name="fotoold" class="form-control" value="<?=$mhs->foto ?>">
                    <input type="file" name="fotonew">
                </div>
                

                <a href="<?= base_url(); ?>mahasiswa/index" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        <?php endforeach ?>
    </section>
</div>