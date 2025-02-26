
// Add a paragraph with an error message just after the element field
/**
 * @param {HTMLElement} field 
 * @param {string} errorMessage 
 * @return {HTMLElement}
 */
function addErrorMessage(field, errorMessage){
    const error = document.createElement('p');
    error.textContent = errorMessage;
    error.style.display = 'none';
    field.insertAdjacentElement('afterend', error);
    return error;
}

// Validate text field and display error message if the input does not match the regex
/**
 * @param {HTMLElement} field 
 * @param {string} regex 
 * @param {HTMLElement} error 
 */
function validateTextField(field, regex, error) {

    field.addEventListener('input', () => {
        error.style.display =!regex.test(field.value)? 'block' : 'none';
    });
}

// Show error message
/**
 * @param {string} message 
 * @param {*HTMLElement} error 
 */
function showError(message, error){
    error.textContent = message;
    error.style.display = 'block';
    setTimeout(() => {error.textContent = '';}, 2000);
}

function validateSelect(select, regex, error){
    select.addEventListener('change', () => {
        error.style.display =!regex.test(select.value)? 'block' : 'none';
    });
}