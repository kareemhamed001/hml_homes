import RequestBuilder from "../../helpers/requestBuilder.js";
import routes from "../../routes.js";
import ExceptionHandler from "../../helpers/ExceptionHandler.js";
import Swal from "sweetalert2";

async function checkToken() {
    try {
        let token = localStorage.getItem('token')
        if (token) {

            let requestBuilder = new RequestBuilder();
            requestBuilder
                .setMethod(routes.auth.checkToken.method)
                .setUrl(routes.auth.checkToken.url)
                .setPreviewType('swal')
                .setHeaders({
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                })
            let request = requestBuilder.build();
            let response = await request.send();
            if (response) {
                if (response.response.status === 200) {

                    let body=document.querySelector('body');
                    body.classList.remove('d-none');
                    return true;
                } else {
                    if (window.location.pathname !== "/login") {
                        localStorage.removeItem('token');
                        window.location.href = routes.auth.loginPage.url;
                    }
                }
            }

        } else {
            localStorage.removeItem('token');
            window.location.href = routes.auth.loginPage.url;
        }
    } catch (e) {
        ExceptionHandler(e)
    }

}

export default checkToken;
