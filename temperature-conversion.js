function convertTemperature() {
    const inputTemp = parseFloat(document.getElementById("input-temp").value);
    const inputUnit = document.querySelector('input[name="unit"]:checked').value;
    const outputUnit = document.querySelector('input[name="output"]:checked').value;
  
    let convertedTemp;
  
    if (inputUnit === "f" && outputUnit === "c") {
      convertedTemp = (inputTemp - 32) * 5 / 9;
    } else if (inputUnit === "c" && outputUnit === "f") {
      convertedTemp = (inputTemp * 9 / 5) + 32;
    } else {
      
      convertedTemp = inputTemp;
    }
  
    const resultElement = document.getElementById("result");
    resultElement.textContent = `${inputTemp}°${inputUnit} is equal to ${convertedTemp.toFixed(2)}°${outputUnit}`;
  }
  
 
  const inputField = document.getElementById("input-temp");
  const unitRadioButtons = document.querySelectorAll('input[name="unit"], input[name="output"]');
  
  inputField.addEventListener("change", convertTemperature);
  unitRadioButtons.forEach(radioButton => radioButton.addEventListener("change", convertTemperature));
  