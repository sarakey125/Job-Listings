<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="/">JobSeeker</a>
        </h1>
        <nav class="space-x-4 flex items-center">
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="/auth/login" class="text-white hover:underline">Login</a>
                <a href="/auth/register" class="text-white hover:underline">Register</a>
            <?php else: ?>
                <a href="/auth/login" class="text-white hover:underline">Logout</a>
                <a href="/blog" class="text-white hover:underline">Blog</a>
                <a href="/ternary" class="text-white hover:underline">Ternary</a>
            <?php endif; ?>
            <a href="/listings/create"
                class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"><i
                    class="fa fa-edit"></i> Post a Job</a>
        </nav>
    </div>
</header>