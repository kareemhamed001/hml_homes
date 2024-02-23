import CoverImageController from "../Services/CoverImage/controller.js";
import ServiceController from "../Services/Service/controller.js";
import ProjectController from "../Services/Project/controller.js";
import ExclusivePropertyController from "../Services/ExclusiveProperty/controller.js";
import FeedbackController from "../Services/Feedback/controller.js";
import PartnerController from "../Services/Partner/controller.js";
import ExceptionHandler from "../../helpers/ExceptionHandler.js";

import CoverImage from "../Api/CoverImage/api.js";
import Project from "../Api/Project/api.js";
import Feedback from "../Api/Feedback/api.js";
import Partner from "../Api/Partner/api.js";
import Contact from "../Services/Contact/api.js";
import Swal from "sweetalert2";


let serviceController = new ServiceController();
let exclusivePropertyController = new ExclusivePropertyController();

let coverImage = new CoverImage('swal', 'json');
let project = new Project();
let feedback = new Feedback();
let partner = new Partner();


async function init() {
    try {

        let coverImagesResponse = await coverImage.list( true);
        if (coverImagesResponse.response && coverImagesResponse.response.data && coverImagesResponse.response.data.data) {
            CoverImageController.showPreview(coverImagesResponse.response.data.data.data, 'coverImagesContainer');
        }


        let servicesResponse = await serviceController.list(1, 3, '', 'json', null, false);
        if ((servicesResponse.response && servicesResponse.response.data && servicesResponse.data.data.data.length > 0) || (servicesResponse && servicesResponse.data && servicesResponse.data.data.data.length > 0))
            ServiceController.showPreview(servicesResponse.data.data.data, 'services-container');

        listProject(1,3,false)
        let exclusivePropertiesResponse = await exclusivePropertyController.list(1, 6, '', 'json', null, false);
        if ((exclusivePropertiesResponse.response && exclusivePropertiesResponse.response.data && exclusivePropertiesResponse.data.data.data.length > 0) || (exclusivePropertiesResponse && exclusivePropertiesResponse.data && exclusivePropertiesResponse.data.data.data.length > 0))
            ExclusivePropertyController.showPreview(exclusivePropertiesResponse.data.data.data, 'exclusiveProperties-container');

        listFeedback(1,3,false)
        listPartners(1,6,false)


        let contactUsForm = document.getElementById('contactForm')
        if (contactUsForm) {

            contactUsForm.addEventListener('submit', async (e) => {
                e.preventDefault()
                let formData = new FormData(contactUsForm)
                let contact = new Contact()
                let response = await contact.store(formData)
                Swal.fire(response.swalResponse)

                contactUsForm.reset()

            })
        }

    } catch (e) {
        console.error(e)
        ExceptionHandler(e)
    }
}

let projectPage = 1;
let projectPerPage = 3;
let projectMaxPages = 1;

async function listProject(page = 1, perPage = 3, showLoader = true) {
    try {
        let projectResponse = await project.list(page, perPage, showLoader);
        if (projectResponse.response && projectResponse.response.data && projectResponse.response.data.data.data) {

            projectMaxPages = projectResponse.response.data.data.last_page;
            ProjectController.showPreview(projectResponse.response.data.data.data, 'project-container');

        }
    } catch (e) {
        console.error(e)
        ExceptionHandler(e)
    }
}

let projectLeftArrow = document.getElementById('project-arrow-left');
let projectRightArrow = document.getElementById('project-arrow-right');


if (projectLeftArrow) {
    projectLeftArrow.addEventListener('click', function () {
        if (projectPage > 1) {
            document.getElementById('project-arrow-right').classList.remove('disabled');
            projectPage--;
            listProject(projectPage, projectPerPage);
        } else {


            document.getElementById('project-arrow-left').classList.add('disabled');
            document.getElementById('project-arrow-right').classList.remove('disabled');


        }

    })
}


if (projectRightArrow) {


    projectRightArrow.addEventListener('click', function (e) {
        if (projectPage < projectMaxPages) {
            document.getElementById('project-arrow-left').classList.remove('disabled');
            projectPage++;
            listProject(projectPage, projectPerPage);
        } else {
            document.getElementById('project-arrow-left').classList.remove('disabled');
            document.getElementById('project-arrow-right').classList.add('disabled');
        }


    })
}

let feedbackPage = 1;
let feedbackPerPage = 3;
let feedbackMaxPages = 1;

async function listFeedback(page = 1, perPage = 3,showLoader=true) {
    try {
        let feedbackResponse = await feedback.list(page, perPage, showLoader);
        if (feedbackResponse.response && feedbackResponse.response.data && feedbackResponse.response.data.data.data) {

            feedbackMaxPages = feedbackResponse.response.data.data.last_page;
            FeedbackController.showPreview(feedbackResponse.response.data.data.data, 'feedbacks-container');

        }
    } catch (e) {
        console.error(e)
        ExceptionHandler(e)
    }
}

let feedbackLeftArrow = document.getElementById('feedback-arrow-left');
let feedbackRightArrow = document.getElementById('feedback-arrow-right');

if (feedbackLeftArrow) {


    feedbackLeftArrow.addEventListener('click', function () {
        if (feedbackPage > 1) {
            document.getElementById('project-arrow-right').classList.remove('disabled');
            feedbackPage--;
            listFeedback(feedbackPage, feedbackPerPage);
        } else {


            document.getElementById('feedback-arrow-left').classList.add('disabled');
            document.getElementById('feedback-arrow-right').classList.remove('disabled');


        }

    })
}

if (feedbackRightArrow) {

    feedbackRightArrow.addEventListener('click', function (e) {
        if (feedbackPage < projectMaxPages) {
            document.getElementById('feedback-arrow-left').classList.remove('disabled');
            feedbackPage++;
            listFeedback(feedbackPage, projectPerPage);
        } else {
            document.getElementById('feedback-arrow-left').classList.remove('disabled');
            document.getElementById('feedback-arrow-right').classList.add('disabled');
        }


    })
}

let partnerPage = 1;
let partnerMaxPages = 1;

async function listPartners(page = 1, perPage = 6,showLoader = true ){
    try {
        let partnerResponse = await partner.list(page, perPage, showLoader);
        if (partnerResponse.response && partnerResponse.response.data && partnerResponse.response.data.data.data) {

            partnerMaxPages = partnerResponse.response.data.data.last_page;
            PartnerController.showPreview(partnerResponse.response.data.data.data, 'partners-container');

        }
    } catch (e) {
        console.error(e)
        ExceptionHandler(e)
    }
}

let partnerLeftArrow = document.getElementById('partner-arrow-left');
let partnerRightArrow = document.getElementById('partner-arrow-right');

if (partnerLeftArrow) {
    partnerLeftArrow.addEventListener('click', function () {
        if (partnerPage > 1) {
            document.getElementById('project-arrow-right').classList.remove('disabled');
            partnerPage--;
            listPartners(partnerPage);
        } else {


            document.getElementById('partner-arrow-left').classList.add('disabled');
            document.getElementById('partner-arrow-right').classList.remove('disabled');


        }

    })
}

if (partnerRightArrow) {
    partnerRightArrow.addEventListener('click', function (e) {
        if (partnerPage < partnerMaxPages) {
            document.getElementById('partner-arrow-left').classList.remove('disabled');
            partnerPage++;
            listPartners(partnerPage);
        } else {
            document.getElementById('partner-arrow-left').classList.remove('disabled');
            document.getElementById('partner-arrow-right').classList.add('disabled');
        }


    })
}

init()

