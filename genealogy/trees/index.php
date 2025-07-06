<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/~s338930/genealogy/assets/genealogy.css">

    <!-- icon -->
    <link rel="icon" href="/~s338930/genealogy/assets/favicon.svg" type="image/svg+xml">
    <link rel="icon" href="/~s338930/genealogy/assets/favicon.png" type="image/png">

    <title>Доступные деревья</title>
</head>

<body>
    <!-- v создание древа -->
    <section id="modal-tree-create" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline end margin-bottom-12">
                <!-- Кнопка закрытия -->
                <button id="close-create-modal-btn" class="default-button light-gray icon-close"></button>
            </div>
            <div class="header">
                <h1 class="margin-0-auto">Создание древа</h1>
            </div>
            <div class="padding-8-12 shadow margin-bottom-20">
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Название</span>
                        <input type="text" id="tree-title-input" placeholder="Название древа" required>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Доступ</span>
                        <div>
                            <input type="radio" name="tree-access" id="public" value="true" required>
                            <label for="public">Публичный</label>
                            <input class="margin-left-8" type="radio" name="tree-access" id="private" value="false">
                            <label for="private">Частный</label>
                        </div>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Описание</span>
                        <textarea id="tree-description-input" rows="5" placeholder="Описание древа"></textarea>
                    </div>
                </div>
            </div>
            <div class="button-sumbit-cancel flex-inline space-between">
                <button id="modal-tree-create-submit-create-btn" class="padding-4-8 submit"
                    tabindex="0">Создать</button>
                <button id="modal-tree-create-cancel-create-btn" class="padding-4-8 cancel" tabindex="0">Отмена</button>
            </div>
        </div>
    </section>

    <section id="header">
        <div id="header-first-row" class="flex-inline space-between align-items-center margin-bottom-20">
            <div id="name-row">
                <!-- Кнопка выхода -->
                <button class="default-button black icon-exit">
                </button>
                <h1 class="margin-left-8">Добро пожаловать, выберете или создайте древо</h1>
            </div>
        </div>
    </section>

    <section id="screen-list">
        <div class="big-list-unit">
            <div class="header flex-inline space-between align-items-end">
                <h2>Доступные древа</h2>
                <span class="add-button bg-blue">+</span>
            </div>
            <div class="content shadow">
                <div class="list-unit flex-inline space-between header">
                    <div class="left-side">
                        <span>Название</span>
                    </div>
                    <div class="right-side grid-4-columns   ">
                        <span style="grid-column: 1;">Создание</span>
                        <span style="grid-column: 2;">Редактирование</span>
                        <span style="grid-column: 3;">Доступ</span>
                        <span style="grid-column: 4;">Имя создателя</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
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

        async function builder() {
            let data = await apiRequest('user_get_trees.php', {});

            console.log(data);
            if (data.status === 'success') {
                populateTreesList(data.response.trees);

                // Пример использования:
                const userAvatar = createUserAvatar(`${data.response.username}`);
                document.getElementById('header-first-row').appendChild(userAvatar);
            } else {
                window.location.href = 'https://se.ifmo.ru/~s338930/genealogy/';
            }
        }


        //
        //
        //
        // ЗАПОЛНЕНИЕ СПИСКА
        //
        function populateTreesList(trees) {
            const contentDiv = document.querySelector('#screen-list .big-list-unit .content');

            // console.log(sortedIndividuals)
            if (trees.length == 0) {
                // alert('spisok pust');
                contentDiv.innerHTML = 'Список пуст. Добавьте первую персону нажатием на кнопку +';
                contentDiv.classList.add('text-align-center');
                contentDiv.classList.add('tiny');
                return;
            }


            // Очищаем контент, оставляя только заголовок
            const header = contentDiv.querySelector('.list-unit.header');
            contentDiv.innerHTML = '';
            contentDiv.appendChild(header);

            // Добавляем каждое дерево в список
            trees.forEach(tree => {
                const treeElement = document.createElement('div');
                treeElement.className = 'list-unit hover-list-unit flex-inline space-between';
                treeElement.dataset.uuid = tree.uuid; // Сохраняем uuid в data-атрибуте

                // Форматируем даты
                const createdAt = formatDate(tree.created_at);
                const updatedAt = formatDate(tree.updated_at);
                const accessType = tree.is_public ? 'Публичное' : 'Приватное';

                treeElement.innerHTML = `
            <div class="left-side">
                <span>${tree.name}</span>
            </div>
            <div class="right-side grid-4-columns">
                <span style="grid-column: 1;">${createdAt}</span>
                <span style="grid-column: 2;">${updatedAt}</span>
                <span style="grid-column: 3;">${accessType}</span>
                <span style="grid-column: 4;">${tree.creator_username}</span>
            </div>
        `;

                // Добавляем обработчик клика
                treeElement.addEventListener('click', () => {
                    window.location.href = `tree.php?uuid=${tree.uuid}`;
                });

                contentDiv.appendChild(treeElement);
            });
        }

        // Функция для форматирования даты в DD-MM-YYYY
        function formatDate(dateString) {
            if (!dateString) return '';

            try {
                const date = new Date(dateString);
                const day = date.getDate().toString().padStart(2, '0');
                const month = (date.getMonth() + 1).toString().padStart(2, '0');
                const year = date.getFullYear();

                return `${day}-${month}-${year}`;
            } catch (e) {
                console.error('Error formatting date:', e);
                return dateString; // Возвращаем исходную строку в случае ошибки
            }
        }


        //
        //
        // СОЗДАНИЕ ДРЕВА
        //
        // Функции управления модальным окном
        function openTreeCreateModal() {
            document.getElementById('modal-tree-create').classList.remove('disable');
            setupTreeCreateModalHandlers();
        }

        function closeTreeCreateModal() {
            document.getElementById('modal-tree-create').classList.add('disable');
            clearTreeCreateForm();
        }

        function clearTreeCreateForm() {
            document.getElementById('tree-title-input').value = '';
            document.getElementById('tree-description-input').value = '';

            // Сбрасываем выбор типа доступа
            const accessRadios = document.querySelectorAll('input[name="tree-access"]');
            for (let i = 0; i < accessRadios.length; i++) {
                accessRadios[i].checked = false;
            }
        }

        // Настройка обработчиков
        function setupTreeCreateModalHandlers() {
            const modal = document.getElementById('modal-tree-create');

            // Закрытие по клику на фон
            modal.addEventListener('click', function (e) {
                if (e.target === this) {
                    closeTreeCreateModal();
                }
            });

            // Закрытие по кнопке закрытия
            document.getElementById('close-create-modal-btn').addEventListener('click', closeTreeCreateModal);

            // Закрытие по кнопке отмены
            document.getElementById('modal-tree-create-cancel-create-btn').addEventListener('click', closeTreeCreateModal);

            // Обработка создания древа
            document.getElementById('modal-tree-create-submit-create-btn').addEventListener('click', createTree);
        }

        // Функция создания древа
        async function createTree() {
            // Получаем значения полей
            const title = document.getElementById('tree-title-input').value.trim();
            const isPublic = document.querySelector('input[name="tree-access"]:checked')?.value === 'true';
            const description = document.getElementById('tree-description-input').value.trim();

            // Валидация
            if (!title) {
                alert('Пожалуйста, укажите название древа');
                return;
            }

            if (document.querySelector('input[name="tree-access"]:checked') === null) {
                alert('Пожалуйста, выберите тип доступа');
                return;
            }

            // Формируем данные для отправки
            const formData = {
                tree_name: title,
                is_public: isPublic.toString()
            };

            // Добавляем описание, если оно есть
            if (description) {
                formData.description = description;
            }

            console.log(formData);

            try {
                // Отправляем запрос
                const response = await apiRequest('user_create_tree.php', formData);

                if (response.status === 'success') {
                    // Очищаем форму
                    clearTreeCreateForm();

                    window.location.href = `tree.php?uuid=${response.response.tree_uuid}`;

                    // Закрываем модальное окно
                    closeTreeCreateModal();


                } else {
                    alert('Ошибка при создании древа: ' + (response.message || 'Неизвестная ошибка'));
                }
            } catch (error) {
                console.error('Ошибка при создании древа:', error);
                alert('Произошла ошибка при отправке данных на сервер');
            }
        }

        document.querySelector('.add-button.bg-blue').addEventListener('click', openTreeCreateModal);
        //
        //
        //

        builder();
    </script>

    <script>
        document.querySelector('.default-button.black.icon-exit').addEventListener('click', async function () {
            try {
                // 1. Отправляем запрос на выход (очистку сессии)
                const logoutResponse = await apiRequest('logout.php');

                window.location.href = 'https://se.ifmo.ru/~s338930/genealogy/';

            } catch (error) {
                console.error('Logout failed:', error);
                // В случае ошибки всё равно перенаправляем, но с предупреждением
                alert('Выход не удался, но вы будете перенаправлены');
                const parentUrl = new URL('./', window.location.href);
                window.location.href = parentUrl.toString();
            }
        });

        // Словарь иконок с полными SVG структурами
        const icons = {
            'delete': `
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
    <path d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" fill="var(--gray-text)"/>
</svg>
`,
            'exit': `
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
<path fill-rule="evenodd" d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
</svg>


`,
            'settings': `
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.50073 11.9993C4.50073 16.1414 7.8586 19.4993 12.0007 19.4993C16.1429 19.4993 19.5007 16.1414 19.5007 11.9993M4.50073 11.9993C4.50073 7.85712 7.8586 4.49925 12.0007 4.49925C16.1429 4.49926 19.5007 7.85712 19.5007 11.9993M4.50073 11.9993L3.00073 11.9993M19.5007 11.9993L21.0007 11.9993M19.5007 11.9993L12.0007 11.9993M3.54329 15.0774L4.95283 14.5644M19.0482 9.43411L20.4578 8.92108M5.1062 17.785L6.25527 16.8208M17.7459 7.17897L18.895 6.21479M7.50064 19.7943L8.25064 18.4952M15.7506 5.50484L16.5006 4.2058M10.4378 20.8633L10.6983 19.386M13.303 4.61393L13.5635 3.13672M13.5635 20.8633L13.303 19.3861M10.6983 4.61397L10.4378 3.13676M16.5007 19.7941L15.7507 18.4951M7.50068 4.20565L12.0007 11.9993M18.8952 17.7843L17.7461 16.8202M6.25542 7.17835L5.10635 6.21417M20.458 15.0776L19.0485 14.5646M4.95308 9.43426L3.54354 8.92123M12.0007 11.9993L8.25073 18.4944" stroke="var(--black)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`,
            'close': `
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
    <path d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" fill="var(--gray-text)"/>
</svg>
`,
            'closeNav': `
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.78 7.595a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06l2.72-2.72-2.72-2.72a.75.75 0 0 1 1.06-1.06l3.25 3.25Zm-8.25-3.25 3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06l2.72-2.72-2.72-2.72a.75.75 0 0 1 1.06-1.06Z"/>
</svg>
`,
            // можно добавить другие иконки
        };

        // Функция для создания SVG элемента из строки
        function createSVG(iconName) {
            const iconSVG = icons[iconName];
            if (!iconSVG) return null;

            // Создаем временный div для парсинга SVG строки
            const div = document.createElement('div');
            div.innerHTML = iconSVG.trim();

            // Возвращаем первый дочерний элемент (наш SVG)
            return div.firstChild;
        }

        // Инициализация - добавляем иконки всем элементам с соответствующими классами
        function initIcons() {
            // Ищем все классы, начинающиеся с icon-
            const elements = document.querySelectorAll('[class*="icon-"]');

            elements.forEach(element => {
                // Находим класс иконки (первый, который начинается с icon-)
                const iconClass = Array.from(element.classList).find(cls => cls.startsWith('icon-'));
                if (!iconClass) return;

                const iconName = iconClass.replace('icon-', '');
                const svg = createSVG(iconName);

                if (svg) {
                    // Очищаем содержимое элемента и добавляем SVG
                    element.innerHTML = '';
                    element.appendChild(svg);

                    // Если это кнопка, можно добавить текст после иконки
                    if (element.tagName === 'BUTTON' && element.textContent.trim()) {
                        element.appendChild(document.createTextNode(' ' + element.textContent.trim()));
                    }
                }
            });
        }

        // Запускаем при загрузке страницы
        document.addEventListener('DOMContentLoaded', initIcons);

        //
        //
        //
        //
        //
        //
        //
        //
        //
        //
        function createUserAvatar(username) {
            // Создаем div элемент
            const avatar = document.createElement('div');

            // Устанавливаем текст (первые символы имени)
            const text = username ? username.charAt(0).toUpperCase() : '';
            avatar.textContent = text;

            avatar.id = 'avatar-icon';

            return avatar;
        }


    </script>
</body>

</html>