import routes from "../../../routes.js";
import RequestBuilder from "../../../helpers/requestBuilder.js";

class Partner {
    constructor(previewType = "swal", responseType = "json", headers = null) {
        this._previewType = previewType;
        this._headers = headers;
        this._responseType = responseType;
    }

    async list(page, perPage = 10) {
        let request = new RequestBuilder()
            .setUrl(routes.client.partner.list.url + "?page=" + page + "&pagination=" + perPage)
            .setMethod(routes.client.partner.list.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .build()
        return await request.send();
    }

    async show(id) {
        let request = new RequestBuilder()
            .setUrl(routes.client.partner.show.url.replace("{service}", id))
            .setMethod(routes.client.partner.show.method)
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
}

export default Partner
