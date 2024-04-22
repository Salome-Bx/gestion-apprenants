
// ajouter une promo lorsque l'on clique sur "Sauvegarder promo"

function createPromo() {
    let nomPromo = document.querySelector("#nomPromo").value;
    let debutPromo = document.querySelector("#debutPromo").value;
    let finPromo = document.querySelector("#finPromo").value;
    let placesPromo = document.querySelector("#placesPromo").value;



    let PromoCrendentials = {
        NameGrade: nomPromo,
        DateStartGrade: debutPromo,
        DateEndGrade: finPromo,
        StudentNumberGrade: placesPromo
    };
    console.log(PromoCrendentials)

    let params = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(PromoCrendentials),
    };

    fetch("/dashboard/addPromotions", params)
        .then((res) => {
            if (res.status === 200) {

                
                return res.text();

            } else {

                showMessage("Entrez un nom de promotion valide", "echec");
                hideMessage('succes');

                return res.json();

            }
        })
        .then((dataProm) => {
            if (dataProm !== null && typeof dataProm === 'object') {


            } else if (dataProm !== null && typeof dataProm === 'string') {
                
                document.body.innerHTML = dataProm;

                ongletPromotions();


            }



        })
        .catch((error) => console.error("Error:", error));
}








function showMessage(message, encartClasse) {
    let encart = document.querySelector('.' + encartClasse);
    encart.classList.add('visible');
    encart.classList.remove('invisible');

    encart.querySelector('p').innerText = message;
}

function hideMessage(encartClasse) {
    let encart = document.querySelector('.' + encartClasse);
    encart.classList.remove('visible');
    encart.classList.add('invisible');

    encart.querySelector('p').innerText = '';
}

function ongletPromotions() {
    let dashboardAfficherPromotions = document.querySelector("#dashboardAfficherPromotions");
    let dashboardAjouterPromotions = document.querySelector("#dashboardAjouterPromotions");
    let dashboardAccueil = document.querySelector("#dashboardAccueil");
    dashboardAfficherPromotions.classList.remove("hidden");
    dashboardAjouterPromotions.classList.remove("hidden");
    dashboardAccueil.classList.add("hidden");

}