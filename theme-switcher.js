document.addEventListener('DOMContentLoaded', () => {
    const botonCambiarTema = document.getElementById('theme-toggle-btn');

    function aplicarTema(tema) {
        if (tema === 'light-mode') {
            document.body.classList.add('light-mode');
            botonCambiarTema.textContent = '🌙';
        } else {
            document.body.classList.remove('light-mode');
            botonCambiarTema.textContent = '☀️';
        }
    }

    const temaGuardado = localStorage.getItem('theme');
    const prefiereClaro = window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches;

    aplicarTema(temaGuardado || (prefiereClaro ? 'light-mode' : 'dark-mode'));

    botonCambiarTema.addEventListener('click', () => {
        const nuevoTema = document.body.classList.contains('light-mode') ? 'dark-mode' : 'light-mode';
        aplicarTema(nuevoTema);
        localStorage.setItem('theme', nuevoTema);
    });
});