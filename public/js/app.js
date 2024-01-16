document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('form').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        fetch('/api/message', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest', // This is required if your route is under 'web' middleware group
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                // 'Authorization': 'Bearer ' + token, // If you're using token-based authentication
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // console.log(data);
            popup(data.render, 'success');
        })
        .catch((error) => {
            console.error('Error:', error);
            // Handle error
        });
    });

    if (document.querySelector('#news')) {
        document.querySelector('#event-more').addEventListener('click', (e) => {
            e.preventDefault();
            let nextPage = document.querySelector('#news .event-items').dataset.nextPage;
            let nextPages = document.querySelector('#event-more').getAttribute('href');

            loadNextPage(nextPage);
        });
    }
})

function loadNextPage(nextPage) {
    // Получение значения атрибута data-next-page
    // var nextPageNum = eventItemsContainer.dataset.nextPage;
    // let nextPage =1;
    // Формирование URL для запроса
    let url = `/update?page=${nextPage}`;
    let news = document.querySelector('#news');

    news.classList.add('loading');

    // Выполнение AJAX-запроса с использованием fetch
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        // Дополнительные настройки запроса, если необходимо
    })
    .then(response => response.json())
    .then(data => {
        news.innerHTML = data.html;
        news.classList.remove('loading');
    })
    .catch(error => {
        console.error('Ошибка запроса:', error);
    });
}

function popup(content, currentClass) {
    let popup = document.querySelector('.popup');
    let popupContent = document.querySelector('.popup-inner');

    popupContent.classList.add(`${currentClass}`);
    popup.classList.add('shows');
    document.body.classList.add('show');

    popupContent.innerHTML = content;
}