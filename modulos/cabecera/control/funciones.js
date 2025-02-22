function difumina(cabecera){
    console.log("Has entrado")                                      //Cuando entro
    document.querySelector("main").classList.add("difuminado")      //Le añado una clase css
    document.querySelector("header").classList.add("grande")
    cabecera.style.background = "rgba(255,255,255,0.9)"             //Le pongo transparencia al fondo
}