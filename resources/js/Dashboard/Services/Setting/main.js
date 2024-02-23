import Setting from "../../../Api/Setting/api";
import Swal from "sweetalert2";
import ExceptionHandler from "../../../helpers/ExceptionHandler.js";



let about_us_form = document.getElementById('about_us_form')
if (about_us_form) {
    about_us_form.addEventListener('submit', async (e) => {
        e.preventDefault()
        let formData = new FormData(about_us_form)
        let setting = new Setting('swal', 'json');
        setting.setData(formData)
        let settingResponse = await setting.store(formData);
        await  Swal.fire(settingResponse.swalResponse)

    })
}

async function viewData() {
    try {

        let logoInput = document.getElementById('website_logo')
        if (logoInput) {
            logoInput.addEventListener('change', (e) => {
                e.preventDefault()
                let website_logo_preview = document.getElementById('logo_preview');
                let file = e.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onloadend = function () {
                        website_logo_preview.src = reader.result;
                    }
                    reader.readAsDataURL(file);
                }
            })
        }
        let darkLogoInput = document.getElementById('website_logo_dark')
        if (darkLogoInput) {
            darkLogoInput.addEventListener('change', (e) => {
                e.preventDefault()
                let website_dark_logo_preview = document.getElementById('dark_logo_preview');
                let file = e.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onloadend = function () {
                        website_dark_logo_preview.src = reader.result;
                    }
                    reader.readAsDataURL(file);
                }
            })
        }
        let setting = new Setting('swal', 'json');
        let settingResponse = await setting.list(1);

        if (settingResponse.response.status === 200) {
            let website_logo_preview = document.getElementById('logo_preview')
            let website_dark_logo_preview = document.getElementById('dark_logo_preview')
            let website_name = document.getElementById('website_name')
            let website_description = document.getElementById('website_description')
            let address = document.getElementById('address')
            let business_hours = document.getElementById('business_hours')
            let about_us = document.getElementById('about_us')
            let phone = document.getElementById('phone')
            let email = document.getElementById('email')
            let facebook = document.getElementById('facebook')
            let twitter = document.getElementById('twitter')
            let instagram = document.getElementById('instagram')
            let youtube = document.getElementById('youtube')
            let tiktok = document.getElementById('tiktok')
            let threads = document.getElementById('threads')

            website_logo_preview.src = settingResponse.response.data.data.website_logo
            website_dark_logo_preview.src = settingResponse.response.data.data.website_logo_dark
            website_name.value = settingResponse.response.data.data.website_name
            website_description.value = settingResponse.response.data.data.website_description
            address.value = settingResponse.response.data.data.address
            business_hours.value = settingResponse.response.data.data.business_hours
            about_us.value = settingResponse.response.data.data.about_us
            phone.value = settingResponse.response.data.data.phone
            email.value = settingResponse.response.data.data.email
            facebook.value = settingResponse.response.data.data.facebook
            twitter.value = settingResponse.response.data.data.twitter
            instagram.value = settingResponse.response.data.data.instagram
            youtube.value = settingResponse.response.data.data.youtube
            tiktok.value = settingResponse.response.data.data.tiktok
            threads.value = settingResponse.response.data.data.threads


        }
    } catch (e) {
        ExceptionHandler(e)
    }
}

viewData()
