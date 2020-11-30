$('#create').click(function () {
    let sond = $('#createSond').serializeArray();

    if ($("#title").val() && $('#q1').val() && $('#q2').val() && $('#q3').val() && $('#q4').val()) {
        $.ajax({
            url: "../Functions.php?function=createSond",
            method: "POST",
            data: sond,
            success:function(response){
                location.href('index.php');
            }
        });
    }else{
        alert("veuillez tout remplir");
    }
});