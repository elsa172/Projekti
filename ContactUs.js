const form = document.getElementById('contact-form');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const messageInput = document.getElementById('message');


form.addEventListener('submit', function(event) {
    event.preventDefault();


    if (nameInput.value.trim() === "") {
        alert("Please enter your name.");
        return;
    }

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (emailInput.value.trim() === "") {
        alert("Please enter your email address.");
        return;
    } else if (!emailPattern.test(emailInput.value.trim())) {
        alert("Please enter a valid email address.");
        return;
    }

    if (messageInput.value.trim() === "") {
        alert("Please enter your message.");
        return;
    }

    alert("Your message has been submitted!");
    form.reset(); 
});