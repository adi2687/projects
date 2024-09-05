let about = document.getElementById("about");
let contact = document.getElementById("contact");
let developers = document.getElementById("developers");
let terms = document.getElementById("terms");
let privacy = document.getElementById("recommend");

let aboutInfo = document.getElementsByClassName("aboutinfo")[0];
let contactInfo = document.getElementsByClassName("contactinfo")[0];
let developersInfo = document.getElementsByClassName("developersinfo")[0];
let termsInfo = document.getElementsByClassName("termsinfo")[0];
let privacyInfo = document.getElementsByClassName("test")[0];

about.addEventListener("mouseover", function () {
    aboutInfo.style.visibility = "visible";
});
about.addEventListener("mouseout", function () {
    aboutInfo.style.visibility = "hidden";
});

contact.addEventListener("mouseover", function () {
    contactInfo.style.visibility = "visible";
});
contact.addEventListener("mouseout", function () {
    contactInfo.style.visibility = "hidden";
});

developers.addEventListener("mouseover", function () {
    developersInfo.style.visibility = "visible";
});
developers.addEventListener("mouseout", function () {
    developersInfo.style.visibility = "hidden";
});

terms.addEventListener("mouseover", function () {
    termsInfo.style.visibility = "visible";
});
terms.addEventListener("mouseout", function () {
    termsInfo.style.visibility = "hidden";
});

privacy.addEventListener("mouseover", function () {
    privacyInfo.style.visibility = "visible";
});
privacy.addEventListener("mouseout", function () {
    privacyInfo.style.visibility = "hidden";
});

const images = {
    image1: {
        src: "image4.webp", width: "200", height: "200"
    },
    image2: {
        src: "image2.jpg", width: "200", height: "200"
    },
    image3: { src: "image4.png", width: "200", height: "199" }
};

function changeimage(imagename) {
    var laptopImage1 = document.getElementById("inthelaptop");
    laptopImage1.src = images[imagename].src;
    laptopImage1.width = images[imagename].width;
    laptopImage1.height = images[imagename].height;
}
setInterval(function () {
    changeimage("image1");
    setTimeout(function () {
        changeimage("image2");
    }, 2000);
    setTimeout(function () {
        changeimage("image3");
    }, 4000);
}, 6000);
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});