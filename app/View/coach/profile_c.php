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
            <a href="/coach/dashboard" class="px-4 py-2 rounded hover:bg-orange-500 transition">Dashboard</a>
            <a href="/coach/seance" class="px-4 py-2 rounded hover:bg-orange-500 transition">Mes séances</a>
            <a href="/coach/profile_c" class="px-4 py-2 rounded bg-orange-500 font-bold">Mon Profile</a>
            <a href="/coach/reservation" class="px-4 py-2 rounded hover:bg-orange-500 transition">Réservations</a>
            <a href="/logout" class="px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-center transition">Déconnexion</a>
        </nav>
    </aside>

    <main class="flex-1 p-10">
        <h1 class="text-2xl font-bold mb-6">👤 Mon profil</h1>

        <form method="post" class="max-w-xl bg-gray-800 p-6 rounded-xl space-y-4">
            <div>
                <label class="block mb-1">Nom</label>
                <input type="text" value="<?= htmlspecialchars($_SESSION['user']['nom']) ?>"
                       class="w-full p-2 rounded bg-gray-700" disabled>
            </div>

            <div>
                <label class="block mb-1">Discipline</label>
                <input type="text" name="discipline"
                       value="<?= $coach['discipline'] ?? '' ?>"
                       class="w-full p-2 rounded bg-gray-700">
            </div>

            <div>
                <label class="block mb-1">Expérience (années)</label>
                <input type="number" name="experience"
                       value="<?= $coach['experience'] ?? '' ?>"
                       class="w-full p-2 rounded bg-gray-700">
            </div>

            <div>
                <label class="block mb-1">Biographie</label>
                <textarea name="biographie"
                          class="w-full p-2 rounded bg-gray-700"><?= $coach['biographie'] ?? '' ?></textarea>
            </div>

            <button class="bg-orange-500 px-4 py-2 rounded hover:bg-orange-600">
                Enregistrer
            </button>
        </form>
    </main>
</div>

<?php require __DIR__ . '/../includes/Footer.php'; ?>
