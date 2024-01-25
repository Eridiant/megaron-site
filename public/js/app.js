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

    if (document.querySelector('.flats')) {
        const form = document.querySelector('.form-estate');
        // Добавляем слушатель события на отправку формы
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const estateValue = document.getElementById('estate').value;
            const statusValue = document.getElementById('status').value;
            const bedroomsValue = document.getElementById('bedrooms').value;
            const priceValue = document.getElementById('price').value;
            const priceToValue = document.getElementById('price_to').value;
            const currencyValue = document.getElementById('currency').value;
            const cityValue = document.getElementById('city').value;

            let url = '/apartments?' +
                'estate=' + encodeURIComponent(estateValue) +
                '&status=' + encodeURIComponent(statusValue) +
                '&bedrooms=' + encodeURIComponent(bedroomsValue) +
                '&price=' + encodeURIComponent(priceValue) +
                '&price_to=' + encodeURIComponent(priceToValue) +
                '&currency=' + encodeURIComponent(currencyValue) +
                '&city=' + encodeURIComponent(cityValue);

            let flats = document.querySelector('.flats');

            flats.classList.add('loading');

            loadNextPages(url)
                .then(html => {
                    document.querySelector('.flats').innerHTML = html;
                    // console.log('Полученный HTML:', html);
                    console.log('url', url);
                    window.history.pushState = url;
                })
                .catch(error => {
                    console.error('Произошла ошибка:', error);
                });

            flats.classList.remove('loading');
        });
        document.querySelector('.flats').addEventListener('click', (e) => {
            if (!e.target.closest('#flats-more')) {
                return;
            }
            e.preventDefault();
            let nextPage = document.querySelector('.flats .flats-wrapper').dataset.nextPage;

            const estateValue = document.getElementById('estate').value;
            const statusValue = document.getElementById('status').value;
            const bedroomsValue = document.getElementById('bedrooms').value;
            const priceValue = document.getElementById('price').value;
            const priceToValue = document.getElementById('price_to').value;
            const currencyValue = document.getElementById('currency').value;
            const cityValue = document.getElementById('city').value;

            // let nextPages = document.querySelector('#flats-more').getAttribute('href');

            let url = '/apartments?page=' + nextPage +
                '&estate=' + encodeURIComponent(estateValue) +
                '&status=' + encodeURIComponent(statusValue) +
                '&bedrooms=' + encodeURIComponent(bedroomsValue) +
                '&price=' + encodeURIComponent(priceValue) +
                '&price_to=' + encodeURIComponent(priceToValue) +
                '&currency=' + encodeURIComponent(currencyValue) +
                '&city=' + encodeURIComponent(cityValue);

            let flats = document.querySelector('.flats');

            flats.classList.add('loading');

            loadNextPages(url)
                .then(html => {
                    document.querySelector('.flats').innerHTML = html;
                    // console.log('Полученный HTML:', html);
                })
                .catch(error => {
                    console.error('Произошла ошибка:', error);
                });

            flats.classList.remove('loading');
        });
    }

    if (document.querySelector('#news')) {

        document.querySelector('.event').addEventListener('click', (e) => {
            if (!e.target.closest('#event-more')) {
                return;
            }
            e.preventDefault();
            let nextPage = document.querySelector('#news .event-items').dataset.nextPage;
            // let nextPages = document.querySelector('#event-more').getAttribute('href');

            loadNextPage(nextPage);
        });
    }
})

function loadNextPages(url) {
    return new Promise((resolve, reject) => {
        fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
        .then(response => response.json())
        .then(data => {
            resolve(data.html);
        })
        .catch(error => {
            console.error('Ошибка запроса:', error);
            reject(error);
        });
    });
}

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