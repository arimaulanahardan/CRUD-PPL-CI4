<?= $this->extend('v_Template'); ?>
<?= $this->section('content'); ?>
<title>Menampilkan Data Mahasiwa</title>

    <table border="1">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $mhs['nim'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['umur'] ?></td>
                    <td><button class = "btn btn-succes" type="button" onclick="window.location.href='<?= base_url('mahasiswa/detail/' . $mhs['nim']) ?>'">Detail</button></td>
                 </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>    
    <button class = "btn btn-succes" type="button" onclick="window.location.href='<?= base_url('mahasiswa/add/create') ?>'">Tambah</button>
    <?= $this->endsection(); ?>