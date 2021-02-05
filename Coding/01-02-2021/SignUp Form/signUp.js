function validation(){
    var fname = document.forms["user"]["fname"].value;
    if (fname == "") {
        alert("Enter First Name !");
        return false;
    }

    var lname = document.forms["user"]["lname"].value;
    if (lname == "") {
        alert("Enter Last Name !");
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

    var gender = document.forms["user"]["gender"].value;
    if (gender == "") {
        alert("Select Gender !");
        return false;
    }

    var country = document.forms["user"]["country"].value;
    if(country === "default") {
        alert("Enter valid Country");
        return false;
    }

    var email = document.forms["user"]["email"].value;
    if (email == "") {
        alert("Enter Email !");
        return false;
    }

    var phone = document.forms["user"]["phone"].value;
    if (phone == "") {
        alert("Enter Phone number !");
        return false;
    }

    var password = document.forms["user"]["password"].value;
    if (password == "") {
        alert("Enter Password !");
        return false;
    }

    var cpassword = document.forms["user"]["cpassword"].value;
    if (cpassword == "") {
        alert("Enter Confirmation Password !");
        return false;
    }    
    if (cpassword !== password) {
        alert("Password doesn't match !");
        return false;
    }
    
    var isChecked = document.getElementById('agree').checked;
    if(isChecked != true)
    {
        alert('You must agree to the terms first.');
        return false;
    }
}