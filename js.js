

document.addEventListener('DOMContentLoaded', function() {
    const camposContraseña = document.querySelectorAll('input[type="password"]');
    const iconosOjo = document.querySelectorAll('.fa-eye');

    iconosOjo.forEach(function(iconoOjo, indice) {
        iconoOjo.addEventListener('click', function() {
            const campoContraseña = camposContraseña[indice];
            alternarVisibilidadContraseña(campoContraseña, iconoOjo);
        });
    });

    function alternarVisibilidadContraseña(campoContraseña, iconoOjo) {
        if (campoContraseña.type === "password") {
            campoContraseña.type = "text";
            iconoOjo.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            campoContraseña.type = "password";
            iconoOjo.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
});
