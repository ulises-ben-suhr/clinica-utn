import { getMonthActually, getYearActually } from "./dateInformation.js";
import { reloadCalender, findDayShift } from "./dateCalender.js";

let turns = [];


let optionMonth = [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'Octubre',
    'Noviembre',
    'Diciembre'
];




let year = getYearActually();
let numberMonth = getMonthActually();
showDate();


$('#backMonth').on("click",() =>{
    numberMonth = numberMonth == 1 ? 12 : numberMonth - 1;
    year = numberMonth == 12 ? year - 1 : year;
    showDate();
})

$('#nextMonth').on("click",() =>{
    year = numberMonth == 12 ? year + 1 : year;
    numberMonth = numberMonth == 12 ? 1 : numberMonth + 1;
    showDate();
})



function createModalEvent(){
    $('.haveModal').on("click",(e) =>{
        let dayNumber = e.currentTarget.firstElementChild.innerHTML;
        $('.modal-title').html('Turnos del día '+ dayNumber);
        $('.modal-body').html(loadInformationModal(dayNumber));
        $('.modal').show();
        $('.modal-helper').show();
    })

    $('.modal-close').on("click",() =>{
        $('.modal').hide();
        $('.modal-helper').hide();
    })
}


function loadInformationModal(dayNumber){
    let information = findDayShift(dayNumber, turns);
    let htmlInformation = '';
    information.forEach(dayShift => {
        let colorBackground = dayShift.estado == 'activo' ? 'bg-primary' : 'bg-danger';
        htmlInformation += `
        <h3 class="${colorBackground } text-white ps-2 rounded-2">${dayShift.fecha_turno}</h3>
        <p class="fw-bold">Horario: <span class="fw-normal">${dayShift.horario}</span></p>
        <p class="fw-bold">Doctor: <span class="text-capitalize fw-normal">${dayShift.doctor}</span></p>
        <p class="fw-bold">Especialidad: <span class="text-capitalize fw-normal">${dayShift.especialidad}</span></p>
        <p class="fw-bold">Estado: <span class="text-capitalize fw-normal">${dayShift.estado}</span></p>
        `
    });
    return htmlInformation;
}

function showDate(){
    $('#month').html(`${optionMonth[numberMonth - 1]} ${year}`);
    $('#monthCalender').val(numberMonth);
    $('#yearCalender').val(year);
}


export function setTurns(turnsUser){
    turns = turnsUser;
    reloadCalender(numberMonth, year, turns);
    createModalEvent();
}
