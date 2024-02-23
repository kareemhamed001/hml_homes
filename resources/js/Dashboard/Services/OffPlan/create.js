import OffPlan from "../../../Api/OffPlan/api";

import 'quill/dist/quill.snow.css';
import hljs from 'highlight.js';
import 'highlight.js/styles/github.css'; // or pick any other style
import Quill from "quill";
import ExceptionHandler from "@/helpers/ExceptionHandler";
import Swal from "sweetalert2";
//
// var toolbarOptions = [
//     ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
//     ['link'],                                          // link
//     [{'font': []}],                                  // font family
//     [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
//     [{'color': []}, {'background': []}],          // dropdown with defaults from theme
//     [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
//     [{'header': [1, 2, 3, 4, 5, 6, false]}],        // header dropdown
//     [{'blockquote': 'blockquote'}],                // blockquote
//     [{'list': 'ordered'}, {'list': 'bullet'}],     // list
//     [{'indent': '-1'}, {'indent': '+1'}],          // indent
//     [{'direction': 'rtl'}],                         // text direction
//     [{'align': []}],                                 // text align
//     ['clean']                                          // remove formatting
// ];

// var quill = new Quill('#description-editor', {
//     modules: {
//         toolbar: toolbarOptions
//     },
//     theme: 'snow'
// });

const quill = new Quill('#editor', {
    modules: {
        syntax: false,
        toolbar: '#toolbar-container',
    },
    placeholder: 'Compose an epic...',
    theme: 'snow',
});

var managerQuill = new Quill('#manger-description-editor', {
    modules: {
        syntax: false,
        toolbar: '#manager-toolbar-container',
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'
});
// console.log(quill.root.innerHTML);


//adding feature image inputs on change to preview in img element in the same parent div
function removeItem(id) {
    let item = document.getElementById(id)
    if (item) {
        item.remove()
    }
}

//add new amenity listiner
let addAmenityBtn = document.getElementById('add-amenity');
let amenityContainer = document.getElementById('project-features-container');
let amenityCount = 0;
if (addAmenityBtn) {
    addAmenityBtn.addEventListener('click', (e) => {

            e.preventDefault()
            console.log('clicked')
            let amenity = document.createElement('div');
            amenity.id = `feature-${amenityCount}`;
            amenity.className = 'col-4 service-item';
            amenity.innerHTML = `


                    <div class="card rounded-0 border-0 shadow">
                    <div onclick="document.getElementById('feature-${amenityCount}').remove()" class="position-absolute delete-btn shadow-sm bg-danger d-flex justify-content-center align-items-center " style="width: 30px;height: 30px;border-radius: 50%;cursor: pointer;top: -15px;right: -15px">
                    <i class="fa fa-x text-white"></i>
</div>
                        <div class="card-body p-2 border-0">
                            <label class="service-image-container border-0" for="features[${amenityCount}][image]">
                                <img class="img-fluid service-image border-0" src=""
                                     alt="">
                            </label>
                            <input class="d-none feature-img-input " type="file" name="features[${amenityCount}][image]"
                                   id="features[${amenityCount}][image]"
                                   accept="image/png, image/svg+xml,image/x-icon">
                            <div class="my-1">
                                <label class="form-label fw-600 text-primary" for="features[${amenityCount}][title]">Title</label>
                                <input type="text" class="form-control" name="features[${amenityCount}][title]"
                                       id="features[${amenityCount}]['title']"
                                       placeholder="title">
                            </div>
                        </div>
                    </div>

        `;
            amenityContainer.appendChild(amenity);
            let featureImgInput = document.getElementById(`features[${amenityCount}][image]`);
            let featureImg = document.getElementsByClassName('feature-img-input');
            featureImgInput.addEventListener('change', (e) => {
                let img = e.target.parentElement.querySelector('img');
                let file = e.target.files[0];
                let reader = new FileReader();
                reader.onloadend = function () {
                    img.src = reader.result;
                }
                reader.readAsDataURL(file);
            });

            amenityCount++;
        }
    );
}



let projectCoverImageInput = document.getElementById('project_cover_image')
if (projectCoverImageInput) {
    projectCoverImageInput.addEventListener('change', (e) => {
        e.preventDefault()
        let projectCoverImagePreview = document.getElementById('project_cover_image_preview');
        let file = e.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onloadend = function () {
                projectCoverImagePreview.src = reader.result;
            }
            reader.readAsDataURL(file);
        }
    })
}

