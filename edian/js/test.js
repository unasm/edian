var test1;
test1 = new test(1);
function test(val) {
    //this.key = val;
    //var key2 = val;
    (function(v) {
        this.key = v;
        //这里的this指向的闭包本身
    })(val);
    this.value = function () {
        console.log(this.key);
    }

}
test1.value();
$(document).ready(function(){
    console.log(test1.key);
});
