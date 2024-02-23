import RequestBuilder from "../../helpers/requestBuilder";
import routes from "../../routes";
import Swal from "sweetalert2";

async function logout() {
    let requestBuilder = new RequestBuilder();
    requestBuilder.setMethod(routes.auth.logout.method);
    requestBuilder.setUrl(routes.auth.logout.url);
    requestBuilder.setPreviewType('swal')
    requestBuilder.setHeaders({
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + localStorage.getItem('token')
    })
    let request = requestBuilder.build();
    let response = await request.send();
    if (response) {
        Swal.fire(response.swalResponse)
        if (response.response.status === 200) {
            localStorage.removeItem('token');
            window.location.href = routes.auth.loginPage.url;
        }
    }
}
export default logout;
