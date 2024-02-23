import routes from "../../../routes.js";
import RequestBuilder from "../../../helpers/requestBuilder.js";

class Setting {
    constructor(previewType = "swal", responseType = "json", headers = null) {
        this._previewType = previewType;
        this._headers = headers;
        this._responseType = responseType;
    }

    async list(page, perPage = 10, showLoader = true) {
        let request = new RequestBuilder()
            .setUrl(routes.client.setting.list.url + "?page=" + page + "&pagination=" + perPage)
            .setMethod(routes.client.setting.list.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .setShowLoader(showLoader)
            .build()
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

export default Setting
