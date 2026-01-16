<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'sportif') {
    header('Location: /login');
    exit;
}

require __DIR__ . '/../includes/Header.php';
?>


<!-- ================= SIDEBAR ================= -->
<aside class="w-64 bg-black/90 border-r border-gray-800 min-h-screen fixed flex flex-col">
    <div class="p-6 text-center border-b border-gray-800">
        <h1 class="text-2xl font-bold text-orange-500">SUPER<span class="text-white">FITNESS</span></h1>
    </div>
    <nav class="flex-1 mt-6">
        <ul class="flex flex-col gap-2">
            <li><a href="/dashboard" class="flex items-center gap-3 p-3 hover:bg-gray-800 rounded">
                <i class="fas fa-home text-orange-500"></i> Dashboard
            </a></li>
            <li><a href="/my-coaches" class="flex items-center gap-3 p-3 hover:bg-gray-800 rounded">
                <i class="fas fa-user-friends text-orange-500"></i> Mes Coachs
            </a></li>
            <li><a href="/my-programs" class="flex items-center gap-3 p-3 hover:bg-gray-800 rounded">
                <i class="fas fa-dumbbell text-orange-500"></i> Mes Programmes
            </a></li>
            <li><a href="/stats" class="flex items-center gap-3 p-3 hover:bg-gray-800 rounded">
                <i class="fas fa-chart-line text-orange-500"></i> Mes Stats
            </a></li>
            <li><a href="/logout" class="flex items-center gap-3 p-3 hover:bg-gray-800 rounded mt-auto">
                <i class="fas fa-sign-out-alt text-orange-500"></i> Logout
            </a></li>
        </ul>
    </nav>
</aside>


<main class="flex-1 ml-64 p-6">

    <!-- ================= WELCOME HERO ================= -->
    <section class="bg-gray-900 rounded-xl p-8 mb-12">
        <h2 class="text-3xl font-bold text-orange-500 mb-2">Bienvenue, <?= $_SESSION['user']['name'] ?> !</h2>
        <p class="text-gray-400">Voici votre espace sportif pour suivre vos programmes et vos progrès.</p>
    </section>

    <!-- ================= MES PROGRAMMES ================= -->
    <section class="mb-12">
        <h3 class="text-2xl font-bold text-orange-500 mb-6">Mes Programmes</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-900 rounded-xl p-6 hover:scale-[1.03] transition">
                <h4 class="font-semibold mb-2">Programme Cardio</h4>
                <p class="text-gray-400 mb-4">Un programme pour améliorer votre endurance.</p>
                <a href="/programs/cardio" class="text-orange-500 hover:underline">Voir Détails</a>
            </div>
            <div class="bg-gray-900 rounded-xl p-6 hover:scale-[1.03] transition">
                <h4 class="font-semibold mb-2">Programme Force</h4>
                <p class="text-gray-400 mb-4">Un programme pour développer votre force musculaire.</p>
                <a href="/programs/force" class="text-orange-500 hover:underline">Voir Détails</a>
            </div>
            <div class="bg-gray-900 rounded-xl p-6 hover:scale-[1.03] transition">
                <h4 class="font-semibold mb-2">Programme Flexibilité</h4>
                <p class="text-gray-400 mb-4">Un programme pour améliorer votre mobilité et souplesse.</p>
                <a href="/programs/flex" class="text-orange-500 hover:underline">Voir Détails</a>
            </div>
        </div>
    </section>

    <!-- ================= MES COACHS ================= -->
    <section class="mb-12">
        <h3 class="text-2xl font-bold text-orange-500 mb-6">Mes Coachs</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-900 rounded-xl overflow-hidden text-center p-6 hover:scale-[1.03] transition">
                <img src="/assets/images/trainer1.jpg" class="w-full h-48 object-cover mb-4" alt="Coach 1">
                <h4 class="font-semibold">Jorge Martin</h4>
                <p class="text-gray-400">Fitness Trainer</p>
            </div>
            <div class="bg-gray-900 rounded-xl overflow-hidden text-center p-6 hover:scale-[1.03] transition">
                <img src="/assets/images/trainer2.jpg" class="w-full h-48 object-cover mb-4" alt="Coach 2">
                <h4 class="font-semibold">Mark</h4>
                <p class="text-gray-400">Fitness Trainer</p>
            </div>
            <div class="bg-gray-900 rounded-xl overflow-hidden text-center p-6 hover:scale-[1.03] transition">
                <img src="/assets/images/trainer3.jpg" class="w-full h-48 object-cover mb-4" alt="Coach 3">
                <h4 class="font-semibold">George</h4>
                <p class="text-gray-400">Fitness Trainer</p>
            </div>
        </div>
    </section>

    <!-- ================= MES STATS ================= -->
    <section class="mb-12">
        <h3 class="text-2xl font-bold text-orange-500 mb-6">Mes Statistiques</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <p class="text-3xl font-bold text-orange-500">12</p>
                <p class="text-gray-400 text-sm">Programmes</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-orange-500">340</p>
                <p class="text-gray-400 text-sm">Heures</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-orange-500">45</p>
                <p class="text-gray-400 text-sm">Sessions</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-orange-500">8</p>
                <p class="text-gray-400 text-sm">Coachings</p>
            </div>
        </div>
    </section>

</main>

<?php require __DIR__ . '/../includes/Footer.php'; ?>
</body>
</html>
