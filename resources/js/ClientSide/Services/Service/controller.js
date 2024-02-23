import Service from "../../Api/service/api.js";
import CardBuilder from "../../../helpers/CardBuilder.js";

class ServiceController {

    constructor() {
        this.service = new Service();
    }

    async list(page, perPage = 10, previewType = "swal", responseType = "json", headers = null, showLoader = true) {
        this.service.setPreviewType(previewType);
        this.service.setResponseType(responseType);
        this.service.setHeaders(headers);
        return await this.service.list(page, perPage, showLoader);
    }

    async store(data, previewType = "swal", responseType = "json", headers = null) {
        this.service.setData(data);
        this.service.setPreviewType(previewType);
        this.service.setResponseType(responseType);
        this.service.setHeaders(headers);
        return await this.service.store();
    }

    async update(id, data, previewType = "swal", responseType = "json", headers = null) {
        this.service.setData(data);
        this.service.setPreviewType(previewType);
        this.service.setResponseType(responseType);
        this.service.setHeaders(headers);
        return await this.service.update(id);
    }

    async destroy(id, previewType = "swal", responseType = "json", headers = null) {
        this.service.setPreviewType(previewType);
        this.service.setResponseType(responseType);
        this.service.setHeaders(headers);


        return await this.service.delete(id);
    }

    async show(id, previewType = "swal", responseType = "json", headers = null) {
        this.service.setPreviewType(previewType);
        this.service.setResponseType(responseType);
        this.service.setHeaders(headers);
        return await this.service.show(id);
    }


    static showPreview(services, containerId = 'servicesContainer') {
        try {
            let servicesContainer = document.getElementById(containerId);
            if (!servicesContainer)
                throw new Error('Services Container not found');
            if (services && services.length > 0 && typeof services.forEach === 'function') {
                services.forEach(service => {
                    this.append(service, servicesContainer)
                })
            }

        } catch (e) {
            throw e;
        }
    }

    static append(item, itemsContainer) {

        try {
            let cardBody = `
            <div class="service-image-container">
                <img class="service-image" style="object-fit: scale-down" src="${item.cover_image}" alt="">
            </div>
<p class=" service-title">${item.title.substring(0, 50)}</p>

            `
            let itemCard = new CardBuilder();
            itemCard.setCardContainerId('setting-' + item.id)
                .setCardContainerClass(['col-4','service-item'])
                .setCardClass(['card', 'rounded-0', 'border-0', 'shadow'])
                .setBody(cardBody)
                .setBodyClass(['card-body'])

            itemsContainer.appendChild(itemCard.build());

        } catch (e) {
            throw e;
        }
    }


}


export default ServiceController
