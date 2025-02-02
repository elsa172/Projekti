document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".sign-in-form").addEventListener("submit", function (event) {
        let usernameOrEmail = document.querySelector("input[name='usernameOrEmail']").value.trim();
        let password = document.querySelector("input[name='password']").value.trim();
        let errorMessage = "";

        // Validimi për Username ose Email
        if (usernameOrEmail === "") {
            errorMessage = "Ju lutemi plotësoni fushën Username ose Email!";
        } else {
            let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(usernameOrEmail) && usernameOrEmail.includes("@")) {
                errorMessage = "Ju lutemi shkruani një email të vlefshëm!";
            }
        }

        // Validimi për fjalëkalimin
        if (password === "") {
            errorMessage = "Ju lutemi shkruani fjalëkalimin!";
        } else if (password.length < 6) {
            errorMessage = "Fjalëkalimi duhet të ketë të paktën 6 karaktere!";
        }

        // Nëse ka gabime, ndalo dërgimin e formularit dhe shfaq mesazhin e gabimit
        if (errorMessage !== "") {
            event.preventDefault();
            showErrorMessage(errorMessage);
        }
    });

    // Funksioni për të shfaqur mesazhin e gabimit
    function showErrorMessage(message) {
        let errorDiv = document.querySelector(".error-message");
        if (!errorDiv) {
            errorDiv = document.createElement("div");
            errorDiv.className = "error-message";
            document.querySelector(".sign-in-form").appendChild(errorDiv);
        }
        errorDiv.textContent = message;
    }
});
