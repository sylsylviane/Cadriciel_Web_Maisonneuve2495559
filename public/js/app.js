// import './bootstrap';

const navLink = document.querySelectorAll('.nav-link');

function init(){
    navLink.forEach((link) => {
        let href = link.href;
        let current = document.location.href;
        if(href === current){
            link.classList.add("active");
        }
    });
}

init();