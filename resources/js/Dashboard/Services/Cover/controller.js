import CoverImage from "../../../Api/CoverImage/api";
import CardBuilder from "../../../helpers/CardBuilder.js";
import bootstrap from "bootstrap/dist/js/bootstrap.bundle.min.js";
import Swal from "sweetalert2";

class CoverController {

    constructor() {
        this.api = new CoverImage('swal', 'json');
    }

    async showPreview(covers, containerId = 'coversContainer') {
        try {
            let coversContainer = document.getElementById(containerId);
            if (!coversContainer) {
                throw new Error('Container not found');

            }
            coversContainer.innerHTML = ''
            if (covers && covers.length > 0 && typeof covers.forEach === 'function') {
                covers.forEach(cover => {
                    this.append(cover, coversContainer)
                })
            }
                this.addItemCard(coversContainer);
        } catch (e) {
            throw e;
        }
    }

    addItemCard(itemsContainer) {
        let card = new CardBuilder();
        card.setCardContainerClass(['col-md-3', 'col-sm-6', 'col-12', 'px-2', 'py-2'])

        card.setCardId('service-add');
        card.setCardClass(['h-100', 'custom-card', 'border-0', 'rounded-4', 'shadow-sm']);

        card.setBody(`

            <div class="card-body h-100 d-flex flex-column justify-content-center align-items-center" style="cursor: pointer;">
               <svg width="31" height="39" viewBox="0 0 31 39" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.5 8.8453V30.3269" stroke="#A3AED0" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M23.9375 19.5861H7.0625" stroke="#A3AED0" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

                <p class="text-muted">Add A New Cover</p>
            </div>

        `);


        card.setCardAttribute('data-bs-toggle', 'modal');
        card.setCardAttribute('data-bs-target', '#addCoverModal');

        let cardItem = card.build();


        itemsContainer.appendChild(cardItem);
    }

    append(item, itemsContainer) {


        try {
            let card = new CardBuilder();
            card.setCardContainerClass(['col-md-3', 'col-sm-6', 'col-12', 'px-2', 'py-2'])

            card.setCardContainerId('cover-' + item.id)
            card.setCardClass(['h-100', 'custom-card', 'border-0', 'rounded-4', 'shadow-sm']);
            let eyeStatus = ''
            if (item.status === 'active') {
                eyeStatus = 'fa fa-eye text-success'
            } else {
                eyeStatus = 'fa fa-eye-slash text-danger'
            }


            card.setBody(`

<div class="d-flex justify-content-center">
     <img  src="${item.image}" class="mw-100 rounded-4" style="object-fit: scale-down" alt="...">
</div>
                <div class="position-absolute bg-light d-flex justify-content-center align-items-center" style="top: 20px;right: 25px;width: 30px;height: 30px;border-radius: 50%;">
                <i class="${eyeStatus}  " ></i>
                </div>
                <p class="card-heading card-name">${item.name}</p>


                <div class="card-actions">

                    <div class="rounded-5 text-danger delete-btn" style="cursor: pointer" data-id="${item.id}">Delete</div>
                    <button class="custom-btn rounded-5 bg-primary text-white edit-button"  data-id="${item.id}">Edit</button>
                </div>

            `);
            let cardItem = card.build();

            cardItem.addEventListener('click', async (e) => {
                const editButton = e.target.closest('.edit-button');
                const deleteButton = e.target.classList.contains('delete-btn') ? e.target : e.target.closest('.delete-btn');
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
                            let response = await this.api.delete(itemId)
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

            itemsContainer.appendChild(cardItem);

        } catch (e) {
            throw e;
        }
    }

    deleteItemFromPreview(itemId, itemsContainer) {
        try {
            let item = document.getElementById('cover-' + itemId);
            if (item) {
                itemsContainer.removeChild(item);
            }
        } catch (e) {
            throw e;
        }
    }

    async edit(id) {
        try {
            this.api.setPreviewType('swal');
            let item = await this.api.show(id);


            let nameInput = document.querySelector('#editCoverForm input[name="name"]');
            let descriptionInput = document.querySelector('#editCoverForm input[name="description"]');
            let statusSelect = document.querySelector('#editCoverForm select[name="status"]');
            let idInput = document.querySelector('#editCoverForm input[name="id"]');

            if (item.response.data.status === 200) {


                var myModal = new bootstrap.Modal(document.getElementById('editCoverModal'));


                nameInput.value = item.response.data.data.name;
                descriptionInput.value = item.response.data.data.description;
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


export default CoverController
