
import routes from "@/routes.js";
import RequestBuilder from "@/helpers/requestBuilder.js";

class CoverImage {
    constructor(previewType = "swal", responseType = "json", headers = null) {
        this._previewType = previewType;
        this._headers = headers;
        this._responseType = responseType;
    }

    async list(showLoader=true) {
        try {
            let request = new RequestBuilder()
                .setUrl(routes.client.coverImage.list.url)
                .setMethod(routes.client.coverImage.list.method)
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
            .setUrl(routes.dashboard.coverImage.show.url.replace("{coverImage}", id))
            .setMethod(routes.dashboard.coverImage.show.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async store() {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.coverImage.store.url)
            .setMethod(routes.dashboard.coverImage.store.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setData(this._data)
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async update(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.coverImage.update.url.replace("{coverImage}", id))
            .setMethod(routes.dashboard.coverImage.update.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setData(this._data)
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build();

        return await request.send();
    }

    async delete(id) {
        let request = new RequestBuilder()
            .setUrl(routes.dashboard.coverImage.destroy.url.replace("{coverImage}", id))
            .setMethod(routes.dashboard.coverImage.destroy.method)
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

export default CoverImage



