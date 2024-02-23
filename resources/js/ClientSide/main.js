import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import bootstrap from "bootstrap/dist/js/bootstrap.bundle.min.js";
import ExceptionHandler from "@/helpers/ExceptionHandler";
import Setting from "./Api/Settings/api.js";

const fixed_header = document.querySelector('#header');
const phoneContainers = document.querySelectorAll('.phone-number');
const emailContainers = document.querySelectorAll('.email');
const addressContainers = document.querySelectorAll('.address');
const logoImg = document.querySelectorAll('.logo');
const logoContainer = document.querySelectorAll('.logo-container');
const logoTitleContainer = document.querySelectorAll('.logo-title');
const metaDescription = document.querySelector('meta[name="description"]');
const facebookContainers = document.querySelectorAll('.facebook');
const twitterContainers = document.querySelectorAll('.twitter');
const instagramContainers = document.querySelectorAll('.instagram');
const youtubeContainers = document.querySelectorAll('.youtube');
const whatsappContainers = document.querySelectorAll('.whatsapp');
const tiktokContainers = document.querySelectorAll('.tiktok');
const threadsContainers = document.querySelectorAll('.threads');
const aboutContainer = document.querySelectorAll('.about-description');

console.log(facebookContainers)

async function init() {
    try {
        let scrollUpButton = document.getElementById('scroll-up-btn');
        if (scrollUpButton) {
            scrollUpButton.addEventListener('click', function () {
                window.scrollTo(0, 0);
            })

            window.addEventListener('scroll', function () {
                if (window.scrollY > 200) {
                    scrollUpButton.classList.remove('d-none');
                } else {
                    scrollUpButton.classList.add('d-none');
                }

            })
        }


        let setting = new Setting();

        let settingResponse = await setting.list(1, 1, false);
        if (settingResponse.response) {
            if (settingResponse.response.data && settingResponse.response.data.data) {
                let data = settingResponse.response.data.data;

                let phone = data.phone;
                let email = data.email;
                let address = data.address;
                let logoTitle = data.website_name;
                let description = data.website_description;
                let aboutUs = data.about_us;
                let facebook = data.facebook;
                let twitter = data.twitter;
                let instagram = data.instagram;
                let youtube = data.youtube;
                let whatsapp = data.whatsapp;
                let tiktok = data.tiktok;
                let threads = data.threads;

                if (logoImg) {
                    if (data.website_logo) {
                        logoImg.forEach(item => {
                            //check if the logo element has clas dark-logo
                            if (item.classList.contains('dark-logo')) {
                                if (data.website_logo_dark)
                                    item.src = data.website_logo_dark;
                                else if (data.website_logo)
                                    item.src = data.website_logo;
                                return;
                            }
                            if (data.website_logo)
                                item.src = data.website_logo;
                            else if (data.website_logo_dark)
                                item.src = data.website_logo_dark;
                        })
                    } else {
                        logoContainer.forEach(item => {
                            // {{--                <i class="fa-sharp fa-light fa-house" id="logo-icon"></i>--}}
                            let defaultLogo = document.createElement('i')
                            defaultLogo.classList.add('fa-sharp', 'fa-light', 'fa-house', 'fa-3x')
                            defaultLogo.id = 'logo-icon'

                            item.prepend(defaultLogo)
                        })
                        logoImg.forEach(item => {
                            item.remove()
                        })
                    }
                }
                if (phone) {
                    phoneContainers.forEach(item => {
                        item.innerHTML = phone;
                    })
                }
                if (email) {
                    emailContainers.forEach(item => {
                        item.innerHTML = email;
                    })
                }
                if (address) {
                    addressContainers.forEach(item => {
                        item.innerHTML = 'Address : ' + address;
                    })
                }

                if (logoTitleContainer) {
                    logoTitleContainer.forEach(item => {
                        item.innerHTML = logoTitle;
                    })
                }


                if (metaDescription) {
                    metaDescription.setAttribute('content', description);
                }

                if (facebook && facebook.length > 0 && facebookContainers) {
                    if (facebookContainers.length > 0) {
                        facebookContainers.forEach(item => {
                            item.setAttribute('href', facebook);
                            item.setAttribute('target', '_blank');
                        })
                    } else {
                        facebookContainers.setAttribute('href', facebook);
                        facebookContainers.setAttribute('target', '_blank');
                    }


                }

                if (twitter && twitter.length > 0 && twitterContainers) {
                    if (twitterContainers.length > 0) {
                        twitterContainers.forEach(item => {
                            item.setAttribute('href', twitter);
                            item.setAttribute('target', '_blank');
                        })
                    } else {
                        twitterContainers.setAttribute('href', twitter);
                        twitterContainers.setAttribute('target', '_blank');
                    }
                }

                if (instagram && instagram.length > 0 && instagramContainers) {
                    if (instagramContainers.length > 0) {
                        instagramContainers.forEach(item => {
                            item.setAttribute('href', instagram);
                            item.setAttribute('target', '_blank');
                        })
                    } else {
                        instagramContainers.setAttribute('href', instagram);
                        instagramContainers.setAttribute('target', '_blank');
                    }
                }

                if (youtube && youtube.length > 0 && youtubeContainers) {
                    if (youtubeContainers.length > 0) {
                        youtubeContainers.forEach(item => {
                            item.setAttribute('href', youtube);
                            item.setAttribute('target', '_blank');
                        })
                    } else {
                        youtubeContainers.setAttribute('href', youtube);
                        youtubeContainers.setAttribute('target', '_blank');
                    }
                }

                if (whatsapp && whatsapp.length > 0 && whatsappContainers) {
                    if (whatsappContainers.length > 0) {
                        whatsappContainers.forEach(item => {
                            item.setAttribute('href', whatsapp);
                            item.setAttribute('target', '_blank');
                        })
                    } else {
                        whatsappContainers.setAttribute('href', whatsapp);
                        whatsappContainers.setAttribute('target', '_blank');
                    }
                }

                if (tiktok && tiktok.length > 0 && tiktokContainers) {
                    if (tiktokContainers.length > 0) {
                        tiktokContainers.forEach(item => {
                            item.setAttribute('href', tiktok);
                            item.setAttribute('target', '_blank');
                        })
                    } else {
                        tiktokContainers.setAttribute('href', tiktok);
                        tiktokContainers.setAttribute('target', '_blank');
                    }
                }

                if (threads && threads.length > 0 && threadsContainers) {
                    if (threadsContainers.length > 0) {
                        threadsContainers.forEach(item => {
                            item.setAttribute('href', threads);
                            item.setAttribute('target', '_blank');
                        })
                    } else {
                        threadsContainers.setAttribute('href', threads);
                        threadsContainers.setAttribute('target', '_blank');
                    }
                }

                if (aboutUs && aboutUs.length > 0 && aboutContainer) {
                    if (aboutContainer.length > 0) {
                        aboutContainer.forEach(item => {
                            item.innerHTML = aboutUs;
                        })
                    } else {
                        aboutContainer.innerHTML = aboutUs;
                    }
                }


            }
        }

    } catch (e) {
        console.error(e)
        ExceptionHandler(e)
    }
}

init()

