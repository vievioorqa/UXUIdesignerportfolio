

let textIncrease = localStorage.getItem("textIncrease"); // is updated every time someone clicks on it
const textIncreaseToggle = document.querySelector("#text-increase-toggle");
const textDecreaseToggle = document.querySelector("#text-decrease-toggle");


const enableTextIncrease = () => {
    document.documentElement.classList.add('text-increase');  //documentElement targetuje <html>
    textIncreaseToggle.classList.add('hidden');
    textDecreaseToggle.classList.remove('hidden');
    localStorage.setItem('textIncrease', 'enabled');
};

const disableTextIncrease = () => {
    document.documentElement.classList.remove('text-increase');
    textIncreaseToggle.classList.remove('hidden');
    textDecreaseToggle.classList.add('hidden');
    localStorage.setItem('textIncrease', 'disabled');
};

// Check the current mode and set the initial state
if (textIncrease === 'enabled') {
    enableTextIncrease();
} else {
    disableTextIncrease();
}

textIncreaseToggle.addEventListener("click", () => {
    enableTextIncrease();
});

textDecreaseToggle.addEventListener("click", () => {
    disableTextIncrease();
});