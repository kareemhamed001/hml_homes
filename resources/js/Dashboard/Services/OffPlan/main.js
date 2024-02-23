import OffPlanController from "./controller.js";
import OffPlan from "../../../Api/OffPlan/api";
import ExceptionHandler from "../../../helpers/ExceptionHandler.js";
import PaginationHelper from "../../../helpers/pagination";

let offPlanController = new OffPlanController();
let offPlanApi = new OffPlan();


let currentPage = 1;
let perPage = 12


function onPageChange(page) {
    currentPage = page;
}


async function listOffPlans(currentPage = 1, perPage = 1, previewType = 'swal', responseType = 'json') {
    try {


        let offPlans = await offPlanApi.list(currentPage, perPage, true);
        if (offPlans.response.status === 200) {
            await offPlanController.showPreview(offPlans.response.data.data.data, 'offPlansContainer');
            await PaginationHelper.showPagination(offPlans.response.data.data, 'offPlansPagination', onPageChange, listOffPlans, 'swal', 'json')
        }


    } catch (e) {
        console.error(e.message)
        ExceptionHandler(e)
    }

}

listOffPlans(currentPage, perPage, 'swal', 'json')


