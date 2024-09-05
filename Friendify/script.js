document.addEventListener("DOMContentLoaded", () => {
    // Image Slider
    let laptopImage = document.querySelector(".laptop .images .imagechange");
    let images = ["images/imageone.png", "images/imagetwo.png", "images/imagethree.png"];
    let currentIndex = 0;
    laptopImage.style.borderRadius = "5px";

    setInterval(() => {
        laptopImage.src = images[currentIndex];
        laptopImage.classList.toggle("animation");
        currentIndex = (currentIndex + 1) % images.length;
    }, 2000);

    // Toggle Password Visibility for Login
    let eye = document.getElementById("togglePassword");
    let password = document.querySelector(".login-form input[type='password']");
    eye.addEventListener("click", () => {
        if (password.type === "password") {
            password.type = "text";
            eye.classList.add("show");
        } else {
            password.type = "password";
            eye.classList.remove("show");
        }
    });

    // Toggle Password Visibility for Signup
    let eyeinfo = document.getElementById("togglePasswordinfo");
    let passwordSignup = document.querySelector(".signup-form input[type='password']");
    eyeinfo.addEventListener("click", () => {
        if (passwordSignup.type === "password") {
            passwordSignup.type = "text";
        } else {
            passwordSignup.type = "password";
        }
    });

    // Signup Animation
    const signupmain = document.getElementById("signup");
    const signinButton = signupmain.querySelector(".signinbutton");
    const cover = document.querySelector(".container .cover");
    const button = document.querySelector(".container .cover button");
    const main = document.querySelector(".container .cover h1");
    const main1 = document.querySelector(".container .cover p");
    const main3 = document.getElementById("signup");
    const main4 = main3.querySelector("p");
    const signupButton = document.querySelector(".signupbutton");
    const signupText = document.getElementById("signuptext")
    signinButton.addEventListener("click", () => {
        cover.classList.add("info");
        // setTimeout(() => {
        button.textContent = "Continue to Connect";
        main.textContent = "Connect with your friends and explore ";
        main1.textContent = "Login to explore in the site";
        main4.textContent = "Have an account? Login to continue....";
        // }, 200);
        signupButton.style.display = "block";
        signinButton.style.display = "none";
        // cover.classList.remove("info1");
        // console.log("this clicke one")
        cover.classList.remove("info1");

    });

    signupButton.addEventListener("click", () => {
        console.log("this clciked ")
        button.textContent = "Connect with friends";
        main.textContent = "We haven't met before right?";
        main1.textContent = "Register with your personal details to use all of the site features    ";
        main4.textContent = "Don't have an account?";

        cover.classList.add("info1");
        signupButton.style.display = "none";
        signinButton.style.display = "block";
        cover.classList.remove("info");

    });

    const signupinfo = document.querySelector(".signupinfo");

    // Initial check
    if (window.innerWidth <= 700) {
        signupinfo.style.display = "block";
        signupText.style.display = "block"
    }

    // Toggle between Signup and Login forms
    const signupbutton = document.querySelector(".signupinfo span");
    const signupForm = document.querySelector(".signup-form");
    const signinForm = document.querySelector(".login-form");
    const login = document.getElementById("signuptext");

    signupbutton.addEventListener("click", () => {
        signupForm.style.display = "block";
        signinForm.style.display = "none";
        // document.body.style.backgroundColor="red"
        signupForm.classList.add("top")
    });

    login.addEventListener("click", () => {
        signupForm.style.display = "none";
        signinForm.style.display = "block";
    });

    // Handle window resizing
    window.addEventListener('resize', () => {
        if (window.innerWidth <= 700) {
            signupinfo.style.display = "block";
            signupText.style.display = "block"
        } else {
            signupinfo.style.display = "none";
            signupText.style.display = "none"
        }
    });

        const usernamelogin = document.querySelector(".usernamelogin");
        const emailInput = document.querySelector(".toggle"); 
        const username = document.getElementById("username"); 
    
       

    
    



});
