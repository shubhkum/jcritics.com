var Mark={
	fullname:'Mark Ronson',
	mass: 28,
	height: 4,
	calcBMI: function(){
        
		this.BMI=(this.mass)/(this.height*this.height);
		return this.BMI;
	}
}

var John={
	fullname:'John Walker',
	mass: 25,
	height: 3,
	calcBMI: function(){
        
		this.BMI=(this.mass)/(this.height*this.height);
		return this.BMI;
	}
}
console.log('Marks BMI is '+ Mark.calcBMI()+ 'and johns BMI is '+John.calcBMI());