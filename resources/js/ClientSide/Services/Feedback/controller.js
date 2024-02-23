class FeedbackController {

    constructor() {

    }



    static showPreview(feedbacks, containerId = 'feedbacksContainer') {
        try {
            let feedbacksContainer = document.getElementById(containerId);

            if (!feedbacksContainer)
                throw new Error('Feedbacks Container not found')

            feedbacksContainer.innerHTML = '';
            if (feedbacks && feedbacks.length > 0 && typeof feedbacks.forEach === 'function') {
                feedbacks.forEach(feedback => {
                    this.append(feedback, feedbacksContainer)
                })
            }

        } catch (e) {
            throw e;
        }
    }

    static append(item, itemsContainer) {

        try {

            let rateItems = '';
            for (let i = 0; i < item.rate; i++) {
                rateItems += `<i class="fas fa-star rating-color"></i>`
            }
            for (let i = 0; i < 5 - item.rate; i++) {
                rateItems += `<i class="far fa-star"></i>`
            }
            let uiItem =
                `
                <div class="col-lg-4 col-6 feedback-item">
                <div class="card feedback-card ">
                    <div class="card-body  feedback-card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row w-auto align-items-center">
                                <div class="feedback-user-image-container">
                                    <img class="feedback-user-image" src="${item.user_image}" alt="">
                                </div>
                                <div class="feedback-user-name">
                                    ${item.user_name}
                                </div>
                            </div>
                            <div class="ratings">
                                ${rateItems}
                            </div>
                        </div>
                        <div class="feedback-description">
                            ${item.comment}
                        </div>
                    </div>
                </div>
            </div>
                `

            itemsContainer.innerHTML += uiItem;

        } catch (e) {
            throw e;
        }
    }


}


export default FeedbackController
