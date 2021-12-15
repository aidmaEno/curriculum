let numbers = [2, 5, 12, 13, 15, 18, 22];

function isEven() {
    for (let i = 0; i < numbers.length; i++){
        if (numbers[i] % 2 === 0) {
            console.log(numbers[i] + 'は偶数です');
        }
    }
}
isEven();

class Car {
    constructor(gass,num) {
        this.gass = gass;
        this.num = num;
    }
    getNumGas() {
        console.log(`ガソリンは${this.gass}です。ナンバーは${this.num}です。`);
    }
}

let porsche = new Car(20 , 2222);
let ferrari = new Car(25 , 5555);

porsche.getNumGas();
ferrari.getNumGas();