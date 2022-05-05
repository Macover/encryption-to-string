"use strict"

/* Coded by: www.github.com/Macover/encryption-to-string */

/*
   * Finish the validation of the input. 
   * Add the tags to the stage (OPTIONAL: with a button to eliminate it.)
   * Extract each array from the stage and calculate their value.
   * Put all of the values into an new array to show the final result in order to put it into the UI.
   * Code more styles to the UI.
*/


/* CREATE THE INPUTS */

const containerForm = document.getElementById('containerForm');
const inputsContainer = document.createElement('div');
inputsContainer.classList.add('form__inputs-container');

const createInputs = () => {
    for (let i = 0; i < 3; i++) {
        const formInput = document.createElement('input');
        formInput.classList.add('form__input')
        formInput.setAttribute('id', `input${i + 1}`);
        formInput.setAttribute('maxlength', 2);

        formInput.addEventListener("input", (e) => {
            if (isNaN(formInput.value)) {
                sendAlertMessage('Error: No se aceptan letras');
                clearInput(formInput);
            }
        })
        inputsContainer.appendChild(formInput);
    }
}
createInputs();
containerForm.appendChild(inputsContainer);

 /* TO ADD THE INPUT'S VALUES TO THE STAGE */

 const addStageButton = document.getElementById('addStage');
 const stageBox = document.querySelector('.container__stage-box');

 const INVERSE_MATRIX = [
     [-3/11,6/11,2/11],
     [1/11,-2/11,3/11],
     [7/11,-3/11,-1/11]
 ];
 
 let globalArray = [];

 addStageButton.addEventListener('click',()=>{
     
    const input = document.querySelectorAll('.form__input');

    if(input[0].value == "" || input[1].value == "" || input[2].value == ""){
        sendAlertMessage("Error: Hay un input sin llenar")
    }else{
        const array = [];
        
        for (const key of input) {
            array.push(key.value);
        }
        
        /* solve the new array */
        const newArray = [];
        
        for (let i = 0; i < INVERSE_MATRIX.length; i++) {
            let sum = 0;
            for (let j = 0; j < array.length; j++) {
                sum = sum + (array[j] * INVERSE_MATRIX[i][j]);                
            }
            newArray.push(Math.round(sum));
        }
        globalArray.push(newArray)
        console.log("global",globalArray);
        
    }
    
 })

/* CUSTOM METHODS */

const clearInput = (input) => input.value = "";

const sendAlertMessage = (message, bool) => {
    console.log(message)
}
