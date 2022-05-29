document.addEventListener("DOMContentLoaded", cerca())
const div = document.querySelectorAll("div.risultato")
div.forEach(div => {
    div.addEventListener('click', premuto)
})
var page = 1
var maxpage


function cerca(){
    let url = "json_liste.php?type=piace"
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
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200){
            window.location.href = "index.php"
        }
    }
    xmlhttp.open("GET", "aggiungi_fav.php?id=" + event.currentTarget.id);
    xmlhttp.send();
}