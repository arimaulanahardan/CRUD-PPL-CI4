<?= $this -> extend('v_template');?>
<?= $this -> section('content');?>
    <h1>Detail Mahasiswa</h1>
    <a href="/mahasiswa">&laquo; Kembali</a>
    <ul>
        <li>NIM : <?= $mahasiswa['nim'] ?></li>
        <li>Nama : <?= $mahasiswa['nama'] ?></li>
        <li>Umur : <?= $mahasiswa['umur'] ?></li>
        
    </ul>
    
<?= $this->endsection(); ?>