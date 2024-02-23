
import routes from "../../routes.js";
import RequestBuilder from "../../helpers/requestBuilder.js";

class ExclusiveProperty {
    constructor(previewType = "swal", responseType = "json", headers = null) {
        this._previewType = previewType;
        this._headers = headers;
        this._responseType = responseType;
    }

    async list(page=1, perPage = 8,showLoader = true) {
        try {
            let request = new RequestBuilder()
                .setUrl(routes.dashboard.project.list.url + "?page=" + page + "&pagination=" + perPage+"&type=apartment")
                .setMethod(routes.dashboard.project.list.method)
                .setHeaders({'Accept': 'application/json', ...this._headers})
                .setResponseType(this._responseType)
                .setPreviewType(this._previewType)
                .setShowLoader(showLoader)
                .build()
            return await request.send();
        }catch (e) {
            throw e;
        }

    }

    async show(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.project.show.url.replace("{project}", id))
            .setMethod(routes.dashboard.project.show.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async store() {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.project.store.url)
            .setMethod(routes.dashboard.project.store.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setData(this._data)
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async update(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.project.update.url.replace("{project}", id))
            .setMethod(routes.dashboard.project.update.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setData(this._data)
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async delete(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.project.destroy.url.replace("{project}", id))
            .setMethod(routes.dashboard.project.destroy.method)
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

export default ExclusiveProperty



