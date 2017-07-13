
var rno = 0;
var numb = 0;
//function radGenerator(){
//    rno = Math.floor( Math.random() * 10)
//    document.getElementById("rno").innerHTML = rno ;
//    if(numb == rno){
//        document.getElementById("result").innerHTML = "<p class='w3-text-green'>Yellow mellow wiiiiin </p>";
//    } else {
//        document.getElementById("result").innerHTML = "<p class='w3-text-red'> Loooose!!! </p>";
//    }
//}

(function selectNum() {

  //  var res = ["u1", "u2", "u3"];
    var obj = document.getElementById("pno");
    document.getElementById("u11").innerHTML = obj.options[obj.selectedIndex].text;
    numb = parseInt(obj.options.options[obj.selectedIndex].text);

})();

