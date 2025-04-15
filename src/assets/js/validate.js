/**
 * Add a paragraph with an error message and a class error just after the element field
 * @param {HTMLElement} field
 * @param {string} errorMessage
 * @returns {HTMLElement}
 */
function addErrorMessage(field, errorMessage) {
    const error = document.createElement("p");
    error.classList.add("error");
    error.textContent = errorMessage;
    error.style.display = "none";
    error.setAttribute("role", "alert");
    field.insertAdjacentElement("afterend", error);
    return error;
}

/**
 * Validate text field and display error message if the input does not match the regex
 * @param {HTMLElement} field
 * @param {string} regex
 * @param {HTMLElement} error
 */
function validateTextField(field, regex, error) {
    field.addEventListener("input", () => {
        error.style.display = !regex.test(field.value) ? "block" : "none";
        field.setAttribute(
            "aria-invalid",
            !regex.test(field.value) ? "true" : "false",
        );
    });
}

/**
 * Show error message
 * @param {string} message
 * @param {*HTMLElement} error
 */
function showError(message, error) {
    error.textContent = message;
    error.style.display = "block";
    setTimeout(() => {
        error.textContent = "";
    }, 2000);
}

/**
 * Validate select field and display error message if the selected option does not match the regex
 * @param {HTMLElement} select
 * @param {string} regex
 * @param {HTMLElement} error
 */
function validateSelect(select, regex, error) {
    select.addEventListener("change", () => {
        error.style.display = !regex.test(select.value) ? "block" : "none";
    });
}

/**
 * Return true if all values are differents, false otherwise
 * @param {Array} array
 * @returns {Boolean}
 */
function checkAllDifferent(array) {
    let n = array.length;
    for (let i = 0; i < n; i++) {
        for (let j = i + 1; j < n; j++) {
            if (array[i] === array[j]) {
                return false;
            }
        }
    }
    return true;
}
