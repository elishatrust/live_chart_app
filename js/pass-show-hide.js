const pwdField = document.querySelector(".form input[type='password']"),
toggleIcon = document.querySelector(".form .field i");

toggleIcon.onclick = ()=>{
    if(pwdField.type === "password")
    {
        pwdField.type = "text";
        toggleIcon.classList.add("active");
    }
    else
    {
        pwdField.type = "password";
        toggleIcon.classList.remove("active");
    }
}
