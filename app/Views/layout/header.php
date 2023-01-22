<div class="shadow">
    <div class="max-w-screen-lg mx-auto px-5 py-5">
        <div class="flex justify-between items-center">
            <div class="text-xl uppercase font-bold">CI4</div>
            <div class="flex items-center">
                <?php if (!session()->get('isLoggedIn')) : ?>

                    <a href="/" class="mr-3">Login</a>
                    <a href="/register">Register</a>
                <?php else : ?>
                    <a href="/dashboard" class="mr-3">Dashboard</a>
                    <a href="/profile" class="mr-3">Profile</a>
                    <a href="/logout">Logout</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>