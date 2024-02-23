import routes from "../../../routes.js";
import RequestBuilder from "../../../helpers/requestBuilder.js";

class Contact {
    constructor(previewType = "swal", responseType = "json", headers = null) {
        this._previewType = previewType;
        this._headers = headers;
        this._responseType = responseType;
    }


    async store(data) {
        let request = new RequestBuilder()
            .setUrl(routes.client.contact.url)
            .setMethod(routes.client.contact.method)
            .setHeaders({'Accept': 'application/json', ...this._headers})
            .setResponseType(this._responseType)
            .setPreviewType(this._previewType)
            .setData(data)
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

export default Contact
