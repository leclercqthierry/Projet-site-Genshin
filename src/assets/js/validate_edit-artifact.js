// The purpose of this script is to validate the edit artifact form on the front side

// Retrieving form elements
const form = document.querySelector('form[name="edit-artifact-form"]');
const artifactName = document.getElementById("name");
const rarities = document.getElementsByName("rarity");
const thumbnail = document.getElementById("thumbnail");
const description = document.getElementById("description");

// Regex pattern for validation
const regexName = /^[A-Z][a-zA-Z \-éèêëàâûôî']+[a-zA-Zé]$/;

const errorN =
    "Le nom doit commencer par une majuscule et ne pas comporter de chiffres (caractères spéciaux autorisés: -, é, è, ê, ë, à, â, û, ô et ') et avoir au moins 3 lettres.";

// When we have chosen our set to edit
if (artifactName !== null && form !== null && description !== null) {
    const errorName = addErrorMessage(artifactName, errorN);
    const errorForm = addErrorMessage(form, "");
    validateTextField(artifactName, regexName, errorName);
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        if (
            thumbnail.files[0] !== undefined &&
            thumbnail.files[0].size > 1048576
        ) {
            showError("Votre image ne doit pas dépasser 1MB.", errorForm);
        } else if (
            thumbnail.files[0] !== undefined &&
            !thumbnail.value.match(/\.(jpg|jpeg|png|gif|webp)$/)
        ) {
            showError(
                "Votre image doit être au format jpg, jpeg, png, gif ou webp.",
                errorForm,
            );
        } else {
            errorForm.style.display = "none";
        }
        if (!regexName.test(artifactName.value) || artifactName.value === "") {
            showError(
                "Veuillez entrer un nom valide pour votre set d'artéfacts.",
                errorForm,
            );
        }
        if (
            !rarities[0].checked &&
            !rarities[1].checked &&
            !rarities[2].checked
        ) {
            showError(
                "Veuillez selectionner une rareté pour votre set d'artéfacts.",
                errorForm,
            );
        }
        if (description.value === "") {
            showError(
                "Veuillez entrer une description pour votre set d'artefact.",
                errorForm,
            );
        }
        if (errorForm.textContent === "") {
            form.submit();
        }
    });
}
