
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import RequestBuilder from "../helpers/requestBuilder.js";
import routes from "../routes.js";
import ExceptionHandler from "../helpers/ExceptionHandler.js";
import Swal from "sweetalert2";


let loginForm = document.getElementById("loginForm");
loginForm.addEventListener("submit", async function (e) {
    try {
        e.preventDefault();
        let formData = new FormData(this);
        let requestBuilder = new RequestBuilder();
        requestBuilder.setMethod(routes.auth.login.method);
        requestBuilder.setUrl(routes.auth.login.url);
        requestBuilder.setData(formData)
        requestBuilder.setPreviewType('swal')
        requestBuilder.setHeaders({
            'Content-Type': 'multipart/form-data',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        })


        let request = requestBuilder.build();
        let response =await request.send();
        if (response) {
           Swal.fire(response.swalResponse)
            if (response.response.status === 200) {
                let token = response.response.data.data.token;
                localStorage.setItem('token', token);
                window.location.href = "/dashboard";
            }

        }
    }catch (e) {
        ExceptionHandler(e)
    }
});

