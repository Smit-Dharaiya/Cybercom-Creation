function formValidation()
{
var prefix = document.registration.prefix; 
var fname = document.registration.fname;
var lname = document.registration.lname;
var email = document.registration.email;
var phone = document.registration.phone;
var pass = document.registration.password;
var cpass = document.registration.cpassword;
var info = document.registration.info;
var check = document.registration.checkbox;

if(validatePrefix(prefix))
{
if(allLetter(fname))
{
if(allLetter(lname))
{
if(validateEmail(email))
{
if(validatePhone(phone))
{
if(validatePass(pass,7,12))
{
if(validateCpass(cpass,pass))
{
if(validateInfo(info))
{
if(validateCheckbox(check))
{
}	
}
} 
}
} 
}
}
}
}
return false;
}

function validatePrefix(prefix)
{
if(prefix.value == "")
{
alert("Select Valid Prefix");
prefix.focus();
return false;
}
return true;
}

function allLetter(name)
{ 
var letters = /^[A-Za-z]+$/;
// var letters = /^[a-zA-Z\s]+$/;
if(name.value.match(letters))
{
return true;
}
if(name.value == "")
{
alert("Enter name:");
name.focus();
return false;	
}
else
{
alert('name must have alphabet characters only');
return false;
}
}

function validateEmail(email)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(email.value.match(mailformat))
{
return true;
}
if(email.value == "")
{
alert("Enter Email !");
email.focus();
return false;
}
else
{
alert("You have entered an invalid email address!");
email.focus();
return false;
}
}

function validatePhone(phone)
{
var phone_len = phone.value.length;
if(phone_len != 10){
alert("Mobile number must be of 10 digit :");
phone.focus();
return false;
}
if(phone.value == "")
{
alert("Enter Mobile number : ");
phone.focus();
return false;	
}
else
{
return true;
}
}

function validatePass(passid,mx,my)
{
var passid_len = passid.value.length;
if (passid_len == 0 ||passid_len >= my || passid_len < mx)
{
alert("Password should not be empty / length be between "+mx+" to "+my);
passid.focus();
return false;
}
if(passid.value == "")
{
alert("Enter Password :");
return false;	
}
return true;
}

function validateCpass(cpass,pass)
{
if(cpass.value !== pass.value)
{
alert("Confirm Password doesn't match :");	
cpass.focus();
return false;
}
else
{
return true;	
}
}

function validateInfo(info)
{
if(info.value == "")
{
alert("Enter Information :");
info.focus();
return false;	
}
else
{
return true;	
}
}

function validateCheckbox(check)
{
if(check.checked == false)
{
alert("Accept terms & conditions");
check.focus();
return false;	
}
return true;	
}

