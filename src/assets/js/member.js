// This part of the script is used to standardize the height of the team cards

const teams = document.querySelectorAll(".team");

maxHeight = 0;

teams.forEach((team) => {
    height = team.offsetHeight;
    console.log(height);
    if (parseInt(height) > maxHeight) {
        maxHeight = parseInt(height);
    }
});

teams.forEach((team) => {
    team.style.height = maxHeight + "px";
});
