var userArray = [];
userArray = JSON.parse(localStorage.getItem("userArray"));
console.log(userArray);

window.onload = () => {
    createTable("userTable");
    document.getElementById('update-user').style.visibility = "hidden";
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

        name.innerHTML = userArray[i].name + " ";
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
        alert("User Added : Refresh the page to see");
    }
    else {
        userStorage.push(user);
        localStorage.setItem("userArray", JSON.stringify(userStorage));
        alert("User Added : Refresh the page to see");   
    }

}

function deleteUser(id)
{   
    var no = document.getElementById(id).parentElement.parentNode.rowIndex;
    document.getElementById("userTable").deleteRow(no - 1);
    userArray.splice(no - 1, 1);
    localStorage.setItem('userArray', JSON.stringify(userArray));

}

function editUser(id) {
    //document.getElementById('add-user').id = 'update-user';
    document.getElementById('update-user').style.visibility = "visible";
    document.getElementById('add-user').style.visibility = "hidden";
    var no = document.getElementById(id).parentElement.parentNode.rowIndex;

    document.getElementById('name').value = userArray[no - 1].name;
    document.getElementById('email').value = userArray[no - 1].email;
    document.getElementById('password').value = userArray[no - 1].password;
    document.getElementById('dob').value = userArray[no - 1].dob;

    document.getElementById('update-user').onclick = () => {
        userArray[no - 1].name = document.getElementById('name').value;
        userArray[no - 1].email = document.getElementById('email').value;
        userArray[no - 1].password = document.getElementById('password').value;
        userArray[no - 1].dob = document.getElementById('dob').value;
        localStorage.setItem('userArray', JSON.stringify(userArray));
        alert("Successfully Updated reload the page");
    }
}




