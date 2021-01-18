//Challenge 4

console.log("Challenge 4\n");

var mark = 
{
	fullName : "Mark smith",
	mass:30,
	height:5.1,
	bmi: function() {
		return (this.mass / this.height * this.height) ;
	}
	   
};

var john = 
{
	fullName : "John smith",
	mass : 40,
	height : 5.9,
	bmi : function(){
		return (this.mass / this.height * this.height) ;
	}
};

var x = mark.bmi();
var y = john.bmi();

if(x>y)
  console.log("Mark's BMI is Highest.\n"  + mark.fullName + "'s BMI is " + x);
else if(x<y)
  console.log("John's BMI is Highest.\n" + john.fullName + "'s BMI is " + y);
else
  console.log("Both have same BMI\n" + "BMI is : " + x);


