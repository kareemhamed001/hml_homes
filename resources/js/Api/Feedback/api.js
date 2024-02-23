import routes from "../../routes.js";
import RequestBuilder from "../../helpers/requestBuilder.js";

class Feedback {
    constructor(previewType = "swal", responseType = "json", headers = null) {
        this._previewType = previewType;
        this._headers = headers;
        this._responseType = responseType;
    }

    async list(page, perPage = 10, showLoader = true) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.feedback.list.url + "?page=" + page + "&pagination=" + perPage)
            .setMethod(routes.dashboard.feedback.list.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .setShowLoader(showLoader)
            .build()
        return await request.send();
    }

    async show(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.feedback.show.url.replace("{feedbacks}", id))
            .setMethod(routes.dashboard.feedback.show.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async store(data) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.feedback.store.url)
            .setMethod(routes.dashboard.feedback.store.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setData(this._data)
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async update(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.feedback.update.url.replace("{feedbacks}", id))
            .setMethod(routes.dashboard.feedback.update.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setData(this._data)
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async delete(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.feedback.destroy.url.replace("{feedbacks}", id))
            .setMethod(routes.dashboard.feedback.destroy.method)
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

export default Feedback
