var a="bob";
var people = {

    a: "kartik",
    b: function () {
        console.log(this);
        console.log(this.a);
        if (this.a == "kartik") {
            console.log("true");
        }
    },
    c: ()=>{
        console.log(this);
        console.log(this.a);
        if (this.a == "kartik") {
            console.log("true");
        }
    }
};
people.b()
people.c()
