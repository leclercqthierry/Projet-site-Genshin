const rate = document.querySelector("button");
const formRating = document.querySelector("form");
let hasvoted = false;
let rating = 0;

rate.addEventListener("click", () => {
    formRating.style.display = "flex";
});

formRating.addEventListener("submit", (e) => {
    e.preventDefault();
    rating = e.target.rating.value;
    hasvoted = true;
    rate.disabled = true;
    formRating.style.display = "none";
});
