import routes from "../../../routes.js";
import RequestBuilder from "../../../helpers/requestBuilder.js";

class Project {
    constructor(previewType = "swal", responseType = "json", headers = null) {
        this._previewType = previewType;
        this._headers = headers;
        this._responseType = responseType;
    }

    async list(page, perPage = 10, showLoader = true) {
        let request = new RequestBuilder()
            .setUrl(routes.client.project.list.url + "?page=" + page + "&pagination=" + perPage+ "&type=compound")
            .setMethod(routes.client.project.list.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .setShowLoader(showLoader)
            .build()
        return await request.send();
    }

    async show(id) {
        let request = new RequestBuilder()
            .setUrl(routes.client.project.show.url.replace("{project}", id))
            .setMethod(routes.client.project.show.method)
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

export default Project
