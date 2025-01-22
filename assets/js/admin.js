function openTab(n){
    const contents = document.querySelectorAll('.tab-content');
    const tabs = document.querySelectorAll('.btn-container button');
    for(let i=0; i<contents.length; i++){
        contents[i].style.display = 'none';
        tabs[i].classList.remove('active');
    }
    contents[n].style.display = 'block';
    tabs[n].classList.add('active');
}

