function selectPossible(elem) {
    option = `<option name="selected" onclick="unselectPossible(this)" value="${elem.value}">${elem.text}</option>`;
    document.getElementById("selected").innerHTML += option;
    Delete(elem)
}
function unselectPossible(elem) {
    option = `<option onclick="selectPossible(this)" value="${elem.value}">${elem.text}</option>`;
    option += document.getElementById("possible").innerHTML;
    document.getElementById("possible").innerHTML = option;
    Delete(elem)
}
function Delete(elem) {
    elem.remove();

}