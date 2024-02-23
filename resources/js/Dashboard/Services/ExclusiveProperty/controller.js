import OffPlan from "../../../Api/OffPlan/api";
import CardBuilder from "../../../helpers/CardBuilder.js";
import routes from "../../../routes.js";
import bootstrap from "bootstrap/dist/js/bootstrap.bundle.min.js";
import Swal from "sweetalert2";

class OffPlanController {

    constructor() {
        this.api = new OffPlan('swal', 'json');
    }

    async showPreview(covers, containerId = 'offPlanContainer') {
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
        card.setCardContainerClass(['col-md-3', 'col-sm-6', 'col-12', 'px-2', 'py-2','overflow-hidden'])

        card.setCardId('service-add');
        card.setCardClass(['h-100','w-100', 'custom-card', 'border-0', 'rounded-4', 'shadow-sm','overflow-hidden']);

        card.setBody(`

            <div class="card-body overflow-hidden h-100 d-flex flex-column justify-content-center align-items-center" style="cursor: pointer;">

                <p class="text-muted">  <svg width="31" height="39" viewBox="0 0 31 39" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.5 8.8453V30.3269" stroke="#A3AED0" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M23.9375 19.5861H7.0625" stroke="#A3AED0" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg><a href="${routes.dashboard.web.project.create.url}" class="text-decoration-none text-secondary">Add A New project</a></p>

            </div>

        `);


        let cardItem = card.build();


        itemsContainer.appendChild(cardItem);
    }

    append(item, itemsContainer) {


        try {
            let card = new CardBuilder();
            card.setCardContainerClass(['col-md-4','col-lg-4','col-xl-4','col-xxl-3', 'col-sm-6', 'col-12', 'px-2', 'py-2'])
            card.setCardContainerStyle('height: 500px')
            card.setCardContainerId('cover-' + item.id)
            card.setCardClass(['h-100', 'custom-card', 'border-0', 'rounded-4', 'shadow-sm']);
            let eyeStatus = ''
            if (item.status === 'active') {
                eyeStatus = 'fa fa-eye text-success'
            } else {
                eyeStatus = 'fa fa-eye-slash text-danger'
            }


            card.setBody(`

                <div class="d-flex justify-content-center h-45">
                     <img  src="${item.cover_image}" class="h-100 w-100 rounded-4" style="object-fit: cover" alt="...">
                </div>
                <div class="position-absolute bg-light d-flex justify-content-center align-items-center" style="top: 20px;right: 25px;width: 30px;height: 30px;border-radius: 50%;">
                    <i class="${eyeStatus}  " ></i>
                </div>
                <div class="d-flex flex-wrap justify-content-start my-2 align-items-center h-5">
                    <img style="width: 30px ;height: 30px;border-radius: 50%" src="${item.manager_image}" alt="">
                    <div class="text-muted mx-2">${item.manager}</div>
                </div>
                <p class="card-heading card-name h-10">${item.name}</p>
                <p class="card-description h-20 overflow-auto">${item.summary ?? ''}</p>


                <div class="row">

<div class="col-4 col d-flex justify-content-center align-items-center px-1">

                    <div class="rounded-5  btn btn-outline-danger delete-btn" style="cursor: pointer" data-id="${item.id}">Delete</div>
</div>
<div class="col-4 col d-flex justify-content-center align-items-center px-1">

                    <a href="${routes.dashboard.web.project.customers.url.replace('{projects}', item.id)}" class="rounded-5  btn btn-outline-primary" style="cursor: pointer" data-id="${item.id}">Customers</a>
</div>
<div class="col-4 col d-flex justify-content-center align-items-center px-1">
                    <a href="${routes.dashboard.web.project.edit.url.replace('{projects}', item.id)}" class="rounded-5  btn btn-primary"  data-id="${item.id}">Edit</a>

</div>
                </div>

            `);
            let cardItem = card.build();

            cardItem.addEventListener('click', async (e) => {

                const deleteButton = e.target.classList.contains('delete-btn') ? e.target : e.target.closest('.delete-btn');
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


}


export default OffPlanController
