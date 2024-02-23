import routes from "../../routes.js";
import RequestBuilder from "../../helpers/requestBuilder.js";

class Contact {
    constructor(previewType = "swal", responseType = "json", headers = null) {
        this._previewType = previewType;
        this._headers = headers;
        this._responseType = responseType;
    }

    async list(page, perPage = 10, showLoader = true) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.contact.list.url + "?page=" + page + "&pagination=" + perPage)
            .setMethod(routes.dashboard.contact.list.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .setShowLoader(showLoader)
            .build()
        return await request.send();
    }

    async show(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.contact.show.url.replace("{contacts}", id))
            .setMethod(routes.dashboard.contact.show.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async store(data) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.contact.store.url)
            .setMethod(routes.dashboard.contact.store.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setData(this._data)
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async update(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.contact.update.url.replace("{contacts}", id))
            .setMethod(routes.dashboard.contact.update.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setData(this._data)
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async delete(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.contact.destroy.url.replace("{contacts}", id))
            .setMethod(routes.dashboard.contact.destroy.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }


    setPreviewType(previewType) {
        this._previewType = previewType;
        return this;
    }
    setResponseType(value) {
        this._responseType = value;
    }
    setHeaders(value) {
        this._headers = value;
    }

    setData(value) {
        this._data = value;
    }
}

export default Contact
