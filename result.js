document.addEventListener("DOMContentLoaded", risultato())
document.addEventListener("DOMContentLoaded", get_rating())
const stelle = document.querySelectorAll('span.stella')
stelle.forEach(star =>{
    star.addEventListener('mouseover', rate_hover)
    star.addEventListener('click', rate)
})
const div_rate = document.querySelector('div.rate')
div_rate.addEventListener('mouseout', out_rate)
var rating_f
const like = document.querySelector('div.button#like')
like.addEventListener('click', like_e)
const visto = document.querySelector('div.button#visto')
visto.addEventListener('click', visto_e)
const watchlist = document.querySelector('div.button#watchlist')
watchlist.addEventListener('click', watchlist_e)

function visto_e(event){
    let div = event.currentTarget
    const poster = document.querySelector("img.poster")
    const titolo = document.querySelector("span.titolo")
    const simbolo = div.querySelector("span.simbolo")
    const p = document.querySelector("p.titolo")
    var xmlhttp = new XMLHttpRequest();
    console.log(poster.src.toString())
    if(p.textContent !== ""){
        xmlhttp.open("GET", "visto.php?t=visto&id=" + film_id + "&poster=N/A&titolo=" + titolo.textContent.toString(), true);
        console.log("visto.php?t=visto&id=" + film_id + "&poster=N/A&titolo=" + titolo.textContent.toString())
    }
    else{
        xmlhttp.open("GET", "visto.php?t=visto&id=" + film_id + "&poster=" + poster.src +" &titolo=" + titolo.textContent.toString(), true);
    }
    xmlhttp.send();
    console.log(simbolo.innerHTML);
    if(parseInt(v) === 1){
        simbolo.innerHTML = '&#9734;'
        console.log('B')
        v = 0;
    }
    else{
        simbolo.innerHTML = '&#9733;'
        console.log('A')
        v = 1;
    }
    console.log('a')
    console.log(poster.src.toString())
    console.log(poster.src)
}

function watchlist_e(event){
    let div = event.currentTarget
    const poster = document.querySelector("img.poster")
    const titolo = document.querySelector("span.titolo")
    const simbolo = div.querySelector("span.simbolo")
    const p = document.querySelector("p.titolo")
    var xmlhttp = new XMLHttpRequest();
    if(p.textContent !== ""){
        xmlhttp.open("GET", "visto.php?t=watchlist&id=" + film_id + "&poster=N/A&titolo=" + titolo.textContent.toString(), true);
        console.log("visto.php?t=visto&id=" + film_id + "&poster=N/A&titolo=" + titolo.textContent.toString())
    }
    else{
        xmlhttp.open("GET", "visto.php?t=watchlist&id=" + film_id + "&poster=" + poster.src +" &titolo=" + titolo.textContent.toString(), true);
    }
    xmlhttp.send();
    if(parseInt(w) === 1){
        simbolo.innerHTML = '&#9746;'
        console.log('B')
        w = 0;
    }
    else{
        simbolo.innerHTML = '&#9745;'
        console.log('A')
        w = 1;
    }
    console.log('a')
    console.log(poster.src.toString())
    console.log(poster.src)
}

function like_e(event){
    let div = event.currentTarget
    const poster = document.querySelector("img.poster")
    const titolo = document.querySelector("span.titolo")
    const simbolo = div.querySelector("span.simbolo")
    const p = document.querySelector("p.titolo")
    var xmlhttp = new XMLHttpRequest();
    if(p.textContent !== ""){
        xmlhttp.open("GET", "visto.php?t=like&id=" + film_id + "&poster=N/A&titolo=" + titolo.textContent.toString(), true);
        console.log("visto.php?t=visto&id=" + film_id + "&poster=N/A&titolo=" + titolo.textContent.toString())
    }
    else{
        xmlhttp.open("GET", "visto.php?t=like&id=" + film_id + "&poster=" + poster.src +" &titolo=" + titolo.textContent.toString(), true);
    }
    xmlhttp.send();
    if(parseInt(l) === 1){
        simbolo.innerHTML = '&#9825;'
        console.log('B')
        l = 0;
    }
    else{
        simbolo.innerHTML = '&#9829;'
        console.log('A')
        l = 1;
    }
    console.log(poster.src.toString())
    console.log(poster.src)
}

function risultato(){
    console.log(film_id)

    let rest_url = 'api_movie.php?t=risultato&search=' + film_id
    fetch(rest_url).then((result)=>{
        return result.json();
    }).then((data)=>{
        const titolo = document.querySelector("span.titolo")
        const anno = document.querySelector("span.anno")
        const regista = document.querySelector("span.regista")
        const durata = document.querySelector("span.durata")
        const plot = document.querySelector("span.plot")
        const rotten = document.querySelector("span.rotten")
        const imdb = document.querySelector("span.imdb")
        const meta = document.querySelector("span.meta")
        const poster = document.querySelector("img.poster")

        titolo.textContent = data.Title
        anno.textContent = data.Year
        regista.textContent = "Regista: " + data.Director
        durata.textContent = "Durata: " + data.Runtime
        plot.textContent = data.Plot
        if(data.Ratings[1] !== undefined){
            rotten.textContent = "Rotten Tomatoes: " + data.Ratings[1].Value
        }
        else{
            rotten.textContent = "Rotten Tomatoes: N/A"
        }

        meta.textContent = "Metacritic: " +  data.Metascore
        imdb.textContent = "IMDB: " + data.imdbRating
        if(data.Poster === "N/A"){
            poster.style.display = "none"
            poster.src = data.Poster
            console.log(poster.src)
            console.log(poster.src.textContent)
            const p = document.querySelector("p.titolo")
            p.textContent = data.Title
        }
        else{
            poster.src = data.Poster
        }
    })
}

function get_rating(){
    let rest_url = 'json_result.php?id=' + film_id
    console.log(rest_url)
    fetch(rest_url).then((result)=>{
        return result.json();
    }).then((data)=>{
        const stelle = document.querySelectorAll("span.stella")
        console.log(data.rating)
        rating_f = data.rating
        for(let i = 0; i < data.rating; i++){
            if(stelle[i].id <= data.rating){
                stelle[i].innerHTML = '&#9733;'
                console.log('s')
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
    for(let i = 0; i < rating_f; i++){
        stelle[i].innerHTML = '&#9733;'
    }
    console.log("out");
}

function rate(event){
    let rating = event.currentTarget.id
    const poster = document.querySelector("img.poster")
    const titolo = document.querySelector("span.titolo")
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "visto.php?t=rate&id=" + film_id + "&poster=" + poster.src.toString() + "&titolo=" + titolo.textContent.toString() + "&rating=" + rating , true);
    xmlhttp.send();
    console.log('a')
    console.log(poster.src.toString())
    console.log(poster.src)
    rating_f = rating
}