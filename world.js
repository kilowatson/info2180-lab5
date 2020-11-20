

window.onload = function () {
    var xhttp = new XMLHttpRequest();

    document.getElementById("lookup").addEventListener("click", () => {
        xhttp.open("GET", "http://localhost/info2180-lab5/world.php?country=" + document.getElementById("country").value, true);
        xhttp.send();
        console.log("I sent it");

    });
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result").innerHTML =
                this.responseText;
            console.log("I received it");
        }
    }
}