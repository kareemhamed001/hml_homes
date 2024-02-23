import ExclusivePropertyController from "./controller.js";
import ExclusiveProperty from "../../../Api/ExclusiveProperty/api";
import ExceptionHandler from "../../../helpers/ExceptionHandler.js";
import PaginationHelper from "../../../helpers/pagination";

let exclusivePropertyController = new ExclusivePropertyController();
let exclusivePropertyApi = new ExclusiveProperty();


let currentPage = 1;
let perPage = 12


function onPageChange(page) {
    currentPage = page;
}


async function listExclusiveProperties(currentPage = 1, perPage = 1, previewType = 'swal', responseType = 'json') {
    try {


        let exclusiveProperties = await exclusivePropertyApi.list(currentPage, perPage, true);
        if (exclusiveProperties.response.status === 200) {
            await exclusivePropertyController.showPreview(exclusiveProperties.response.data.data.data, 'exclusivePropertiesContainer');
            await PaginationHelper.showPagination(exclusiveProperties.response.data.data, 'exclusivePropertiesPagination', onPageChange, listExclusiveProperties, 'swal', 'json')
        }


    } catch (e) {
        console.error(e.message)
        ExceptionHandler(e)
    }

}

listExclusiveProperties(currentPage, perPage, 'swal', 'json')


