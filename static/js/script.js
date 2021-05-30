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

function selectPossible(elem) {
    option = `<option name="selected" selected onclick="unselectPossible(this)" value="${elem.value}">${elem.text}</option>`;
    document.getElementById("selected").innerHTML += option;
    Delete(elem)
}

function unselectPossible(elem) {
    let possible = document.getElementById("possible");
    option = `<option onclick="selectPossible(this)" value="${elem.value}">${elem.text}</option>`;
    option += possible.innerHTML;
    possible.innerHTML = option;
    Delete(elem)

    document.getElementById("selected").childNodes.forEach(element => {
        element.selected = true;
    });
}

function Delete(elem) {
    elem.remove();

}