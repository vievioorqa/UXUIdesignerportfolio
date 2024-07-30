let darkMode = localStorage.getItem("darkMode"); // is updated every time someone clicks on it
const darkModeToggle = document.querySelector("#dark-mode-toggle");
const lightModeToggle = document.querySelector("#light-mode-toggle");
const logoElement = document.querySelector("#logoElement");


const enableDarkMode = () => {
    document.body.classList.add('dark-mode');
    darkModeToggle.classList.add('hidden');
    lightModeToggle.classList.remove('hidden');
    localStorage.setItem('darkMode', 'enabled');
    logoElement.src = "images/logo-light.png"; // Change logo for light mode
};

const disableDarkMode = () => {
    document.body.classList.remove('dark-mode');
    darkModeToggle.classList.remove('hidden');
    lightModeToggle.classList.add('hidden');
    localStorage.setItem('darkMode', 'disabled');
    logoElement.src = "images/logo.png"; // Change logo for light mode
};

// Check the current mode and set the initial state
if (darkMode === 'enabled') {
    enableDarkMode();
} else {
    disableDarkMode();
}

darkModeToggle.addEventListener("click", () => {
    enableDarkMode();
});

lightModeToggle.addEventListener("click", () => {
    disableDarkMode();
});
