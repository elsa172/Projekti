document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("reviewForm").addEventListener("submit", function (event) {
        event.preventDefault();

        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const review = document.getElementById("review").value;

        if (name.trim() === "" || email.trim() === "" || review.trim() === "") {
            alert("Please fill in all required fields!");
            return;
        }

      
        const newReview = document.createElement("div");
        newReview.classList.add("card");
        newReview.innerHTML = `
            <img src="default-user.jpg" alt="User">
            <div class="card-content">
                <span><i class="ri-double-quotes-l"></i></span>
                <div class="card-details">
                    <p>${review}</p>
                    <h4>${name}</h4>
                </div>
            </div>
        `;

         document.querySelector(".container-djathtas").appendChild(newReview);

        document.getElementById("reviewForm").reset();
    });
});
