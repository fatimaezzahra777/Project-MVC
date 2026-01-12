<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Coach</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen">

<div class="max-w-4xl mx-auto py-16 px-4">
    <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-xl p-8">
        <a href="Liste_c.php" class="flex justify-end ">
            <button class="md:col-span-2 bg-emerald-500 hover:bg-emerald-600 p-3 rounded-lg font-bold transition"> X </button>
        </a>

        <div class="flex flex-col md:flex-row gap-8">
            <img src="<?= !empty($coach['photo']) ? htmlspecialchars($coach['photo']) : 'assets/images/default.png' ?>"
                 class="w-64 h-64 object-cover rounded-xl">

            <!-- INFOS -->
            <div>
                <h1 class="text-3xl font-bold mb-2">Nom : </h1>
                <p class="text-gray-300 text-xl mb-2">Certification : </p>
                <p class="text-gray-300 text-xl mb-2">Biographie </p>
                <p class="text-gray-300 text-xl mb-2">Expérience : ans</p>
                <p class="text-gray-300 text-xl mb-2">Discipline : </p>
            </div>
        </div>

        <div class="mt-10">
            <h2 class="text-2xl font-bold mb-4">Disponibilités</h2>

            <?php if (!empty($dispos)): ?>
                <table class="w-full text-left">
                    <tr class="border-b">
                        <th>Jour</th>
                        <th>De</th>
                        <th>À</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($dispos as $d): ?>
                        <tr class="border-b">
                            <td><?= htmlspecialchars($d['jour']) ?></td>
                            <td><?= htmlspecialchars($d['heure_d']) ?></td>
                            <td><?= htmlspecialchars($d['heure_f']) ?></td>
                            <td>
                                <form method="POST" class="inline">
                                    <input type="hidden" name="date_r" value="<?= htmlspecialchars($d['jour']) ?>">
                                    <input type="hidden" name="heure" value="<?= htmlspecialchars($d['heure_d']) ?>">
                                    <button type="submit" class="bg-emerald-500 px-3 py-1 rounded">
                                        Réserver
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>Aucune disponibilité</p>
            <?php endif; ?>
        </div>

        <div class="mt-10">
            <h2 class="text-2xl font-bold mb-4 mt-6">Réserver une séance</h2>

            <form method="POST" class="grid md:grid-cols-2 gap-4">
                <input type="date" name="date_r" required
                       class="bg-black/30 border border-white/20 rounded-lg px-4 py-2">

                <input type="time" name="heure" required
                       class="bg-black/30 border border-white/20 rounded-lg px-4 py-2">

                <button type="submit"
                        class="md:col-span-2 bg-emerald-500 hover:bg-emerald-600 py-3 rounded-lg font-bold transition">
                    Confirmer la réservation
                </button>
            </form>
        </div>

    </div>
</div>
</body>
</html>
