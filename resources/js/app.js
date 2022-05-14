require('./bootstrap');

function loadHistories() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        console.log("Success");
       document.getElementById("histories_table").getElementsByTagName("tbody")[0].innerHTML = this.responseText;
       setTimeout(loadHistories, 5000);
    }
    xhttp.open("GET", url + "getHistories", true);
    xhttp.send();
}

function convertDate(d) {
    var p = d.split("/");
    return +(p[2]+p[1]+p[0]);
}

let asc = true;
function sortCol() {
    var tbody = document.querySelector("#histories_table tbody");
    var rows = [].slice.call(tbody.querySelectorAll("tr"));

    rows.sort(function(a,b) {
        return asc ? new Date(b.cells[1].getAttribute("sort-val")) - new Date(a.cells[1].getAttribute("sort-val")) :
            new Date(a.cells[1].getAttribute("sort-val")) - new Date(b.cells[1].getAttribute("sort-val"));
    });

    rows.forEach(function(v) {
        tbody.appendChild(v); // note that .appendChild() *moves* elements
    });
    asc = !asc;
}

window.loadHistories = loadHistories;
window.sortCol = sortCol;

