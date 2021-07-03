require('./bootstrap');
window.addEventListener("load", () => {
    deleteForm = document.querySelectorAll(".delete");
    deleteForm.forEach(element => {
        element.addEventListener("click", function (event) {
            if (!confirm('Sei sicuro di voler cancellare questo elemento?')) {
                event.preventDefault();
            }
        })
    });
})
