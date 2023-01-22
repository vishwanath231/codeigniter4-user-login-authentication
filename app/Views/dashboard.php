<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php echo view('layout/header') ?>

    <div class="max-w-screen-lg mx-auto px-5 py-5">

        <div class="text-3xl my-7 font-medium">Hello, <span><?= session()->get('firstname') ?> </span> </div>
    </div>

🤚🏻

    <script src="js/tailwindcss.js"></script>

</body>

</html>