import CoverController from "./controller.js";
import Cover from "../../../Api/CoverImage/api";
import Swal from "sweetalert2";
import ExceptionHandler from "../../../helpers/ExceptionHandler.js";
import PaginationHelper from "../../../helpers/pagination";

let coverController = new CoverController();
let CoverApi = new Cover();

let addCoverForm = document.getElementById('addCoverForm');
let editCoverForm = document.getElementById('editCoverForm');
let perPageSelect = document.getElementById('perPage');



let currentPage = 1;
let perPage=12
if (addCoverForm) {
    addCoverForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let data = new FormData(addCoverForm);
        console.log(data.get('image'))
        CoverApi.setData(data)
        CoverApi.setPreviewType('swal');
        let response = await CoverApi.store();
        listCovers(currentPage, perPage, 'swal', 'json')

        Swal.fire(response.swalResponse);
    });
}

if (editCoverForm) {
    editCoverForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let data = new FormData(editCoverForm);
        let id=data.get('id');
        CoverApi.setData(data)
        CoverApi.setPreviewType('swal');

        let response = await CoverApi.update(id);
        listCovers(currentPage, perPage, 'swal', 'json')

        Swal.fire(response.swalResponse);
    });
}


if (perPageSelect){
    perPage= perPageSelect.value;
    perPageSelect.addEventListener('change', async (e) => {
        perPage = e.target.value;
        listCovers(currentPage, perPage, 'swal', 'json')

    })
}

function onPageChange(page) {
    currentPage = page;
}


async function listCovers(currentPage=1, perPage=1, previewType='swal', responseType='json') {
    try {
        let covers = await CoverApi.list(currentPage, perPage, true);
        if (covers.response.status === 200) {
            await coverController.showPreview(covers.response.data.data.data, 'coversContainer');
            await PaginationHelper.showPagination(covers.response.data.data, 'coversPagination',onPageChange,listCovers, 'swal', 'json')
        }
    }catch (e) {
        ExceptionHandler(e)
    }

}

listCovers(currentPage, perPage, 'swal', 'json')


