const containers = document.querySelectorAll('.container');

containers.forEach(container => {
    const chevron = container.querySelector('i');
    const form = container.querySelector('form');

    chevron.addEventListener("click", () =>{
        if (chevron.classList.contains('fa-chevron-down')){
            chevron.classList.remove('fa-chevron-down');
            chevron.classList.add('fa-chevron-up');
            form.style.display = 'flex';
        } else {
            chevron.classList.remove('fa-chevron-up');
            chevron.classList.add('fa-chevron-down');
            form.style.display = 'none';
        }
    });
});