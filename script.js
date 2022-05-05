"use strict"

/* Coded by: www.github.com/Macover/encryption-to-string */

/*
   * Finish the validation of the input. 
   * Add the tags to the array
   * Extract each array from the stage and calculate their value.
   * Put all of the values into an new array to show the final result in order to put it into the UI.
   * Code more styles to the UI.
*/

const containerForm = document.getElementById('containerForm');
const inputsContainer = document.createElement('div');
inputsContainer.classList.add('form__inputs-container');

const createInputs = () =>{
    for (let i = 0; i < 3; i++) {
        const formInput = document.createElement('input');
        formInput.classList.add('form__input')
        formInput.setAttribute('id',`input${i + 1}`);
        formInput.setAttribute('maxlength',2);

        formInput.addEventListener("input",(e)=>{
            if(isNaN(formInput.value)){
                sendAlertMessage('Error: No se aceptan letras');
                clearInput(formInput);
            }            
        })
        inputsContainer.appendChild(formInput);
    }    
}

createInputs();
containerForm.appendChild(inputsContainer);



/* CUSTOM METHODS */

const clearInput = (input) => input.value = "";

const sendAlertMessage = (message, bool) => {
    console.log(message)
}
const isANumber = (string) => {
    let ascii = string.toUpperCase().charCodeAt(0);
    return ascii >= 48 && ascii <= 57;
}
