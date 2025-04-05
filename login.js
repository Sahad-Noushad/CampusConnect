function toggle(){
    var x=document.getElementById("Password");
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