let project_manager_image = document.getElementById('project_manager_image')
if (project_manager_image) {
    project_manager_image.addEventListener('change', (e) => {
        e.preventDefault()
        let project_manager_image_preview = document.getElementById('project_manager_image_preview');
        let file = e.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onloadend = function () {
                project_manager_image_preview.src = reader.result;
            }
            reader.readAsDataURL(file);
        }
    })
}


let addGalleryImageBtn = document.getElementById('addGalleryImageBtn');
let galleryImageContainer = document.getElementById('galleryContainer');
let galleryImageCount = 0;
if (addGalleryImageBtn) {
    addGalleryImageBtn.addEventListener('click', (e) => {
            e.preventDefault()
            console.log('clicked')
            let galleryImage = document.createElement('div');
            galleryImage.id = `galleryImage-${galleryImageCount}`;
            galleryImage.className = 'col-sm-6 col-12 project-img-container position-relative';
            galleryImage.innerHTML = `

                    <div onclick="document.getElementById('galleryImage-${galleryImageCount}').remove()" class="position-absolute delete-btn shadow-sm bg-danger d-flex justify-content-center align-items-center " style="width: 30px;height: 30px;border-radius: 50%;cursor: pointer;top: 0;right: 0">
                    <i class="fa fa-x text-white"></i>
</div>

  <label for="images[${galleryImageCount}]"
               class="d-flex justify-content-center rounded align-items-center flex-column position-absolute shadow-sm d-flex justify-content-center align-items-center bg-white m-3 p-5 text-primary"
               style="top: 50%;left: 50%;transform: translate(-50%,-50%);width: 50%;opacity: 50%;cursor: pointer" >
            <div>
                <i class="fa fa-plus  fa-2x m-2"></i>

            </div>

            <div>
                upload Photo
            </div>
        </label>
                      <div class="service-image-container border-0" >
                                <img class="img-fluid project-img border-0" src=""
                                        alt="" id="galleryImagePreview-${galleryImageCount}">
                            </div>
                            <input class="d-none gallery-img-input" type="file" name="images[${galleryImageCount}][image]" id="images[${galleryImageCount}]" accept="image/*">
                            <input type="hidden" name="images[${galleryImageCount}][type]" value="outside">

        `;

            galleryImageContainer.appendChild(galleryImage);
            let galleryImgInput = document.getElementById(`images[${galleryImageCount}]`);
            let galleryImg = document.getElementsByClassName('gallery-img-input');
            galleryImgInput.addEventListener('change', (e) => {
                let img = e.target.parentElement.querySelector('img');
                let file = e.target.files[0];
                let reader = new FileReader();
                reader.onloadend = function () {
                    img.src = reader.result;
                }
                reader.readAsDataURL(file);
            });


            galleryImageCount++;
        }
    );
}


let addPhotoImageBtn = document.getElementById('addPhotoImageBtn');
let photoContainer = document.getElementById('photoContainer');
let photoImageCount = 0;
if (addPhotoImageBtn) {
    addPhotoImageBtn.addEventListener('click', (e) => {
            e.preventDefault()
            console.log('clicked')
            let photoImage = document.createElement('div');
            photoImage.id = `photoImage-${photoImageCount}`;
            photoImage.className = 'col-sm-6 col-12 project-img-container position-relative';
            photoImage.innerHTML = `

                    <div onclick="document.getElementById('photoImage-${photoImageCount}').remove()" class="position-absolute delete-btn shadow-sm bg-danger d-flex justify-content-center align-items-center " style="width: 30px;height: 30px;border-radius: 50%;cursor: pointer;top: 0;right: 0">
                    <i class="fa fa-x text-white"></i>
</div>

  <label for="photo[${photoImageCount}]"
               class="d-flex justify-content-center rounded align-items-center flex-column position-absolute shadow-sm d-flex justify-content-center align-items-center bg-white m-3 p-5 text-primary"
               style="top: 50%;left: 50%;transform: translate(-50%,-50%);width: 50%;opacity: 50%;cursor: pointer" >
            <div>
                <i class="fa fa-plus  fa-2x m-2"></i>

            </div>

            <div>
                upload Photo
            </div>
        </label>
                      <div class="service-image-container border-0" >
                                <img class="img-fluid project-img border-0" src=""
                                        alt="" id="photoImagePreview-${photoImageCount}">
                            </div>
                            <input class="d-none photo-img-input" type="file" name="photos[${photoImageCount}][image]" id="photo[${photoImageCount}]" accept="image/*">
                            <input type="hidden" name="photos[${photoImageCount}][type]" value="inside">

        `;

            photoContainer.appendChild(photoImage);
            let photoImgInput = document.getElementById(`photo[${photoImageCount}]`);

            photoImgInput.addEventListener('change', (e) => {
                let img = e.target.parentElement.querySelector('img');
                let file = e.target.files[0];
                let reader = new FileReader();
                reader.onloadend = function () {
                    img.src = reader.result;
                }
                reader.readAsDataURL(file);
            });


            photoImageCount++;
        }
    );
}
let addPriceBtn = document.getElementById('add_price_btn');
let pricesTableBody = document.getElementById('prices_table_body');

