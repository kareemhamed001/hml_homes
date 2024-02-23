import PartnerController from "./controller.js";
import Partner from "../../../Api/Partner/api";
import Swal from "sweetalert2";
import ExceptionHandler from "../../../helpers/ExceptionHandler.js";
import PaginationHelper from "../../../helpers/pagination";

let partnerController = new PartnerController();
let PartnerApi = new Partner();

let addPartnerForm = document.getElementById('addPartnerForm');
let editPartnerForm = document.getElementById('editPartnerForm');
let perPageSelect = document.getElementById('perPage');


let currentPage = 1;
let perPage=10
if (addPartnerForm) {
    addPartnerForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let data = new FormData(addPartnerForm);
        PartnerApi.setData(data)
        PartnerApi.setPreviewType('swal');
        let response = await PartnerApi.store();
        listPartners(currentPage, perPage, 'swal', 'json')
        Swal.fire(response.swalResponse);
    });
}

if (editPartnerForm) {
    editPartnerForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let data = new FormData(editPartnerForm);
        let id=data.get('id');
        PartnerApi.setData(data)
        console.log(data)
        PartnerApi.setPreviewType('swal');

        let response = await PartnerApi.update(id);
        listPartners(currentPage, perPage, 'swal', 'json')

        Swal.fire(response.swalResponse);
    });
}



if (perPageSelect){
    perPage= perPageSelect.value;
    perPageSelect.addEventListener('change', async (e) => {
        perPage = e.target.value;
        listPartners(currentPage, perPage, 'swal', 'json')

    })
}

function onPageChange(page) {
    currentPage = page;
}


async function listPartners(currentPage=1, perPage=1, previewType='swal', responseType='json') {
    try {
        let partners = await PartnerApi.list(currentPage, perPage, previewType, responseType);

        if (partners.response.status === 200) {
            console.log(partners.response.data.data.data);
            await partnerController.showPreview(partners.response.data.data.data, 'partnersContainer');
           await PaginationHelper.showPagination(partners.response.data.data, 'partnersPagination',onPageChange,listPartners, 'swal', 'json')
        }
    }catch (e) {
        ExceptionHandler(e)
    }

}

listPartners(currentPage, perPage, 'swal', 'json')


