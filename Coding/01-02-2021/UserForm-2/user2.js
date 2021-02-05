function validation(){
    var name = document.forms["user"]["name"].value;
    if (name == "") {
        alert("Enter Name !");
        return false;
    }

    var password = document.forms["user"]["password"].value;
    if (password == "") {
        alert("Enter Password !");
        return false;
    }

    var gender = document.forms["user"]["gender"].value;
    if (gender == "") {
        alert("Select Gender !");
        return false;
    }

    var address = document.forms["user"]["address"].value;
    if (address == "") {
        alert("Enter Address !");
        return false;
    }

    var day = document.forms["user"]["day"].value;
    if (day === "default") {
        alert("Select Valid Day");
        return false;
    }

    var month = document.forms["user"]["month"].value;
    if (month === "default") {
        alert("Select Valid Month");
        return false;
    }
 
    var year = document.forms["user"]["year"].value;
    if (year === "default") {
        alert("Select Valid Year");
        return false;
    }

    var checked = 0;
    var game = document.forms["user"]["game[]"];
    for (var i = 0; i < game.length; i++) {
            if (game[i].checked) {
                checked++;
            }
        }
    if(checked == 0){
        alert("Select game !")
        checked =0;
        return false;
    }

    var marital = document.forms["user"]["marital"].value;
    if (marital == "") {
        alert("Select Marital Status !");
        return false;
    }

    var isChecked = document.getElementById('agree').checked;
    if(isChecked != true)
    {
        alert('You must agree to the terms first.');
        return false;
    }
}