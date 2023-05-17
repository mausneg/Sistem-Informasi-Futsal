$(".flasher-button").click(function () { 
    $(".container-flasher").hide();
});
document.getElementsByClassName("notification")[0].addEventListener("mouseenter",function(){
    openList(this,"Notification")
})
document.getElementsByClassName("profile")[0].addEventListener("mouseenter",function(){
    openList(this,"Profile")
})
function openList(className,title){
    document.getElementsByClassName("notification")[0].style.border = "none"
    document.getElementsByClassName("profile")[0].style.border = "none"
    document.getElementsByClassName("container-header")[0].style.zIndex = "1"
    document.querySelectorAll('body >*:not(.header)').forEach(e => e.style.filter = "blur(5px)")
    document.body.style.backdropFilter = "blur(5px)"
    const list = document.getElementsByClassName("header-list")[0]
    const listTitle = document.getElementsByClassName("list-title")[0]
    listTitle.innerHTML = title
    list.removeAttribute("hidden")
    list.style.display = "flex"
    list.style.zIndex = "1"
    className.style.border = "solid #777E76"
}
document.getElementsByClassName("container-header")[0].addEventListener("mouseleave",function(){
    document.getElementsByClassName("header-list")[0].style.display = "none"
    document.getElementsByClassName("profile")[0].style.border = "none"
    document.getElementsByClassName("notification")[0].style.border = "none"
    document.querySelectorAll('body >*:not(.header)').forEach(e => e.style.filter = "none")
    document.body.style.backdropFilter = "none"
    document.getElementsByClassName("header-list")[0].setAttribute("hidden","hidden")
})
Array.from(document.getElementsByClassName("navbar-list")[0].children).forEach(e =>{
    e.addEventListener("mouseenter",function(){
        const home = document.getElementById("home")
        home.classList.remove("list-select")
        e.classList.add("list-select")
        Array.from(home.firstElementChild.children).forEach(f => {
        f.classList.remove("text-list-select")
        f.classList.add("text-list-unselect")
        })
        Array.from(e.firstElementChild.children).forEach(f => {
            f.classList.add("text-list-select")
            f.classList.remove("text-list-unselect")
        })
    })
    e.addEventListener("mouseleave",function(){
        const home = document.getElementById("home")
        home.classList.add("list-select")
        e.classList.remove("list-select")
        Array.from(home.firstElementChild.children).forEach(f => {
        f.classList.add("text-list-select")
        f.classList.remove("text-list-unselect")
        })
        Array.from(e.firstElementChild.children).forEach(f => {
            f.classList.remove("text-list-select")
            f.classList.add("text-list-unselect")
        })
    })
})
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
const currDate = new Date()
var currDay = currDate.getDay()
var currDayNo = currDate.getDate()
function mainSchedule(){
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
    const currMonth = monthNames[currDate.getMonth()]
    const currYear = currDate.getFullYear()
    $(".schedule-month").html(currMonth)
    $(".schedule-year").html(currYear)   
    generateListSchedule(currDay,currDayNo)
}
function generateListSchedule(argDay,argDate){
    const dayNames = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
    for (let i = 0; i < 4; i++) {
        const currDay = dayNames[(argDay+i)%7]
        const listSchedule = document.createElement("div")
        const dayDiv = document.createElement("div")
        const dateDiv = document.createElement("div")
        const day = document.createTextNode(currDay)
        const date = document.createTextNode(argDate+i)
        dayDiv.appendChild(day)
        dateDiv.appendChild(date)
        dayDiv.classList.add("schedule-list-header")
        dateDiv.classList.add("schedule-list-body")
        listSchedule.appendChild(dayDiv)
        listSchedule.appendChild(dateDiv)
        $(".schedule-list").append(listSchedule);
    }
}
mainSchedule()
$(".schedule-right").click(function() {
    function isLeapYear(year){
        return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 ===0)
    }
    function getFebDays(year){
        return isLeapYear(year) ? 29 : 28
    }
    let dayOfMonth = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
    const check = dayOfMonth[currDate.getMonth()]
    console.log(check)
    if(currDayNo+4 > check) return
    $(".schedule-list").children().remove()
    generateListSchedule(++currDay,++currDayNo)
});
$(".schedule-left").click(function() {
    const check = currDate.getDate()
    if(currDayNo-1 < check) return
    $(".schedule-list").children().remove()
    generateListSchedule(--currDay,--currDayNo)
});
var daySelect = null
var monthSelect = null
var yearSelect = null
function mainCalendar() {
    let calendar = document.querySelector('.calendar')
    const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
    function isLeapYear(year){
    return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 ===0)
    }
    function getFebDays(year){
        return isLeapYear(year) ? 29 : 28
    }
    generateCalendar = (month, year) => {   
        let calendar_days = calendar.querySelector('.calendar-days')
        let calendar_header_year = calendar.querySelector('#year')
        let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
        calendar_days.innerHTML = ''
        let currDate = new Date()
        if (month <= currDate.getMonth() && year <= currDate.getFullYear()){
            month = currDate.getMonth()   
            year = currDate.getFullYear()
        } 
        let curr_month = `${month_names[month]}`
        month_picker.innerHTML = curr_month
        calendar_header_year.innerHTML = year
        let first_day = new Date(year, month, 1)
        for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
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
            let tempMonth =  $(".month-picker").html();
            let tempYear = parseInt($("#year").html());
            month_names.forEach(function(e,i) {
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
    month_names.forEach((e, index) => {
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
var timeSelect = []
generateTimeList()
$(".time-list").children().click(function() { 
    const time = parseInt(this.innerHTML)
    timeSelect.push(time)
    timeSelect = [...new Set(timeSelect)];
    timeSelect.sort(function(a, b){return a - b})
    $(this).addClass("selected");
});
$(".book-reset").click(function () { 
    fieldSelect = null
    timeSelect = []
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
    console.log(fieldSelect,timeSelect,daySelect,monthSelect,yearSelect)
});