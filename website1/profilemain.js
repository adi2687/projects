

function toggleEditProfile() {
    var editProfileBox = document.getElementById("editProfileBox");
    if (editProfileBox.style.display === "none") {
        editProfileBox.style.display = "block";
    } else {
        editProfileBox.style.display = "none";
    }
}
function biohide() {
    var biodis = document.getElementById("biodis");
    biodis.style.display = "none";
}
function editbio() {
    var bioinput = document.getElementById("bio");
    var biodisplay = document.getElementById("biodis");
    bioinput.style.display = "block";
    biodisplay.style.display = "none";
}
function toggleBioEdit() {
    var bioDisplay = document.getElementById("biodis");
    var bioInput = document.querySelector(".bioedit");

    // Toggle visibility of bio content and input field
    if (bioDisplay.style.display === "none") {
        bioDisplay.style.display = "block";
        bioInput.style.display = "none";
    } else {
        bioDisplay.style.display = "none";
        bioInput.style.display = "block";
    }

    document.getElementById("svg1").addEventListener("click", function () {
        var editbio = document.getElementById("editbio");
        editbio.style.opacity = "0";
        editbio.style.backgroundColor = "red";
    });

}
document.getElementById("editsvg").addEventListener("click",()=>{
    document.getElementById("editbio").style.visibility="visible";
})
