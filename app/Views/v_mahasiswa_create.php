<?= $this->extend('v_Template'); ?>
<?= $this->section('content'); ?>
<title>Tambah Data Mahasiwa</title>

<section id="form-mahasiswa-store">
    <?php
    if (isset($errors)) {
        echo '<div style="width: 300px"; border-radius: 5px; >';
        echo '<ul style="background-color: red; color: white; padding: 10px;">';
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
        echo '</div>';
    }
    ?>
    <?= form_open('/mahasiswa/add/store'); ?>
    <div>
        <h1>Tambah Data Mahasiswa</h1>
        <a href="/mahasiswa">&laquo; Kembali</a>
    </div>
    <br>
    <div>
        <label for="nim">NIM</label> <br>
        <input type="number" name="nim" id="nim" value="<?= set_value('nim') ?>">
    </div>
    <br>
    <div>
        <label for="nama">Nama Mahasiswa</label> <br>
        <input type="text" name="nama" id="nama" value="<?= set_value('nama') ?>">
    </div>
    <br>
    <div>
        <label for="umur">Umur</label> <br>
        <input type="number" name="umur" id="umur" value="<?= set_value('umur') ?>">
    </div>
    <br>
    <div>
        <input type="submit" name="simpan" value="Simpan">
    </div>
    <?= form_close(); ?>
</section>
<?= $this->endsection(); ?>
