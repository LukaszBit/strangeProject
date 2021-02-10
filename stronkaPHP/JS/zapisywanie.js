function dodajZamowienie() {
    var zam = {};
    zam.imie = document.getElementById('imie').value;
    zam.nazwisko = document.getElementById('nazwisko').value;
    zam.ulica = document.getElementById('ulica').value;
    zam.numer = document.getElementById('numer').value;
    zam.kod = document.getElementById('kod').value;
    zam.miasto = document.getElementById('miasto').value;
    zam.telefon = document.getElementById('telefon').value;
    zam.email = document.getElementById('email').value;
    var lista = JSON.parse(localStorage.getItem('lista'));
    if (lista === null)
        lista = [];
    lista.push(zam);
    localStorage.setItem('lista', JSON.stringify(lista));
}

function wyswietlZamowienia() {
    var lista = JSON.parse(localStorage.getItem('lista'));
    var el = document.getElementById('list');
    var str = "<h2>Lista zamówień:</h2>";
    if (lista === null)
        el.innerHTML = str + "<p>Pusta lista zamówień</p>";
    else {
        for (i = 0; i < lista.length; i++)
        {
            str += "<button class='usun' onclick='usunZamowienie(" + i + ")' > X </button>";
            str += " " + lista[i].imie + " " + lista[i].nazwisko + " " + lista[i].ulica + " " + lista[i].numer + " " +
                    lista[i].kod + " " + lista[i].miasto + " " + lista[i].telefon + " " + lista[i].email + " " + lista[i].ksiazka +
                    " " + lista[i].kursonline + " " + lista[i].slowka + "<br />";
        }
        el.innerHTML = str;
    }
}

function usunListe() {
    localStorage.removeItem('lista');
    pokazListe();
}

function usunZamowienie(i) {
    var lista = JSON.parse(localStorage.getItem('lista'));
    if (confirm("Usunąć zadanie?"))
        lista.splice(i, 1);
    localStorage.setItem('lista', JSON.stringify(lista));
    pokazListe();
}
