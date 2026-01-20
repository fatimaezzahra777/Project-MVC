<?php require __DIR__ . '/../includes/Header.php'; ?>

<div class="p-10 text-white">
    <h1 class="text-3xl mb-6">Ajouter une séance</h1>

    <?php if (!empty($error)): ?>
        <p class="text-red-500 mb-4"><?= $error ?></p>
    <?php endif; ?>

    <form action="/coach/add_seance" method="post" class="flex flex-col gap-4 w-1/2">
        <label>Jour :</label>
        <input type="date" name="jour" class="p-2 rounded bg-gray-800 text-white" required>

        <label>Heure début :</label>
        <input type="time" name="heure_d" class="p-2 rounded bg-gray-800 text-white" required>

        <label>Heure fin :</label>
        <input type="time" name="heure_f" class="p-2 rounded bg-gray-800 text-white" required>

        <button type="submit" class="bg-orange-500 p-2 rounded mt-4 hover:bg-orange-600 transition">Ajouter</button>
    </form>

    <a href="/coach/seance" class="mt-4 inline-block text-gray-400 hover:text-white">Retour à mes séances</a>
</div>

<?php require __DIR__ . '/../includes/Footer.php'; ?>
