const btnTurnos = document.querySelectorAll('.btn-turno');

btnTurnos.forEach(btn => {
    btn.addEventListener('click', (event) => {
        let nav = event.target.nextElementSibling;
        nav.classList.remove('d-none');
        console.log(nav);
    })
});
