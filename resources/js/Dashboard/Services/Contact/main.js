import ContactController from "./controller.js";
import Contact from "../../../Api/Contact/api";
import Swal from "sweetalert2";
import ExceptionHandler from "../../../helpers/ExceptionHandler.js";
import PaginationHelper from "../../../helpers/pagination";

let contactController = new ContactController();
let ContactApi = new Contact();


let perPageSelect = document.getElementById('perPage');
let currentPage = 1;
let perPage=10

if (perPageSelect){
    perPage= perPageSelect.value;
    perPageSelect.addEventListener('change', async (e) => {
        perPage = e.target.value;
        listContacts(currentPage, perPage, 'swal', 'json')

    })
}

function onPageChange(page) {
    currentPage = page;
}


async function listContacts(currentPage=1, perPage=1, previewType='swal', responseType='json') {
    try {
        let contacts = await ContactApi.list(currentPage, perPage, previewType, responseType);

        if (contacts.response.status === 200) {
            console.log(contacts.response.data.data.data);
            await contactController.showPreview(contacts.response.data.data.data, 'contactsContainer');
           await PaginationHelper.showPagination(contacts.response.data.data, 'contactsPagination',onPageChange,listContacts, 'swal', 'json')
        }
    }catch (e) {
        ExceptionHandler(e)
    }

}

listContacts(currentPage, perPage, 'swal', 'json')


