$('#create').click(function () {
    let sond = $('#createSond').serializeArray();

    if ($("#title").val() && $('#q1').val() && $('#q2').val()) {
        $.ajax({
            url: "../Functions.php?function=createSond",
            method: "POST",
            dataType: "json",
            data: sond,
            success:function(response){
                location.href('index.php');
            }
        });
    }else{
        console.log("Titre et au moins deux questions obligatoires");
    }
});