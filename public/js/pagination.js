const itemList = $('#pagination-list .item-list');
const paginationNumbers = $('#pagination-numbers');

let paginationLimit = Number($('#show').val());
let pageCount = Math.ceil(itemList.length / paginationLimit);
let currentPage = 1;

const disableBtn = (btn, pageItem) => {
    pageItem.classList.add('disabled');
    btn.attr("disabled", true);
}

const enableBtn = (btn, pageItem) => {
    pageItem.classList.remove('disabled');
    btn.removeAttr("disabled");
}

const handlePageButtonsStatus = () => {
    if (currentPage === 1) {
        disableBtn($('#prev-btn'), $('.pagination .page-item').get(0));
    } else {
        enableBtn($('#prev-btn'), $('.pagination .page-item').get(0));
    }

    if (currentPage === pageCount) {
        disableBtn($('#next-btn'), $('.pagination .page-item').get($('.pagination .page-item').length - 1));
    } else {
        enableBtn($('#next-btn'), $('.pagination .page-item').get($('.pagination .page-item').length - 1));
    }
}

const appendPageNumber = (i) => {
    const elementNumber = `<li class="page-item pagination-number" page-index="${i}"><button type="button" class="page-link">${i}</button></li>`;
    paginationNumbers.append(elementNumber);
}

const getPaginationNumbers = () => {
    const prevElement = `
        <li class="page-item">
            <button type="button" id="prev-btn" class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </button>
        </li>
    `;

    const nextElement = `
    <li class="page-item">
        <button type="button" id="next-btn" class="page-link" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </button>
    </li>
    `;

    // Reset
    paginationNumbers.html("");

    paginationNumbers.append(prevElement);
    for (let i = 1; i <= pageCount; i++) {
        appendPageNumber(i);
    }
    paginationNumbers.append(nextElement);
}

const handleActivePageNumber = () => {
    $.each($('#pagination-numbers .pagination-number'), (idx, item) => {
        item.classList.remove('active');
        const pageIndex = item.getAttribute('page-index');
        if (pageIndex == currentPage) {
            item.classList.add('active');
        }
    })
}

const setCurrentPage = (pageNum) => {
    currentPage = pageNum;

    handleActivePageNumber();
    handlePageButtonsStatus();

    const prevRange = (pageNum - 1) * paginationLimit;
    const nextRange = pageNum * paginationLimit;

    $.each(itemList, (idx, item) => {
        item.classList.add('d-none')

        if (idx >= prevRange && idx < nextRange) {
            item.classList.remove('d-none')
        }
    });

}

const startPagination = () => {
    getPaginationNumbers();
    setCurrentPage(1);

    $('#prev-btn').on('click', () => {
        console.log(true);
        setCurrentPage(currentPage - 1);
    });

    $('#next-btn').on('click', () => {
        console.log(true);
        setCurrentPage(currentPage + 1);
    });

    $.each($('#pagination-numbers .pagination-number'), (idx, item) => {
        const pageIndex = item.getAttribute('page-index');
        if (pageIndex) {
            item.addEventListener("click", () => {
                setCurrentPage(pageIndex);
            });
        }
    })
}

$(function () {
    startPagination();
    
    $('#show').on('change', () => {
        let val = Number($('#show').val());
        const countAllData = itemList.length;

        if(val === 0) val = countAllData;
        
        paginationLimit = val;
        pageCount = Math.ceil(itemList.length / paginationLimit);

        startPagination();
    });
});