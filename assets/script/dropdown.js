document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggle = document.querySelector('.btn-group .dropdown-toggle');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownToggle.addEventListener('click', function (event) {
        event.stopPropagation(); 
        dropdownMenu.classList.toggle('show'); 
    });

    document.addEventListener('click', function (event) {
        if (!dropdownToggle.contains(event.target) && dropdownMenu.classList.contains('show')) {
            dropdownMenu.classList.remove('show');
        }
    });
});
