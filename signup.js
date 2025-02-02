document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".sign-up-form").addEventListener("submit", function (event) {
        let username = document.querySelector("input[name='username']").value.trim();
        let email = document.querySelector("input[name='email']").value.trim();
        let password = document.querySelector("input[name='password']").value.trim();
        let errorMessage = "";

        if (username === "") {
            errorMessage = "Ju lutemi shkruani një username!";
        } else if (username.length < 3) {
            errorMessage = "Username duhet të ketë të paktën 3 karaktere!";
        }

        let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (email === "") {
            errorMessage = "Ju lutemi shkruani emailin!";
        } else if (!emailPattern.test(email)) {
            errorMessage = "Ju lutemi shkruani një email të vlefshëm!";
        }

       
        if (password === "") {
            errorMessage = "Ju lutemi shkruani fjalëkalimin!";
        } else if (password.length < 6) {
            errorMessage = "Fjalëkalimi duhet të ketë të paktën 6 karaktere!";
        }

        if (errorMessage !== "") {
            event.preventDefault();
            showErrorMessage(errorMessage);
        }
    });

    function showErrorMessage(message) {
        let errorDiv = document.querySelector(".error-message");
        if (!errorDiv) {
            errorDiv = document.createElement("div");
            errorDiv.className = "error-message";
            document.querySelector(".sign-up-form").appendChild(errorDiv);
        }
        errorDiv.textContent = message;
    }
});
