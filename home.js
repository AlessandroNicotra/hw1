document.addEventListener("DOMContentLoaded", liste())
const stelle = document.querySelectorAll('span.stella')
stelle.forEach(star =>{
    star.addEventListener('mouseover', rate_hover)
    star.addEventListener('click', rate)
})
const overlay = document.querySelectorAll('div.rating_overlay')
overlay.forEach(over =>{
    over.addEventListener('mouseout', out_rate)
})
const menu_fav = document.querySelector('div.menu')
menu_fav.addEventListener('click', menu);
const back = document.querySelector('p.back')
back.addEventListener('click', menu_back)
const logout = document.querySelector('p.logout')
logout.addEventListener('click', log_out)

function log_out(){
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "logout.php");
    xmlhttp.send();
    window.location.href = "index.php?"
}

function menu_back(){
    const liste = document.querySelector('div#aggiunti')
    const fav = document.querySelector('div#profilo')
    liste.style.display = 'flex'
    fav.style.display = 'none'
}

function menu(){
    const liste = document.querySelector('div#aggiunti')
    const fav = document.querySelector('div#profilo')
    liste.style.display = 'none'
    fav.style.display = 'flex'
}

function liste() {
    const locandine_p = document.querySelectorAll("div.like div.locandina")
    const locandine_v = document.querySelectorAll("div.visti div.locandina")
    const locandine_w = document.querySelectorAll("div.watch div.locandina")

    fetch("json_liste.php?type=piace").then((result) => {
        return result.json();
    }).then((data) => {
        if(data.length === 0){
            locandine_p[0].parentNode.parentNode.querySelector('p.new').style.display = 'block'
        }
        else{
            let n = 5;
            if(data.length < 5) n = data.length;
            for(let i = 0; i < n; i++){
                locandine_p[i].querySelector('a').href = "result.php?film=" + data[i].IMDBid;
                if(data[i].poster === "N/A"){
                    locandine_p[i].querySelector('img').style.display = "none"
                    locandine_p[i].querySelector('p').textContent = data[i].titolo
                }
                else{
                    locandine_p[i].querySelector('img').src = data[i].poster;
                }
                let div = locandine_p[i].querySelector('div.rating_overlay')
                div.id = data[i].IMDBid;
                get_rate(div);
                locandine_p[i].className = "locandina_b"
            }
        }
    })

    fetch("json_liste.php?type=visto").then((result) => {
        return result.json();
    }).then((data) => {
        if(data.length === 0){
            locandine_v[0].parentNode.parentNode.querySelector('p.new').style.display = 'block'
        }
        else{
            let n = 5;
            if(data.length < 5) n = data.length;
            for(let i = 0; i < n; i++){
                locandine_v[i].querySelector('a').href = "result.php?film=" + data[i].IMDBid;
                if(data[i].poster === "N/A"){
                    locandine_v[i].querySelector('img').style.display = "none"
                    locandine_v[i].querySelector('p').textContent = data[i].titolo
                }
                else{
                    locandine_v[i].querySelector('img').src = data[i].poster;
                }
                let div = locandine_v[i].querySelector('div.rating_overlay')
                div.id = data[i].IMDBid;
                get_rate(div);
                locandine_v[i].className = "locandina_b"
            }
        }
    })

    fetch("json_liste.php?type=watch").then((result) => {
        return result.json();
    }).then((data) => {
        if(data.length === 0){
            locandine_w[0].parentNode.parentNode.querySelector('p.new').style.display = 'block'
        }
        else{
            let n = 5;
            if(data.length < 5) n = data.length;
            for(let i = 0; i < n; i++){
                locandine_w[i].querySelector('a').href = "result.php?film=" + data[i].IMDBid;
                if(data[i].poster === "N/A"){
                    locandine_w[i].querySelector('img').style.display = "none"
                    locandine_w[i].querySelector('p').textContent = data[i].titolo
                }
                else{
                    locandine_w[i].querySelector('img').src = data[i].poster;
                }
                let div = locandine_w[i].querySelector('div.rating_overlay')
                div.id = data[i].IMDBid;
                get_rate(div);
                locandine_w[i].className = "locandina_b"
            }
        }
    })
}

function get_rate(div){
    console.log("get")
    let url = 'json_result.php?id=' + div.id
    console.log(url)
    fetch(url).then((result)=>{
        console.log("j")
        return result.json();
    }).then((data)=>{
        console.log("s")
        const stelle = div.querySelectorAll("span.stella")
        div.title = data.rating
        for(let i = 0; i < data.rating; i++){
            if(stelle[i].id <= data.rating){
                stelle[i].innerHTML = '&#9733;'
                console.log('s1')
            }
        }
    })
}

function rate_hover(event){
    let parent = event.currentTarget.parentNode;
    const stelle = parent.querySelectorAll("span.stella")

    for(let i = 0; i < stelle.length; i++){
        stelle[i].innerHTML = '&#9734;'
    }

    for(let i = 0; i < event.currentTarget.id; i++){
        if(stelle[i].id <= event.currentTarget.id){
            stelle[i].innerHTML = '&#9733;'
        }
    }
}

function out_rate(event){
    console.log("A")
    let d = event.currentTarget
    const stelle = d.querySelectorAll("span.stella")
    for(let i = 0; i < stelle.length; i++){
        stelle[i].innerHTML = '&#9734;'

    }
    for(let i = 0; i < d.title; i++){
        stelle[i].innerHTML = '&#9733;'
    }
    console.log("out");
}

function rate(event){
    let rating = event.currentTarget.id
    let parent = event.currentTarget.parentNode
    parent.title = rating
    overlay.forEach(over =>{
        if(over.id === parent.id){
            over.title = rating
            const stelle = over.querySelectorAll("span.stella")
            for(let i = 0; i < stelle.length; i++){
                stelle[i].innerHTML = '&#9734;'

            }
            for(let i = 0; i < over.title; i++){
                stelle[i].innerHTML = '&#9733;'
            }
        }
    })
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "visto.php?t=ratel&id=" + parent.id +  "&rating=" + rating , true);
    xmlhttp.send();
    console.log('a')
}