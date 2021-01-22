if(localStorage.getItem('admin')){
	alert("Admin is already there so you can not register");
    document.getElementById('register').disabled = true;
}

 function changeform()
 {
   window.location="Registration.html";
 }

var activeUsers = [];
  function login(){
    
    var x=document.getElementById("email").value;
    var y=document.getElementById("password").value;

    var data = JSON.parse(localStorage.getItem('admin'));
    var data2 = JSON.parse(localStorage.getItem('userArray'));
    if(x === data[0].email && y === data[0].password){
        window.location="Dashboard.html";
    }
    else if(x =='' || y =='')
    {
      alert("Enter Details");
    }
    else
    {
            for (i in data2)
            {
            if ((x == data2[i].email)) {
                userExists = true;
                if (y == data2[i].password) {

                    var activeUser = {};

                    activeUser = data2[i];
                    activeUser.loginTime = currentTime();

                    if (sessionStorage.getItem('activeUsers')) {
                        activeUsers = JSON.parse(sessionStorage.getItem('activeUsers'));
                        activeUsers.push(activeUser);
                        sessionStorage.setItem('activeUsers', JSON.stringify(activeUsers));
                    }
                    else {
                        activeUsers.push(activeUser);
                        sessionStorage.setItem('activeUsers', JSON.stringify(activeUsers));
                    }

                    window.location="Sub-user.html";
                    break;
                }
                else alert("invalid password !!");
            } else {
                userExists = false;
            }
        }

        if (userExists == false) {
            alert("user does noe exists");
        }	  
    }
}
function currentTime() {
    var today = new Date();
    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    return date + ' ' + time;
}
