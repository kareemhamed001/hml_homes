class CardBuilder {
    constructor() {
        this.cardContainer = document.createElement('div');
        this.card = document.createElement('div');
        this.card.classList.add('card');
        this.card.classList.add('mb-3');
    }

    setHeader(title) {
        let header = document.createElement('div');
        header.classList.add('card-header');
        header.innerHTML = title;
        this.card.appendChild(header);
        return this;
    }

    setBody(body) {
        let cardBody = document.createElement('div');
        cardBody.classList.add('card-body');
        cardBody.innerHTML = body;
        this.card.appendChild(cardBody);
        return this;
    }

    setFooter(footer) {
        let cardFooter = document.createElement('div');
        cardFooter.classList.add('card-footer');
        cardFooter.innerHTML = footer;
        this.card.appendChild(cardFooter);
        return this;
    }

    setCardContainerId(id) {
        this.cardContainer.id = id;
        return this;
    }

    setCardId(id) {
        this.card.id = id;
        return this;
    }

    setCardClass(className) {
        this.card.classList.add(...className);
        return this;
    }

    setCardStyle(style) {
        this.card.style = style;
        return this;
    }

    setCardContainerClass(className) {
        this.cardContainer.classList.add(...className);
        return this;
    }

    setDataSet(key, value) {
        this.card.dataset[key] = value;
        return this;
    }

    setCardContainerStyle(style) {
        this.cardContainer.style = style;
        return this;
    }

    setCardAttribute(key, value) {
        this.card.setAttribute(key, value);
        return this;
    }

    setFooterClass(className) {
        this.card.querySelector('.card-footer').classList.add(...className);
        return this;
    }

    setHeaderClass(className) {
        this.card.querySelector('.card-header').classList.add(...className);
        return this;
    }

    setBodyClass(className) {
        this.card.querySelector('.card-body').classList.add(...className);
        return this;
    }

    build() {
        this.cardContainer.appendChild(this.card);
        return this.cardContainer;
    }
}

export default CardBuilder;
