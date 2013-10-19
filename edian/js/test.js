function test() {
    this.value = function (){
	    this.key = 0;
        console.log("11");
    }
    //this.key = 100;
    //return 1111;
}
var test1 = new test();
$(document).ready(function(){
    console.log(test1.key);
    console.log(test1.value());
});
