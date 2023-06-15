$("#home").css("backgroundColor", "white");
$(".fa-house,.list-text-home").addClass("text-list-select");
var baseurl = "http://localhost/Sistem-Informasi-Futsal/public/"

document.getElementsByClassName("info-sintetis")[0].addEventListener("mouseenter",function(){
    const text = "This type of field is a futsal field whose surface uses synthetic grass, this artificial grass can be installed according to the size of the futsal field.This type of field is enjoyed by many futsal players because when they fall it doesn't hurt too much and doesn't cause injuries."
    enterInfo(text,-60,90,this)
})
document.getElementsByClassName("info-sintetis")[0].addEventListener("mouseleave",function(){
    leaveInfo(this)
})
document.getElementsByClassName("info-vinyl")[0].addEventListener("mouseenter",function(){
    const text = "This type of floor made of PVC base material generally has three layers in the form of a compact layer, a glass fiber layer and a printing layer. The thickness varies from 4mm, 4.5mm, 6mm and 8mm, and so on, this type of floor is very good because it is safer for players when they fall and does not cause injury because the surface is smooth and soft, and easy and inexpensive to maintain, just clean. just cleaning the floor as usual."
    enterInfo(text,440,90,this)
})
document.getElementsByClassName("info-vinyl")[0].addEventListener("mouseleave",function(){
    leaveInfo(this)
})
function enterInfo(text,x,y,thisClass){
    const select = document.getElementsByClassName("info-select")[0]
    select.innerHTML = text
    select.style.display = "flex"
    select.style.transform = "translate(" + x + "px," + y + "px)"
    select.style.backdropFilter = "blur(8px)"
    thisClass.style.transform = "scale(1.1,1.1)"
    select.removeAttribute("hidden")
}
function leaveInfo(thisClass){
    const select = document.getElementsByClassName("info-select")[0]
    select.style.display = "none"
    thisClass.style.transform = "scale(1,1)"
    select.innerHTML = ""
    select.setAttribute("hidden","hidden")
}
document.getElementsByClassName("btn-schedule")[0].addEventListener("click",function(){
    choose("content-schedule","content-book","content-btn-schedule","content-btn-book","content-booking","content-info")
    document.getElementsByClassName("content-main")[0].style.height = "270px"
})
document.getElementsByClassName("btn-book")[0].addEventListener("click",function(){
    choose("content-book","content-schedule","content-btn-book","content-btn-schedule","content-info","content-booking")
    document.getElementsByClassName("content-main")[0].style.height = "auto"
    document.getElementsByClassName("content-main")[0].style.width = "auto"
})
function choose(show1,hide1,show2,hide2,show3,hide3){
    const contentShow = document.getElementsByClassName(show1)[0]
    const contentHide = document.getElementsByClassName(hide1)[0]
    const bgShow = document.getElementsByClassName(show2)[0]
    const bgHide = document.getElementsByClassName(hide2)[0]
    const chooseShow = document.getElementsByClassName(show3)[0]
    const chooseHide = document.getElementsByClassName(hide3)[0]
    contentShow.removeAttribute("hidden")
    contentShow.style.display = "flex"
    contentHide.setAttribute("hidden","hidden")
    contentHide.style.display = "none"
    bgShow.style.backgroundColor = "var(--bg-first)"
    bgHide.style.backgroundColor = "transparent"
    chooseShow.style.display = "none"
    chooseHide.style.display = "flex"
    chooseShow.removeAttribute("hidden")
    chooseHide.setAttribute("hidden","hidden")
}
const date = new Date()
var scheduleDate = date.getDate()
var scheduleMonth = date.getMonth()
scheduleDate = scheduleDate - ((scheduleDate-1)%4)

