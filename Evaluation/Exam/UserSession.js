
window.onload = () => {
        generateLoginSessionTable("UsersSessionTable");
    }

    var userSessions = [];
if (localStorage.getItem("userSessions")) {
    userSessions = JSON.parse(localStorage.getItem("userSessions"));
    console.log(userSessions);
}
function generateLoginSessionTable(tableId) {
    var table, name, loginTime, logoutTime;
    table = document.getElementById(tableId);
    for (i in userSessions) {
        row = table.insertRow(i);
        row.id = "data" + i;
        name = row.insertCell(0);
        loginTime = row.insertCell(1);
        logoutTime = row.insertCell(2);

        name.innerHTML = userSessions[i].name;
        loginTime.innerHTML = userSessions[i].loginTime;
        logoutTime.innerHTML = userSessions[i].logoutTime;
    }
}