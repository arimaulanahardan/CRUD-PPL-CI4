<?= $this->extend('v_template'); ?>
<?= $this->section('content'); ?>
<section id="form-mahasiswa-display">
    <h1><?= $title ?></h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div style="width: 300px ; border-radius: 5px;">
            <ul style="background-color: green; color: white; padding: 10px;">
                <li><?= session()->getFlashdata('pesan') ?></li>
            </ul>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('/create') ?>">+ Tambah Data</a>

    <!-- form cari nama mahasiswa -->
    <form action="<?= base_url('/mahasiswa') ?>" method="get">
        <input type="search" name="keyword" placeholder="Masukkan Nama Mahasiswa" autofocus>
        <button type="submit">Cari</button>
    </form>


    <table border="1" width="60%">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Mahasiswa</th>
                <th>Umur</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $mhs['nim'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['umur'] ?></td>
                    <td>
                        <a href="<?= base_url("detail/{$mhs['nim']}")  ?>">Detail</a>
                    </td>
                    <td>
                        <a href="<?= base_url("edit/{$mhs['nim']}")  ?>">Edit</a>
                    </td>
                    <td>
                        <form action="<?= base_url("delete/{$mhs['nim']}")  ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?= $this->endsection(); ?>