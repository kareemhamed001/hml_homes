import ServiceController from "./controller.js";
import Service from "../../../Api/Service/api";
import Swal from "sweetalert2";
import ExceptionHandler from "../../../helpers/ExceptionHandler.js";
import PaginationHelper from "../../../helpers/pagination";

let serviceController = new ServiceController();
let ServiceApi = new Service();

let addServiceForm = document.getElementById('addServiceForm');
let editServiceForm = document.getElementById('editServiceForm');
let perPageSelect = document.getElementById('perPage');


let currentPage = 1;
let perPage=10
if (addServiceForm) {
    addServiceForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let data = new FormData(addServiceForm);
        ServiceApi.setData(data)
        ServiceApi.setPreviewType('swal');
        let response = await ServiceApi.store();
        listServices(currentPage, perPage, 'swal', 'json')
        Swal.fire(response.swalResponse);
    });
}

if (editServiceForm) {
    editServiceForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let data = new FormData(editServiceForm);
        let id=data.get('id');
        ServiceApi.setData(data)
        console.log(data)
        ServiceApi.setPreviewType('swal');

        let response = await ServiceApi.update(id);
        listServices(currentPage, perPage, 'swal', 'json')

        Swal.fire(response.swalResponse);
    });
}



if (perPageSelect){
    perPage= perPageSelect.value;
    perPageSelect.addEventListener('change', async (e) => {
        perPage = e.target.value;
        listServices(currentPage, perPage, 'swal', 'json')

    })
}

function onPageChange(page) {
    currentPage = page;
}


async function listServices(currentPage=1, perPage=1, previewType='swal', responseType='json') {
    try {
        let services = await ServiceApi.list(currentPage, perPage, previewType, responseType);

        if (services.response.status === 200) {
            console.log(services.response.data.data.data);
            await serviceController.showPreview(services.response.data.data.data, 'servicesContainer');
           await PaginationHelper.showPagination(services.response.data.data, 'servicesPagination',onPageChange,listServices, 'swal', 'json')
        }
    }catch (e) {
        ExceptionHandler(e)
    }

}

listServices(currentPage, perPage, 'swal', 'json')


