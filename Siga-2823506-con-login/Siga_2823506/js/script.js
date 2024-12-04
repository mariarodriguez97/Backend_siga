const cloud = document.getElementById("cloud")
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");

cloud.addEventListener("click",()=>{
    barraLateral.classList.toggle("mini-barra-lateral")
    
    spans.forEach((span)=>{
        span.classList.toggle("oculto");
    })
})