function validation()
{

var name = document.forms["contact"]["name"].value;
    if (name == "") {
        alert("Enter Name !");
        return false;
    }

var email = document.forms["contact"]["email"].value;
    if (email == "") {
        alert("Enter email !");
        return false;
    }

var subject = document.forms["contact"]["subject"].value;
    if(subject==""){
	    alert("Enter Subject !")
	    return false;
    }

var message = document.forms["contact"]["message"].value;
    if (message == "") {
        alert("Enter Message !");
        return false;
    }

}