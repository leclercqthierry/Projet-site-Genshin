// The purpose of the script is to display a preview of the image loaded by the input file

const inputsFiles = document.querySelectorAll('input[type="file"]');

// When an image is loaded it is previewed
inputsFiles.forEach(inputFile => {
    inputFile.addEventListener('change', (e) => {

        // If the preview image exists we retrieve it, otherwise we create it
        let img = inputFile.nextElementSibling !== null ? inputFile.nextElementSibling : document.createElement('img');
        img.src = URL.createObjectURL(e.target.files[0]);
        inputFile.parentElement.append(img);
    });
});
