<div class="content-wrapper">
    <section class="content">
        <h4><strong>Detail data mahasiswa</strong></h4>
        <table class="table">
            <tr>
                <td>
                    <img src="<?= base_url(); ?>assets/foto/<?= $detail->foto; ?>" alt="" width="110px">
                </td>
                <td></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td><?= $detail->nama ?></td>
            </tr>
            <tr>
                <th>NIM</th>
                <td><?= $detail->nim ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td><?= $detail->tgl_lahir ?></td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td><?= $detail->jurusan ?></td>
            </tr>
            <tr>
                <th>alamat</th>
                <td><?= $detail->alamat ?></td>
            </tr>
            <tr>
                <th>email</th>
                <td><?= $detail->email ?></td>
            </tr>
            <tr>
                <th>no_telp</th>
                <td><?= $detail->no_telp ?></td>
            </tr>
            
        </table>

        <a class="btn btn-primary" href="<?= base_url(); ?>mahasiswa">Kembali</a>
    </section>
</div>