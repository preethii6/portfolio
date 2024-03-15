function abc(){
    let email = document.getElementById("email").value;
    let name = document.getElementById("name").value;
    let pho = document.getElementById("pho").value;
    
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    let regex = /^([a-z 0-9 \. _]+)@([a-z]+).([a-z]{2,6})(.[a-z]{2,6})?$/; 
   
 console.log(name);

    if(email=="" || name==""  ||  pho==""){
      alert("invalid");
    }
    else if(regex.test(email) && phoneno.test(pho)){
        return true;
    }
    else{
      alert("Invalid details");
    }
}