var scheduleYear = date.getFullYear()
const dayNames = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
function isLeapYear(year){
return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 ===0)
}
function getFebDays(year){
    return isLeapYear(year) ? 29 : 28
}
function scheduleData(response,currDate,currMonth,currYear,i){
    console.log(response)
    const currDay = new Date(currYear, currMonth, currDate).getDay();
    const words = response.split(" ")
    console.log(words)
    const headList = $("<div class = 'schedule-list-header'>" + dayNames[(currDay+i)%7] + "</div>")
    const bodyList = $("<div class = 'schedule-list-body'>" + (currDate+i) + "</div>")
    let j = 0
    while(j < words.length-2) {
        const list = $("<div></div>")
        let k = j
        $(list).append($("<div>" + words[k].replace(/`/g, '') +"</div>"))
        $(list).append($("<div>" + words[++k] +"</div>"))
        j = ++k
        $(bodyList).append(list);
    }
    const container = $("<div></div>")
    $(container).append(headList)
    $(container).append(bodyList)
    $(".schedule-list").append(container);
}
function getSchedule(date,month,year,i) {
    const schedule = {
        date : date+i,
        month : month,
        year : year,
    }
    console.log(schedule)
    $.ajax({
        type: "POST",
        url: baseurl+"home/getSchedule",
        data: {schedule : schedule},
        success: function(response) {
            scheduleData(response,date,month,year,i)
        },
    })
}
function generateSchedule(currDate,currMonth,currYear){
    const date = new Date()
    let daysOfMonth = [31, getFebDays(currYear), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
    $(".schedule-list").html("");
    if(currDate < 1){
        scheduleMonth--
        scheduleDate = daysOfMonth[scheduleMonth] - (daysOfMonth[scheduleMonth]%4) + 1
        currDate = scheduleDate
        currMonth = scheduleMonth
    }
    if(currDate > daysOfMonth[currMonth]){
        scheduleDate = 1
        scheduleMonth++
        currDate = scheduleDate
        currMonth = scheduleMonth
    }
    if(scheduleMonth > 11){
        scheduleMonth = 0
        currMonth = scheduleMonth
        scheduleYear++
        currYear = scheduleYear
    }
    $(".schedule-month").html(monthNames[currMonth])
    $(".schedule-year").html(currYear)
    let delay = 0
    for (let i = 0; i < 4; i++) {
        if(currDate+i < date.getDate() - ((date.getDate()-1)%4) && currMonth <= date.getMonth() && currYear <= date.getFullYear()) continue
        if(currDate+i > daysOfMonth[currMonth]){
            return
        } 
        setTimeout(function () {
            getSchedule(currDate, currMonth, currYear, i)
          }, delay)
        delay += 30
    }

}
function schedule(){
    const date = new Date()
    let currDate = date.getDate()
    const currMonth = date.getMonth()
    const currYear = date.getFullYear()
    currDate = currDate - ((currDate-1)%4)
    generateSchedule(currDate,currMonth,currYear)
}
schedule()

$(".schedule-right").click(function (e) { 
    scheduleDate+=4
    generateSchedule(scheduleDate,scheduleMonth,scheduleYear)
});
$(".schedule-left").click(function (e) { 
    const date = new Date()
    let currDate = date.getDate()
    const currMonth = date.getMonth()
    const currYear = date.getFullYear()
    currDate = currDate - ((currDate-1)%4)
    if(scheduleDate-4 < currDate && scheduleMonth-1 < currMonth && scheduleYear <= currYear) return
    scheduleDate-=4
    generateSchedule(scheduleDate,scheduleMonth,scheduleYear)

});
var daySelect = null
var monthSelect = null
var yearSelect = null
function mainCalendar() {
    let calendar = document.querySelector('.calendar')
    generateCalendar = (month, year) => {   
        let calendar_days = calendar.querySelector('.calendar-days')
        let calendar_header_year = calendar.querySelector('#year')
        let daysOfMonth = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
        calendar_days.innerHTML = ''
        let currDate = new Date()
        if (month <= currDate.getMonth() && year <= currDate.getFullYear()){
            month = currDate.getMonth()   
            year = currDate.getFullYear()
        } 
        let curr_month = `${monthNames[month]}`
        month_picker.innerHTML = curr_month
        calendar_header_year.innerHTML = year
        let first_day = new Date(year, month, 1)
        for (let i = 0; i <= daysOfMonth[month] + first_day.getDay() - 1; i++) {
            let day = document.createElement('div')
            if (i >= first_day.getDay()) {
                day.classList.add('calendar-day-hover')
                day.innerHTML = i - first_day.getDay() + 1
                if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                    day.classList.add('curr-date')
                }
            }
            calendar_days.appendChild(day)
        }
        $(".calendar-days").children().click(function () { 
            let tempDay = parseInt(this.innerHTML)
            let currDayNo = currDate.getDate()
            let tempMonth =  $(".month-picker").html();
            let tempYear = parseInt($("#year").html());
            monthNames.forEach(function(e,i) {
                if(e == tempMonth){
                    tempMonth = i
                    return
                }
            })
            if(tempDay <= currDayNo && tempMonth <= currDate.getMonth() && tempYear <= currDate.getFullYear() || isNaN(tempDay)) return
            daySelect = tempDay
            monthSelect = tempMonth
            yearSelect = tempYear
            $(".calendar-days").children().removeClass("selected");
            $(this).addClass("selected");
        });
    }
    let month_list = calendar.querySelector('.month-list')
    monthNames.forEach((e, index) => {
        let month = document.createElement('div')
        month.innerHTML = `<div data-month="${index}">${e}</div>`
        month.querySelector('div').onclick = () => {
            month_list.classList.remove('show')
            curr_month.value = index
            generateCalendar(index, curr_year.value)
        }
        month_list.appendChild(month)
    })
    let month_picker = calendar.querySelector('#month-picker')
    month_picker.onclick = () => {
        month_list.classList.add('show')
    }
    let currDate = new Date()
    let curr_month = {value: currDate.getMonth()}
    let curr_year = {value: currDate.getFullYear()}
    generateCalendar(curr_month.value, curr_year.value)
    document.querySelector('#prev-year').onclick = () => {
        let prevCurrYear = curr_year.value - 1
        if (prevCurrYear < currDate.getFullYear()) return 
        --curr_year.value
        generateCalendar(curr_month.value, curr_year.value)
    }
    document.querySelector('#next-year').onclick = () => {
        ++curr_year.value
        generateCalendar(curr_month.value, curr_year.value)
    }
}
mainCalendar()
document.getElementsByClassName("book-field")[0].addEventListener("click",function(){
    clickList("field-list","field-dropdown")
})
document.getElementsByClassName("book-time")[0].addEventListener("click",function(){
    clickList("time-list","time-dropdown")
})
function clickList(className,idIcon) {
    const list = document.getElementsByClassName(className)[0]
    const icon = document.getElementById(idIcon)
    if (list.getAttribute("hidden")) {
        list.removeAttribute("hidden")
        if (className === "time-list") list.style.display = "grid"
        else list.style.display = "flex"
        icon.classList.remove("fa-chevron-down")
        icon.classList.add("fa-chevron-up")
    } else {
        list.setAttribute("hidden","hidden")
        list.style.display = "none"
        icon.classList.remove("fa-chevron-up")
        icon.classList.add("fa-chevron-down")
    }
}
var fieldSelect = null
$(".field-list").children().click(function() {
    $(".field-list").children().removeClass("selected");
    $(".field-list").children().children().eq(1).addClass("field-price");
    $(".field-list").children().children().eq(3).addClass("field-price");
    fieldSelect = this.querySelector("h4").innerHTML
    $(this).addClass("selected");
    $(this).children().removeClass("field-price");
});
function generateTimeList(){
    const timeList = document.getElementsByClassName("time-list")[0]
    for (let i = 8; i < 24; i++) {
        const list = document.createElement("li")
        let textList = null
        textList = i + ":00"
        if (i<10) textList = "0" + textList
        const text = document.createTextNode(textList)
        list.appendChild(text)
        timeList.appendChild(list)
    }
}
var timeSelect = null
generateTimeList()
$(".time-list").children().click(function() { 
    $(".time-list").children().removeClass("selected");
    const time = parseInt(this.innerHTML)
    timeSelect = time
    $(this).addClass("selected");
});
$(".book-reset").click(function () { 
    fieldSelect = null
    timeSelect = null
    daySelect = null
    monthSelect = null
    yearSelect = null
    $(".time-list").children().removeClass("selected");
    $(".field-list").children().removeClass("selected");
    $(".field-list").children().children().eq(1).addClass("field-price");
    $(".field-list").children().children().eq(3).addClass("field-price");
    $(".calendar-days").children().removeClass("selected");
});
$(".book-done").click(function() { 
    const data = {
        field: fieldSelect,
        time: timeSelect,
        day: daySelect,
        month: monthSelect,
        year: yearSelect
    }
    for(let key in data){
        if(data[key] == null){
            $(".message-done").html("Pilih Data Booking!").css("color","red");
            return
        }
    }
    $.ajax({
        type: "POST",
        url: baseurl+"home/booking",
        data: {bookingData: data} ,
        success: function (response) {
            window.location.assign(baseurl+"payment")
        },
        error: function(xhr, status, error) {
            console.log('Error: ' + error);
          }
    });
});