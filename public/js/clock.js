/**
 * Created by miyano on 17/06/29.
 */
function keta(num) {
    var ret;
    if (10 > num) {
        ret = "0" + num;
    } else {
        ret = num;
    }
    return ret;
}
function monthname(num) {
    var months;
    months = ["January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"];
    if( num > 11 ){
        return false;
    }else{
        return months[num];
    }
}
function addOrdinal(num){
    switch (num){
        case 11:
        case 12:
        case 13:
            return num + "th";
        default:
            switch ( num % 10 ){
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
}
function showClock() {
    var nowTime = new Date();
    var nowYear = nowTime.getFullYear();
    var nowMonth = monthname(nowTime.getMonth());
    var nowDay = addOrdinal(nowTime.getDate());
    var nowHour = nowTime.getHours();
    var nowMin = keta(nowTime.getMinutes());
    var nowSec = keta(nowTime.getSeconds());
    document.getElementById("date").innerHTML = nowMonth + " " + nowDay + ", " + nowYear;
    document.getElementById("time").innerHTML = nowHour + ":" + nowMin + "<span style='font-size:35px'> " + nowSec;
}
//showClock();
setInterval('showClock()',1000);
