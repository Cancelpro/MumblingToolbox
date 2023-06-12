function SignInForm(event){
    
    var elements = event.currentTarget;
    var userName = elements[0].value;
    var passWord = elements[1].value;
    
    
    var email_Regex = /^[a-zA-Z0-9-_]+@[a-zA-Z0-0-_]+.[a-zA-Z]+$/;
    var password_Regex = /[a-zA-Z].*/;
    var textNode;
    var nameError = document.getElementById("usernameError");
    var passError = document.getElementById("passwordError");
    nameError.innerHTML = "";
    passError.innerHTML = "";
    var valid = true;
    
    if (userName == null || userName == ""){
        textNode = document.createTextNode("Email is empty!");
        nameError.appendChild(textNode);
        valid = false;
    } else if (email_Regex.test(userName) == false){
        textNode = document.createTextNode("Email is in the wrong format!");
        nameError.appendChild(textNode);
        valid = false;
    }
    
    
    if (passWord == null || passWord == ""){
        textNode = document.createTextNode("Password is empty!");
        passError.appendChild(textNode);
        valid = false;
    }
    else if (password_Regex.test(passWord) == false){
        textNode = document.createTextNode("Password in wrong format!");
        passError.appendChild(textNode);
        valid = false;
    } 
    
    if (!valid){
        event.preventDefault();
    }
}

