/**
 * Created by miyano on 17/06/29.
 */
function keta (num) {
    if (10 > num) return '0' + num;
    return num.toString();
}

function monthname(num) {
    const months = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];
    if (num > 11) return false;
    return months[num];
}
function addOrdinal(num) {
    if (num >= 11 && num < 14) return num + "th";
    switch (num % 10) {
        case 1:
            return num + "st";
        case 2:
            return num + "nd";
        case 3:
            return num + "rd";
        default:
            return num + "th";
    }
}
function showClock() {
    const nowTime = new Date();
    const nowYear = nowTime.getFullYear();
    const nowMonth = monthname(nowTime.getMonth());
    const nowDay = addOrdinal(nowTime.getDate());
    const nowHour = nowTime.getHours();
    const nowMin = keta(nowTime.getMinutes());
    const nowSec = keta(nowTime.getSeconds());
    document.getElementById('date').innerHTML = `${nowMonth} ${nowDay} ${nowYear}`;
    document.getElementById('time').innerHTML = `${nowHour}:${nowMin}<span style='font-size:35px'>${nowSec}</span>`;
}
//showClock();
setInterval(()=>showClock(), 1000);
