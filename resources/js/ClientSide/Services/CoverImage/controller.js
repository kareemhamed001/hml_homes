import CoverImage from "@/Api/Package/api";

class CoverImageController {

    constructor() {
        this.coverImage = new CoverImage();
    }


    static showPreview(coverImages, containerId = 'coverImagesContainer') {
        try {
            let coverImagesContainer = document.getElementById(containerId);
            if (coverImages && coverImages.length > 0 && typeof coverImages.forEach === 'function') {
                let activeItem=0;
                coverImages.forEach(coverImage => {
                    let uiItem=this.append(coverImage, coverImagesContainer)
                    if (activeItem===0){
                        uiItem.classList.add('active');
                        activeItem++;
                    }
                })
            }

        } catch (e) {
            throw e;
        }
    }

    static append(item, itemsContainer) {

        try {
            let caruselItem = document.createElement('div');
            caruselItem.classList.add('carousel-item');

            let img = document.createElement('img');
            img.classList.add('carousel-img');
            img.setAttribute('src', item.image);
            img.setAttribute('alt', item.title);
            caruselItem.appendChild(img);


            itemsContainer.appendChild(caruselItem);


            return caruselItem;
        } catch (e) {
            throw e;
        }
    }


}


export default CoverImageController
