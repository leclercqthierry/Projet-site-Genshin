// The purpose of this script is to validate the edit character form on the front side

// Retrieving form elements
const form = document.querySelector('form[name="edit-character-form"]');
const charName = document.getElementById("name");
const rarities = document.getElementsByName("rarity");
const selects = document.querySelectorAll("select");
const thumbnail = document.getElementById("thumbnail");
const card = document.getElementById("card");

// Regex pattern for validation
const regexName = /^[A-Z][a-zA-Z \-éèêëàâûôî']+[a-zA-Zé]$/;
const regexSelect = /^\d+$/;

const errorN =
    "Le nom doit commencer par une majuscule et ne pas comporter de chiffres (caractères spéciaux autorisés: -, é, è, ê, ë, à, â, û, ô et ') et avoir au moins 3 lettres.";

const errorS = "Valeur incorrecte !";

if (charName !== null && form !== null && selects !== null) {
    const errorName = addErrorMessage(charName, errorN);
    const errorForm = addErrorMessage(form, "");

    validateTextField(charName, regexName, errorName);

    selects.forEach((select) => {
        const errorSelect = addErrorMessage(select, errorS);
        validateSelect(select, regexSelect, errorSelect);
    });

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        if (
            (thumbnail.files[0] !== undefined &&
                thumbnail.files[0].size > 1048576) ||
            (card.files[0] !== undefined && card.files[0].size > 1048576)
        ) {
            showError("Votre image ne doit pas dépasser 1MB.", errorForm);
        } else if (
            (thumbnail.files[0] !== undefined &&
                !thumbnail.value.match(/\.(jpg|jpeg|png|gif|webp)$/)) ||
            (card.files[0] !== undefined &&
                !card.value.match(/\.(jpg|jpeg|png|gif|webp)$/))
        ) {
            showError(
                "Votre image doit être au format jpg, jpeg, png, gif ou webp.",
                errorForm,
            );
        } else {
            errorForm.style.display = "none";
        }

        if (!regexName.test(charName.value) || charName.value === "") {
            showError(
                "Veuillez entrer un nom valide pour votre personnage.",
                errorForm,
            );
        }
        if (!rarities[0].checked && !rarities[1].checked) {
            showError(
                "Veuillez selectionner une rareté pour votre personnage.",
                errorForm,
            );
        }

        selects.forEach((select) => {
            if (!regexSelect.test(select.value) || select.value === "") {
                showError(
                    "Veuillez choisir une valeur valide pour votre personnage dans les menus déroulants.",
                    errorForm,
                );
            }
        });

        if (errorForm.textContent === "") {
            form.submit();
        }
    });
}
