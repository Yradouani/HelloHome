let changeProfilBtn = document.querySelector("#changeInfo");
let changePwdBtn = document.querySelector("#changePwd");
let editProfil = false;
let editPwd = false;
let infoValues = document.querySelectorAll(".info_value");
let infoContent = [];
let newValues = [];
let submitInfoModalBtn = document.querySelector('#submitUpdate');
for (let i = 0; i < infoValues.length; i++) {
    infoContent.push(infoValues[i].textContent);
}
console.log(infoContent)
changeProfilBtn.addEventListener("click", () => {
    editProfil = !editProfil;
    let inputs = [];
    if (editProfil) {
        newValues = [];
        for (let k = 0; k < infoValues.length; k++) {
            let input = document.createElement('input');
            input.type = "text";
            input.className = "input-infos-content";
            input.value = infoContent[k];
            inputs.push(input);
            infoValues[k].innerHTML = "";
            infoValues[k].appendChild(input);
        }
        changeProfilBtn.setAttribute("data-bs-toggle", "modal");
        changeProfilBtn.setAttribute("data-bs-target", "#exampleModal");
        changeProfilBtn.innerHTML = "Valider la modification";
    } else {
        let input = document.querySelectorAll('.input-infos-content');
        let inputValue = [];
        changeProfilBtn.removeAttribute("data-bs-toggle");
        changeProfilBtn.removeAttribute("data-bs-target");
        for (let i = 0; i < input.length; i++) {
            inputValue.push(input[i].value);
        }
        console.log(inputValue);
        submitInfoModalBtn.addEventListener("click", () => {
            changeProfilBtn.removeAttribute("data-bs-toggle");
            changeProfilBtn.removeAttribute("data-bs-target");
            fetch('../POO_Immo/?action=updateUser', {
                method: 'POST',
                body: JSON.stringify({ info: inputValue }),
                headers: {
                    'Content-Type': 'application/json'
                },
                cache: 'no-cache'
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(text => {
                    console.log('Response from server:', text);
                })
                .catch(error => {
                    console.error(error);
                });

            // var maModal = document.getElementById("exampleModal");
            // var bootstrapModal = bootstrap.Modal.getInstance(maModal);
            // bootstrapModal.hide();
        })
        for (let k = 0; k < infoValues.length; k++) {
            infoValues[k].innerHTML = inputValue[k];
        }
        changeProfilBtn.innerHTML = "Modifier mes informations";
    }
    return [...inputs];

})

changePwdBtn.addEventListener("click", () => {

    changePwdBtn.innerHTML = "Changer mon mot de passe";
    let oldPwd = document.querySelector("#oldpassword");
    let newPwd = document.querySelector("#newpassword");
    let pwd = [oldPwd.value, newPwd.value];
    fetch('../POO_Immo/?action=updatePassword', {
        method: 'POST',
        body: JSON.stringify({ info: pwd }),
        headers: {
            'Content-Type': 'application/json'
        },
        cache: 'no-cache'
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(text => {
            console.log('Response from server:', text);
        })
        .catch(error => {
            console.error(error);
        });
    oldPwd.value = "";
    newPwd.value = "";
})