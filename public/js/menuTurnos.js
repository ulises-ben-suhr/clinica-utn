class Turnos {
    constructor(btn){
        this.btn = btn
        this.menu = btn.nextElementSibling
        this.estado = false

        this.btn.addEventListener('click', () => this.onClick())
    }

    onClick(){
        let estadoTemp = this.estado
        clearAllNav()
        this.estado = estadoTemp

        if(this.estado){
            this.hidden()
        }else{
            this.show()
        }
    }

    show(){
        this.menu.classList.remove('d-none')
        this.estado = true
    }

    hidden(){
        this.menu.classList.remove('d-block')
        this.menu.classList.add('d-none')
        this.estado = false
    }
}

const btnTurnos = document.querySelectorAll('.btn-turno')
const turnos = []

btnTurnos.forEach(btn => {
    turnos.push(new Turnos(btn))
});

function clearAllNav(){
    turnos.forEach(turno => {
        turno.hidden()
    })
}
