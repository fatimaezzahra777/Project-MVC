<?php require __DIR__ . '/../includes/Header.php'; ?>

<div class="flex min-h-screen bg-black text-white">

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
               class="flex items-center gap-3 p-3 rounded-lg bg-orange-500 font-bold">
                🏠 Dashboard
            </a>

            <a href="/sportif/seance"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 transition">
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

    <main class="ml-64 flex-1 p-10">
        <h1 class="text-4xl font-extrabold mb-8">
            Bienvenue <?= htmlspecialchars($_SESSION['user']['nom']) ?> 
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white/10 p-6 rounded-2xl border border-white/10">
                <h3 class="text-xl font-bold mb-2">Séances disponibles</h3>
                <p class="text-gray-400 mb-4">
                    Découvrez les séances proposées par nos coachs.
                </p>
                <a href="/sportif/seance"
                   class="inline-block bg-orange-500 px-5 py-2 rounded-full font-bold">
                    Voir
                </a>
            </div>

            <div class="bg-white/10 p-6 rounded-2xl border border-white/10">
                <h3 class="text-xl font-bold mb-2">Mes réservations</h3>
                <p class="text-gray-400 mb-4">
                    Consultez vos séances réservées.
                </p>
                <a href="/sportif/reserv"
                   class="inline-block bg-white/20 px-5 py-2 rounded-full">
                    Consulter
                </a>
            </div>

            <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-6 rounded-2xl text-black">
                <h3 class="text-xl font-bold mb-2">Objectif du jour </h3>
                <p>Reste actif et dépasse tes limites !</p>
            </div>
        </div>
    </main>

</div>

<?php require __DIR__ . '/../includes/Footer.php'; ?>
