<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
    <center>
        <h1>Login</h1>
        <?php if (session()->getFlashdata('error')) : ?>
            <div style="background-color: red; color: white; padding: 10px; width: 220px; margin-bottom: 10px; border-radius: 5%;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="/" method="post">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <label for="username">Username</label>
            <input type="text" name="username" id="username"> <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password"> <br>
            <button type="submit">Login</button>
        </form>
    </center>
</section>
</body>
</html>

