"use strict"

const dataInput = document.getElementById('dataInput');


const clearInput = () => dataInput.value = "";


const sendAlertMessage = (message, bool) => {
    console.log(message)
}

dataInput.addEventListener("input", e => {
    const inputValue = e.target.value;
    if (isNaN(inputValue)) {
        sendAlertMessage("Error: Solo se aceptan números.");
        clearInput();
    }else if(inputValue.length > 2){
        sendAlertMessage("Error: Rango permitido [1 - 28].");
    }
})
