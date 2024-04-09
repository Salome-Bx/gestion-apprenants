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

    fetch("../../../src/Controllers/UserController.php", params)
        .then((res) => res.text())
        .then((data) => {
            let jsonData = JSON.parse(data);
            if (jsonData) {
                // Check status property while considering possible encoding differences
                // if (jsonData.status.trim().toLowerCase() === "succes") {
                //     // Handle success
                //     modalConnexion.classList.add("hidden");
                //     modalToDoList.classList.remove("hidden");
                //     btnCompteHeader.classList.remove("hidden");
                // } else if (jsonData.status.trim().toLowerCase() === "erreur") {
                //     // Handle error
                //     document.querySelector(".messageErreur").innerText =
                //         "Le mot de passe est erroné";
                //     setTimeout(function () {
                //         document.querySelector(".messageErreur").innerText = "";
                //     }, 2000);
                // }
            } else {
                // Handle the case where data or data.status is not defined
                console.error("Invalid data received from server:", data);
            }
        });
}