import axios from 'axios';
import Loader from './Loader';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


class Request {
    constructor(url, method, data, headers, responseType, previewType = 'swal', showLoader = true) {
        this.url = url;
        this.method = method;
        this.data = data;
        this.headers = headers;
        this.responseType = responseType;
        this.previewType = previewType;
        this.showLoader = showLoader;
    }

    send() {
        if (localStorage.getItem('token') != null) {
            this.headers = {
                ...this.headers,
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        }


        const axiosConfig = {
            method: this.method,
            url: this.url,
            data: this.data,
            headers: this.headers,
            responseType: this.responseType,
        };

        if (this.showLoader)
            Loader.show()
        return axios(axiosConfig)
            .then(response => {
                if (this.showLoader)
                    Loader.hide()
                if (this.previewType === 'swal') {
                    const swalResponse = {
                        title: 'Success!',
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#3B4D81',
                    };

                    if (response.data.message) {
                        swalResponse.text = response.data.message;
                    }

                    return {
                        swalResponse: swalResponse,
                        response: response
                    };
                }
                Loader.hide()
                return response;
            })
            .catch(error => {
                Loader.hide()

                if (this.previewType === 'swal') {
                    const swalResponse = {
                        title: 'Error!',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                    };

                    if (error.response.data.errors) {
                        const errors = error.response.data.errors;
                        const errorsHtml = Object.values(errors)
                            .map(value => `<li>${value}</li>`)
                            .join('');

                        swalResponse.html = errorsHtml;
                    } else {
                        swalResponse.text = error.response.data.message;
                    }

                    return {
                        swalResponse: swalResponse,
                        response: error.response
                    };
                }
                if (error.response.data.errors) {
                    throw new Error(error.response.data.errors);
                } else {
                    throw new Error(error.response.data.message);
                }

            });


    }
}

class RequestBuilder {
    constructor(url = null, method = null, data = null, headers = null, responseType = null, previewType = null) {
        this.url = url;
        this.method = method;
        this.data = data;
        this.headers = headers;
        this.responseType = responseType;
        this.previewType = previewType;
        this.showLoader = true;

    }

    setUrl(url) {
        this.url = url;
        return this;
    }

    setMethod(method) {
        this.method = method;
        return this;
    }

    setData(data) {
        this.data = data;
        return this;
    }

    setHeaders(headers) {
        this.headers = headers;
        return this;
    }

    setResponseType(responseType) {
        this.responseType = responseType;
        return this;
    }

    setPreviewType(previewType) {
        this.previewType = previewType;
        return this;
    }

    setShowLoader(showLoader = true) {
        this.showLoader = showLoader;
        return this;
    }

    build() {
        return new Request(this.url, this.method, this.data, this.headers, this.responseType, this.previewType, this.showLoader);
    }

    send() {
        return this.build().send();
    }
}

export default RequestBuilder;
