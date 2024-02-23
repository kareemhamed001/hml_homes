import Loader from "@/helpers/Loader";
import Project from "./api.js";
import Swal from "sweetalert2";
import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.min.js'

Loader.show()
document.addEventListener('DOMContentLoaded', () => {
    Loader.hide()
})

let registrationForm = document.querySelectorAll('.registration-form')

registrationForm.forEach(form => {
    form.addEventListener('submit', async (e) => {
        e.preventDefault()
        let formData = new FormData(form)
        let projectId= form.dataset.projectId

        if (!projectId) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Project Id is required',
                confirmButtonColor: '#3B4D81',
            })
            return false
        }

        if (!formData.get('email')) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email is required',
                confirmButtonColor: '#3B4D81',
            })
            return false
        }

        if (!formData.get('phone')) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Phone is required',
                confirmButtonColor: '#3B4D81',
            })
            return false
        }

        form.reset()


        let project = new Project()
        let response = await project.register(projectId,formData)
        console.log(response)
        if (response.response.status === 200) {
            Swal.fire(response.swalResponse)
        }
    })
})

const projectImages = document.querySelectorAll('.project-img')

//make the image clickable and open the modal
projectImages.forEach(image => {
    image.addEventListener('click', () => {
        console.log(image.src)
        let modal = document.querySelector('#image-modal')
        let modalImage = modal.querySelector('.modal-body img')
        modalImage.src = image.src
        //show the modal
        bootstrap.Modal.getOrCreateInstance(modal).show()
    })
})
