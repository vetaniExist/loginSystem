const selectAll = document.getElementById("selectAllChecbox");
const otherSelectCheckboxes = document.getElementsByClassName("checkbox");
const unlockCheckboxes = document.getElementsByClassName("checkbox_unlock");
const deleteCheckboxes = document.getElementsByClassName("checkbox_del");

function initCheckboxes() {
    for (let i = 0; i < otherSelectCheckboxes.length; i += 1) {
        otherSelectCheckboxes[i].addEventListener("input", () => {
            unlockCheckboxes[i].checked = otherSelectCheckboxes[i].checked;
            deleteCheckboxes[i].checked = otherSelectCheckboxes[i].checked;
        });
    }
}

initCheckboxes();

selectAll.addEventListener("click", () => {
    let i = 0;
    for (let checkbox of otherSelectCheckboxes) {
        checkbox.checked = selectAll.checked;
        unlockCheckboxes[i].checked = selectAll.checked;
        deleteCheckboxes[i++].checked = selectAll.checked;
    }
});