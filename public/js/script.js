document.addEventListener('DOMContentLoaded', function () {
    fetch('/transaction/total-hours')
        .then(response => response.json())
        .then(data => {
            document.getElementById('totalHours').innerText = `Доступно к выводу: ${data.total_hours}`;
        })
        .catch(error => console.error('Error:', error));
});
function togglePassword() {
    var passwordInput = document.getElementById("password");
    var toggleButton = document.querySelector(".toggle-password");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleButton.textContent = "👁";
    } else {
        passwordInput.type = "password";
        toggleButton.textContent = "👁";
    }
}
$(document).ready(function () {
    // Обработчик события отправки формы
    $('#hoursWork').click(function (event) {
        event.preventDefault(); // Предотвращаем стандартное действие отправки формы

        var numberOfHours = $('#numberOfHours').val(); // Получаем значение из поля ввода
        var yourAuthToken = localStorage.getItem('yourAuthToken');

        $.ajax({
            url: '/api/transactions',
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + yourAuthToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                numberOfHours: numberOfHours,
            },
            success: function(response) {
                console.log(response.message);
                window.location.href = '/transaction';
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.log(yourAuthToken);
            }
        });
    });

    $('#authButton').submit(function (event) {
        event.preventDefault();

        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax({
            url: '/api/auth',
            method: 'POST',
            data: {
                email: email,
                password: password,
            },
            success: function(response) {
                console.log(response.message);
                // Сохраняем токен в localStorage или в cookie
                localStorage.setItem('authToken', response.access_token);
                window.location.href = '/transaction';
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    $('#logout').click(function (event) {
        event.preventDefault();

        var authToken = localStorage.getItem('authToken');

        $.ajax({
            url: '/api/logout',
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + authToken,
            },
            success: function(response) {
                console.log(response.message);
                // Удаляем токен из localStorage или из cookie
                localStorage.removeItem('authToken');
                window.location.href = '/';
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});


