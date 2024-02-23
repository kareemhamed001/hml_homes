import Project from "./api.js";
import CardBuilder from "../../../helpers/CardBuilder";
import routes from "@/routes";

class ProjectController {

    constructor() {
        this.project = new Project();
    }


    static showPreview(projects, containerId = 'projectsContainer') {
        try {
            let projectsContainer = document.getElementById(containerId);

            if (!projectsContainer)
                throw new Error('Project Container Not Found');

            projectsContainer.innerHTML = '';
            if (projects && projects.length > 0 && typeof projects.forEach === 'function') {
                projects.forEach((item, index) => {
                    if (index % 2 === 0) {

                        this.append(item, projectsContainer, 'LTR')
                    } else {
                        this.append(item, projectsContainer, 'RTL')
                    }
                })
            }

        } catch (e) {
            throw e;
        }
    }


    static append(item, itemsContainer, direction = 'LTR') {

        try {

            let projectItemContainer = `<div class="col-12 d-flex flex-wrap my-4 rounded">
    <div class="col-6">
        <img class="project-img rounded" style="object-fit: cover;" src="${item.cover_image ?? ''}" alt="">
    </div>
    <div class="col-6 px-2 overflow-hidden">
        <div class="d-flex align-items-center mb-2">
            <img class="mw-100 manager-image" src="${item.manager_image ?? ''}" alt="">
            <h6 class="mx-2 manager-name">${item.manager ?? ''}</h6>
        </div>
        <div class="mb-3">
            <h5 class="project-item-title">${item.name}</h5>

            <p class="my-2 project-item-description">${item.summary ?? ''}</p>
        </div>
        <div class="mb-4">
            <h6 class="project-item-price"> ${item.price ?? ''}</h6>
        </div>
        <a href="${routes.client.web.project.show.url.replace('{project}', item.id)}" class="project-item-btn">Read More</a>
    </div>
</div>`;

            if (direction === 'RTL') {
                projectItemContainer = projectItemContainer.replace(/(<div class="col-6">)/g, '<div class="col-6 order-2">');
                projectItemContainer = projectItemContainer.replace(/(<div class="col-6 px-3">)/g, '<div class="col-6 px-3 order-1">');
            }

            itemsContainer.innerHTML += projectItemContainer;


        } catch (e) {
            throw e;
        }
    }


}


export default ProjectController
