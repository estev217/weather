document.getElementById("bordeaux").addEventListener("click", bordeauxFunction);
document.getElementById("toulouse").addEventListener("click", toulouseFunction);

function bordeauxFunction() {
    document.getElementById("bortemp").className = "data active";
    document.getElementById("borwind").className = "data active";
    document.getElementById("toultemp").className = "data hidden";
    document.getElementById("toulwind").className = "data hidden";
}

function toulouseFunction() {
    document.getElementById("toultemp").className = "data active";
    document.getElementById("toulwind").className = "data active";
    document.getElementById("bortemp").className = "data hidden";
    document.getElementById("borwind").className = "data hidden";
}

