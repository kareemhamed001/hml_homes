import Swal from "sweetalert2";
function ExceptionHandler(error) {
    console.error(error)
    if (error.response) {
        if (error?.response.status === 422) {
            let errors = error?.response.data.errors;
            let message = '';
            for (let error in errors) {
                message += errors[error][0] + '\n';
            }
            Swal.fire({
                title: 'Error!',
                text: message,
                icon: 'error',
                confirmButtonText: 'Ok',
                confirmButtonColor: '#3B4D81',
            })
        } else {
            Swal.fire({
                title: 'Error!',
                text: error?.response.data.message,
                icon: 'error',
                confirmButtonText: 'Ok',
                confirmButtonColor: '#3B4D81',
            })
        }
    }  else {
        Swal.fire({
            title: 'Error!',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'Ok',
            confirmButtonColor: '#3B4D81',
        })
    }

}

export default ExceptionHandler;
