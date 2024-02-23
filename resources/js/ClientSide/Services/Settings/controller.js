import Settings from "./api.js";
import CardBuilder from "../../../helpers/CardBuilder";

class SettingsController {

    constructor() {
        this.setting = new Settings();
    }

    async list(page, perPage = 10, previewType = "swal", responseType = "json", headers = null) {
        this.setting.setPreviewType(previewType);
        this.setting.setResponseType(responseType);
        this.setting.setHeaders(headers);
        return await this.setting.list();
    }



    async show(id, previewType = "swal", responseType = "json", headers = null) {
        this.setting.setPreviewType(previewType);
        this.setting.setResponseType(responseType);
        this.setting.setHeaders(headers);
        return await this.setting.show(id);
    }

    static showPreview(settings,containerId= 'settingsContainer') {
        try {
            let settingsContainer = document.getElementById(containerId);
            if (settings && settings.length > 0 && typeof settings.forEach === 'function') {
                settings.forEach(setting => {
                    this.append(setting, settingsContainer)
                })
            }

        } catch (e) {
            throw e;
        }
    }
    static append(item, itemsContainer) {

        try {
            let itemCard = new CardBuilder();
            itemCard.setCardContainerId('setting-' + item.id)
                .setCardContainerClass(['col-4', 'px-1', 'my-1'])
                .setCardClass(['card', 'h-100'])
                .setHeader(`<h5 class="card-title">${item.website_name}</h5>`)
                .setBody(`<p class="card-text">${item.website_description}</p>`)
                .setFooter(`<a href="#" class="btn btn-primary">Go somewhere</a>`);

            itemsContainer.appendChild(itemCard.build());

        } catch (e) {
            throw e;
        }
    }


}


export default SettingsController
