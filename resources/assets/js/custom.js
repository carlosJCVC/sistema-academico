toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

window.notification = (type, message) => {
    switch (type) {
        case 'info':
            //toastr["success"]("My name is Inigo Montoya. You killed my father. Prepare to die!", "hi carlos")
            toastr.info(message);
            break;

        case 'warning':
            toastr.warning(message);
            break;

        case 'success':
            toastr.success(message);
            break;

        case 'error':
            toastr.error(message);
            break;
    }
}

module.exports = delete_action = (e) => {
    e.preventDefault();
    console.log(e)
    console.log(e.target.form)
    Swal.fire({
        title: 'Estas seguro!',
        text: 'Estas seguro de eliminar este registro ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'hsl(120, 50%, 50%, 1)',
        cancelButtonColor: 'hsl(0, 50%, 50%, 1)',
        confirmButtonText: 'Yes !!'
    }).then(({ value }) => {
        if (value) {
            e.target.form.submit()
        }
    })
};

module.exports = restore_action = (e) => {
    e.preventDefault();
    console.log(e)
    console.log(e.target.form)
    Swal.fire({
        title: 'Estas seguro!',
        text: 'Estas seguro de restaurar la base de datos ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'hsl(120, 50%, 50%, 1)',
        cancelButtonColor: 'hsl(0, 50%, 50%, 1)',
        confirmButtonText: 'Yes !!'
    }).then(({ value }) => {
        if (value) {
            e.target.form.submit()
        }
    })
};

// window.swal_delete = (e) => {
//     console.log('swal_delete');
//     console.log(e)
//     console.log(e.target.form)
//     Swal.fire({
//         title: 'Estas seguro!',
//         text: 'Estas seguro de eliminar este registro ?',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: 'hsl(120, 50%, 50%, 1)',
//         cancelButtonColor: 'hsl(0, 50%, 50%, 1)',
//         confirmButtonText: 'Yes !!'
//         // title: 'Está seguro de querer eliminar?',
//         // buttons: ['No,cancelar', 'Si, estoy seguro!'],
//     }).then((willDelete) => {
//         if (willDelete.value) { // aka se procesa cuando es true
//             console.log(e)
//             console.log(e.target.form)
//             console.log(willDelete)
//             e.target.form.submit()
//         }
//     });
// }

