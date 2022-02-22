function triggerClick() {
    document.querySelector('#pi').click();
}
function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.querySelector(#profileDisplay).setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.file[0]);
    }
}