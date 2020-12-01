$('button').click(function (e) {
    e.preventDefault();
});

$('#friendsButton').click(function () {

    $.ajax({
        url: "../Functions.php?function=friendsList",
        method: "GET",
        dataType: "json",
        success:function(response){
            // location.href= "../Public/profil.php";
            // console.log(response);

            var friends = response

            $("#friendsList").append('<h2>Liste d\'amis</h2>');
            friends.forEach((item, index) => {
                $("#friendsList").append('<li>'+ (index + 1) + ' ' + item["pseudo"] + '</li><br>');
            });
        }
    });
});