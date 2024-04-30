<script>
window.addEventListener('scroll', function() {
    var logo = document.getElementById('logo');
    var header = document.querySelector('header');
  
    if (window.scrollY > 0) {
      logo.src = 'logo-black.png.png'; // Change to black logo
      header.style.backgroundColor = '#fff'; // Change header background color
    } else {
      logo.src = 'logo-white.png.png'; // Change to white logo
      header.style.backgroundColor = 'transparent'; // Restore header background color
    }
  });
  
  const subheadings = document.querySelectorAll('.subheading');

        subheadings.forEach(subheading => {
            subheading.addEventListener('click', () => {
                // Remove 'active' class from all subheadings
                subheadings.forEach(sub => sub.classList.remove('active'));
                // Add 'active' class to the clicked subheading
                subheading.classList.add('active');

                // Hide all images
                const images = document.querySelectorAll('.image');
                images.forEach(image => image.style.display = 'none');

                // Show images for the clicked category
                const category = subheading.dataset.category;
                const categoryImages = document.querySelectorAll(`.image.${category}`);
                categoryImages.forEach(image => image.style.display = 'block');
            });
        });
</script>
