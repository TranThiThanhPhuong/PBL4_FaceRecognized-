let menu = document.querySelector('.iconNavbar');
let sidebar = document.querySelector('.sidebar');
let main = document.querySelector('.main');

document.addEventListener("DOMContentLoaded", function() {
    var currentUrl = window.location.href;
    var links = document.querySelectorAll('.sidebar a');
    links.forEach(function(link) {
        if (link.href === currentUrl) {
            link.classList.add('active');
        }
    });
    
    menu.onclick = function() {
        sidebar.classList.toggle('active');
        main.classList.toggle('active');
    }
});