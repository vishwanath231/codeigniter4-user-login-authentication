<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <?php echo view('layout/header') ?>

    <div class="flex justify-center max-w-md mx-auto my-10 px-5">
        <div class="w-full shadow p-5 rounded">
            <div class="text-2xl mt-3 mb-7">Login</div>
            <?php if (session()->get('success')) : ?>
                <?= session()->get('success') ?>
            <?php endif ?>
            <form action="/" method="post">
                <div class="flex flex-col mb-5">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" name="email" id="email" value="<?= set_value('email') ?>" class="border border-gray-300 p-2.5 rounded">
                </div>
                <div class="flex flex-col mb-5">
                    <label for="password" class="mb-2">Password</label>
                    <input type="password" name="password" id="password" class="border border-gray-300 p-2.5 rounded">
                </div>
                <button type="submit" class="block w-full bg-gray-200 text-black p-2.5 rounded">Login</button>
            </form>
            <?php if (isset($validation)) : ?>
                <div class="text-red-600 my-1"> <?= $validation->listErrors(); ?></div>
            <?php endif ?>
        </div>
    </div>



    <script src="js/tailwindcss.js"></script>

</body>

</html>