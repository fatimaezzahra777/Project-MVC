<?php
$title = "Accueil - SuperFitness";

require __DIR__ . '/../includes/Header.php';
require __DIR__ . '/../includes/nav.php';
?>

<!-- HERO -->
<section class="h-screen bg-cover bg-center flex items-center"
         style="background-image:url('/assets/images/hero.jpg')">
    <div class="bg-black/70 w-full h-full flex items-center">
        <div class="max-w-4xl mx-auto text-center px-4">
            <p class="text-orange-500 tracking-widest mb-4">PERSONAL GYM TRAINER</p>
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6">
                BE READY TO <br>
                <span class="text-orange-500">BECOME HEALTHY</span>
            </h1>
            <a href="/register"
               class="bg-orange-500 hover:bg-orange-600 text-black px-8 py-4 font-bold rounded">
                JOIN NOW
            </a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/Footer.php'; ?>
