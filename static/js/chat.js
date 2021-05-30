function UpdateChat() {

    $.ajax({
        url: "",
        type: "POST",
        data: {},
        success: function(res) {
            $("#chat").html(res);
        },
        complete: function(res) {
            console.log(res);
        }
    });

}

// $("#formChat").submit(function(event) {
//     event.preventDefault();
//     var sel = document.getElementById('inputChat');
//     var text = sel.value;
//     // inputChat = $("#inputChat").val();
//     $.ajax({
//         url: "",
//         type: "POST",
//         data: {
//             text: text
//         },
//         dataType: 'json',
//         success: function (res) {
//             console.log(res);
//         },
//         complete: function(res){
//             console.log(res);
//         }
//     });

// });

setInterval(UpdateChat, 1000);