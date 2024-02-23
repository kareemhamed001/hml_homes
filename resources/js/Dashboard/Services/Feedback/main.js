import FeedbackController from "./controller.js";
import Feedback from "../../../Api/Feedback/api";
import Swal from "sweetalert2";
import ExceptionHandler from "../../../helpers/ExceptionHandler.js";
import PaginationHelper from "../../../helpers/pagination";

let feedbackController = new FeedbackController();
let FeedbackApi = new Feedback();

let addFeedbackForm = document.getElementById('addFeedbackForm');
let editFeedbackForm = document.getElementById('editFeedbackForm');
let perPageSelect = document.getElementById('perPage');


let currentPage = 1;
let perPage=10
if (addFeedbackForm) {
    addFeedbackForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let data = new FormData(addFeedbackForm);
        FeedbackApi.setData(data)
        FeedbackApi.setPreviewType('swal');
        let response = await FeedbackApi.store();
        listFeedbacks(currentPage, perPage, 'swal', 'json')
        Swal.fire(response.swalResponse);
    });
}

if (editFeedbackForm) {
    editFeedbackForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let data = new FormData(editFeedbackForm);
        let id=data.get('id');
        FeedbackApi.setData(data)
        console.log(data)
        FeedbackApi.setPreviewType('swal');

        let response = await FeedbackApi.update(id);
        listFeedbacks(currentPage, perPage, 'swal', 'json')

        Swal.fire(response.swalResponse);
    });
}



if (perPageSelect){
    perPage= perPageSelect.value;
    perPageSelect.addEventListener('change', async (e) => {
        perPage = e.target.value;
        listFeedbacks(currentPage, perPage, 'swal', 'json')

    })
}

function onPageChange(page) {
    currentPage = page;
}


async function listFeedbacks(currentPage=1, perPage=1, previewType='swal', responseType='json') {
    try {
        let feedbacks = await FeedbackApi.list(currentPage, perPage, previewType, responseType);

        if (feedbacks.response.status === 200) {
            console.log(feedbacks.response.data.data.data);
            await feedbackController.showPreview(feedbacks.response.data.data.data, 'feedbacksContainer');
           await PaginationHelper.showPagination(feedbacks.response.data.data, 'feedbacksPagination',onPageChange,listFeedbacks, 'swal', 'json')
        }
    }catch (e) {
        ExceptionHandler(e)
    }

}

listFeedbacks(currentPage, perPage, 'swal', 'json')


