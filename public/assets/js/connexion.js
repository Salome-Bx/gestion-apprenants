// Connexion
document.getElementById('btnConnexion').addEventListener('click', (e) => {

    e.preventDefault();

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
                
                return res.json();

            }
        })
        .then((data) => {
            if (data !== null && typeof data === 'object') {
                console.log(data)
                

            } else if (data !== null && typeof data === 'string') {
                document.body.innerHTML = data;
                console.log(data)
                console.log("je suis ici");
            }


        })
        .catch((error) => console.error("Error:", error));
});


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
