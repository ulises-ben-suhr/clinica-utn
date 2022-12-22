import { getDateOfMonth, getDayOfDate } from "./dateInformation.js";
let calendarData = document.getElementById('days');


export function reloadCalender(month, year, turns){
    let dateMonth = getDateOfMonth(month , year);
    let daysRow = '';
    calendarData.innerHTML = '';
    let dayShift;

    for(let i = 0; i < getDayOfDate(1,month ,2022); i++){
        daysRow += '<td class="calender-box-null text-secondary fw-bold position-relative top-0"></td>'
    };


    for(let i = 1; i <= dateMonth.days; i++){

        dayShift = findDayShift(i, turns);
        daysRow += dayShift.length == 0 ? createTableData(i) : createTableDataEvent(i,dayShift);

        if(getDayOfDate(i,month ,2022) == 6){
            calendarData.innerHTML += `</tr> ${daysRow} <tr>`;
            daysRow = '';
        }
    };

    calendarData.innerHTML += `</tr> ${daysRow} <tr>`;

    return;
}


export function findDayShift(day, fullDateOfMonth){
    day = parseInt(day);
    return fullDateOfMonth.filter(date => {
        let arrayDate =  date.fecha_turno.split('-');
        return arrayDate[2] == day;
    });
}

function createTableData(day){
    return `
    <td class="calender-box fs-5 text-body fw-bold position-relative top-0">
        <p>${day}</p>
    </td>`;
}

function createTableDataEvent(day, dayShift){
    return `
    <td value="${day}" class="haveModal calender-box fs-5 text-body fw-bold position-relative top-0">
        <span class="text-primary d-block mb-2">${day}</span>

        ${createListEvent(dayShift)}

    </td>`;
}

function createListEvent(dayShift){
    let result = '';


    dayShift.forEach(turn => {
        let colorBackground = turn.estado == 'activo' ? 'bg-primary' : 'bg-danger';
        result += `
        <div class="position-relative he-3 d-none d-lg-block">
            <span class=" w-100 text-center text-uppercase rounded-0 fs-6 position-absolute calender-box-item ${colorBackground} text-white fw-light">${turn.especialidad}</span>
        </div>

        <div class="d-inline-block d-lg-none position-absolute he-3">
            <span class="shadow position-absolute calender-box-item ${colorBackground} rounded-circle fw-light"
            style="width:9px;height:9px;"
            ></span>
        </div>

        `
    });

    return result;
}
