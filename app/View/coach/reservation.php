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
            <a href="/coach/profile_c" class="px-4 py-2 rounded hover:bg-orange-500 transition">Mon Profile</a>
            <a href="/coach/reservation" class="px-4 py-2 rounded bg-orange-500 font-bold">Réservations</a>
            <a href="/logout" class="px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-center transition">Déconnexion</a>
        </nav>
    </aside>

    <main class="flex-1 p-10">
        <h1 class="text-2xl font-bold mb-6">📖 Réservations</h1>

        <?php if (empty($reservations)): ?>
            <p class="text-gray-400">Aucune réservation.</p>
        <?php else: ?>
            <table class="w-full bg-gray-800 rounded-xl">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="p-3">Sportif</th>
                        <th class="p-3">Jour</th>
                        <th class="p-3">Heure</th>
                        <th class="p-3">Statut</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $r): ?>
                        <tr class="border-t border-gray-700 text-center">
                            <td class="p-3"><?= htmlspecialchars($r['sportif']) ?></td>
                            <td class="p-3"><?= $r['jour'] ?></td>
                            <td class="p-3"><?= $r['heure'] ?></td>
                            <td class="p-3"><?= $r['statut'] ?></td>
                            <td class="p-3 space-x-2">
                                <a href="/coach/reservation/<?= $r['id'] ?>/accept"
                                   class="text-green-400">✔</a>
                                <a href="/coach/reservation/<?= $r['id'] ?>/reject"
                                   class="text-red-400">✖</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    </main>
</div>

<?php require __DIR__ . '/../includes/Footer.php'; ?>
