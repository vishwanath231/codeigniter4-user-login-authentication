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
            <div class="text-2xl mt-3 mb-7">Register</div>

            <form action="/register" method="post">
                <div class="flex flex-col mb-5">
                    <label for="firstname" class="mb-2">Firstname</label>
                    <input type="text" name="firstname" id="firstname" value="<?= set_value('firstname') ?>" class="border border-gray-300 p-2.5 rounded">
                    <?php if (isset($validation)) : ?>
                        <div class="text-red-600 my-1"> <?= $validation->getError('firstname'); ?></div>
                    <?php endif ?>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="lastname" class="mb-2">Lastname</label>
                    <input type="text" name="lastname" id="lastname" value="<?= set_value('lastname') ?>" class="border border-gray-300 p-2.5 rounded">

                    <?php if (isset($validation)) : ?>
                        <div class="text-red-600 my-1"> <?= $validation->getError('lastname'); ?></div>
                    <?php endif ?>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" name="email" id="email" value="<?= set_value('email') ?>" class="border border-gray-300 p-2.5 rounded">
                    <?php if (isset($validation)) : ?>
                        <div class="text-red-600 my-1"> <?= $validation->getError('email'); ?></div>
                    <?php endif ?>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="password" class="mb-2">Password</label>
                    <input type="password" name="password" id="password" class="border border-gray-300 p-2.5 rounded">
                    <?php if (isset($validation)) : ?>
                        <div class="text-red-600 my-1"> <?= $validation->getError('password'); ?></div>
                    <?php endif ?>
                </div>
                <button type="submit" class="block w-full bg-gray-200 text-black p-2.5 rounded">Register</button>
            </form>

        </div>
    </div>



    <script src="js/tailwindcss.js"></script>

</body>

</html>