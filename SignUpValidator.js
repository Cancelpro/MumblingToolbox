function SignUpForm(event){
    
    var elements = event.currentTarget;
    var username = elements[0];
    var email = elements[1];
    var birthday = elements[2];
    var password = elements[4];
    var confirmPassword = elements[5];
    
    var usernameError = document.getElementById("usernameError");
    var emailError = document.getElementById("emailError");
    var bdayError = document.getElementById("bdayError");
    var passwordError = document.getElementById("passwordError");
    var confirmPasswordError = document.getElementById("cPasswordError");

    var valid = true;
    
    var username_Regex = /[a-zA-Z]+/;
    var email_Regex = /^[a-zA-Z0-9-_]+@[a-zA-Z0-0-_]+.[a-zA-Z]+$/;
    var bday_Regex = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;
    var password_Regex = /[a-zA-Z]+/;
    
    if(username.value == null || username.value == ""){
        usernameError.innerHTML = "Username is empty!";
        valid = false;
    }
    else if (!username_Regex.test(username.value)){
        usernameError.innerHTML = "Username is in wrong format!";
        valid = false;
    }
    
    if(email.value == null || email.value == ""){
        emailError.innerHTML = "email is empty!";
        valid = false;
    } else if (!email_Regex.test(email.value)){
        emailError.innerHTML = "Email is in wrong format!";
        valid = false;
    }

    if(birthday.value == null || birthday.value == ""){
        bdayError.innerHTML = "Birthday is empty!";
        valid = false;
    } else if(bday_Regex.test(birthday.value) == false){
        bdayError.innerHTML = "Birthday is in wrong format!";
        valid = false;
    }
    
    
    if(password.value == null || password.value == ""){
        passwordError.innerHTML = "password is empty!";
        valid = false;
    } else if(password_Regex.test(password) == false){
        passwordError.innerHTML = "password is in wrong format!";
        alert(password_Regex.test(password));
        valid = false;
    }
    
    if(confirmPassword.value != password.value){
        valid = false;
        confirmPasswordError.innerHTML = "Passwords don't match!";
    }
    //alert(confirmPassword.value + password.value);
    
    if (!valid){
        event.preventDefault();
    }
}