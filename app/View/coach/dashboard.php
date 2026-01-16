<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'coach') {
    header('Location: /login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Coach</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-black text-white flex">

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
            <li><a href="/profile" class="flex items-center gap-3 p-3 hover:bg-gray-800 rounded">
                <i class="fas fa-user text-orange-500"></i> Profile
            </a></li>
            <li><a href="/trainers" class="flex items-center gap-3 p-3 hover:bg-gray-800 rounded">
                <i class="fas fa-dumbbell text-orange-500"></i> Trainers
            </a></li>
            <li><a href="/stats" class="flex items-center gap-3 p-3 hover:bg-gray-800 rounded">
                <i class="fas fa-chart-line text-orange-500"></i> Stats
            </a></li>
            <li><a href="/logout" class="flex items-center gap-3 p-3 hover:bg-gray-800 rounded mt-auto">
                <i class="fas fa-sign-out-alt text-orange-500"></i> Logout
            </a></li>
        </ul>
    </nav>
</aside>

<!-- ================= MAIN CONTENT ================= -->
<main class="flex-1 ml-64 p-6">

    <!-- ================= OUR PROCESS ================= -->
    <section class="max-w-7xl mx-auto py-16">
        <h2 class="text-3xl font-bold text-center mb-10 text-orange-500">Our Process</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
            <div class="bg-gray-900 p-6 rounded-xl hover:bg-gray-800 transition">
                <i class="fas fa-chart-line text-orange-500 text-3xl mb-3"></i>
                <h3 class="font-semibold mb-1">Analyse Your Goal</h3>
            </div>
            <div class="bg-gray-900 p-6 rounded-xl hover:bg-gray-800 transition">
                <i class="fas fa-flask text-orange-400 text-3xl mb-3"></i>
                <h3 class="font-semibold mb-1">Work Hard on It</h3>
            </div>
            <div class="bg-gray-900 p-6 rounded-xl hover:bg-gray-800 transition">
                <i class="fas fa-dumbbell text-orange-400 text-3xl mb-3"></i>
                <h3 class="font-semibold mb-1">Improve Yourself</h3>
            </div>
            <div class="bg-gray-900 p-6 rounded-xl hover:bg-gray-800 transition">
                <i class="fas fa-trophy text-yellow-400 text-3xl mb-3"></i>
                <h3 class="font-semibold mb-1">Achieve Your Destiny</h3>
            </div>
        </div>
    </section>

    <!-- ================= STATS ================= -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-5 gap-6 text-center">
            <div>
                <p class="text-3xl font-bold text-orange-500">3480</p>
                <p class="text-gray-400 text-sm">Apps</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-orange-500">460+</p>
                <p class="text-gray-400 text-sm">Members</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-orange-500">150+</p>
                <p class="text-gray-400 text-sm">Trainers</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-orange-500">65</p>
                <p class="text-gray-400 text-sm">Kettlebells</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-orange-500">100</p>
                <p class="text-gray-400 text-sm">Hr/Track</p>
            </div>
        </div>
    </section>

    <!-- ================= OUR TRAINERS ================= -->
    <section class="py-16">
        <h2 class="text-3xl font-bold text-center mb-10 text-orange-500">Our Trainers</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-900 rounded-xl overflow-hidden text-center p-6 hover:scale-[1.03] transition">
                <img src="/assets/images/trainer1.jpg" class="w-full h-64 object-cover mb-4" alt="Trainer 1">
                <h3 class="font-semibold">Jorge Martin</h3>
                <p class="text-gray-400">Fitness Trainer</p>
            </div>
            <div class="bg-gray-900 rounded-xl overflow-hidden text-center p-6 hover:scale-[1.03] transition">
                <img src="/assets/images/trainer2.jpg" class="w-full h-64 object-cover mb-4" alt="Trainer 2">
                <h3 class="font-semibold">Mark</h3>
                <p class="text-gray-400">Fitness Trainer</p>
            </div>
            <div class="bg-gray-900 rounded-xl overflow-hidden text-center p-6 hover:scale-[1.03] transition">
                <img src="/assets/images/trainer3.jpg" class="w-full h-64 object-cover mb-4" alt="Trainer 3">
                <h3 class="font-semibold">George</h3>
                <p class="text-gray-400">Fitness Trainer</p>
            </div>
        </div>
    </section>

    <!-- ================= TESTIMONIALS ================= -->
    <section class="py-16">
        <h2 class="text-3xl font-bold text-center mb-10 text-orange-500">Testimonials</h2>
        <div class="max-w-3xl mx-auto text-center text-gray-400 italic">
            <p>"Chaque utilisateur, membre ou coach, a trouvé son programme parfait grâce à cette plateforme. Hautement recommandé!"</p>
            <p class="mt-4 font-semibold text-white">- Jackson, Coach Professionnel</p>
        </div>
    </section>

</main>
