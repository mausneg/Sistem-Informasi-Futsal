$(".flasher-button").click(function () { 
    $(".container-flasher").hide();
});
document.getElementsByClassName("show-hide")[0].addEventListener("click",function(){
    const password = document.getElementsByClassName("password")[0]
    const eyeIcon = document.getElementById("eye-icon")
    if (password.type === "password"){
        password.type = "text"
        eyeIcon.classList.add("fa-eye")
        eyeIcon.classList.remove("fa-eye-slash")
    } 
    else {
        password.type = "password"
        eyeIcon.classList.remove("fa-eye")
        eyeIcon.classList.add("fa-eye-slash") 
    }
})
