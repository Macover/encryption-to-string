"use strict"

/*
   * Finish the validation of the input. 
   * Add the tags to the array
   * Extract each array from the stage and calculate their value.
   * Put all of the values into an new array to show the final result in order to put it into the UI.
   * Code more styles to the UI.
*/



/* CUSTOM METHODS */

const clearInput = () => dataInput.value = "";

const sendAlertMessage = (message, bool) => {
    console.log(message)
}
const isANumber = (string) => {
    let ascii = string.toUpperCase().charCodeAt(0);
    return ascii >= 48 && ascii <= 57;
}
