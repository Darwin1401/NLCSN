var loader = document.getElementById("preloader");

window.addEventListener("load", function(){
    loader.style.display = "none";
});

window.addEventListener('scroll', function(){
    const header = document.querySelector('header');
    header.classList.toggle("sticky", window.scrollY >0);
});

function toggleMenu(){
    const menuToggle = document.querySelector('.menuToggle');
    const navigation = document.querySelector('.navigation');
    menuToggle.classList.toggle('active');
    navigation.classList.toggle('active');
}

const icon = document.querySelector('.icon');
const search = document.querySelector('.search');
icon.onclick = function(){
    search.classList.toggle('active');
}

const searchInput = document.querySelector("[data-search]")
searchInput.addEventListener("keyup", (e) => {
    if(e.keyCode === 13 && e.target.value != ""){
        if(location.pathname == "index.php"){
            location.replace("search.php");
        }
    }
})

const search_func = () =>{
    const searchbox = document.getElementById("mysearch").value.toUpperCase();
    const pdfitems = document.getElementById("pdf_list")
    const pdf = document.querySelectorAll(".pdf")
    const pdfname = pdfitems.getElementsByTagName("h3")

    for(var i = 0; i < pdfname.length; i++){
        let match = pdf[i].getElementsByTagName('h3')[0];

        if(match){
            let textvalue = match.textContent || match.innerHTML

            if(textvalue.toUpperCase().indexOf(searchbox) > -1){
                pdf[i].style.display = "";
            }
            else{
                pdf[i].style.display = "none";
            }
        }
    }
}