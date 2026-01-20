<?php require __DIR__ . '/../includes/Header.php'; ?>

    <div class="flex min-h-screen bg-black text-white">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-black/90 border-r border-gray-800 fixed h-full">
        <div class="p-6 text-center border-b border-gray-800">
            <div class="w-20 h-20 mx-auto rounded-full bg-orange-500 flex items-center justify-center text-3xl font-bold">
                <?= strtoupper(substr($_SESSION['user']['nom'], 0, 1)) ?>
            </div>
            <h2 class="mt-4 font-semibold">
                <?= htmlspecialchars($_SESSION['user']['nom']) ?>
            </h2>
            <p class="text-sm text-gray-400">Sportif</p>
        </div>

        <nav class="p-6 space-y-4">
            <a href="/sportif/dashboard"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 transition ">
                🏠 Dashboard
            </a>

            <a href="/sportif/seance"
               class="flex items-center gap-3 p-3 rounded-lg bg-orange-500 font-bold">
                🏋️ Séances
            </a>

            <a href="/sportif/reserv"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 transition">
                📅 Réservations
            </a>

            <a href="/logout"
               class="flex items-center gap-3 p-3 rounded-lg text-red-500 hover:bg-red-500/10 transition">
                🚪 Déconnexion
            </a>
        </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="ml-64 flex-1 p-10">
        <h1 class="text-3xl font-bold mb-6">Séances Disponibles</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($seances as $seance): ?>
                <div class="bg-gray-800 p-6 rounded-xl">
                    <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars($seance['nom']) ?></h3>
                    <p class="text-gray-400 mb-2">Coach : <?= htmlspecialchars($seance['coach_nom']) ?></p>
                    <p class="text-gray-400 mb-4">Date : <?= htmlspecialchars($seance['date']) ?></p>
                    <a href="/sportif/reserv/<?= $seance['id'] ?>" 
                       class="block text-center bg-orange-500 hover:bg-orange-600 py-2 rounded transition">
                       Réserver
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

</div>

<?php require __DIR__ . '/../includes/Footer.php'; ?>
