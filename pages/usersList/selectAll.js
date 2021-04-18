const selectAll = document.getElementById("selectAllChecbox");
const otherSelectCheckboxes = document.getElementsByClassName("checkbox");

selectAll.addEventListener("click", () => {
    for (let checkbox of otherSelectCheckboxes) {
        checkbox.checked = selectAll.checked;
    }
});