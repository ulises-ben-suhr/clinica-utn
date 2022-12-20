let date = [
     {
       'monthDate': 'Jan',
       'monthES': 'Enero',
       'days': 31 
     },
     {
        'monthDate': 'Feb',
        'monthES': 'Febrero',
        'days': 28
      },
      {
        'monthDate': 'Mar',
        'monthES': 'Marzo',
        'days': 31 
      },
      {
        'monthDate': 'Apr',
        'monthES': 'Abril',
        'days': 30
      },
      {
        'monthDate': 'May',
        'monthES': 'Mayo',
        'days': 31
      },
      {
        'monthDate': 'Jun',
        'monthES': 'Junio',
        'days': 30
      },
      {
        'monthDate': 'Jul',
        'monthES': 'Julio',
        'days': 31
      },
      {
        'monthDate': 'Aug',
        'monthES': 'Agosto',
        'days': 31
      },
      {
        'monthDate': 'Sep',
        'monthES': 'Septiembre',
        'days': 30
      },
      {
        'monthDate': 'Oct',
        'monthES': 'Octubre',
        'days': 31
      },
      {
        'monthDate': 'Nov',
        'monthES': 'Noviembre',
        'days': 30
      },
      {
        'monthDate': 'Dec',
        'monthES': 'Diciembre',
        'days': 31
      },

];

let daysName = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];

export function getDayOfDate(day, month, year){
    let dateObject = new Date(createStringDate(day,month,year));
    let dayNumber = dateObject.getDay();
    return dayNumber == 0 ? 6 : dayNumber - 1;
    // return daysName.indexOf(dateObject.getDay());
    // return daysName[dateObject.getDay()];
}

export function createStringDate(day, month, year){
    return `${month} ${day} ${year}`
}

export function getMonthActually(){
    var today = new Date();
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    return mm;
}

export function getYearActually(){
    var today = new Date();
    var yyyy = today.getFullYear();
    return yyyy;
}

// function getDateOfMonth: Devuelve un objeto, con la información del mes, su abreviatura y sus días.

export function getDateOfMonth(month, year ){

    let dateMonth = date[month - 1];

    if(month == 2 && isLeapYear(year)){
        dateMonth.days = 29;
        return dateMonth;
    }
    
    return dateMonth;
};


// isLeapYear tiene guardada una funcion que devuelve si un año es bisiesto

let isLeapYear = (year) => {
    return ((year % 4 == 0) && (year % 100 != 0 )) || (year % 400 == 0);
}