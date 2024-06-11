
document.addEventListener('DOMContentLoaded', function() {
    const colorPicker = document.getElementById('colorPicker');
    const body = document.body;
    const navbar = document.getElementById('navbar'); 

    function getLuminance(hexColor) {
        const rgb = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hexColor);
        const r = parseInt(rgb[1], 16);
        const g = parseInt(rgb[2], 16);
        const b = parseInt(rgb[3], 16);
        return 0.2126 * r + 0.7152 * g + 0.0722 * b;
    }

    function setColorScheme(backgroundHex) {
        const luminance = getLuminance(backgroundHex);
        const textColor = luminance > 128 ? '#000' : '#fff';
        const borderColor = luminance > 128 ? '#ddd' : '#333';

        body.style.color = textColor;

        const elements = document.querySelectorAll('.heading, .paragraph, .span, .card ,.container');
        elements.forEach(function(element) {
            element.style.color = textColor;
            element.style.borderColor = borderColor;
        });
    }

    function getNavbarColor() {
        return getComputedStyle(navbar).backgroundColor;
    }

    const storedColor = localStorage.getItem('selectedColor');
    if (storedColor) {
        body.style.backgroundColor = storedColor;
        colorPicker.value = storedColor;
        setColorScheme(storedColor);
    }

    if (!colorPicker) {
        console.error('Color picker element not found.');
    } else {
        colorPicker.addEventListener('change', function() {
            const color = colorPicker.value;
            body.style.backgroundColor = color;
            setColorScheme(color);

            localStorage.setItem('selectedColor', color);
        });
    }

    const navbarColor = getNavbarColor();
    if (navbarColor === 'rgb(0, 0, 0)' || navbarColor === '#000') {
        setColorScheme('#000'); 
    }
});


            function previewImage(input) {
                var previewContainer = document.getElementById('previewContainer');
                var imagePreview = document.getElementById('imagePreview');
        
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
        
                    reader.onload = function(e) {
                        imagePreview.setAttribute('src', e.target.result);
                        previewContainer.style.display = 'block';
                    }
        
                    reader.readAsDataURL(input.files[0]);
                } else {
                    previewContainer.style.display = 'none';
                }
            }
      