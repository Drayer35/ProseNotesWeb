import './bootstrap';
document.addEventListener('DOMContentLoaded', function () {
    var dropdownButton = document.getElementById('dropdownSearchButton');
    var dropdownMenu = document.getElementById('dropdownSearch');

    dropdownButton.addEventListener('click', function () {
        dropdownMenu.classList.toggle('hidden');
    });

    // Cerrar el menú desplegable si se hace clic fuera de él
    document.addEventListener('click', function (event) {
        var isClickInsideElement = dropdownButton.contains(event.target) || dropdownMenu.contains(event.target);
        if (!isClickInsideElement) {
            dropdownMenu.classList.add('hidden');
        }
    });
});