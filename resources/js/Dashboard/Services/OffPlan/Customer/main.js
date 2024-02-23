import CustomerController from "./controller.js";
import OffPlan from "../../../../Api/OffPlan/api";
import Swal from "sweetalert2";
import ExceptionHandler from "../../../../helpers/ExceptionHandler.js";
import PaginationHelper from "../../../../helpers/pagination";

let customerController = new CustomerController();
let CustomerApi = new OffPlan();


let perPageSelect = document.getElementById('perPage');
let currentPage = 1;
let perPage=10

if (perPageSelect){
    perPage= perPageSelect.value;
    perPageSelect.addEventListener('change', async (e) => {
        perPage = e.target.value;
        listCustomers(currentPage, perPage, 'swal', 'json')

    })
}

function onPageChange(page) {
    currentPage = page;
}


async function listCustomers(currentPage=1, perPage=1, previewType='swal', responseType='json') {
    try {
        let customerTableBody = document.getElementById('customersContainer');
        let projectId = customerTableBody.dataset.projectId;
        if (!projectId) {
            throw new Error('Project Id is required')
        }
        let customers = await CustomerApi.listCustomers(projectId,currentPage, perPage, previewType, responseType);

        if (customers.response.status === 200) {
            await customerController.showPreview(customers.response.data.data.data, 'customersContainer');
           await PaginationHelper.showPagination(customers.response.data.data, 'customersPagination',onPageChange,listCustomers, 'swal', 'json')
        }
    }catch (e) {
        ExceptionHandler(e)
    }

}

listCustomers(currentPage, perPage, 'swal', 'json')


