$(".flasher-button").click(function () { 
    $(".container-flasher").html("")
});
$(".cancel-delete").click(function () {   
    $(".pop-delete").hide();    
});
$(".notification").mouseenter(function () { 
    openList(this,"Notification")
    $(".header-list-profile").hide();
    $(".header-list-notif").removeAttr("hidden");
    $(".header-list-notif").css("display", "flex");
    $(".header-list-notif").css("zIndex", "1");
});
$(".profile").mouseenter(function () { 
    openList(this,"Profile")
    $(".header-list-notif").hide()
    $(".header-list-profile").removeAttr("hidden");
    $(".header-list-profile").css("display", "flex");
    $(".header-list-profile").css("zIndex", "1");
});
function openList(className,title){
    $(".notification").css("border", "none");
    $(".profile").css("border", "none");
    $(".container-header").css("zIndex", "1");
    document.querySelectorAll('body >*:not(.header)').forEach(e => e.style.filter = "blur(5px)")
    $("body").css("backdropFilter", "blur(5px)");
    $(".list-title").html(title);
    className.style.border = "solid #777E76";
}
$(".container-header").mouseleave(function () { 
    $(".header-list-profile,.header-list-notification").css("style", "none");
    $(".profile,.notification").css("border", "none");
    document.querySelectorAll('body >*:not(.header)').forEach(e => e.style.filter = "none")
    $("body").css("backdropFilter", "none");
    $(".header-list-profile,.header-list-notif").hide();
});
$(".edit").click(function () { 
    $(this).hide();
    $(".confirm-btn,.confirm-password,.confirm-password-text,.change-password,.delete-account").show();
    $(".confirm-btn,.change-password,.delete-account").css("display","flex");
    $("input").removeAttr("disabled");
    $(".email").attr("readonly","readonly");
    $(".password").val("");
});
$(".cancel").click(function () { 
    location.reload()
});
$(".delete-account").click(function (e) { 
    $(".pop-delete").show().css("display","flex");    
});
$(".old-password,.username,.contact").on("keyup", function (){
    $(".confirm-password").attr("required", "required");
})
$(".change-password").click(function () { 
    $(this).hide();
    $(".old-password").val("");
    $(".confirm-password").val("");
    $(".old-password-text").html("Old Password");
    $(".confirm-password-text").html("New Password");
    $(".message").hide();    
});
$(".old-password,.confirm-password").on("keyup", function (){
    if($(".message").is(":hidden")){
        $(".save").removeAttr("disabled");
        return
    }
    if ($(".old-password").val() == $(".confirm-password").val()) {
        $(".message").html("Matching").css("color", "green")
        $(".save").removeAttr("disabled");
    } else{
        $(".message").html("Not Matching").css("color", "red")
        $(".save").attr("disabled", "disabled");
    }
});
