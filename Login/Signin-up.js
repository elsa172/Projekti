const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const sign_in_btn2 = document.querySelector("#sign-in-btn2");
const sign_up_btn2 = document.querySelector("#sign-up-btn2");
sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});
sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});
sign_up_btn2.addEventListener("click", () => {
    container.classList.add("sign-up-mode2");
});
sign_in_btn2.addEventListener("click", () => {
    container.classList.remove("sign-up-mode2");
});
document.getElementById('sign-up-form').addEventListener('submit', function(event) {
    let username = document.getElementById('username-signup').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password-signup').value;

    if (username === "" || email === "" || password === "") {
        alert("Please fill out all fields.");
        event.preventDefault();
    }

    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        event.preventDefault();
        return;
    }

   
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        event.preventDefault(); 
        return;
    }
})