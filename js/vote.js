$('#vote').click(function(){
    let data = [];
    data.push($('input:checked').val()); 
    
    data.push($('#sondage_container').attr('class'));
    console.log(data);

    $.ajax({
        url: "../Functions.php?function=vote",
        method: "POST",
        dataType: "json",
        data: {data},
        success:function(response){
            $('#sondage_container').empty();
            $('#sondage_container').append("<p>Merci d'avoir voté!</p>");      
        }
    });
})