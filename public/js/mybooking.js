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
function contentBtn(e) { 
    $(".content-btn").children().children().removeClass("btn-select");
    $(".content-btn").children().children().addClass("btn-unselect");
    $(e).removeClass("btn-unselect");
    $(e).addClass("btn-select");
}
$(".btn-all").click(() => contentBtn(".btn-all"));
$(".btn-ongoing").click(() => contentBtn(".btn-ongoing"));
$(".btn-end").click(() => contentBtn(".btn-end"));
$(".btn-cancel").click(() => contentBtn(".btn-cancel"));