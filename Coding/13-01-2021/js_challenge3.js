//challenge 3
console.log("Challenge 3\n");

var bill = [124,48,68];
var tip = [];
var total = [];

function calculate(bill)
{
	for(var i=0;i<bill.length;i++)
	{
		if(bill[i] < 50)
		{
			tip[i] = Math.round(bill[i] * 0.2);
			total[i] = tip[i] + bill[i];
		}
		else if(bill[i] > 50 && bill[i] < 200)
		{
			tip[i] = Math.round(bill[i] * 0.15) ;
			total[i] = tip[i] + bill[i];
		}
		else
		{
			tip[i] = Math.round(bill[i] * 0.1) ;
			total[i] = tip[i] + bill[i];
		}
	}
}

calculate(bill);

console.log("Tips : " + tip);
console.log("Total bill : " + total );


