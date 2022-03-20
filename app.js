function disappear(){
    document.getElementById('boom').remove();
};


let username = document.getElementById('username');
let password = document.getElementById('password');

username.addEventListener('keyup', () => {
    // console.log(username.value);
    // console.log(password.value);
    if(username.value && password.value !== ""){
        document.getElementById('submitButton').disabled = false;
    } else {
        document.getElementById('submitButton').disabled = true;  
    }
})

password.addEventListener('keyup', () => {
    if(username.value && password.value !== ""){
        document.getElementById('submitButton').disabled = false;
    } else {
        document.getElementById('submitButton').disabled = true; 
    }
})