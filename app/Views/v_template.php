<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "PPL" ?></title>
</head>

<body>
    <main>

        <table width="100%" height="520px">
            <tr>
                <th colspan="3" height="40px" bgcolor="lightblue">
                    <h1>Selamat datang di <?= $title ?? "Tugas web PPL" ?></h1>
                </th>
            </tr>
            <tr bgcolor="lightgray" height="10px">
                <td height="40px" >
                    <a href="/home">Home</a>
                    <a href="/info">Info</a>
                </td>
                <td height="40px" >
                    <a href="/mahasiswa">Lihat Data Mahasiswa</a>
                </td>
                <?php if (session()->get('isLoggedIn')) { ?>
                    <td height="40px" >
                        <a href="/logout">Logout</a>
                    </td>
                <?php }  
                ?>
            </tr>
            <tr bgcolor="lavender">
                <td colspan="3" height="504px">
                    
                        <?= $this->renderSection('content') ?>
                    
                </td>
            </tr>
            <tr bgcolor="lightgreen">
                <td colspan="3">
                    <center>
                        <h3>&copy; Ari Maulana Hardan - 2023 </h3>
                    </center>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>