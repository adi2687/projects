const loginform = document.querySelector(".login-form form");
const errortxtlogin = document.querySelector(".error-txtlogin");

loginform.onsubmit = (event) => {
    event.preventDefault();

    const formData = new FormData(loginform);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = xhr.responseText;

                console.log(response);
                if (response.trim() === "User logged in successfully.") {
                    window.location.href = "feed";
                } else {
                    errortxtlogin.textContent = "Oops !!! " + response;
                }
            } else {
                alert("An error occurred during the request. Please try again.");
            }
        }
    };
    xhr.onerror = () => {
        alert("Request failed. Please check your network connection.");
    };
    xhr.send(formData);
};
