$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "¿Ya llenaste todo?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});

function submitForm(){
    // Initiate Variables With Form Content
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var telefono = $("#telefono").val();
    var producto = $("#producto").val();
    var mensaje = $("#mensaje").val();
    

    $.ajax({
        type: "POST",
        url: "php/form-process.php",
        data: "nombre=" + nombre + "&email=" + email +"&telefono=" + telefono + "&producto=" + producto +"&mensaje=" + mensaje,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "¡Mensaje Enviado!")
}

function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-warning";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}

