// PaginationHelper.js
export default class PaginationHelper {
    constructor(itemsPerPage, totalItems, currentPage, lastPage, onPageChangeCallback) {
        this.itemsPerPage = itemsPerPage;
        this.totalItems = totalItems;
        this.currentPage = currentPage;
        this.lastPage = lastPage;
        this.onPageChangeCallback = onPageChangeCallback;
        this.totalPages = lastPage;
    }

    renderPagination() {
        const paginationContainer = document.createElement('ul');
        paginationContainer.classList.add('pagination');

        const prevButton = this.createPageButton('Previous', this.currentPage - 1);
        paginationContainer.appendChild(prevButton);

        for (let i = 1; i <= this.totalPages; i++) {
            const pageButton = this.createPageButton(i, i);
            paginationContainer.appendChild(pageButton);
        }

        const nextButton = this.createPageButton('Next', this.currentPage + 1);
        paginationContainer.appendChild(nextButton);

        return paginationContainer;
    }

    createPageButton(label, pageNumber) {
        const pageButton = document.createElement('li');
        pageButton.classList.add('page-item');
        if (pageNumber === this.currentPage) {
            pageButton.classList.add('active');
        }
        const link = document.createElement('a');
        link.classList.add('page-link');
        link.href = '#';
        link.textContent = label;

        // Disable the "Previous" and "Next" buttons if it's the first or last page
        if ((pageNumber === 0 && label === 'Previous') || (pageNumber > this.totalPages && label === 'Next')) {
            pageButton.classList.add('disabled');
        } else {
            link.addEventListener('click', (event) => {
                event.preventDefault();

                this.onPageChangeCallback(pageNumber);
            });
        }

        pageButton.appendChild(link);

        return pageButton;
    }

    static async showPagination(pagination, containerId = 'pagination', callback = null, listFunction, previewType = 'swal', responseType = 'json') {
        try {
            let paginationContainer = document.getElementById(containerId);
            paginationContainer.innerHTML = '';

            let pages = Math.ceil(pagination.total / pagination.per_page);

            let paginationItemsContainer = document.createElement('ul');
            paginationItemsContainer.classList.add('pagination', 'p-1');

            // Calculate the total number of pages
            let maxPages = Math.min(pages, 10);

            // Calculate the start and end of the current set of pages
            let startPage = Math.max(1, pagination.current_page - Math.floor(maxPages / 2));
            let endPage = Math.min(pages, startPage + maxPages - 1);

            // Add "Previous" button
            if (pagination.current_page > 1) {
                let prevPaginationItem = document.createElement('li');
                prevPaginationItem.classList.add('custom-page-item');
                let prevPaginationLink = document.createElement('a');
                prevPaginationLink.classList.add('custom-page-link');
                prevPaginationLink.setAttribute('href', '#');
                prevPaginationLink.innerText = 'Previous';
                prevPaginationItem.appendChild(prevPaginationLink);
                paginationItemsContainer.appendChild(prevPaginationItem);

                prevPaginationLink.addEventListener('click', async (e) => {
                    e.preventDefault();

                    let prevPage = Math.max(1, pagination.current_page - 10);


                    await listFunction(prevPage, pagination.per_page, previewType, responseType);

                });
            }

            // Add page links
            for (let i = startPage; i <= endPage; i++) {
                let paginationItem = document.createElement('li');
                paginationItem.classList.add('custom-page-item');
                let paginationLink = document.createElement('a');
                paginationLink.classList.add('custom-page-link');
                paginationLink.setAttribute('href', '#');
                paginationLink.innerText = i;

                if (i === pagination.current_page) {
                    paginationItem.classList.add('active');
                }

                paginationItem.appendChild(paginationLink);
                paginationItemsContainer.appendChild(paginationItem);

                paginationLink.addEventListener('click', async (e) => {
                    e.preventDefault();
                    if (callback) {
                        callback(i);
                    }
                    await listFunction(i, pagination.per_page, previewType, responseType);

                });
            }

            // Add "Next" button
            if (pagination.current_page < pages) {
                let nextPage = Math.min(pages, endPage + 1);
                let nextPaginationItem = document.createElement('li');
                nextPaginationItem.classList.add('custom-page-item');
                let nextPaginationLink = document.createElement('a');
                nextPaginationLink.classList.add('custom-page-link');
                nextPaginationLink.setAttribute('href', '#');
                nextPaginationLink.innerText = 'Next';
                nextPaginationItem.appendChild(nextPaginationLink);
                paginationItemsContainer.appendChild(nextPaginationItem);

                nextPaginationLink.addEventListener('click', async (e) => {
                    e.preventDefault();
                    await listFunction(nextPage, pagination.per_page, previewType, responseType);

                });
            }

            paginationContainer.appendChild(paginationItemsContainer);

        } catch (e) {
            console.error(e.message);
            throw e;
        }
    }

}

