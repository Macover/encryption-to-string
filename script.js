"use strict" /* Coded by: www.github.com/Macover/encryption-to-string */

/* CREATE THE INPUTS */

const containerForm = document.getElementById('containerForm');
const inputsContainer = document.createElement('div');
const UIMessage = document.getElementById('UIMessage');
inputsContainer.classList.add('form__inputs-container');

const createInputs = () => {
    for (let i = 0; i < 3; i++) {
        const formInput = document.createElement('input');
        formInput.classList.add('form__input')
        formInput.setAttribute('id', `input${i + 1}`);
        formInput.setAttribute('maxlength', 2);

        formInput.addEventListener("keyup", (e) => {
            if (!isANumber(e.key)) {
                sendAlertMessage('Error: Los input no aceptan letras', 'error');
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
    [-3 / 11, 6 / 11, 2 / 11],
    [1 / 11, -2 / 11, 3 / 11],
    [7 / 11, -3 / 11, -1 / 11]
];

let globalArray = [];

addStageButton.addEventListener('click', () => {

    const input = document.querySelectorAll('.form__input');

    if (input[0].value == "" || input[1].value == "" || input[2].value == "") {
        sendAlertMessage("Error: Hay un input sin llenar", 'error')
    } else {

        const array = [];
        input.forEach(inpt => array.push(inpt.value));

        /* solve the new array */
        const newArray = [];

        for (let i = 0; i < INVERSE_MATRIX.length; i++) {
            let sum = 0;
            for (let j = 0; j < array.length; j++) {
                sum = sum + (array[j] * INVERSE_MATRIX[i][j]);
            }
            newArray.push(Math.round(sum));
        }

        const isValidArray = newArray.some(num => num < 0 || num > 27);

        if (false) {
            sendAlertMessage('Error: Los valores introducidos son incorrectos.', 'error')
        } else {
            globalArray.push(newArray)
            console.log("global", globalArray);
            const div = document.createElement('div');
            const span = document.createElement('span');
            div.classList.add('stage-box__tag');
            span.classList.add('tag__text');
            span.textContent = array.join(",");

            div.appendChild(span);
            stageBox.appendChild(div);
            sendAlertMessage('Tag agregado correctamente', 'success');
            input.forEach(inp => inp.value = "");
        }
    }
})

/* SHOW THE RESULTS */

const decodeButton = document.getElementById('decodeButton');
const resultMessage = document.getElementById('resultMessage');
const tableResult = document.querySelector('.table-result');


decodeButton.addEventListener("click", () => {

    const input = document.querySelectorAll('.form__input');

    if (globalArray.length === 0) {
        sendAlertMessage(`Error: No hay datos en el "staged" `, 'error')
    } else {

        tableResult.classList.replace("isDisabled","isEnabledFlex");

        let string = '';

        const tbodyResult = document.getElementById('tbodyResul');
        const trElementRow1 = document.createElement('tr');
        const trElementRow2 = document.createElement('tr');

        for (let i = 0; i < globalArray.length; i++) {
            for (let j = 0; j < 3; j++) {
                string += getCharacter(globalArray[i][j]);

                const td1 = document.createElement('td');
                const td2 = document.createElement('td');
                td1.textContent = globalArray[i][j];
                td2.textContent = getCharacter(globalArray[i][j]);
                trElementRow1.appendChild(td1);
                trElementRow2.appendChild(td2);
            }
        }
        tbodyResult.innerHTML = trElementRow1.innerHTML
        tbodyResult.innerHTML += trElementRow2.innerHTML
        resultMessage.innerHTML = `El mensaje es: "${string}"`
    }
})


/* CUSTOM METHODS */

const getCharacter = number => {
    if (number == '0') return ' ';
    if (number == '1') return 'a';
    if (number == '2') return 'b';
    if (number == '3') return 'c';
    if (number == '4') return 'd';
    if (number == '5') return 'e';
    if (number == '6') return 'f';
    if (number == '7') return 'g';
    if (number == '8') return 'h';
    if (number == '9') return 'i';
    if (number == '10') return 'j';
    if (number == '11') return 'k';
    if (number == '12') return 'l';
    if (number == '13') return 'm';
    if (number == '14') return 'n';
    if (number == '15') return 'ñ';
    if (number == '16') return 'o';
    if (number == '17') return 'p';
    if (number == '18') return 'q';
    if (number == '19') return 'r';
    if (number == '20') return 's';
    if (number == '21') return 't';
    if (number == '22') return 'u';
    if (number == '22') return 'v';
    if (number == '24') return 'w';
    if (number == '25') return 'x';
    if (number == '26') return 'y';
    if (number == '27') return 'z';
    if (number == '28') return '.';
}

const clearInput = (input) => input.value = "";

const sendAlertMessage = (message, typeOfMessage) => {
    UIMessage.classList.remove('isDisabled');
    if (typeOfMessage === 'error') {
        UIMessage.style.backgroundColor = 'rgba(255, 0, 0, 0.09)';
        UIMessage.style.color = '#c00';
    }
    if (typeOfMessage === 'success') {
        UIMessage.style.backgroundColor = 'rgba(0, 255, 0, 0.09)';
        UIMessage.style.color = '#0c0';
    }
    UIMessage.textContent = message;
}
const isANumber = (string) => {
    let ascii = string.toUpperCase().charCodeAt(0);
    return (ascii >= 48 && ascii <= 57) || ascii == 45;
}
