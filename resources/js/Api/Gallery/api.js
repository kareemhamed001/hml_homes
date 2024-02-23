import routes from "../../routes.js";
import RequestBuilder from "../../helpers/requestBuilder.js";

class Project {
    constructor(previewType = "swal", responseType = "json", headers = null) {
        this._previewType = previewType;
        this._headers = headers;
        this._responseType = responseType;
    }

    async list(page, perPage = 10) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.gallery.list.url + "?page=" + page + "&pagination=" + perPage)
            .setMethod(routes.dashboard.gallery.list.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build()
        return await request.send();
    }

    async show(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.gallery.show.url.replace("{gallery}", id))
            .setMethod(routes.dashboard.gallery.show.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async store() {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.gallery.store.url)
            .setMethod(routes.dashboard.gallery.store.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setData(this._data)
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async update(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.gallery.update.url.replace("{gallery}", id))
            .setMethod(routes.dashboard.gallery.update.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setData(this._data)
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async delete(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.gallery.destroy.url.replace("{gallery}", id))
            .setMethod(routes.dashboard.gallery.destroy.method)
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
