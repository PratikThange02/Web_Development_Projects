const display = document.getElementById("display");
const buttons = document.querySelectorAll(".btn");

let currentInput = "";

buttons.forEach(button => {
  button.addEventListener("click", () => {
    const action = button.getAttribute("data-action");

    if (action === "clear") {
      currentInput = "";
      display.value = "";
    } else if (action === "=") {
      try {
        currentInput = eval(currentInput).toString();
        display.value = currentInput;
      } catch {
        display.value = "Error";
        currentInput = "";
      }
    } else {
      currentInput += action;
      display.value = currentInput;
    }
  });
});

// Bonus: Keyboard Support
document.addEventListener("keydown", (e) => {
  if ((e.key >= "0" && e.key <= "9") || "+-*/.".includes(e.key)) {
    currentInput += e.key;
    display.value = currentInput;
  } else if (e.key === "Enter") {
    try {
      currentInput = eval(currentInput).toString();
      display.value = currentInput;
    } catch {
      display.value = "Error";
      currentInput = "";
    }
  } else if (e.key === "Escape") {
    currentInput = "";
    display.value = "";
  } else if (e.key === "Backspace") {
    currentInput = currentInput.slice(0, -1);
    display.value = currentInput;
  }
});
