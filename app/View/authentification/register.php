<?php
$title = "Inscription - SuperFitness";

require __DIR__ . '/../includes/Header.php';
require __DIR__ . '/../includes/nav.php';
?>

<div class="min-h-screen flex items-center justify-center bg-black/90">
    <div class="bg-white/10 backdrop-blur-xl border border-white/20 p-10 rounded-3xl w-full max-w-md text-white">
        <h2 class="text-3xl font-bold text-center mb-6">Créer un compte</h2>

        <?php if (!empty($error)): ?>
            <div class="text-red-500 text-center mb-4"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-4">
            <input type="text" name="nom" placeholder="Nom complet"
                   class="w-full px-4 py-3 rounded-full bg-white/20 placeholder-gray-300 text-white focus:outline-none focus:ring-2 focus:ring-orange-500" required>

            <input type="email" name="email" placeholder="Email"
                   class="w-full px-4 py-3 rounded-full bg-white/20 placeholder-gray-300 text-white focus:outline-none focus:ring-2 focus:ring-orange-500" required>

            <input type="text" name="telephone" placeholder="Téléphone"
                   class="w-full px-4 py-3 rounded-full bg-white/20 placeholder-gray-300 text-white focus:outline-none focus:ring-2 focus:ring-orange-500" required>

            <input type="password" name="password" placeholder="Mot de passe"
                   class="w-full px-4 py-3 rounded-full bg-white/20 placeholder-gray-300 text-white focus:outline-none focus:ring-2 focus:ring-orange-500" required>

            <select name="role" class="w-full px-4 py-3 rounded-full bg-white/20 text-white focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                <option value="">Sélectionnez un rôle</option>
                <option value="sportif">Sportif</option>
                <option value="coach">Coach</option>
            </select>

            <button type="submit"
                    class="w-full py-3 bg-orange-500 rounded-full font-bold hover:bg-orange-600 transition">
                S’inscrire
            </button>
        </form>

        <p class="text-center mt-4 text-gray-300">
            Déjà un compte ? 
            <a href="/login" class="text-orange-500 hover:underline">Connectez-vous</a>
        </p>
    </div>
</div>

<?php require __DIR__ . '/../includes/Footer.php'; ?>
