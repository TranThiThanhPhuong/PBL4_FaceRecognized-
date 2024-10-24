document.addEventListener("DOMContentLoaded", function(){ 
    var currentUrl = window.location.href;
    var links = document.querySelectorAll('.sidebar a');
    links.forEach(function(link) { 
        if (link.href === currentUrl) { 
            link.id = 'active-link' 
        }
    });
});