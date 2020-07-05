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
        'December',
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


class AnalogClock {
    /**
     * @param {CanvasRenderingContext2D} ctx
     */
    constructor(ctx) {
        this.ctx = ctx;
        this.on_resize();
        window.addEventListener('resize', () => this.on_resize());
    }

    draw_radial(angle, start, end) {
        const half = this.size / 2;
        this.ctx.beginPath();
        this.ctx.moveTo(half + Math.sin(angle) * start, half - Math.cos(angle) * start);
        this.ctx.lineTo(half + Math.sin(angle) * end, half - Math.cos(angle) * end);
        this.ctx.closePath();
        this.ctx.stroke();
    }

    draw_bits() {
        this.ctx.lineWidth = 6;
        const half = this.size / 2;
        for (let i = 0; i < 12; i++) {
            const angle = 2 * Math.PI * (i / 12);
            this.draw_radial(angle, 0.92 * half, 0.98 * half);
        }
    }

    draw() {
        this.ctx.clearRect(0, 0, this.size, this.size);

        this.draw_bits();
        const now = new Date();

        const half = this.size / 2;
        const PI2 = 2 * Math.PI;
        const angle_millisec = PI2 * now.getMilliseconds() / 1000;
        const angle_sec = PI2 * now.getSeconds() / 60 + angle_millisec / 60;
        const angle_min = PI2 * now.getMinutes() / 60 + angle_sec / 60;
        const angle_hour = PI2 * (now.getHours() % 12) / 12 + angle_min / 12;

        this.ctx.lineWidth = 2;
        this.draw_radial(angle_sec, 0, half * 0.9);
        this.ctx.lineWidth = 4;
        this.draw_radial(angle_min, 0, half * 0.8);
        this.ctx.lineWidth = 8;
        this.draw_radial(angle_hour, 0, half * 0.5);
    }

    on_resize() {
        // resizeするとstrokeStyleがリセットされる
        const style = this.ctx.strokeStyle;
        this.size = Math.max(2 * this.ctx.canvas.scrollHeight, 400);
        this.ctx.canvas.width = this.ctx.canvas.height = this.size;
        this.ctx.strokeStyle = style;
    }

    start() {
        this.timer = setInterval(() => this.draw(), 50);
    }

    stop() {
        clearInterval(this.timer);
    }
}

// TODO: 日付表示

function startAnalogClock() {
    const date = document.querySelector('#date');
    const time = document.querySelector('#time');
    const canvas = document.createElement('canvas');

    date.innerText = time.innerText = '';
    canvas.style.width = canvas.style.height = '25vh';
    time.appendChild(canvas);

    const ctx = canvas.getContext('2d');
    // TODO: color from css
    ctx.strokeStyle = 'white';

    const analogClock = new AnalogClock(ctx);
    analogClock.start();
}


window.addEventListener('DOMContentLoaded', () => {
    const params = new URL(document.location).searchParams;
    switch (params.get('clock_type')) {
        case 'analog':
            startAnalogClock();
            break;
        default:
            setInterval(() => showClock(), 1000);
    }
});
