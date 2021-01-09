// js coding challenge 2
var team_j = [89,120,103];
var team_m = [116,94,123];

function avg(arr){
    var sum = 0;
    for (var i=0 ; i<arr.length ; i++)
    {
        sum = sum + arr[i];
    }
    return sum / arr.length;
}

avg_j = avg(team_j);
avg_m = avg(team_m);

if(avg_j > avg_m){
     console.log("John wins");
     console.log("John's team avg. score is : " + avg_j);

}
else if(avg_j == avg_m){
    console.log("Match is draw");
}
else{
    console.log("Mike wins");
    console.log("Mike's team avg. score is : " + avg_m);

}

var team_m =[97,134,105];
var avg_m = avg(team_m);

console.log("Marry's team avg. score is : "+avg_m)

if((avg_j > avg_m) && (avg_j > avg_m)){
    console.log("John is the winner");
}else if((avg_m > avg_j) && (avg_m > avg_m)){
    console.log("Mike is the winner");
}else if( (avg_m > avg_j) && (avg_m > avg_m)){
    console.log("Marry is the winner");
}
else{
    console.log("Match is the draw")
}
