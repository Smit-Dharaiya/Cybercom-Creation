// js coding challenge 1
function bmi(mass, height){
    return mass / (height * height);
}

var mark_mass = 30;
var mark_ht = 5.1;
var john_mass = 40;
var john_ht = 5.9;

var mark_bmi = bmi(mark_mass,mark_ht);
console.log("mark's :");
console.log("mass: " + mark_mass + "kg");
console.log("height: " + mark_ht + "m");
console.log("bmi: " + mark_bmi);

var john_bmi = bmi(john_mass,john_ht);
console.log("john's :");
console.log("mass: " + john_mass + "kg");
console.log("height: " + john_ht + "m");
console.log("bmi: " + john_bmi);


var cmpr = mark_bmi > john_bmi;
if(cmpr == true)
 console.log("Is mark's bmi higher than jhon's ? " + cmpr);