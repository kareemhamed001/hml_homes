import ExclusiveProperty from "./api.js";
import CardBuilder from "../../../helpers/CardBuilder";
import routes from "../../../routes.js";

class ExclusivePropertyController {

    constructor() {
        this.exclusiveProperty = new ExclusiveProperty();
    }

    async list(page, perPage = 10, previewType = "swal", responseType = "json", headers = null, showLoader = true) {
        this.exclusiveProperty.setPreviewType(previewType);
        this.exclusiveProperty.setResponseType(responseType);
        this.exclusiveProperty.setHeaders(headers);
        return await this.exclusiveProperty.list(page, perPage, showLoader);
    }

    async store(data, previewType = "swal", responseType = "json", headers = null) {
        this.exclusiveProperty.setData(data);
        this.exclusiveProperty.setPreviewType(previewType);
        this.exclusiveProperty.setResponseType(responseType);
        this.exclusiveProperty.setHeaders(headers);
        return await this.exclusiveProperty.store();
    }

    async update(id, data, previewType = "swal", responseType = "json", headers = null) {
        this.exclusiveProperty.setData(data);
        this.exclusiveProperty.setPreviewType(previewType);
        this.exclusiveProperty.setResponseType(responseType);
        this.exclusiveProperty.setHeaders(headers);
        return await this.exclusiveProperty.update(id);
    }

    async destroy(id, previewType = "swal", responseType = "json", headers = null) {
        this.exclusiveProperty.setPreviewType(previewType);
        this.exclusiveProperty.setResponseType(responseType);
        this.exclusiveProperty.setHeaders(headers);


        return await this.exclusiveProperty.delete(id);
    }

    async show(id, previewType = "swal", responseType = "json", headers = null) {
        this.exclusiveProperty.setPreviewType(previewType);
        this.exclusiveProperty.setResponseType(responseType);
        this.exclusiveProperty.setHeaders(headers);
        return await this.exclusiveProperty.show(id);
    }


    static showPreview(exclusiveProperties, containerId = 'exclusivePropertiesContainer') {
        try {
            let exclusivePropertiesContainer = document.getElementById(containerId);

            if (!exclusivePropertiesContainer)
                throw new Error('ExclusiveProperty Container Not Found');

            exclusivePropertiesContainer.innerHTML = '';
            if (exclusiveProperties && exclusiveProperties.length > 0 && typeof exclusiveProperties.forEach === 'function') {
                exclusiveProperties.forEach(exclusivePropertyItem => {
                    this.append(exclusivePropertyItem, exclusivePropertiesContainer)
                })
            }

        } catch (e) {
            throw e;
        }
    }

    static append(item, itemsContainer) {

        try {

            let uiItem=document.createElement('div');
            uiItem.classList.add('col-6', 'col-md-4', 'p-2', 'my-2','exclusiveProperty-item');
            uiItem.innerHTML = `



                <div class="card border-0 p-0 shadow-sm h-100">
                    <div class="card-body p-0">
                        <div class="exclusiveProperty-item-img-container">
                            <img   src="${item.cover_image}" alt="">
                        </div>

                        <div class="p-3 h-60">
                            <h4 class="exclusiveProperty-item-title">
                               ${item.name}
                            </h4>
                            <p class="exclusiveProperty-item-description">
                                ${item.summary??''}
                            </p>

                            <div class="my-2 exclusiveProperty-item-price ">
                                 ${item.price??''}
                            </div>

                            <div class="hl">
                            </div>
                            <div class="d-flex justify-content-center align-items-center exclusiveProperty-item-btn-container">
                                <a class="exclusiveProperty-item-btn" href="${routes.client.web.project.show.url.replace('{project}', item.id)}">Read More</a>
                            </div>
                        </div>


                    </div>
                </div>

            `

            itemsContainer.appendChild(uiItem)


        } catch (e) {
            throw e;
        }
    }

    static async showPagination(pagination, containerId = 'pagination', callback = null,listExclusiveProperties, previewType = 'swal', responseType = 'json') {
        try {
            let paginationContainer = document.getElementById(containerId);
            paginationContainer.innerHTML = '';

            let pages = Math.ceil(pagination.total / pagination.per_page);

            let paginationItemsContainer = document.createElement('ul');
            paginationItemsContainer.classList.add('pagination', 'p-1');

            // Calculate the total number of pages
            let maxPages = Math.min(pages, 10);

            // Calculate the start and end of the current set of pages
            let startPage = Math.max(1, pagination.current_page - Math.floor(maxPages / 2));
            let endPage = Math.min(pages, startPage + maxPages - 1);

            // Add "Previous" button
            if (pagination.current_page > 1) {
                let prevPaginationItem = document.createElement('li');
                prevPaginationItem.classList.add('custom-page-item');
                let prevPaginationLink = document.createElement('a');
                prevPaginationLink.classList.add('custom-page-link');
                prevPaginationLink.setAttribute('href', '#');
                prevPaginationLink.innerText = 'Previous';
                prevPaginationItem.appendChild(prevPaginationLink);
                paginationItemsContainer.appendChild(prevPaginationItem);

                prevPaginationLink.addEventListener('click', async (e) => {
                    e.preventDefault();

                    let prevPage = Math.max(1, pagination.current_page - 10);


                    await listExclusiveProperties(prevPage, pagination.per_page, previewType, responseType);

                });
            }

            // Add page links
            for (let i = startPage; i <= endPage; i++) {
                let paginationItem = document.createElement('li');
                paginationItem.classList.add('custom-page-item');
                let paginationLink = document.createElement('a');
                paginationLink.classList.add('custom-page-link');
                paginationLink.setAttribute('href', '#');
                paginationLink.innerText = i;

                if (i === pagination.current_page) {
                    paginationItem.classList.add('active');
                }

                paginationItem.appendChild(paginationLink);
                paginationItemsContainer.appendChild(paginationItem);

                paginationLink.addEventListener('click', async (e) => {
                    e.preventDefault();
                    if (callback) {
                        callback(i);
                    }
                     await listExclusiveProperties(i, pagination.per_page, previewType, responseType);

                });
            }

            // Add "Next" button
            if (pagination.current_page < pages) {
                let nextPage = Math.min(pages, endPage + 1);
                let nextPaginationItem = document.createElement('li');
                nextPaginationItem.classList.add('custom-page-item');
                let nextPaginationLink = document.createElement('a');
                nextPaginationLink.classList.add('custom-page-link');
                nextPaginationLink.setAttribute('href', '#');
                nextPaginationLink.innerText = 'Next';
                nextPaginationItem.appendChild(nextPaginationLink);
                paginationItemsContainer.appendChild(nextPaginationItem);

                nextPaginationLink.addEventListener('click', async (e) => {
                    e.preventDefault();

                     await listExclusiveProperties(nextPage, pagination.per_page, previewType, responseType);

                });
            }

            paginationContainer.appendChild(paginationItemsContainer);

        } catch (e) {
            console.error(e.message);
            throw e;
        }
    }

}


export default ExclusivePropertyController
