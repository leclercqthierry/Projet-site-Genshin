const deleteBtns = document.querySelectorAll('.btn-container1 .btn:last-child');
const editBtns = document.querySelectorAll('.btn-container1 .btn:first-child');
const createBtn = document.querySelector('.btn-container2 .btn:first-child');
const deleteAccountBtn = document.querySelector('.btn-container2 .btn:last-child');


deleteBtns.forEach(btn => {
    btn.addEventListener('click', () =>{
        btn.parentElement.parentElement.remove();
    });
});

editBtns.forEach(btn => {
    //TODO:
});

createBtn.addEventListener('click', () => {
    //TODO:
});

deleteAccountBtn.addEventListener('click', () => {
    //TODO:
});