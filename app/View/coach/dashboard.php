<?php require __DIR__ . '/../includes/Header.php'; ?>

<div class="flex min-h-screen bg-gray-900 text-white">

    <aside class="w-64 bg-gray-800 p-6 flex flex-col">
        <div class="text-center mb-10">
            <div class="w-16 h-16 mx-auto rounded-full bg-orange-500 flex items-center justify-center text-2xl font-bold">
                <?= strtoupper(substr($_SESSION['user']['nom'], 0, 1)) ?>
            </div>
            <p class="mt-2 font-semibold"><?= htmlspecialchars($_SESSION['user']['nom']) ?></p>
            <span class="text-gray-400 text-sm">Coach</span>
        </div>

        <nav class="flex flex-col gap-4">
            <a href="/coach/dashboard" class="px-4 py-2 rounded bg-orange-500 font-bold">Dashboard</a>
            <a href="/coach/seance" class="px-4 py-2 rounded hover:bg-orange-500 transition">Mes séances</a>
            <a href="/coach/profile_c" class="px-4 py-2 rounded hover:bg-orange-500 transition">Mon Profile</a>
            <a href="/coach/reservation" class="px-4 py-2 rounded hover:bg-orange-500 transition">Réservations</a>
            <a href="/logout" class="px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-center transition">Déconnexion</a>
        </nav>
    </aside>

    <main class="flex-1 p-10">
        <h1 class="text-3xl font-bold mb-6">Bienvenue Coach <?= htmlspecialchars($_SESSION['user']['nom']) ?> 💪</h1>

        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="/coach/seance" class="bg-orange-500 p-6 rounded-xl text-center font-bold">
                Mes séances
            </a>
            <a href="/coach/reservation" class="bg-white/10 p-6 rounded-xl text-center">
                Réservations
            </a>
        </section>
    </main>

</div>

<?php require __DIR__ . '/../includes/Footer.php'; ?>