let priceCount = 0;
if (addPriceBtn) {
    addPriceBtn.addEventListener('click', (e) => {
        e.preventDefault()

        let configuration = document.getElementById('price_configuration').value
        let area = document.getElementById('price_area').value
        let price = document.getElementById('price').value

        if (!configuration) {
            Swal.fire(
                {
                    title: 'Please enter configuration',
                    icon: 'warning',
                    //change confirm button color
                    confirmButtonColor: '#11047A',

                }
            )
            return
        }
        if (!area) {
            Swal.fire({
                title: 'Please enter area',
                icon: 'warning',
                confirmButtonColor: '#11047A',
            })
            return
        }
        if (!price) {
            Swal.fire({
                title: 'Please enter price',
                icon: 'warning',
                confirmButtonColor: '#11047A',
            })
            return
        }
        let priceRow = document.createElement('tr');
        priceRow.id = `price-${priceCount}`;
        priceRow.innerHTML = `
        <td>
            <input type="text" class="form-control" name="prices[${priceCount}][configuration]" placeholder="configuration" value="${configuration}">
        </td>
        <td>
            <input type="text" class="form-control" name="prices[${priceCount}][area]" placeholder="area" value="${area}">
        </td>
        <td>
            <input type="text" class="form-control" name="prices[${priceCount}][price]" placeholder="price" value="${price}">
        </td>

        <td>
            <button class="btn btn-danger" type="button" onclick="document.getElementById('price-${priceCount}').remove()">Remove</button>
        </td>
        `
        pricesTableBody.appendChild(priceRow);
        priceCount++;
    })
}

