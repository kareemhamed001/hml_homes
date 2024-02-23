import Feedback from "../../../Api/Feedback/api";
import CardBuilder from "../../../helpers/CardBuilder.js";
import bootstrap from "bootstrap/dist/js/bootstrap.bundle.min.js";
import Swal from "sweetalert2";

class FeedbackController {

    constructor() {
        this.feedback = new Feedback();
    }

    async showPreview(feedbacks, containerId = 'feedbacksContainer', addFeedbackBtnContainer = 'add-feedback-btn-container') {
        try {
            let feedbacksContainer = document.getElementById(containerId);
            if (!feedbacksContainer) {
                throw new Error('Container not found');

            }
            feedbacksContainer.innerHTML = ''
            if (feedbacks && feedbacks.length > 0 && typeof feedbacks.forEach === 'function') {
                feedbacks.forEach(feedback => {
                    this.append(feedback, feedbacksContainer)
                })
            }
        } catch (e) {
            throw e;
        }
    }


    append(item, itemsContainer) {

        try {
            let rateItems = '';
            for (let i = 0; i < item.rate; i++) {
                rateItems += `<i class="fas fa-star rating-color"></i>`
            }
            for (let i = 0; i < 5 - item.rate; i++) {
                rateItems += `<i class="far fa-star"></i>`
            }
            let uiItem = `

                <td><a href="#"><img class="feedback-icon" style="width: 40px;height: 40px;border-radius: 10px"
                                     src="${item.user_image}" alt=""></a></td>
                <td>${item.user_name}</td>
                <td>${item.comment}</td>
                <td>${rateItems} </td>
                <td>${item.status == 'active' ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>'}</td>
                <td>

                        <div class="text-danger btn delete-feedback-btn" style="cursor: pointer" data-id="${item.id}" >Delete</div>
                        <button class="text-primary btn edit-feedback-btn"  data-id="${item.id}" >Edit</button>
                </td>

            `

            let feedbackItem = document.createElement('tr');
            feedbackItem.id = `feedback-${item.id}`;
            feedbackItem.innerHTML = uiItem;

            feedbackItem.addEventListener('click', async (e) => {
                const editButton = e.target.closest('.edit-feedback-btn');
                const deleteButton = e.target.classList.contains('delete-feedback-btn') ? e.target : e.target.closest('.delete-feedback-btn');
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
                            let response = await this.feedback.delete(itemId)
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

            itemsContainer.appendChild(feedbackItem);

        } catch (e) {
            throw e;
        }
//         try {
//             let card = new CardBuilder();
//             card.setCardContainerClass(['col-md-3', 'col-sm-6', 'col-12', 'px-2', 'py-2'])
//
//             card.setCardContainerId('feedback-' + item.id)
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
            let item = document.getElementById('feedback-' + itemId);
            if (item) {
                itemsContainer.removeChild(item);
            }
        } catch (e) {
            throw e;
        }
    }

    async edit(id) {
        try {
            this.feedback.setPreviewType('swal');
            let item = await this.feedback.show(id);


            let nameInput = document.querySelector('#editFeedbackForm input[name="user_name"]');
            let commentInput = document.querySelector('#editFeedbackForm input[name="comment"]');
            let rateInput = document.querySelector('#editFeedbackForm select[name="rate"]');
            let statusSelect = document.querySelector('#editFeedbackForm select[name="status"]');
            let idInput = document.querySelector('#editFeedbackForm input[name="id"]');


            if (item.response.data.status === 200) {
                console.log(item.response.data.data)


                var myModal = new bootstrap.Modal(document.getElementById('editFeedbackModal'));

                nameInput.value = item.response.data.data.user_name;
                commentInput.value = item.response.data.data.comment;
                rateInput.value = item.response.data.data.rate;
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


export default FeedbackController
