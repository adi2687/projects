const signupForm = document.querySelector(".signup-form form");
const errortxt=document.querySelector(".error-txt")
signupForm.onsubmit = (event) => {
    event.preventDefault(); // Prevent the default form submission behavior

    // Change background color to green
    // document.body.style.backgroundColor = "blue";
    
    // Gather form data
    const formData = new FormData(signupForm);
    // console.log("submit");

    // Create an XMLHttpRequest object
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = xhr.responseText;
                // Handle the response from the server
                console.log(response);
                if (response.trim() === "User registered successfully.") {
                    // Success logic here (e.g., redirect to a new page)
                    window.location.href = "feed"; // Redirect to a welcome page
                } else {
                    // Display error message
                    errortxt.textContent="Oops !!! "+response
                }
            } else {
                alert("An error occurred during the request. Please try again.");
            }
        }
    };
    
    // Handle network errors
    xhr.onerror = () => {
        alert("Request failed. Please check your network connection.");
    };
    
    // Send the form data
    xhr.send(formData);
};
