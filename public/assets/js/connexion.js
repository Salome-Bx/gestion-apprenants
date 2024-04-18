
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

                // console.log(data);
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
                                let header = '<tr><th>Nom</th><th>Nombre d\'étudiants</th><th>Date de début</th><th>Date de fin</th></tr>';

                                // Créer les lignes du corps de la table
                                let body = grade.map(grade => `
                                    <tr>
                                        
                                        <td>${grade.Name_Grade}</td>
                                        <td>${grade.Student_Number_Grade}</td>
                                        <td>${grade.DateStart_Grade}</td>
                                        <td>${grade.DateEnd_Grade}</td>
                                        <td>Voir</td>
                                        <td>Editer</td>
                                        <td>Supprimer</td>

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
                            // console.log(containerGrades);
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












