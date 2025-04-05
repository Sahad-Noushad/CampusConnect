function toggle(){
    var x=document.getElementById("password");
    var y=document.getElementById("togglePass");
    if(x.type==="password"){
        x.type="text";
        y.className="far fa-eye";
    }
    else{
        x.type="password";
        y.className="far fa-eye-slash";
    }
}

function validatepass(){
    var pass=document.getElementById("password");
    var cpass=document.getElementById("cpassword");
    if(pass.value!=cpass.value){
        cpass.setCustomValidity("password not matching");
    }
    else{
        cpass.setCustomValidity('');
    }
}


