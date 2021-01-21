var adminArray = [];

if(localStorage.getItem('admin')){
        adminArrayData = JSON.parse(localStorage.getItem('admin'));
    }
function registration()
{
var aname = document.getElementById('name').value;
var apass = document.getElementById('password').value;
var acpass = document.getElementById('password').value;
var acity = document.getElementById('city').value;
var astate = document.getElementById('state').value;
var aemail = document.getElementById('email').value;

var admin = {
 	name : aname,
 	email : aemail,
 	password : apass,
 	city : acity,
 	state : astate
};
console.log(admin);
if(localStorage.getItem('admin')){
	adminArray.push(admin);
	localStorage.setItem("admin",JSON.stringify(adminArray));
}

else
{
	adminArray.push(admin);
    localStorage.setItem("admin",JSON.stringify(adminArray));
}

}

/*function formValidation()
{
if(passid_validation(ucpass,7,12))
{
if(passid_validation(upass,7,12))
{
if(allLetter(uname))
{
if(cityselect(ucity))
{
if(stateselect(ustate))
{
if(ValidateEmail(uemail))
{
} 
}
} 
}
}
}
return false;
}
function passid_validation(passid,mx,my)
{
var passid_len = passid.value.length();
if (passid_len == 0 ||passid_len >= my || passid_len < mx)
{
alert("Password should not be empty / length be between "+mx+" to "+my);
passid.focus();
return false;
}
return true;
}

function allLetter(uname)
{ 
var letters = /^[A-Za-z]+$/;
if(uname.value.match(letters))
{
return true;
}
else
{
alert('Username must have alphabet characters only');
uname.focus();
return false;
}
}
function cityselect(ucity)
{
if(ucity.value == "Default")
{
alert('Select your city from the list');
ucity.focus();
return false;
}
else
{
return true;
}
}
function stateselect(ustate)
{
if(ustate.value == "Default")
{
alert('Select your state from the list');
ustate.focus();
return false;
}
else
{
return true;
}
}
function ValidateEmail(uemail)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(uemail.value.match(mailformat))
{
return true;
}
else
{
alert("You have entered an invalid email address!");
uemail.focus();
return false;
}
}*/

