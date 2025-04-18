// The purpose of the script is to process in javascript the sorting and filters of the weapons-gallery page

const weapons = document.getElementsByName("weapon");
const rarities = document.querySelectorAll("main input[type=checkbox]");
const select = document.querySelector("select");
const cards = document.querySelectorAll(".card");

// paragraph that will host a message if no weapons is to be displayed
const p = document.createElement("p");
p.textContent = "Aucune arme ne correspond à vos critères.";
document.querySelector(".gallery").appendChild(p);
p.style.display = "none";

/**
 * Checks the radio weapons and returns the id of the one that is checked
 * @returns {string}
 */
function checkWeapons() {
    let id;
    weapons.forEach((weapon) => {
        if (weapon.checked) {
            id = weapon.id;
        }
    });
    return id;
}

/**
 * Checks the checkbox rarity and returns the values of the ones that are checked
 * @returns {Array}
 */
function checkRarity() {
    let values = [];
    rarities.forEach((rarity) => {
        if (rarity.checked) {
            values.push(rarity.value);
        }
    });
    return values;
}

// We group the inputs in an array
let sortArray = [];
weapons.forEach((weapon) => sortArray.push(weapon));
rarities.forEach((rarity) => sortArray.push(rarity));

sortArray.forEach((sort) => {
    sort.addEventListener("change", (event) => {
        let weaponChoise = checkWeapons();
        let raritiesChoise = checkRarity();
        cards.forEach((card) => {
            // Reveal all cards by default
            card.parentElement.style.display = "block";
            let test1 =
                weaponChoise == "all-weapons"
                    ? true
                    : card.dataset.weapon == weaponChoise;
            let test2 =
                raritiesChoise.length == 0
                    ? false
                    : raritiesChoise.includes(String(card.dataset.rarity));
            if (!test2) {
                card.parentElement.style.display = "none";
            } else {
                if (!test1) {
                    card.parentElement.style.display = "none";
                }
            }
        });
        p.style.display = raritiesChoise.length === 0 ? "block" : "none";
    });
});

// alphabetic, rarity and element filter
select.addEventListener("change", () => {
    switch (select.value) {
        case "rarity": {
            cards.forEach((card) => {
                switch (card.dataset.rarity) {
                    case "3":
                        card.parentElement.style.order = 3;
                        break;
                    case "4":
                        card.parentElement.style.order = 2;
                        break;
                    case "5":
                        card.parentElement.style.order = 1;
                        break;
                }
            });
            break;
        }
        case "type": {
            cards.forEach((card) => {
                switch (card.dataset.weapon) {
                    case "sword":
                        card.parentElement.style.order = 1;
                        break;
                    case "claymore":
                        card.parentElement.style.order = 2;
                        break;
                    case "bow":
                        card.parentElement.style.order = 3;
                        break;
                    case "polearm":
                        card.parentElement.style.order = 4;
                        break;
                    case "catalyst":
                        card.parentElement.style.order = 5;
                        break;
                }
            });
            break;
        }
        case "alphabetic-order": {
            cards.forEach((card) => {
                card.parentElement.style.order = 1;
            });
        }
    }
});
