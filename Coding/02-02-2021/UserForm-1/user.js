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

    var address = document.forms["user"]["address"].value;
    if (address == "") {
        alert("Enter Address !");
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

    var gender = document.forms["user"]["gender"].value;
    if (gender == "") {
        alert("Select Gender !");
        return false;
    }

    var age = document.forms["user"]["age"].value;
    if (age === "select") {
        alert("Select Valid Age !");
        return false;
    }

    var image = document.forms["user"]["image"].value;
    if (image == "") {
        alert("Choose Image !");
        return false;
    }

}

function viewPage(){
    window.location.href = 'userView.php';
}