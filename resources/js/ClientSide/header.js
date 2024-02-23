import Setting from "./Api/Settings/api.js";

let setting = new Setting();
let darkLogo = null;
let lightLogo = null;

async function getLogo(){
    let settingResponse = await setting.list(1, 1, false);
    if (settingResponse.response) {
        let data = settingResponse.response.data.data;
        darkLogo = data.website_logo_dark;
        lightLogo = data.website_logo;
    }

}
getLogo();
const fixed_header = document.querySelector('#header');
const logoImage = document.querySelector('#lower-header .logo');
if (window.scrollY <= fixed_header.clientHeight) {
    fixed_header.classList.remove('fixed-header')
    logoImage.classList.add('dark-logo');
    if (darkLogo) {
        logoImage.src = darkLogo;
    }else if (lightLogo) {
        logoImage.src = lightLogo;
    }
} else {
    if (lightLogo) {
        logoImage.src = lightLogo;
    }else if (darkLogo) {
        logoImage.src = darkLogo;
    }
}
document.addEventListener('scroll', function () {
    const scrollY = window.scrollY;

    // Adjust the condition based on when you want the background to change
    if (scrollY > fixed_header.clientHeight - 100) {
        fixed_header.classList.add('fixed-header', 'home-header');
        logoImage.classList.remove('dark-logo');
        if (lightLogo) {
            logoImage.src = lightLogo;
        }else if (darkLogo) {
            logoImage.src = darkLogo;
        }
        fixed_header.style.position = 'fixed !important';
    } else {
        fixed_header.classList.remove('fixed-header', 'home-header');
        logoImage.classList.add('dark-logo');
        if (darkLogo) {
            logoImage.src = darkLogo;
        }else if (lightLogo) {
            logoImage.src = lightLogo;
        }
    }
});

let headerLinks = document.querySelectorAll('.header-link');

headerLinks.forEach(function (link) {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        let target = link.getAttribute('href');
        let targetElement = document.querySelector(target);
        let targetElementOffset = targetElement.offsetTop;
        window.scrollTo(0, targetElementOffset - fixed_header.clientHeight + 20);

        e.target.parentElement.parentElement.querySelectorAll('.header-link').forEach(function (link) {
            link.classList.remove('active');

        })
        e.target.classList.add('active');
    })
})
