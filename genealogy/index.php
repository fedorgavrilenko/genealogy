<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/~s338930/genealogy/assets/genealogy.css">

    <!-- icon -->
    <link rel="icon" href="/~s338930/genealogy/assets/favicon.svg" type="image/svg+xml">
    <link rel="icon" href="/~s338930/genealogy/assets/favicon.png" type="image/png">

    <title>Генеалогическое древо</title>
</head>

<body id="body-auth">
    <section id="section-auth">
        <div id="section-auth-container">
            <!-- Заголовок будет меняться -->
            <h1 class="text-align-left margin-bottom-20" id="auth-title">Регистрация</h1>

            <div class="padding-8-12 shadow margin-bottom-20" id="auth-form">
                <!-- Поля для регистрации -->
                <div class="flex-inline space-between margin-bottom-12" id="username-field">
                    <div class="annotate-and-text">
                        <span>Имя пользователя*</span>
                        <input type="text" id="username-input" placeholder="username" autocomplete="username" required>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12" id="password-field">
                    <div class="annotate-and-text">
                        <span>Пароль*</span>
                        <input type="password" id="password-input" placeholder="От 6 до 20 символов"
                            autocomplete="current-password" required>
                    </div>
                </div>
                <!-- Дополнительные поля для регистрации -->
                <div class="flex-inline space-between margin-bottom-12" id="real-name-field">
                    <div class="annotate-and-text">
                        <span>Настоящее имя</span>
                        <input type="text" id="real-name-input" placeholder="Иван Иванов" autocomplete="name">
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12" id="email-field">
                    <div class="annotate-and-text">
                        <span>Электронная почта*</span>
                        <input type="email" id="email-input" placeholder="mail@example.com" autocomplete="email"
                            required>
                    </div>
                </div>
                <span class="tiny">* — обязательные для заполнения поля</span>
            </div>

            <div class="button-sumbit-cancel flex-inline space-between margin-bottom-12">
                <input type="submit" id="auth-submit-btn" class="padding-4-8 submit" tabindex="0"
                    value="Регистрация"></input>
            </div>
            <span class="tiny span-link" id="auth-switch-mode">Уже есть аккаунт?</span>
        </div>
    </section>

    <div id="auth-overlay-image"><video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="https://se.ifmo.ru/~s338930/genealogy/assets/playback.mp4" type="video/mp4">
        </video></div>

    <script>

        // заполнение контентом
        // API подключение, получение данных
        const API_BASE = 'https://se.ifmo.ru/~s338930/genealogy/api/';
        async function apiRequest(endpoint, data = {}) {
            try {
                const response = await fetch(API_BASE + endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data),
                    credentials: 'include'
                });

                if (!response.ok) {
                    const err = await response.json().catch(() => null);
                    throw new Error(err?.message || `HTTP error ${response.status}`);
                }

                return await response.json();
            } catch (error) {
                console.error('API Error:', error);
                alert(error.message);
                return { status: 'error', message: error.message };
            }
        }


        // Текущий режим (регистрация/авторизация)
        let isLoginMode = false;

        // Инициализация при загрузке страницы
        document.addEventListener('DOMContentLoaded', function () {
            // Обработчик переключения между режимами
            document.getElementById('auth-switch-mode').addEventListener('click', toggleAuthMode);

            // Обработчик отправки формы
            document.getElementById('auth-submit-btn').addEventListener('click', handleAuthSubmit);
        });

        // Переключение между режимами регистрации и входа
        function toggleAuthMode() {
            isLoginMode = !isLoginMode;

            const title = document.getElementById('auth-title');
            const submitBtn = document.getElementById('auth-submit-btn');
            const switchModeText = document.getElementById('auth-switch-mode');

            if (isLoginMode) {
                // Режим входа
                title.textContent = 'Вход';
                submitBtn.value = 'Войти';
                switchModeText.textContent = 'Нет аккаунта?';

                // Скрываем дополнительные поля
                document.getElementById('real-name-field').style.display = 'none';
                document.getElementById('email-field').style.display = 'none';
            } else {
                // Режим регистрации
                title.textContent = 'Регистрация';
                submitBtn.value = 'Регистрация';
                switchModeText.textContent = 'Уже есть аккаунт?';

                // Показываем дополнительные поля
                document.getElementById('real-name-field').style.display = 'flex';
                document.getElementById('email-field').style.display = 'flex';
            }
        }

        // Обработка отправки формы
        async function handleAuthSubmit() {
            const username = document.getElementById('username-input').value.trim();
            const password = document.getElementById('password-input').value.trim();

            if (!username || !password) {
                alert('Имя пользователя и пароль обязательны для заполнения');
                return;
            }

            if (isLoginMode) {
                // Авторизация
                const formData = {
                    username: username,
                    password: password
                };

                try {
                    const response = await apiRequest('user_auth.php', formData);
                    if (response.status === 'success') {
                        // Перенаправляем пользователя после успешного входа
                        window.location.href = './trees/';
                    } else {
                        alert(response.message || 'Ошибка авторизации');
                    }
                } catch (error) {
                    console.error('Auth error:', error);
                    alert('Произошла ошибка при авторизации');
                }
            } else {
                // Регистрация
                const email = document.getElementById('email-input').value.trim();
                const realName = document.getElementById('real-name-input').value.trim();

                if (!email) {
                    alert('Email обязателен для регистрации');
                    return;
                }

                const formData = {
                    username: username,
                    password: password,
                    email: email
                };

                // Добавляем реальное имя, если оно указано
                if (realName) {
                    formData.real_name = realName;
                }

                try {
                    const response = await apiRequest('user_reg.php', formData);
                    if (response.status === 'success') {
                        // Автоматически входим после регистрации
                        const authResponse = await apiRequest('user_auth.php', { username, password });
                        if (authResponse.status === 'success') {
                            window.location.href = './trees/';
                        }
                    } else {
                        alert(response.message || 'Ошибка регистрации');
                    }
                } catch (error) {
                    console.error('Registration error:', error);
                    alert('Произошла ошибка при регистрации');
                }
            }
        }
    </script>
</body>


</html>