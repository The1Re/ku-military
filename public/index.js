const editBtn = document.getElementById('editBtn')

editBtn?.addEventListener('click', () => {
    swal({
        title: "Are you sure?",
        text: "Once edited, you will not be able to revert the changes!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willEdit) => {
        if (willEdit) {
            editBtn.type = 'submit'
            editBtn.click()
        }
    });
})