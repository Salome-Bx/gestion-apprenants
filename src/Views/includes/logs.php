<div class="succes <?= isset($succes) ? "visible" : "invisible" ?>">
    <p><?= isset($succes) ?? $succes ?></p>
</div>
<div class="echec <?= isset($erreur) ? "visible" : "invisible" ?>">
    <p><?= isset($erreur) ?? $erreur ?></p>
</div>

<div id="blocLogs" class="px-8 py-6">
    <label class="block">Email *</label>
    <input type="email" placeholder="capucine@simplon.co" value="salome.burteaux.simplon@gmail.com" id="inputEmailConnexion" class=" border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">
    <label class="block">Mot de passe *</label>
    <input type="password" id="inputPasswordConnexion" value="azerty" class=" border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">

    <div class="flex justify-center pt-6 items-baseline">
        <button type="submit" id="btnConnexion" onclick="connexion()" class="mt-4 bg-blue-500 font-semibold text-white py-2 px-2 rounded-md hover:bg-blue-600">Connexion</button>
    </div>
</div>