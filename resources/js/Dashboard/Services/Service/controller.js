import Service from "../../../Api/Service/api";
import CardBuilder from "../../../helpers/CardBuilder.js";
import bootstrap from "bootstrap/dist/js/bootstrap.bundle.min.js";
import Swal from "sweetalert2";

class ServiceController {

    constructor() {
        this.service = new Service();
    }

    async showPreview(services, containerId = 'servicesContainer', addServiceBtnContainer = 'add-service-btn-container') {
        try {
            let servicesContainer = document.getElementById(containerId);
            if (!servicesContainer) {
                throw new Error('Container not found');

            }
            servicesContainer.innerHTML = ''
            if (services && services.length > 0 && typeof services.forEach === 'function') {
                services.forEach(service => {
                    this.append(service, servicesContainer)
                })
            }
        } catch (e) {
            throw e;
        }
    }


    append(item, itemsContainer) {

        try {
            let uiItem = `

                <td><a href="#"><img class="service-icon" style="width: 40px;height: 40px;border-radius: 10px"
                                     src="${item.cover_image}" alt=""></a></td>
                <td>${item.title}</td>
                <td>${item.status=='active'?'<span class="badge bg-success">Active</span>':'<span class="badge bg-danger">Inactive</span>'}</td>
                <td>

                        <div class="text-danger btn delete-service-btn" style="cursor: pointer" data-id="${item.id}" >Delete</div>
                        <button class="text-primary btn edit-service-btn"  data-id="${item.id}" >Edit</button>
                </td>

            `

            let serviceItem = document.createElement('tr');
            serviceItem.id = `service-${item.id}`;
            serviceItem.innerHTML = uiItem;

            serviceItem.addEventListener('click', async (e) => {
                const editButton = e.target.closest('.edit-service-btn');
                const deleteButton = e.target.classList.contains('delete-service-btn') ? e.target : e.target.closest('.delete-service-btn');
                console.log(editButton, deleteButton)
                if (editButton) {
                    const itemId = editButton.dataset.id;
                    this.edit(itemId);
                }

                if (deleteButton) {
                    const itemId = deleteButton.dataset.id;

                    if (!itemId) {
                        throw new Error('Item id not found');
                    }
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            let response = await this.service.delete(itemId)
                            if (response.response.status === 200) {
                                this.deleteItemFromPreview(itemId, itemsContainer);
                                Swal.fire(response.swalResponse);

                            }
                        } else if (
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            Swal.fire(
                                'Cancelled',
                                'Delete cancelled',
                                'error'
                            )
                        }

                    });

                }
            });

            itemsContainer.appendChild(serviceItem);

        } catch (e) {
            throw e;
        }
//         try {
//             let card = new CardBuilder();
//             card.setCardContainerClass(['col-md-3', 'col-sm-6', 'col-12', 'px-2', 'py-2'])
//
//             card.setCardContainerId('service-' + item.id)
//             card.setCardClass(['h-100', 'custom-card', 'border-0', 'rounded-4', 'shadow-sm']);
//             let eyeStatus = ''
//             if (item.status === 'active') {
//                 eyeStatus = 'fa fa-eye text-success'
//             } else {
//                 eyeStatus = 'fa fa-eye-slash text-danger'
//             }
//
//
//             card.setBody(`
//
// <div class="d-flex justify-content-center">
//      <img  src="${item.cover_image}" class="mw-100 rounded-4" style="object-fit: scale-down" alt="...">
// </div>
//                 <div class="position-absolute bg-light d-flex justify-content-center align-items-center" style="top: 20px;right: 25px;width: 30px;height: 30px;border-radius: 50%;">
//                 <i class="${eyeStatus}  " ></i>
//                 </div>
//                 <p class="card-heading card-name">${item.title}</p>
//
//
//                 <div class="card-actions">
//
//                     <div class="rounded-5 text-danger delete-btn" style="cursor: pointer" data-id="${item.id}">Delete</div>
//                     <button class="custom-btn rounded-5 bg-primary text-white edit-button"  data-id="${item.id}">Edit</button>
//                 </div>
//
//             `);
//             let cardItem = card.build();
//
//             cardItem.addEventListener('click', async (e) => {
//                 const editButton = e.target.closest('.edit-button');
//                 const deleteButton = e.target.classList.contains('delete-btn') ? e.target : e.target.closest('.delete-btn');
//                 if (editButton) {
//                     const itemId = editButton.dataset.id;
//                     this.edit(itemId);
//                 }
//
//                 if (deleteButton) {
//                     const itemId = deleteButton.dataset.id;
//
//                     if (!itemId) {
//                         throw new Error('Item id not found');
//                     }
//                     Swal.fire({
//                         title: 'Are you sure?',
//                         text: "You won't be able to revert this!",
//                         icon: 'warning',
//                         showCancelButton: true,
//                         confirmButtonText: 'Yes, delete!',
//                         cancelButtonText: 'No, cancel!',
//                         reverseButtons: true
//                     }).then(async (result) => {
//                         if (result.isConfirmed) {
//                             let response = await this.destroy(itemId, 'swal', 'json')
//                             if (response.response.status === 200) {
//                                 this.deleteItemFromPreview(itemId, itemsContainer);
//                                 Swal.fire(response.swalResponse);
//
//                             }
//                         } else if (
//                             result.dismiss === Swal.DismissReason.cancel
//                         ) {
//                             Swal.fire(
//                                 'Cancelled',
//                                 'Delete cancelled',
//                                 'error'
//                             )
//                         }
//
//                     });
//
//                 }
//             });
//
//             itemsContainer.appendChild(cardItem);
//
//         } catch (e) {
//             throw e;
//         }
    }

    deleteItemFromPreview(itemId, itemsContainer) {
        try {
            let item = document.getElementById('service-' + itemId);
            if (item) {
                itemsContainer.removeChild(item);
            }
        } catch (e) {
            throw e;
        }
    }

    async edit(id) {
        try {
            this.service.setPreviewType('swal');
            let item = await this.service.show(id);


            let nameInput = document.querySelector('#editServiceForm input[name="title"]');
            console.log(nameInput)
            let statusSelect = document.querySelector('#editServiceForm select[name="status"]');
            let idInput = document.querySelector('#editServiceForm input[name="id"]');


            if (item.response.data.status === 200) {
                console.log(item.response.data.data)


                var myModal = new bootstrap.Modal(document.getElementById('editServiceModal'));

                nameInput.value = item.response.data.data.title;
                statusSelect.value = item.response.data.data.status;
                idInput.value = item.response.data.data.id;

                myModal.show()


            } else {
                throw new Error('Item not found');
            }
        } catch (e) {
            throw e;
        }

    }


}


export default ServiceController
