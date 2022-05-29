const login = document.querySelector("form#login")
const registra = document.querySelector("form#registra")
const password = document.querySelector("input#pass")
const conpass = document.querySelector("input#conpass")
password.addEventListener('keyup', check)
conpass.addEventListener('keyup', concheck)
const car = document.querySelector("p#car")
const mai = document.querySelector("p#mai")
const min = document.querySelector("p#min")
const num = document.querySelector("p#num")
const spe = document.querySelector("p#spe")
const input_user = document.querySelector('input.user_log')
input_user.addEventListener('keyup', check_user)
const input_email = document.querySelector('input.email_log')
input_email.addEventListener('keyup', check_email)
var user;
var email;

function check_user(event){
    let type = "user"
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200){
            const check = document.getElementById("user_check")
            check.textContent = this.responseText
            if(this.responseText === "Username disponibile"){
                user = 1;
                check.style.color = "green";
                console.log(user)
                enable()
            }
            else{
                user = 0;
                check.style.color = "red";
                console.log(user)
                disable()
            }
        }
    }
    xmlhttp.open("GET", "check.php?t=" + type + "&q=" + event.currentTarget.value);
    xmlhttp.send();
}

function check_email(event){
    let type = "email"
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200){
            const check = document.getElementById("email_check")
            check.textContent = this.responseText
            if(this.responseText === "Email disponibile"){
                email = 1;
                check.style.color = "green";
                console.log(user)
                enable()
            }
            else{
                email = 0;
                check.style.color = "red";
                console.log(user)
                disable()
            }
        }
    }
    xmlhttp.open("GET", "check.php?t=" + type + "&q=" + event.currentTarget.value);
    xmlhttp.send();
}

function reg(){
    login.style.display = 'none'
    registra.style.display = 'flex'

    button.removeEventListener('click', reg)
    button.addEventListener('click', log)
    button.textContent = "LOGIN"
}

function log(){
    login.style.display = 'flex'
    registra.style.display = 'none'

    button.removeEventListener('click', log)
    button.addEventListener('click', reg)
    button.textContent = "REGISTRATI"
}

function check(){
    var minuscole = /[a-z]/g
    if (password.value.match(minuscole)){
        min.classList.remove("invalid")
        min.classList.add("valid")
        enable()
    }
    else{
        min.classList.remove("valid")
        min.classList.add("invalid")
        disable()
    }

    var maiuscole = /[A-Z]/g
    if (password.value.match(maiuscole)){
        mai.classList.remove("invalid")
        mai.classList.add("valid")
        enable()
    }
    else{
        mai.classList.remove("valid")
        mai.classList.add("invalid")
        disable()
    }

    var numeri = /[0-9]/g
    if (password.value.match(numeri)){
        num.classList.remove("invalid")
        num.classList.add("valid")
        enable()
    }
    else{
        num.classList.remove("valid")
        num.classList.add("invalid")
        disable()
    }

    var speciali = /[!-/]/g
    if (password.value.match(speciali)){
        spe.classList.remove("invalid")
        spe.classList.add("valid")
        enable()
    }
    else{
        spe.classList.remove("valid")
        spe.classList.add("invalid")
        disable()
    }

    if (password.value.length >= 8){
        car.classList.remove("invalid")
        car.classList.add("valid")
        enable()
    }
    else{
        car.classList.remove("valid")
        car.classList.add("invalid")
        disable()
    }

    if (spe.classList.contains("valid") && car.classList.contains("valid") && num.classList.contains("valid") && mai.classList.contains("valid") && min.classList.contains("valid")){
        password.classList.remove("invalidb")
        password.classList.add("validb")
        enable()
        concheck()
    }
    else{
        password.classList.remove("validb")
        password.classList.add("invalidb")
        disable()
        concheck()
    }
}

function concheck(){
    if (conpass.value.length >= 8 && conpass.value === password.value){
        conpass.classList.remove("invalidb")
        conpass.classList.add("validb")
        enable()
    }
    else{
        conpass.classList.remove("validb")
        conpass.classList.add("invalidb")
        disable()
    }
}

function enable(){
    if(password.className === "validb" && conpass.className === "validb" && user === 1 && email === 1){
        const submit = document.getElementById("submit_r")
        submit.removeAttribute('disabled');
        console.log('a')
    }
}

function disable(){
    if(password.className === "invalidb" || conpass.className === "invalidb" || user === 0 || email === 0){
        const submit = document.getElementById("submit_r")
        submit.setAttribute('disabled', "true");
    }
}
