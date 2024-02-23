import Contact from "../../../Api/Contact/api";
import CardBuilder from "../../../helpers/CardBuilder.js";
import bootstrap from "bootstrap/dist/js/bootstrap.bundle.min.js";
import Swal from "sweetalert2";

class ContactController {

    constructor() {
        this.contact = new Contact();
    }

    async showPreview(contacts, containerId = 'contactsContainer', addContactBtnContainer = 'add-contact-btn-container') {
        try {
            let contactsContainer = document.getElementById(containerId);
            if (!contactsContainer) {
                throw new Error('Container not found');

            }
            contactsContainer.innerHTML = ''
            if (contacts && contacts.length > 0 && typeof contacts.forEach === 'function') {
                contacts.forEach(contact => {
                    this.append(contact, contactsContainer)
                })
            }
        } catch (e) {
            throw e;
        }
    }


    append(item, itemsContainer) {

        try {
            let uiItem = `


                <td>${item.name ?? ''}</td>
                <td>${item.phone ?? ''}</td>
                <td>${item.email ?? ''}</td>
                <td>${item.message ?? ''}</td>

                <td>

                        <div class="text-danger btn delete-contact-btn" style="cursor: pointer" data-id="${item.id}" >Delete</div>

                </td>

            `

            let contactItem = document.createElement('tr');
            contactItem.id = `contact-${item.id}`;
            contactItem.innerHTML = uiItem;

            contactItem.addEventListener('click', async (e) => {
                const editButton = e.target.closest('.edit-contact-btn');
                const deleteButton = e.target.classList.contains('delete-contact-btn') ? e.target : e.target.closest('.delete-contact-btn');
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
                            let response = await this.contact.delete(itemId)
                            if (response.response.status === 200) {
                                this.deleteItemFromPreview(itemId, itemsContainer);
                                Swal.fire(response.swalResponse);

                            }
                        }

                    });

                }
            });

            itemsContainer.appendChild(contactItem);

        } catch (e) {
            throw e;
        }
    }

    deleteItemFromPreview(itemId, itemsContainer) {
        try {
            let item = document.getElementById('contact-' + itemId);
            if (item) {
                itemsContainer.removeChild(item);
            }
        } catch (e) {
            throw e;
        }
    }


}


export default ContactController
