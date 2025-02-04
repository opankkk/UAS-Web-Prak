let navbar = document.querySelector(".header .flex .navbar");
let dropdown = document.querySelector(".dropdown");
let dropdownContent = document.querySelector(".dropdown-content");

// document.querySelector("#menu-btn").onclick = () => {
//     navbar.classList.toggle("active");
//     profile.classList.remove("active");
// };

let profile = document.querySelector(".header .flex .profile");

// document.querySelector("#user-btn").onclick = () => {
//     profile.classList.toggle("active");
//     navbar.classList.remove("active");
// };

window.onscroll = () => {
    profile.classList.remove("active");
    navbar.classList.remove("active");
};

dropdown.addEventListener("click", (e) => {
    toggleDropdown();
});

function toggleDropdown() {
    if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
    } else {
        dropdownContent.style.display = "block";
    }
    console.log("clicked");
}
