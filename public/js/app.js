// import './bootstrap';

const navLinks = document.querySelectorAll('.nav-link');

function init(){
    navLinks.forEach((link) => {
        let href = link.href;
        let current = document.location.href;
        if(href === current){
            link.classList.add("active");
        }
    });
}

init();