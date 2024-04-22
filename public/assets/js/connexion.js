
// Connexion


async function connexion() {

    let emailConnexion = document.querySelector("#inputEmailConnexion").value;
    let passwordConnexion = document.querySelector("#inputPasswordConnexion").value;

    let loginCrendentials = {
        email: emailConnexion,
        password: passwordConnexion,
    };


    let params = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(loginCrendentials),
    };

    fetch(HOME_URL, params)
        .then((res) => {
            if (res.status === 200) {

                return res.text();

            } else {

                showMessage("Mauvais email et/ou mot de passe", "echec");
                hideMessage('succes');

                return res.json();

            }
        })
        .then((data) => {
            if (data !== null && typeof data === 'object') {



            } else if (data !== null && typeof data === 'string') {
               

                document.body.innerHTML = data;

                let params = {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                }

                fetch("/dashboard", params)

                    .then((res) => {
                        if (res.status === 200) {

                            return res.text();

                        } else {

                            showMessage("Impossible d'importer promotions", "echec");
                            hideMessage('succes');

                            return res.json();

                        }
                    })
                    .then((data) => {
                        if (data !== null && typeof data === 'object') {



                        } else if (data !== null && typeof data === 'string') {
                           
                            // console.log(data);
                            let tableauGrades = JSON.parse(data);
                            

                            function afficherTableGrade(grade) {
                                let header = '<tr><th class="pb-3 px-3 text-left">Nom</th><th class="pb-3 px-3 text-left">Nombre d\'étudiants</th><th class="pb-3 px-3 text-left">Date de début</th><th class="pb-3 px-3 text-left">Date de fin</th></tr>';

                                // Créer les lignes du corps de la table
                                let body = grade.map(grade => `
                                    <tr class="">
                                    
                                    <td class="pb-3 px-3">${grade.Name_Grade}</td>
                                    <td class="pb-3 px-3">${grade.Student_Number_Grade}</td>
                                    <td class="pb-3 px-3">${grade.DateStart_Grade}</td>
                                    <td class="pb-3 px-3">${grade.DateEnd_Grade}</td>
                                    <td class="pb-3 px-3"> <a href="#" class="text-blue-500"> Voir </a> </td>
                                    <td class="pb-3 px-3"> <a href="#" class="text-blue-500"> Editer </a> </td>
                                    <td class="pb-3 px-3"> <a href="#" class="text-blue-500"> Supprimer </a> </td>

                                    </tr>
                                `).join('');

                                // Combiner l'en-tête et le corps pour créer le HTML complet de la table
                                let tableHTML = `
                                    <table>
                                        <thead>${header}</thead>
                                        <tbody>${body}</tbody>
                                    </table>
                                `;

                                return tableHTML;
                            }
                            containerGrades.innerHTML = afficherTableGrade(tableauGrades.all_grades);
                            
                        };

                    }

                    )
                    .catch((error) => console.error("Error:", error));


            }


        })
        .catch((error) => console.error("Error:", error));
}
// )
;














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












