async function handleLoginConnexion() {
    let emailConnexion = document.querySelector("#inputEmailConnexion").value;
    let passwordConnexion = document.querySelector("#inputPasswordConnexion").value;

    // if (emailConnexion == "") {
    //     document.querySelector(
    //         ".messageErreur"
    //     ).innerText = "Merci d'entrer votre mail";
    // }

    // setTimeout(function () {
    //     document.querySelector(".messageErreur").innerText = "";
    // }, 2000);


    let loginCrendentials = {
        email: emailConnexion,
        password: passwordConnexion,
    };
    console.log(loginCrendentials);

    let params = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify(loginCrendentials),
    };

    fetch("http://gestion-apprenants", params)
        .then((res) => res.json())
        .then((data) => {
            console.log("succes")
            // if (data.status === "success") {
            //     loginData.innerHTML = data.message + "<br> Vous allez etre redirigé";
            //     if (data.userRole == 5 || data.userRole == 6) {
            //     }
            // } else {
            //     loginData.innerHTML = data.message;
            // }
        })
        .catch((error) => console.error("Error:", error));
}