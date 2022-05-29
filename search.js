var page = 1;
var maxpage;

document.addEventListener("DOMContentLoaded", cerca())
const div = document.querySelectorAll("a.risultato")
div.forEach(div => {
    div.addEventListener('click', premuto)
})


function cerca(){
    if(search === '' || search.length < 3){
        const err = document.querySelector('h1#errore')
        err.textContent = 'Inserisci 3 o più caratteri'
        err.style.display = "block"
    }
    else{
        let rest_url = 'api_movie.php?t=cerca&search=' + search + '&p=' + page
        fetch(rest_url).then((result)=>{
            return result.json();
        }).then((data)=>{
            if(data.Response === 'False'){
                const error = document.querySelector('h1#errore')
                error.textContent = data.Error
                error.style.display = "block"
            }
            else{
                console.log(data.totalResults)
                console.log(Math.ceil(data.totalResults / 10))
                const pages = document.querySelector('p.pages')
                maxpage = Math.ceil(data.totalResults / 10)
                pages.textContent = page + "/" + maxpage
                if(maxpage > 1){
                    const pre = document.querySelector('p.prev')
                    const nex = document.querySelector('p.next')
                    pre.addEventListener('click', prev)
                    nex.addEventListener('click', next)
                }

                let n = 10;
                if(data.totalResults < 10) n = data.totalResults

                for(let i = 0; i < n; i++){
                    if(data.Search[i].Poster === "N/A"){
                        let id = data.Search[i].imdbID
                        div[i].href = "result.php?film=" + id
                        div[i].querySelector("p").textContent = data.Search[i].Title
                        div[i].id = data.Search[i].imdbID
                        div[i].querySelector("img.ris_img").style.display = "none"
                        div[i].style.display = "block"
                    }
                    else{
                        let id = data.Search[i].imdbID
                        div[i].href = "result.php?film=" + id
                        div[i].querySelector("img.ris_img").style.display = "block"
                        div[i].querySelector("img.ris_img").src = data.Search[i].Poster
                        div[i].id = data.Search[i].imdbID
                        div[i].style.display = "block"
                    }
                }
            }
        })
    }
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