<?php include __DIR__ . '/includes/header.php';
?>

<!-- PROMOS -->

<div class="relative flex min-h-screen text-gray-800 antialiased flex-col justify-center overflow-hidden bg-gray-50 px-4 sm:py-6">
    <main>
        <div class="md:flex no-wrap md:-mx-2">
            <div class="w-full mx-2 md:block lg:block md:-mt-24 sm:mt-0">

                <!-- NAV -->
                <div id="nav" class=" md:block lg:block">
                    <ul class="flex bg-white ">
                        <li class=" mr-1">
                            <a class="rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-gray-700" href="#">Accueil</a>
                            <a class="rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-gray-700" href="#">Promotions</a>
                        </li>
                    </ul>
                </div>

                <div id="dashboardPromotions">
                    <div class="bg-white p-3 rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span class="text-xl tracking-wide px-2">Toutes les promotions</span>

                        </div>
                    </div>

                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 sm:block ">
                        <div class="overflow-hidden px-5 border border-gray-200  md:rounded-lg">
                            <div class="min-w-full">
                                <div class="flex justify-between">

                                    <h2 class="font-medium text-gray-800 text-xl inline-block">Tableau des promotions de Simplon</h2>

                                    <button type="submit" id="btnAjouterPromo" class="flex mt-4 bg-green-500 font-semibold text-white py-2 px-2 hover:bg-blue-600">Ajouter promotion</button>

                                    <input type="text" name="nomPromo" value="La promo" id="nomPromo" class="flex border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">
                                    <input type="date" name="debutPromo" value="2024-04-17" id="debutPromo" class="flex border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">
                                    <input type="date" name="finPromo" value="2025-04-17" id="finPromo" class="flex border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">
                                    <input type="text" name="placesPromo" value="22" id="placesPromo" class="flex border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>