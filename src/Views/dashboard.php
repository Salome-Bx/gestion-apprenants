<?php include __DIR__ . '/includes/header.php'; ?>

<?php
// $infos_user = unserialize($infos_user);


?>


<div class="relative flex min-h-screen text-gray-800 antialiased flex-col justify-center overflow-hidden bg-gray-50 px-4 sm:py-16">
    <main>
        <div class="md:flex no-wrap md:-mx-2">
            <div class="w-full mx-2 md:block lg:block md:-mt-24 sm:mt-0">

                <!-- NAV -->
                <div id="nav" class=" md:block lg:block pt-10">
                    <ul class="flex bg-white ">
                        <li class=" mr-1">
                            <a class="accueil rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-gray-700" href="#">Accueil</a>
                            <a class="promotions rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-gray-700" onclick="ongletPromotions()" href="#">Promotions</a>
                        </li>
                    </ul>
                </div>

                <!-- ACCUEIL COURS DU JOUR -->
                <div id="dashboardAccueil">
                    <div class="bg-white p-3 rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span class="text-xl tracking-wide px-2">Cours du jour</span>

                        </div>
                    </div>

                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 sm:block ">
                        <div class="overflow-hidden px-5 py-  border border-gray-200  md:rounded-lg">
                            <div class="min-w-full">
                                <div class="flex justify-between">
                                    <h2 class="font-medium text-gray-800 text-2xl inline-block"> DWMM 2</h2>
                                    <!-- <div class="nom">< $infos_user->getLastNameUser() ?></div> -->

                                    <p class="justify-end font-medium text-gray-800 justify-items-end inline font-bold">Date</p>
                                </div>
                                <p class="font-medium text-gray-800 ">15 participants</p>

                                <div class="pt-4">
                                    <label for="font-medium text-gray-800 ">Code *</label>
                                    <input type="text" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">
                                </div>
                                <div class="flex justify-end pt-6 items-baseline">
                                    <button type="submit" id="btnConnexion" class="flex mt-4 bg-blue-500 font-semibold text-white py-2 px-2 hover:bg-blue-600">Valider présence</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- AJOUTER PROMOS -->
                <div id="dashboardAjouterPromotions" class="hidden">
                    <div class="bg-white p-3 rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span class="text-xl tracking-wide px-2">Création d'une promotion</span>

                        </div>
                    </div>

                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 sm:block ">
                        <div class="overflow-hidden px-5 border border-gray-200  md:rounded-lg">

                            <div class="flex flex-col">


                                <label for="nomPromo" class="w-full">Nom de la promotion</label>
                                <input type="text" name="nomPromo" value="La promo" id="nomPromo" class="flex border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">

                                <label for="debutPromo" class="w-full">Date de début</label>
                                <input type="date" name="debutPromo" value="2024-04-17" id="debutPromo" class="flex border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">

                                <label for="finPromo" class="w-full">Date de fin</label>
                                <input type="date" name="finPromo" value="2025-04-17" id="finPromo" class="flex border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">

                                <label for="placesPromo" class="w-full">Places disponibles</label>
                                <input type="text" name="placesPromo" value="22" id="placesPromo" class="flex border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">

                                <div class="flex justify-end">
                                    <button id="btnAjouterPromo" onclick="createPromo()" class="btnAjouterPromo flex justify-end items-baseline mt-4 bg-blue-500 font-semibold text-white py-2 px-2 hover:bg-blue-600">Sauvegarder une promotion</button>

                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <!-- AFFICHER PROMOS -->

                <div id="dashboardAfficherPromotions" class="hidden">
                    <div class="bg-white p-3 rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <h2 class="text-xl tracking-wide px-2">Toutes les promotions</h2>
                            <button id="btnAjouterPromo" onclick="createPromo()" class="btnAjouterPromo flex mt-4 bg-green-500 font-semibold text-white py-2 px-2 hover:bg-green-600">Ajouter promotion</button>
                        </div>
                    </div>
                    <h4 class="font-medium text-gray-800 text-xl inline-block">Tableau des promotions de Simplon</h4>
                    <div id="containerGrades" class="w-full"></div>


                </div>
            </div>
    </main>
</div>





<?php include __DIR__ . '/includes/footer.php'; ?>


















<?php include __DIR__ . '/includes/footer.php'; ?>