function validateData(formData) {
    let errors = [];

    // Validate 'project_name'
    let project_name = formData.get('project_name');
    console.log(project_name.length)
    if (!project_name || typeof project_name !== 'string' || project_name.length > 255) {
        errors.push('Invalid project name');
    }

    // Validate 'project_description'
    let project_description = formData.get('project_description');

    if (!project_description || typeof project_description !== 'string' || quill.getLength() <= 1) {
        errors.push('Invalid project description');
    }

    // Validate 'type'
    let type = formData.get('type');
    if (!type || (type !== 'compound' && type !== 'apartment')) {
        errors.push('Invalid type');
    }

    // Validate 'features'
    let features = formData.getAll('features');
    if (!features || !Array.isArray(features)) {
        errors.push('Invalid amenities');
    } else {
        features.forEach((feature, index) => {
            if (!feature.image || !(feature.image instanceof File) || feature.image.type.split('/')[0] !== 'image') {
                errors.push(`Invalid image for amenity at index ${index}`);
            }
            if (!feature.title || typeof feature.title !== 'string' || feature.title.length > 50) {
                errors.push(`Invalid title for amenity at index ${index}`);
            }
        });
    }

    // Validate 'project_cover_image'
    let project_cover_image = formData.get('project_cover_image');
    if (!project_cover_image || !(project_cover_image instanceof File)) {
        errors.push('Invalid project cover image');
    }

    // Validate 'manager_name'
    let manager_name = formData.get('manager_name');
    if (!manager_name || typeof manager_name !== 'string' || manager_name.length > 255) {
        errors.push('Invalid developer name');
    }

    // Validate 'manager_description'
    let manager_description = formData.get('manager_description');
    if (!manager_description || typeof manager_description !== 'string' || managerQuill.getLength() <= 1) {
        errors.push('Invalid developer description');
    }

    // Validate 'manager_image'
    let manager_image = formData.get('manager_image');
    if (!manager_image || !(manager_image instanceof File)) {
        errors.push('Invalid developer image');
    }

    // Validate 'images'
    let images = formData.getAll('images');
    if (!images || !Array.isArray(images)) {
        errors.push('Invalid images');
    } else {
        images.forEach((image, index) => {
            if (!image.image || !(image.image instanceof File)) {
                errors.push(`Invalid image for image at index ${index}`);
            }
            if (!image.type || (image.type !== 'outside')) {
                errors.push(`Invalid type for image at index ${index}`);
            }
        });
    }

    // Validate 'photos'
    let photos = formData.getAll('photos');
    if (!photos || !Array.isArray(photos)) {
        errors.push('Invalid photos');
    } else {
        photos.forEach((photo, index) => {
            if (!photo.image || !(photo.image instanceof File)) {
                errors.push(`Invalid image for photo at index ${index}`);
            }
            if (!photo.type || (photo.type !== 'inside')) {
                errors.push(`Invalid type for photo at index ${index}`);
            }
        });
    }

    // Validate 'prices'
    let prices = formData.getAll('prices');
    if (!prices || !Array.isArray(prices)) {
        errors.push('Invalid prices');
    } else {
        prices.forEach((price, index) => {
            if (!price.configuration || typeof price.configuration !== 'string') {
                errors.push(`Invalid configuration for price at index ${index}`);
            }
            if (!price.area || typeof price.area !== 'string') {
                errors.push(`Invalid area for price at index ${index}`);
            }
            if (!price.price || typeof price.price !== 'string') {
                errors.push(`Invalid price for price at index ${index}`);
            }
        });
    }

    let plans = formData.getAll('plans');
    if (!plans || !Array.isArray(plans)) {
        errors.push('Invalid plans');
    } else {
        plans.forEach((plan, index) => {
            if (!plan.step || typeof plan.step !== 'string') {
                errors.push(`Invalid step for plan at index ${index}`);
            }
            if (!plan.name || typeof plan.name !== 'string') {
                errors.push(`Invalid name for plan at index ${index}`);
            }
            if (!plan.description || typeof plan.description !== 'string') {
                errors.push(`Invalid description for plan at index ${index}`);
            }
        });
    }

    let near_places = formData.getAll('near_places');
    if (!near_places || !Array.isArray(near_places)) {
        errors.push('Invalid near places');
    }
    else {
        near_places.forEach((place, index) => {
            if (!place.distance || typeof place.distance !== 'string') {
                errors.push(`Invalid distance for near place at index ${index}`);
            }
            if (!place.time || typeof place.time !== 'string') {
                errors.push(`Invalid time for near place at index ${index}`);
            }
            if (!place.place || typeof place.place !== 'string') {
                errors.push(`Invalid place for near place at index ${index}`);
            }
        });
    }

    let project_location_image = formData.get('project_location_image');
    if (!project_location_image || !(project_location_image instanceof File)) {
        errors.push('Invalid project location image');
    }
     let project_type = formData.get('type');
    if (!project_type || (project_type !== 'compound' && project_type !== 'apartment')) {
        errors.push('Invalid type');
    }



    if (errors.length > 0) {
        Swal.fire({
            title: 'Invalid data',
            icon: 'error',
            confirmButtonColor: '#11047A',
            html: errors.join('<br>')
        });
        throw new Error('Invalid data');
    }

}

