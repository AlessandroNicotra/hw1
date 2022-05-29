document.addEventListener("DOMContentLoaded", cerca())
const stelle = document.querySelectorAll('span.stella')
stelle.forEach(star =>{
    star.addEventListener('mouseover', rate_hover)
    star.addEventListener('click', rate)
})
const overlay = document.querySelectorAll('div.rating_overlay')
overlay.forEach(over =>{
    over.addEventListener('mouseout', out_rate)
})
const div = document.querySelectorAll("div.risultato")
div.forEach(div => {
    div.addEventListener('click', premuto)
})
var page = 1
var maxpage


function cerca(){
    let url = "json_liste.php?type=" + lista
    fetch(url).then((result)=>{
        return result.json();
    }).then((data)=>{
        const pages = document.querySelector('p.pages')
        maxpage = Math.ceil(data.length / 10)
        pages.textContent = page + "/" + maxpage

        if(maxpage > 1){
            const pre = document.querySelector('p.prev')
            const nex = document.querySelector('p.next')
            pre.addEventListener('click', prev)
            nex.addEventListener('click', next)
        }

        let n = 10;
        if(data.length < 10) n = data.length
        for(let i = 0; i < n; i++){
            div[i].querySelector('a').href = "result.php?film=" + data[i].IMDBid
            div[i].querySelector("img.ris_img").style.display = "block"
            if(data[i].poster === "N/A"){
                div[i].querySelector("img.ris_img").style.display = "none"
                div[i].querySelector('p').textContent = data[i].titolo
            }
            else{
                div[i].querySelector("img.ris_img").src = data[i].poster;
            }
            div[i].id = data[i].IMDBid
            div[i].style.display = "block"
            get_rate(div[i].querySelector('div.rating_overlay'))
        }
    })
}

function prev(){
    if(page > 1){
        page--
        for(let i = 0; i < div.length; i++){
            div[i].style.display = "none"
            div[i].querySelector("p").textContent = ""
        }
        cerca()
    }
}

function next(){
    if(page < maxpage){
        page++
        for(let i = 0; i < div.length; i++){
            div[i].style.display = "none"
            div[i].querySelector("p").textContent = ""
        }
        cerca()
    }
}

function premuto(event){
    console.log(event.currentTarget.id)
}

function get_rate(div){
    console.log("get")
    let url = 'json_result.php?id=' + div.parentNode.id
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
    let parent_d = parent.parentNode
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
    xmlhttp.open("GET", "visto.php?t=ratel&id=" + parent_d.id +  "&rating=" + rating , true);
    console.log("visto.php?t=ratel&id=" + parent.id +  "&rating=" + rating)
    xmlhttp.send();
    console.log('a')
}