document.addEventListener('DOMContentLoaded', function() {
    const menuLinks = document.querySelectorAll('.menu a'); // Get all menu links
    
    // Iterate over each menu link
    menuLinks.forEach(function(menuLink) {
        menuLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default behavior
            
            const targetId = menuLink.getAttribute('href'); // Get the target section ID
            const targetSection = document.querySelector(targetId); // Get the target section
            
            // Hide all sections
            document.querySelectorAll('section').forEach(function(section) {
                section.style.display = 'none';
            });
            
            // Show the target section
            targetSection.style.display = 'block';
        });
    });
});