let addPlanBtn = document.getElementById('add_plan_btn');
let plansTimeLine = document.getElementById('timeline');
let planCount = 0;
if (addPlanBtn) {
    addPlanBtn.addEventListener('click', (e) => {
        e.preventDefault()
        let step = document.getElementById('payment_plan_step').value
        let name = document.getElementById('payment_plan_name').value
        let description = document.getElementById('payment_plan_description').value

        if (!step) {
            Swal.fire(
                {
                    title: 'Please enter step',
                    icon: 'warning',
                    //change confirm button color
                    confirmButtonColor: '#11047A',

                }
            )
            return
        }

        if (!name) {
            Swal.fire({
                title: 'Please enter name',
                icon: 'warning',
                confirmButtonColor: '#11047A',
            })
            return
        }

        if (!description) {
            Swal.fire({
                title: 'Please enter description',
                icon: 'warning',
                confirmButtonColor: '#11047A',
            })
            return
        }


        let plan = document.createElement('li');
        plan.className = 'event';
        plan.dataset.year = step;
        plan.id = `plan-${planCount}`;

        plan.innerHTML = `
<div onclick="document.getElementById('plan-${planCount}').remove()"
                                                             class="position-absolute delete-btn shadow-sm bg-danger d-flex justify-content-center align-items-center "
                                                             style="width: 30px;height: 30px;border-radius: 50%;cursor: pointer;top: -10px;right: -20px">
                                                            <i class="fa fa-x text-white"></i>
                                                        </div>
<div class="my-1">
<label class="form-label fw-600 text-primary" for="plans[${planCount}][step]">step</label>
                <input class="form-control" type="text" name="plans[${planCount}][step]" value="${step}" id="plans[${planCount}][step]" onchange="document.getElementById('plan-${planCount}').dataset.year=event.target.value">
</div>
<div class="my-1">
<label class="form-label fw-600 text-primary" for="plans[${planCount}][name]">name</label>
                <input class="form-control" type="text" name="plans[${planCount}][name]" value="${name}">
</div>
<div class="my-1">
<label class="form-label fw-600 text-primary" for="plans[${planCount}][description]">description</label>
                <input class="form-control" type="text" name="plans[${planCount}][description]" value="${description}">
</div>
        `;
        plansTimeLine.appendChild(plan);


        planCount++;
    });
}


let project_location_image = document.getElementById('project_location_image')
if (project_location_image) {
    project_location_image.addEventListener('change', (e) => {
        e.preventDefault()
        let project_location_image_preview = document.getElementById('project_location_image_preview');
        let file = e.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onloadend = function () {
                project_location_image_preview.src = reader.result;
            }
            reader.readAsDataURL(file);
        }
    })
}


let add_near_place_btn = document.getElementById('add_near_place_btn');
let nearPlacesContainer = document.getElementById('near_places_container');
let nearPlaceCount = 0;
if (add_near_place_btn) {
    add_near_place_btn.addEventListener('click', (e) => {
        e.preventDefault()
        let place = document.getElementById('place').value
        let distance = document.getElementById('distance').value
        let nearPlace = document.createElement('div');
        nearPlace.id = `nearPlace-${nearPlaceCount}`;
        nearPlace.className = 'col-lg-4 col-12 position-relative';
        nearPlace.innerHTML = `
<div class="position-absolute top-0 end-0 delete-btn shadow-sm bg-danger d-flex justify-content-center align-items-center " style="width: 30px;height: 30px;border-radius: 50%;cursor: pointer"  onclick="document.getElementById('nearPlace-${nearPlaceCount}').remove()">
<i class="fa fa-x text-white"></i>
</div>
                                <div class="d-flex align-items-center project-near-place-item">
                                    <div class="project-near-place-image-container">

                                    </div>
                                    <div class="project-near-place-name">


 <div class="my-2">
 <label class="form-label fw-600 text-primary" for="near_places[${nearPlaceCount}][distance]">distance</label>
                                        <input type="text" class="form-control" name="near_places[${nearPlaceCount}][distance]" value="${place}" id="near_places[${nearPlaceCount}][distance]" placeholder="distance in km ex:10">


</div>
<div class="my-2">
<label class="form-label fw-600 text-primary" for="near_places[${nearPlaceCount}][time]">time</label>

                                        <input type="text" class="form-control" name="near_places[${nearPlaceCount}][time]" value="${distance}" id="near_places[${nearPlaceCount}][time]" placeholder="time in minutes ex:30">

</div>
<div class="my-2">
<label class="form-label fw-600 text-primary" for="near_places[${nearPlaceCount}][place]">place</label>

                                        <input type="text" class="form-control" name="near_places[${nearPlaceCount}][place]" value="${distance}" id="near_places[${nearPlaceCount}][place]" placeholder="place name">
</div>

                                    </div>

                                </div>


        `;
        nearPlacesContainer.appendChild(nearPlace);
        nearPlaceCount++;
    });
}


let addProjectForm = document.getElementById('add-project-form');
addProjectForm.reset();
if (addProjectForm) {
    addProjectForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let formData = new FormData(addProjectForm);
        formData.append('project_description', quill.root.innerHTML);
        formData.append('manager_description', managerQuill.root.innerHTML);
        validateData(formData);
        let offPlan = new OffPlan();
        offPlan.setData(formData);
        try {
            let response = await offPlan.store();
            if (response.response && response.response.data) {
                Swal.fire(response.swalResponse);
            }

        } catch (e) {
            ExceptionHandler(e)
        }

    });
}
