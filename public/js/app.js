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
})

function popup(content, currentClass) {
    let popup = document.querySelector('.popup');
    let popupContent = document.querySelector('.popup-inner');

    popupContent.classList.add(`${currentClass}`);
    popup.classList.add('shows');
    document.body.classList.add('show');

    popupContent.innerHTML = content;
}