if(localStorage.getItem('admin')){
    document.getElementById('register').disabled = true;
}

function login(){
    
    var x=document.getElementById("email").value;
    var y=document.getElementById("password").value;

    var data = JSON.parse(localStorage.getItem('admin'));

    if(x === data[0].email && y === data[0].password){
        window.location.href = "http://127.0.0.1:5500/user.html";
    }else{
        document.getElementById('errorDiv').style.display = 'block';
    }

}