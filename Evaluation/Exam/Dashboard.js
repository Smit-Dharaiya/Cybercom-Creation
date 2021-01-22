var userArray = [];
userArray = JSON.parse(localStorage.getItem("userArray"));

function acknowledgeUser() {
    document.getElementById('ack').innerHTML = 'Hello, ' + JSON.parse(sessionStorage.getItem('activeUsers'))[0].name;
}



function birthdateFormat(date) {
    var birthdate = new Date(date);
    return birthdate.getDate() + '/' + birthdate.getMonth();
}


function checkBirthday(dob) {
    var bday = birthdateFormat(dob);
    var d = new Date;
    var today = d.getDate() + '/' + d.getMonth();
    if (today == bday) {
        return true;
    }
    else false;
}


function birthdayList(id) {
    var str = "";
    for (i in userArray) {
        if (checkBirthday(userArray[i].dob)) {
            str += '<p> Today is ' + userArray[i].name + '\'s birthday.</p>';
        }
    }
    document.getElementById('bday').innerHTML = str;
}

function countByAgeGroup() {
    var low, high, mid;
    low = 0;
    high = 0;
    mid = 0;

    for (i in userArray) {
        if (userArray[i].age < 18) {
            low++;
        } else if (userArray[i].age > 50) {
            high++;
        } else {
            mid++;
        }
    }
    document.getElementById('lowCount').innerHTML = low + ' Users';
    document.getElementById('midCount').innerHTML = mid + ' Users';
    document.getElementById('highCount').innerHTML = high + ' Users';
}