var userArray = [];
userArray = JSON.parse(localStorage.getItem("userArray"));
console.log(userArray);

window.onload = () => {
    createTable("userTable");
}

function createTable(tableId) {
    console.log("table function");
    var table = document.getElementById(tableId);
    console.log(tableId)
    var id, name, email, dob;


    for (i in userArray) {
        row = table.insertRow(i);
        row.id = "data" + i;
        name = row.insertCell(0);
        email = row.insertCell(1);
        password = row.insertCell(2);
        dob = row.insertCell(3);
        age = row.insertCell(4);
        action = row.insertCell(5);

        name.innerHTML = userArray[i].name;
        email.innerHTML = userArray[i].email;
        password.innerHTML = userArray[i].password;
        dob.innerHTML = userArray[i].dob;
        age.innerHTML = 20 //Date.now().getFullYear() - userDetails[i].dob.getFullYear();
        action.innerHTML = '<button id="edit' + i + '" onclick="editUser(this.id)">Edit</button> <button  id="delete' + i + '" onclick="deleteUser(this.id)">Delete</button>';
    }
}


var userStorage = [];
var user = {};
if (localStorage.getItem('userArray')) {
    userStorage = JSON.parse(localStorage.getItem('userArray'))
}

function addUser() {
    var name = document.getElementById('name').value;
    var password = document.getElementById('password').value;
    var dob = document.getElementById('dob').value;
    var age = 25;
    var email = document.getElementById('email').value;

var user = {
    name : name,
    email : email,
    password : password,
    dob : dob,
    age : age
};

    if (localStorage.getItem('userArray')) {
        userStorage = JSON.parse(localStorage.getItem('userArray'));
        console.log(userArray);
        userStorage.push(user);
        localStorage.setItem("userArray", JSON.stringify(userStorage));
    }
    else {
        userStorage.push(user);
        localStorage.setItem("userArray", JSON.stringify(userStorage));
    }

}



