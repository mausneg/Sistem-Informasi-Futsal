document.getElementsByClassName("show-hide")[0].addEventListener("click",function(){
    showHide("password","eye-icon-pass")
})
document.getElementsByClassName("show-hide")[1].addEventListener("click",function(){
    showHide("confirm","eye-icon-conf")
})
function showHide(className,id){
    const password = document.getElementsByClassName(className)[0]
    const eyeIcon = document.getElementById(id)
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
}
$('.password, .confirm').on('keyup', function () {
    if ($('.password').val() == $('.confirm').val()) {
        $('.message').html('Matching').css('color', 'green')
        $(".btn-register").removeAttr("disabled");
    } else{
        $('.message').html('Not Matching').css('color', 'red')
        $(".btn-register").attr("disabled", "disabled");
    }
});