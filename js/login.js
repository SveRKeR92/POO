$('button').click(function (e) {
    e.preventDefault();
});


$('#login').click(function () {
    let data = $('#login-form').serializeArray();
    
    if($('#email').val() && $('#password').val()){
        console.log(data);
        $.ajax({
            url: "../Functions.php?function=login",
            method: "POST",
            dataType: "json",
            data: data,
            success:function(response){
                console.log(response);
            }
        });
    }else{
        console.log("inputs vides");
    }
});

$('#signup').click(function () {
    let data = $('#signup-form').serializeArray();
    if($('#email').val() && $('#password').val() && $('#pseudo').val()){
        console.log(data);
        $.ajax({
            url: "../Functions.php?function=signup",
            method: "POST",
            dataType: "json",
            data: data,
            success:function(response){
                console.log(response);
            }
        });
    }else{
        console.log("inputs vides");
    }
});