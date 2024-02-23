import ExclusiveProperty from "./api";
import ExclusivePropertyController from "./controller";
import ExceptionHandler from "@/helpers/ExceptionHandler";
import pagination from "@/helpers/pagination";

let exclusivePropertyApi = new ExclusiveProperty();

let currentPage = 1;
let perPage=12


function onPageChange(page) {
    console.log(page);
    currentPage = page;
}

async function listExclusiveProperties(page = 1, perPage = 6) {
    try {
        let exclusivePropertyResponse = await exclusivePropertyApi.list(page, perPage);
        if (exclusivePropertyResponse.response && exclusivePropertyResponse.response.data && exclusivePropertyResponse.response.data.data.data) {

            ExclusivePropertyController.showPreview(exclusivePropertyResponse.response.data.data.data, 'exclusiveProperties-container');

            await ExclusivePropertyController.showPagination(exclusivePropertyResponse.response.data.data, 'pagination-container', onPageChange, listExclusiveProperties);


        }
    } catch (e) {
        console.error(e)
        ExceptionHandler(e)
    }
}

listExclusiveProperties(currentPage,perPage);
