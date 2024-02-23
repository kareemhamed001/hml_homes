import CheckToken from "../auth/helpers/checkToken.js";
import RequestBuilder from "../helpers/requestBuilder.js";
import routes from "@/routes.js";
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import Swal from "sweetalert2";
import ExceptionHandler from "../helpers/ExceptionHandler.js";
import logout from "../auth/helpers/logout.js";


window.addEventListener("load", (event) => {
    hideLoader()
});

CheckToken();
showOverView();
let logoutBtn = document.getElementById("logout");

logoutBtn.addEventListener("click", async function (e) {
    try {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                logout();
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Logout cancelled',
                    'error'
                )
            }
        })


    } catch (e) {
        ExceptionHandler(e)
    }
});


let toggleSidebarBtn = document.getElementById("toggleSidebarBtn");

let showSideBar = localStorage.getItem('sidebar');
if (showSideBar === 'false') {
    let sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("d-none");
}


toggleSidebarBtn.addEventListener("click", async function (e) {
    try {
        e.preventDefault();
        let sidebar = document.getElementById("sidebar");
        localStorage.setItem('sidebar', 'true');
        if (sidebar.classList.contains("d-none")) {
            localStorage.setItem('sidebar', 'false');
        }

        sidebar.classList.toggle("d-none");
    } catch (e) {
        ExceptionHandler(e)
    }

});

// Show the loader
function showLoader() {
    document.getElementById('loader').style.display = 'flex';
}

// Hide the loader
function hideLoader() {
    document.getElementById('loader').style.display = 'none';
}


async function showOverView() {
    try {

        let request = new RequestBuilder();
        request.setUrl(routes.dashboard.overview.url);
        request.setMethod(routes.dashboard.overview.method);
        request.setHeaders({
            'Content-Type': 'application/json',
        });
        request.setResponseType('json');

        request = request.build();
        let response = await request.send();
        console.log(response);
        if (response.status === 200) {
            let coverImagesCount = document.getElementById('coverImagesCount');
            let servicesCount = document.getElementById('servicesCount');
            let feedbacksCount = document.getElementById('feedbacksCount');
            let offPlanProjectsCount = document.getElementById('offPlanProjectsCount');
            let exclusivePropertiesCount = document.getElementById('exclusivePropertiesCount');

            if (coverImagesCount) {
                coverImagesCount.innerHTML = response.data.data.coverImages??0;
            }

            if (servicesCount) {
                servicesCount.innerHTML = response.data.data.services??0;
            }

            if (offPlanProjectsCount) {
                offPlanProjectsCount.innerHTML = response.data.data.offPlanProject??0;
            }
            if (exclusivePropertiesCount) {
                exclusivePropertiesCount.innerHTML = response.data.data.exclusiveProperties??0;
            }
            if (feedbacksCount) {
                feedbacksCount.innerHTML = response.data.data.feedbacks??0;
            }


        }


    } catch (e) {
        ExceptionHandler(e)
    }
}



