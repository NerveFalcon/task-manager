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