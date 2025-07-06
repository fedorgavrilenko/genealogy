<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/~s338930/genealogy/assets/genealogy.css">

    <!-- icon -->
    <link rel="icon" href="/~s338930/genealogy/assets/favicon.svg" type="image/svg+xml">
    <link rel="icon" href="/~s338930/genealogy/assets/favicon.png" type="image/png">

    <title>Древо</title>
</head>

<body>
    <!-- создание семьи -->
    <section id="modal-create-fam" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline end margin-bottom-12">
                <button id="create-fam-close-btn" class="default-button light-gray icon-close"></button>
            </div>

            <div class="header">
                <h1 class="margin-0-auto">Создание новой семьи</h1>
            </div>

            <div class="padding-8-12 shadow margin-bottom-20">
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Муж*</span>
                        <select name="husband" id="select-create-fam-husband">
                            <option value="">-- Выберите мужчину --</option>
                            <!-- Опции будут добавлены динамически -->
                        </select>
                    </div>
                </div>

                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Жена*</span>
                        <select name="wife" id="select-create-fam-wife">
                            <option value="">-- Выберите женщину --</option>
                            <!-- Опции будут добавлены динамически -->
                        </select>
                    </div>
                </div>
                <span class="tiny">* — обязательные для заполнения поля</span>
            </div>

            <div class="button-sumbit-cancel flex-inline space-between" style="gap: 16px;">
                <button id="create-fam-submit-btn" class="padding-4-8 submit" tabindex="0">Создать</button>
                <button id="create-fam-cancel-btn" class="padding-4-8 cancel" tabindex="0">Отмена</button>
            </div>
        </div>
    </section>

    <!-- v создание события древа -->
    <section id="modal-tree-event-create" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline end margin-bottom-12">
                <!-- Кнопка закрытия -->
                <button id="close-tree-event-create" class="default-button light-gray icon-close"></button>
            </div>
            <div class="header">
                <h1 class="margin-0-auto">Создание события древа</h1>
            </div>
            <div class="text-align-center margin-bottom-20">
                <span class="span-link">Прочитать аннотацию</span>
            </div>
            <div class="padding-8-12 shadow margin-bottom-20">
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Название*</span>
                        <input type="text" id="tree-event-title" placeholder="Название" required>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Дата события*</span>
                        <input type="date" id="tree-event-date" required>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Место события</span>
                        <input type="text" id="tree-event-place" placeholder="Страна, город, населённый пункт">
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Описание</span>
                        <textarea type="text" id="tree-event-description-input" rows="5"
                            placeholder="Опишите детали события: влияние на членов родословной, участники, обстоятельства, последствия"></textarea>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Цвет события*</span>
                        <select name="color" id="tree-event-color-select" required>
                            <option value="blue">Синий</option>
                            <option value="green">Зелёный</option>
                            <option value="yellow">Жёлтый</option>
                            <option value="red">Красный</option>
                            <option value="black">Чёрный</option>
                        </select>
                    </div>
                </div>
                <span class="tiny">* — обязательные для заполнения поля</span>
            </div>
            <div class="button-sumbit-cancel flex-inline space-between">
                <button id="tree-event-createsubmit-create-btn" class="padding-4-8 submit" tabindex="0">Создать</button>
                <button id="tree-event-create-cancel-create-btn" class="padding-4-8 cancel" tabindex="0">Отмена</button>
            </div>
        </div>
    </section>

    <!-- v аннотация создание события древа -->
    <section id="modal-tree-event-annotate-create" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline end margin-bottom-12">
                <!-- Кнопка закрытия -->
                <button id="close-tree-event-annotate-create" class="default-button light-gray icon-close"></button>
            </div>
            <div class="header">
                <h1 class="margin-bottom-12">Исторические события, повлиявшие на&nbsp;вашу семью</h1>
            </div>
            <h2 class="margin-bottom-12">Зачем это нужно?</h2>
            <div class="padding-8-12 shadow margin-bottom-20">
                <p>Ваше генеалогическое древо&nbsp;&mdash; это не&nbsp;просто имена и&nbsp;даты. Это история семьи
                    в&nbsp;контексте эпохи: войны,
                    переезды, социальные изменения и&nbsp;даже технологические прорывы могли кардинально менять судьбы
                    ваших
                    предков.</p>
                <p>Добавляя такие события, вы:</p>
                <ul>
                    <li> Визуализируете влияние истории на&nbsp;родословную (например: &laquo;Из-за революции 1917 года
                        семья
                        потеряла имущество и&nbsp;переехала в&nbsp;Сибирь&raquo;).
                    </li>
                    <li>
                        Создаёте &laquo;живую&raquo; хронику рода&nbsp;&mdash; не&nbsp;просто факты, а&nbsp;причины
                        и&nbsp;последствия.
                    </li>
                    <li>
                        Побуждаете к&nbsp;исследованию: &laquo;А&nbsp;что было в&nbsp;нашей семье во&nbsp;время
                        перестройки? А&nbsp;как дед пережил
                        войну?&raquo;.</li>
                </ul>
            </div>
            <h2 class="margin-bottom-12"> Какие события стоит отметить?</h2>
            <div class="padding-8-12 shadow margin-bottom-20">
                <p>Вот категории и&nbsp;примеры событий, которые могли повлиять на&nbsp;вашу семью. Выберите&nbsp;то,
                    что кажется
                    важным субъективно&nbsp;&mdash; даже если это локальная история.</p>
                <div>
                    <h3>Геополитика и&nbsp;войны</h3>
                    <span>(События, которые меняли границы, законы или безопасность)</span>
                    <ul>
                        <li> Революция 1917 года &rarr; Распад империи, репрессии.
                        </li>
                        <li>
                            Начало Великой Отечественной войны (1941) &rarr; Призыв, эвакуация, потеря жилья.
                        </li>
                        <li>
                            Окончание Великой Отечественной войны (1945)
                        </li>
                        <li>
                            Распад СССР (1991) &rarr; Миграция, смена гражданства.
                        </li>
                        <li>
                            Современные конфликты (например, мобилизация 2022).</li>
                    </ul>
                </div>

                <div>
                    <h3>Экономика и&nbsp;быт</h3>
                    <span>(Что меняло уровень жизни, имущество, работу)</span>
                    <ul>
                        <li> Коллективизация (1930-е) &rarr; Потеря частной собственности, переезд в&nbsp;город.
                        </li>
                        <li>
                            Получение квартиры от&nbsp;государства (1950&ndash;1980-е)
                        </li>
                        <li>
                            Деноминация рубля (1998) &rarr; Утрата сбережений
                        </li>
                    </ul>
                </div>


                <div>
                    <h3>Миграции и&nbsp;переезды</h3>
                    <ul>
                        <li> Депортация народов (1940-е) &rarr; Вынужденный переезд.
                        </li>
                        <li>
                            Освоение целины (1950-е) &rarr; Переселение.
                        </li>
                        <li>
                            Эмиграция в&nbsp;1990-х &rarr; Смена страны.
                        </li>
                    </ul>
                </div>

                <div>
                    <h3>Технологии и&nbsp;культура</h3>
                    <ul>
                        <li> Появление телевизора (1960-е) &rarr; Изменение досуга.
                        </li>
                        <li>
                            Интернет в&nbsp;доме (2000-е) &rarr; Связь с&nbsp;родственниками за&nbsp;границей.
                        </li>
                    </ul>
                </div>

                <div>
                    <h3>Семейные кризисы и&nbsp;победы</h3>
                    <ul>
                        <li> Создание семейного бизнеса.
                        </li>
                        <li>Пожар/катастрофа &rarr; Потеря дома.
                        </li>
                    </ul>
                </div>
            </div>

            <h2 class="margin-bottom-12">Как использовать эту информацию?</h2>
            <div class="padding-8-12 shadow margin-bottom-20">
                <ol>
                    <li>
                        Начните с&nbsp;очевидного: Например, если знаете, что прадед воевал&nbsp;&mdash; добавьте ВОВ
                        и&nbsp;укажите его имя.
                    </li>
                    <li>
                        Свяжите события с&nbsp;людьми: &laquo;Из-за Афганской войны (1979&ndash;1989) дядя переехал
                        в&nbsp;другой город&raquo;.
                    </li>
                    <li>
                        Дополняйте постепенно: Не&nbsp;обязательно отмечать всё сразу&nbsp;&mdash; возвращайтесь, когда
                        узнаете новые
                        факты.
                    </li>
                </ol>
            </div>
            <div class="button-sumbit-cancel flex-inline space-between">

                <button id="tree-event-annotate-create-cancel-create-btn" class="padding-4-8 cancel"
                    tabindex="0">Закрыть</button>
            </div>
        </div>
    </section>

    <!-- v создание индивида -->
    <section id="modal-indiv-create" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline end margin-bottom-12">
                <!-- Кнопка закрытия -->
                <button id="close-create-modal-btn" class="default-button light-gray icon-close"></button>
            </div>
            <div class="header">
                <h1 class="margin-0-auto">Создание персоны</h1>
            </div>
            <div class="padding-8-12 shadow margin-bottom-20">
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Фамилия*</span>
                        <input type="text" id="last-name-input" placeholder="Иванов" required>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Имя*</span>
                        <input type="text" id="first-name-input" placeholder="Иван" required>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Отчество</span>
                        <input type="text" id="patronymic-input" placeholder="Иванович">
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Пол*</span>
                        <div>
                            <input type="radio" name="gender" id="male" value="true" required>
                            <label for="male">Мужской</label>
                            <input class="margin-left-8" type="radio" name="gender" id="female" value="false">
                            <label for="female">Женский</label>
                        </div>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Дата рождения*</span>
                        <input type="date" id="birth-date-input" required>

                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Место рождения</span>
                        <input type="text" id="birth-place-input" placeholder="Страна, город, населённый пункт">
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Дата смерти — Оставьте пустым, если персона жива</span>
                        <input type="date" id="death-date-input">
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Место смерти</span>
                        <input type="text" id="death-place-input" placeholder="Страна, город, населённый пункт">
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Описание</span>
                        <textarea id="description-input" rows="5"
                            placeholder="Кратко опишите человека: характер, внешность, профессия, увлечения, важные факты биографии"></textarea>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>URL ссылка на фото</span>
                        <input type="text" id="photo-url-input" placeholder="https://example.com/photo.jpg">
                    </div>
                </div>
                <span class="tiny">* — обязательные для заполнения поля</span>
            </div>
            <div class="button-sumbit-cancel flex-inline space-between">
                <button id="modal-indiv-create-submit-create-btn" class="padding-4-8 submit"
                    tabindex="0">Создать</button>
                <button id="modal-indiv-create-cancel-create-btn" class="padding-4-8 cancel"
                    tabindex="0">Отмена</button>
            </div>
        </div>
    </section>

    <!-- v отображение настроек древа -->
    <section id="modal-tree-settings" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline space-between margin-bottom-12">
                <button id="tree-settings-delete-btn" class="default-button light-gray icon-delete"></button>
                <button id="tree-settings-close-btn" class="default-button light-gray icon-close"></button>
            </div>

            <div class="header">
                <h1 class="margin-0-auto">Параметры древа</h1>
            </div>

            <div class="padding-8-12 shadow margin-bottom-20">
                <div id="tree-settings-title" class="annotate-and-text margin-bottom-12">
                    <span>Название</span>
                    <span>Название древа</span>
                </div>
                <div id="tree-settings-access" class="annotate-and-text margin-bottom-12">
                    <span>Доступ</span>
                    <span>Публичный</span>
                </div>
                <div id="tree-settings-creator" class="annotate-and-text margin-bottom-12">
                    <span>Владелец</span>
                    <span>username_creator</span>
                </div>
                <div id="tree-settings-desciption" class="annotate-and-text">
                    <span>Описание</span>
                    <p>Описание древа</p>
                </div>
            </div>

            <div class="flex-inline space-between align-items-end margin-bottom-12">
                <h2>Права доступа</h2>
                <span id="tree-settings-add-permissions" class="add-button bg-blue">+</span>
            </div>
            <div id="tree-permissions-container">
                <!-- Сюда будут добавляться дети -->
                <div class="padding-8-12 shadow margin-bottom-12">
                    <div class="flex-inline space-between align-items-center">
                        <span>username <span class="tiny">— Редактор</span></span>

                        <button class="default-button light-gray icon-delete"></button>
                    </div>
                </div>
                <div class="padding-8-12 shadow margin-bottom-12">
                    <div class="flex-inline space-between align-items-center">
                        <span>username <span class="tiny">— Зритель</span></span>

                        <button class="default-button light-gray icon-delete"></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- добавление пользователя в права древа -->
    <section id="modal-tree-settings-add-user" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline end margin-bottom-12">
                <button id="tree-settings-add-user-close-btn" class="default-button light-gray icon-close"></button>
            </div>

            <div class="header">
                <h1 class="margin-0-auto">Добавление прав доступа</h1>
            </div>

            <div class="padding-8-12 shadow margin-bottom-20">
                <div class="margin-bottom-12">
                    <div class="flex-inline space-between margin-bottom-12">
                        <div class="annotate-and-text">
                            <span>Имя пользователя*</span>
                            <input type="text" id="tree-settings-add-user-username" placeholder="username2000" required>
                        </div>
                    </div>
                    <div class="annotate-and-text">
                        <span>Уровень доступа</span>
                        <select name="access-level" id="select-tree-settings-add-user">
                            <option value="viewer">Зритель</option>
                            <option value="editor">Редактор</option>
                            <!-- Опции будут добавлены динамически -->
                        </select>
                    </div>
                </div>
            </div>

            <div class="button-sumbit-cancel flex-inline space-between" style="gap: 16px;">
                <button id="tree-settings-add-user-submit-btn" class="padding-4-8 submit" tabindex="0">Добавить</button>
                <button id="tree-settings-add-user-cancel-btn" class="padding-4-8 cancel" tabindex="0">Отмена</button>
            </div>
        </div>
    </section>

    <!-- v отображение события древа -->
    <section id="modal-tree-event" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline space-between margin-bottom-12">
                <button id="tree-event-delete-btn" class="default-button light-gray icon-delete"></button>
                <button id="tree-event-close-btn" class="default-button light-gray icon-close"></button>
            </div>

            <div class="header">
                <h1 class="margin-0-auto">Навзвание события</h1>
            </div>

            <div class="padding-8-12 shadow">
                <div id="tree-event-date" class="annotate-and-text margin-bottom-12">
                    <span>Дата</span>
                    <span>01-01-0001 г.</span>
                </div>
                <div id="tree-event-place" class="annotate-and-text margin-bottom-12">
                    <span>Место</span>
                    <span>Место</span>
                </div>
                <div id="tree-event-desciption" class="annotate-and-text">
                    <span>Описание</span>
                    <p>Описание</p>
                </div>
            </div>
        </div>
    </section>

    <!-- v отображение семьи -->
    <section id="modal-fam" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline space-between margin-bottom-12">
                <button id="fam-delete-btn" class="default-button light-gray icon-delete"></button>
                <button id="fam-close-btn" class="default-button light-gray icon-close"></button>
            </div>

            <div class="header">
                <h1 class="margin-0-auto">Семья</h1>
            </div>

            <div class="padding-8-12 shadow margin-bottom-20">
                <div id="fam-husband-info" class="annotate-and-text margin-bottom-12">
                    <span>Муж</span>
                    <p>ФИО (01-01-0001 г.)</p>
                </div>
                <div id="fam-wife-info" class="annotate-and-text">
                    <span>Жена</span>
                    <p>ФИО (01-01-0001 г.)</p>
                </div>
            </div>

            <div class="flex-inline space-between align-items-end margin-bottom-12">
                <h2>Дети</h2>
                <span id="modal-family-add-child-button" class="add-button bg-yellow">+</span>
            </div>

            <div id="fam-children-container">
                <!-- Сюда будут добавляться дети -->
                <div class="padding-8-12 shadow margin-bottom-12">
                    <div class="flex-inline space-between align-items-center">
                        <span>ФИ (01-01-0001 г.)</span>
                        <button class="default-button light-gray icon-delete"></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- добавление ребёнка семьи -->
    <section id="modal-fam-add-child" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline end margin-bottom-12">
                <button id="fam-add-child-close-btn" class="default-button light-gray icon-close"></button>
            </div>

            <div class="header">
                <h1 class="margin-0-auto">Добавление ребёнка в семью</h1>
            </div>

            <div class="padding-8-12 shadow margin-bottom-20">
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Ребёнок</span>
                        <select name="child" id="select-fam-add-child">
                            <option value="">-- Выберите ребёнка из списка --</option>
                            <!-- Опции будут добавлены динамически -->
                        </select>
                    </div>
                </div>
            </div>

            <div class="button-sumbit-cancel flex-inline space-between" style="gap: 16px;">
                <button id="fam-add-child-submit-btn" class="padding-4-8 submit" tabindex="0">Добавить</button>
                <button id="fam-add-child-cancel-btn" class="padding-4-8 cancel" tabindex="0">Отмена</button>
            </div>
        </div>
    </section>

    <!-- v отображение индивида -->
    <section id="modal-indiv" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline space-between margin-bottom-12">
                <!-- Кнопка "Корзина" (trashVector) -->
                <button id="delete-indiv-btn" class="default-button light-gray icon-delete"></button>
                <button id="close-modal-btn" class="default-button light-gray icon-close"></button>
            </div>
            <div class="header">
                <img id="indiv-photo" class="img-indiv"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJ0rskCqQcFp-pwJ9vNOI7WfSEFbxGfXBfjw&s"
                    alt="Фото отсутствует">
                <h1 class="text-transform-capitalize" id="indiv-fullname">ФИО</h1>
            </div>
            <div class="padding-8-12 shadow margin-bottom-20">
                <div class="margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Рождение</span>
                        <span id="indiv-birth-info">01-01-0001 г. Город</span>
                    </div>
                </div>
                <div id="individual-death-info" class="margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Смерть</span>
                        <span id="indiv-death-info">01-01-0001 г. — Город</span>
                    </div>
                </div>
                <div class="annotate-and-text">
                    <span>Описание</span>
                    <p id="indiv-description">Описание</p>
                </div>
            </div>

            <!-- хронология событий -->
            <div class="flex-inline space-between align-items-end margin-bottom-12">
                <h2>Факты и Хронолия событий</h2>
                <span id="indiv-event-create-button" class="add-button bg-yellow">+</span>
            </div>

            <div id="indiv-events-container">
                <!-- События будут добавляться динамически -->
                <div class="padding-8-12 shadow ">
                    <div class="flex-inline space-between margin-bottom-4 align-items-end">
                        <span>Событие</span>
                        <button class="default-button light-gray icon-delete"></button>
                    </div>
                    <div class="place-date flex-inline space-between margin-bottom-12">
                        <span>Место</span>
                        <span>Дата</span>
                    </div>
                    <p>Описание</p>
                </div>
            </div>
        </div>
    </section>

    <!-- v создание события индивида -->
    <section id="modal-indiv-event-create" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="flex-inline end margin-bottom-12">
                <!-- Кнопка закрытия -->
                <button id="close-indiv-event-create" class="default-button light-gray icon-close"></button>
            </div>
            <div class="header">
                <h1 class="margin-0-auto">Создание события индивида</h1>
            </div>
            <div class="padding-8-12 shadow margin-bottom-20">
                <div class="flex-inline space-between">
                    <div class="annotate-and-text">
                        <span>Предлагаемые варианты</span>
                        <div style="height: auto; overflow: hidden;">
                            <div class="event-grid-offer">
                                <span>Рождение</span>
                                <span>Рождение</span>
                                <span>Рождение</span>
                                <span>GEgewgwegwegwe</span>
                                <span>gender</span>
                                <span>Рождение</span>
                                <span>Рождение</span>
                                <span>Рождение</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="padding-8-12 shadow margin-bottom-20">
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Название*</span>
                        <input type="text" id="indiv-event-title" placeholder="Название" required>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Дата события*</span>
                        <input type="date" id="indiv-event-date" required>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Место события</span>
                        <input type="text" id="indiv-event-place"
                            placeholder="Место события: страна, город, населённый пункт" required>
                    </div>
                </div>
                <div class="flex-inline space-between margin-bottom-12">
                    <div class="annotate-and-text">
                        <span>Описание</span>
                        <textarea type="text" id="indiv-event-description-input" rows="5"
                            placeholder="Опишите важные детали: участники, обстоятельства, влияние на жизнь человека"></textarea>
                    </div>
                </div>
                <span class="tiny">* — обязательные для заполнения поля</span>
            </div>
            <div class="button-sumbit-cancel flex-inline space-between">
                <button id="indiv-event-create-submit-create-btn" class="padding-4-8 submit"
                    tabindex="0">Создать</button>
                <button id="indiv-event-create-cancel-create-btn" class="padding-4-8 cancel"
                    tabindex="0">Отмена</button>
            </div>
        </div>
    </section>

    <!-- подтверждение действия -->
    <section id="modal-confirm" class="overlay disable">
        <div class="modal small-border-radius">
            <div class="  flex-inline end margin-bottom-12">
                <button class="default-button light-gray icon-close">
                </button>
            </div>
            <div class="header">
                <h1 class="margin-0-auto">Подтвердите действие</h1>
            </div>
            <div class="margin-bottom-20">
            </div>
            <div class="button-sumbit-cancel flex-inline space-between">
                <button id="modal-confirm-submit-create-btn" class="padding-4-8 submit"
                    tabindex="0">Подтвердить</button>
                <button id="modal-confirm-cancel-create-btn" class="padding-4-8 cancel" tabindex="0">Отмена</button>
            </div>
        </div>
    </section>


    <section id="header">
        <div id="header-first-row" class="flex-inline space-between align-items-center">
            <div id="name-row">
                <!-- Кнопка выхода -->
                <button class="default-button black icon-exit">
                </button>
                <h1 id="header-title" class="margin-left-8"></h1>
                <!-- Кнопка настройки -->
                <!-- <button id="settings-button" class="padding-4-8 submit" tabindex="0">Настройки</button> -->
                <button id="tree-settings-button" class="default-button dark-gray margin-left-4 icon-settings">
                </button>
            </div>

        </div>
        <div class="flex-inline space-between" id="screen-chooser-row">
            <div id="screen-chooser">
                <span tabindex="0" class="selected" id="screen-chooser-list">Список</span>
                <span tabindex="0" id="screen-chooser-layout">Хронология</span>
            </div>
            <a class="tiny"
                href="mailto:gavrilenko.fedor@niuitmo.ru?subject=Обращение%20в%20поддержку:%20Веб-сервис%20для%20построения%20генеалогических%20деревьев">Написать
                в поддержку</a>
        </div>
    </section>

    <section id="tree-layout" class="overlay-y disable">
        <div id="tree-layout-container">
            <div id="tree-resize-cap" class="tree-layout-cap disable">
                <span class="text-align-center ">Размеры отображаемой области изменились. <br> Обновите страницу чтобы
                    получить актуальную информацию.</span>
            </div>
            <div id="tree-loader-cap" class="tree-layout-cap disable">
                <span>Загрузка...</span>
            </div>
            <div id="timeline-container">
                <div id="cursor-container">
                    <div id="cursor" style="display: flex; flex-direction: column; align-items: center;">
                        <span class="small-border-radius" id="cursor-number">0001</span>
                        <svg width="13" height="100" viewBox="0 0 13 100" class="cursor-lines" style="margin-top: 4px;">
                            <path class="cursor-line-vertical" d="M6.5 0.5V100" />
                            <path class="cursor-line-horizontal" d="M0 0.5H13" />
                        </svg>
                    </div>
                </div>
                <div id="timeline">
                    <div id="timeline-tree-events">
                    </div>
                </div>
            </div>
            <div class="flex-inline space-between gap-20" id="navigator-above-container">
                <div style="min-width: 40px;" class="timeline-unit">
                    <span class="small-border-radius">2025</span>
                </div>
                <div>
                    <button id="closeNav-button" class="default-button dark-gray icon-closeNav"></button>
                </div>
            </div>
            <div id="canvas-container">
                <div id="canvas">
                </div>
            </div>
            <div id="navigator-container">
                <div id="navigator-connections-container">
                    <svg id="navigator-connections"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 1000px; pointer-events: none;"
                        xmlns="http://www.w3.org/2000/svg">
                    </svg>
                </div>

                <div id="navigator">
                </div>
            </div>
        </div>
    </section>

    <section id="screen-list" class="overlay-y">
        <div class="big-list-unit">
            <div class="header  flex-inline space-between">
                <h2>Персоны</h2>
                <span id="button-modal-create-indiv" class="add-button bg-blue">+</span>
            </div>
            <div class="content shadow text-transform-capitalize">
                <div class="list-unit  flex-inline space-between header">
                    <div class="left-side">
                        <span>Имя</span>
                    </div>
                    <div class="right-side grid-4-columns   ">
                        <span style="grid-column: 1;">Дата рождения</span>
                        <span style="grid-column: 2;">Дата смерти</span>
                        <span style="grid-column: 3;">Место рождения</span>
                        <span style="grid-column: 4;"
                            title="Обзор персоны как корневого элемента в отображении «Хронология»">Хронология</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="big-list-unit">
            <div class="header  flex-inline space-between">
                <h2>Семьи</h2>
                <span id="button-modal-create-fam" class="add-button bg-green">+</span>
            </div>
            <div class="content shadow">
                <div class="list-unit  flex-inline space-between header">
                    <div class="left-side grid-2-columns">
                        <span>Отец</span>
                        <span>Мать</span>
                    </div>
                    <div class="right-side ">
                        <span>Дети</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="big-list-unit">
            <div class="header  flex-inline space-between">
                <h2>События</h2>
                <span id="button-modal-create-event" class="add-button bg-yellow">+</span>
            </div>
            <div class="content shadow">
                <div class="list-unit  flex-inline space-between header">
                    <div class="left-side">
                        <span>Название</span>
                    </div>
                    <div class="right-side grid-2-columns">
                        <span style="grid-column: 1;">Дата события</span>
                        <span style="grid-column: 2;">Место</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const canvasCont = document.getElementById('canvas-container');
        const canvas = document.getElementById('canvas');
        const navigator = document.getElementById('navigator');
        const timeline = document.getElementById('timeline');
        const timelineEvent = document.getElementById('timeline-tree-events');
        const timelineCont = document.getElementById('timeline-container');
        const svg = document.getElementById("navigator-connections");
        const navigatorConCont = document.getElementById("navigator-connections-container");
        const cursor = document.getElementById('cursor');
        const cursorNumber = document.getElementById('cursor-number');

        // получение парамметров
        const urlParams = new URLSearchParams(window.location.search);
        const uuidParam = urlParams.get('uuid');
        const screen = urlParams.get('screen');
        const rootId = parseInt(urlParams.get('root'));
        // console.log(uuidParam);
        // console.log(screen);
        // console.log(rootId);


        function setUrlParamNow(param, value) {
            const url = new URL(window.location.href);
            url.searchParams.set(param, value);
            window.history.replaceState(null, '', url); // Меняем URL без перезагрузки
        }

        if (!screen || screen != 'layout') {
            setUrlParamNow('screen', 'list');
        }

        // заполнение контентом
        // API подключение, получение данных
        const API_BASE = 'https://se.ifmo.ru/~s338930/genealogy/api/';
        async function apiRequest(endpoint, data = {}) {
            // console.log(data);

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

                console.log(response);

                return await response.json();
            } catch (error) {
                console.error('API Error:', error);
                alert(error.message);
                return { status: 'error', message: error.message };
            }
        }


        function setChronologyIndivRoot(idIndiv) {
            setUrlParamNow('root', `${idIndiv}`);
            setScreenLayout();
            window.location.reload();
        }


        async function buildTree() {
            let data = await apiRequest('tree_get_full_info.php', {
                tree_uuid: uuidParam
            });
            console.log(data);

            if (data.status == "error") {
                window.location.href = 'https://se.ifmo.ru/~s338930/genealogy/trees';
            }

            if (data.response.access_level == "view") {
                disableEditingForViewer();
            }

            let treeData = data.response;

            // Пример использования:
            const userAvatar = createUserAvatar(`${treeData.username}`);
            document.getElementById('header-first-row').appendChild(userAvatar);

            // инфо о древе
            document.title = `${treeData.tree.name}`;
            document.getElementById('header-title').textContent = `${treeData.tree.name}`;

            //
            // отображение инфы списка
            //
            function clearExistingDataPersonOverlay() {
                const sections = document.querySelectorAll('.big-list-unit .content');
                sections.forEach(section => {
                    // Оставляем только заголовки
                    const headers = section.querySelectorAll('.list-unit.header');
                    section.innerHTML = '';
                    headers.forEach(header => section.appendChild(header));
                });
            }


            function populateIndividualsPersonOverlay(individuals) {
                const personsSection = document.querySelector('.big-list-unit:nth-child(1) .content');

                // Сортируем массив individuals по дате рождения (от самых молодых к самым старым)
                const sortedIndividuals = [...individuals].sort((a, b) => {
                    // Если дата рождения отсутствует, помещаем в конец списка
                    if (!a.birth_date) return 1;
                    if (!b.birth_date) return -1;

                    const dateA = new Date(a.birth_date);
                    const dateB = new Date(b.birth_date);

                    // Сравниваем даты (новые даты будут "больше" старых)
                    return dateB - dateA;
                });

                // console.log(sortedIndividuals)
                if (sortedIndividuals.length == 0) {
                    // alert('spisok pust');
                    personsSection.innerHTML = 'Список пуст. Добавьте первую персону нажатием на кнопку +';
                    personsSection.classList.add('text-align-center');
                    personsSection.classList.add('tiny');
                    personsSection.style = 'text-transform: none !important;';
                    return;
                }

                sortedIndividuals.forEach(person => {
                    const personElement = document.createElement('div');
                    personElement.className = 'list-unit hover-list-unit flex-inline space-between';
                    personElement.onclick = () => {
                        showIndividualModal(person.id);
                    }

                    const fullName = `${person.last_name} ${person.first_name} ${person.patronymic}`;
                    const birthDate = formatDate(person.birth_date);
                    const deathDate = formatDate(person.death_date);

                    personElement.innerHTML = `
            <div class="left-side">
                <span>${fullName}</span>
            </div>
            <div class="right-side grid-4-columns">
                <span style="grid-column: 1;">${birthDate}</span>
                <span style="grid-column: 2;">${deathDate}</span>
                <span style="grid-column: 3;">${person.birth_place}</span>
                <span class="flex-inline align-items-end end" style="grid-column: 4;" onclick="setChronologyIndivRoot('${person.id}')">
                    <span class="right-side-text-hidden">Посмотреть</span>
                    <span>→</span>
                </span>
            </div>
        `;

                    personsSection.appendChild(personElement);
                });
            }


            function populateFamiliesPersonOverlay(families, individuals) {
                const familiesSection = document.querySelector('.big-list-unit:nth-child(2) .content');


                if (families.length == 0) {
                    // alert('spisok pust');
                    familiesSection.innerHTML = 'Список пуст. Добавьте первую семью нажатием на кнопку +';
                    familiesSection.classList.add('text-align-center');
                    familiesSection.classList.add('tiny');
                    return;
                }

                families.forEach(family => {
                    const familyElement = document.createElement('div');
                    familyElement.className = 'list-unit hover-list-unit flex-inline space-between';

                    // Находим мужа и жену
                    const husband = individuals.find(i => i.id === family.husband_id);
                    const wife = individuals.find(i => i.id === family.wife_id);

                    // Формируем имена
                    const husbandName = husband ? `${husband.last_name} ${husband.first_name}` : 'Неизвестно';
                    const wifeName = wife ? `${wife.last_name} ${wife.first_name}` : 'Неизвестно';

                    // Находим детей
                    const childrenElements = family.children.map(child => {
                        const childData = individuals.find(i => i.id === child.id);
                        return childData ?
                            `<span>${childData.last_name} ${childData.first_name};</span>` :
                            '<span>Неизвестный ребенок;</span>';
                    }).join('');

                    familyElement.innerHTML = `
            <div class="left-side grid-2-columns">
                <span>${husbandName}</span>
                <span>${wifeName}</span>
            </div>
            <div class="right-side flex-inline gap-8">
                ${childrenElements}
            </div>
        `;

                    familyElement.addEventListener('click', (e) => {
                        showFamilyModal(family.id);
                    })

                    familiesSection.appendChild(familyElement);
                });
            }

            function populateEventsPersonOverlay(events) {
                const eventsSection = document.querySelector('.big-list-unit:nth-child(3) .content');


                if (events.length == 0) {
                    // alert('spisok pust');
                    eventsSection.innerHTML = 'Список пуст. Добавьте первое событие нажатием на кнопку +';
                    eventsSection.classList.add('text-align-center');
                    eventsSection.classList.add('tiny');
                    return;
                }

                events.forEach(event => {
                    const eventElement = document.createElement('div');
                    eventElement.className = 'list-unit hover-list-unit flex-inline space-between';

                    const eventDate = formatDate(event.event_date);
                    const eventPlace = event.place ? event.place : 'Не указано';

                    eventElement.innerHTML = `
            <div class="left-side">
                <span>${event.title}</span>
            </div>
            <div class="right-side grid-2-columns">
                <span style="grid-column: 1;">${eventDate}</span>
                <span style="grid-column: 2;">${eventPlace}</span>
            </div>
        `;

                    eventElement.onclick = () => {
                        openTreeEventModal(event.id);
                    }

                    eventsSection.appendChild(eventElement);
                });
            }

            function initializeDataPersonOverlay(data) {
                const response = data.response;

                // Очищаем существующие данные
                clearExistingDataPersonOverlay();

                // Заполняем разделы
                populateIndividualsPersonOverlay(response.individuals);
                populateFamiliesPersonOverlay(response.families, response.individuals);
                populateEventsPersonOverlay(response.tree_events);
            }

            initializeDataPersonOverlay(data);

            //
            //
            //


            // ОТОБРАЖЕНИЕ ИНДИВИДА
            // Константы для пустого аватара
            const EMPTY_AVATAR_URL = 'https://i.pinimg.com/474x/2b/da/51/2bda51ca60cc3b5daaa8e062eb880430.jpg';


            // 1. Функция заполнения модального окна информацией об индивидууме
            function fillIndividualModal(individualId) {
                // Находим индивидуума по ID
                const individual = data.response.individuals.find(ind => ind.id === individualId);
                if (!individual) return;

                // Заполняем основные поля
                document.getElementById('indiv-fullname').textContent =
                    `${individual.last_name} ${individual.first_name} ${individual.patronymic}`;

                // Устанавливаем фото или заглушку
                const photoElement = document.getElementById('indiv-photo');
                if (individual.photo_url && individual.photo_url.trim() !== '') {
                    photoElement.src = individual.photo_url;
                } else {
                    photoElement.src = EMPTY_AVATAR_URL;
                }
                photoElement.alt = `${individual.last_name} ${individual.first_name}`;

                // Заполняем информацию о рождении
                const birthDate = formatDate(individual.birth_date);
                const birthPlace = individual.birth_place || 'Неизвестно';
                document.getElementById('indiv-birth-info').textContent =
                    `${birthDate} г. — ${birthPlace}`;


                if (individual.death_date) {
                    // individual-death-info
                    const deathDate = formatDate(individual.death_date);
                    const deathPlace = individual.birth_place || 'Неизвестно';
                    document.getElementById('indiv-death-info').textContent =
                        `${deathDate} г. — ${deathPlace}`;
                } else document.getElementById('individual-death-info').classList.add('disable');

                // Заполняем описание
                const descriptionElement = document.getElementById('indiv-description');
                descriptionElement.textContent = individual.description || 'Описание отсутствует';

                // Очищаем и заполняем события
                const eventsContainer = document.getElementById('indiv-events-container');
                eventsContainer.innerHTML = '';

                if (individual.events && individual.events.length > 0) {
                    individual.events.forEach(event => {
                        const eventElement = document.createElement('div');
                        // console.log(event);
                        // console.log(event.description);
                        eventElement.className = 'padding-8-12 shadow margin-bottom-12';
                        eventElement.innerHTML = `
                <div class="flex-inline space-between margin-bottom-4 align-items-end">
                    <span>${event.title || 'Событие'}</span>
                    <button class="default-button light-gray icon-delete"></button>
                </div>
                <div class="place-date flex-inline space-between margin-bottom-12">
                    <span>${event.place || 'Место не указано'}</span>
                    <span>${formatDate(event.event_date)}</span>
                </div>
                ${event.description ? `<p>${event.description}</p>` : ''}
            `;

                        eventElement.querySelector('.default-button').onclick = () => {

                            confirmDeleteIndividualEvent(individual.id, event.id)
                        }

                        eventsContainer.appendChild(eventElement);
                    });
                } else {
                    eventsContainer.innerHTML = '<p>Факты и События отсутствуют. Добавьте новую запись</p>';
                }



                if (data.response.access_level == "edit") {
                    document.getElementById('indiv-event-create-button').addEventListener(
                        'click', (e) => {
                            openIndivEventModal(individualId);
                        }
                    )
                }


                modalElement = document.getElementById('modal-indiv').firstElementChild;


                // Удаляем предыдущие классы пола (если они есть)
                modalElement.classList.remove('modal-male-border', 'modal-female-border');

                // Добавляем соответствующий класс в зависимости от пола
                if (individual.is_male) {
                    modalElement.classList.add('modal-male-border');
                } else {
                    modalElement.classList.add('modal-female-border');
                }
            }

            // 2. Функция отображения модального окна
            function showIndividualModal(individualId) {
                // Заполняем модальное окно данными
                fillIndividualModal(individualId);
                if (data.response.access_level == "edit") {
                    initIcons();
                }

                // Показываем модальное окно (удаляем класс disable)
                const modal = document.getElementById('modal-indiv');
                modal.classList.remove('disable');

                // Добавляем обработчики закрытия
                setupModalCloseHandlers();

                if (data.response.access_level == "edit") {
                    document.getElementById('delete-indiv-btn').addEventListener(
                        'click', (e) => {
                            // openIndivEventModal(individualId);
                            confirmDeleteIndividual(individualId);
                        }
                    )
                }
            }

            // 3. Функция закрытия модального окна
            function closeIndividualModal() {
                const modal = document.getElementById('modal-indiv');
                modal.classList.add('disable');
            }

            // Настройка обработчиков закрытия модального окна
            function setupModalCloseHandlers() {
                // Закрытие по клику на overlay (фон)
                document.getElementById('modal-indiv').addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeIndividualModal();
                    }
                });

                // Закрытие по клику на кнопку закрытия
                document.getElementById('close-modal-btn').addEventListener('click', closeIndividualModal);

                if (data.response.access_level == "edit") {
                    // Убираем обработчик для кнопки удаления (пока не используется)
                    document.getElementById('delete-indiv-btn').addEventListener('click', function (e) {
                        e.stopPropagation(); // Предотвращаем всплытие
                        // Здесь будет логика удаления
                    });
                }

            }


            //
            //
            //
            // ОТОБРАЖЕНИЕ СЕМЬИ
            // 1. Функция заполнения модального окна информацией о семье
            function fillFamilyModal(familyId) {
                // Находим семью по ID
                const family = data.response.families.find(fam => fam.id === familyId);
                if (!family) {
                    console.error('Семья с указанным ID не найдена');
                    return;
                }

                // Находим мужа и жену
                const husband = data.response.individuals.find(ind => ind.id === family.husband_id);
                const wife = data.response.individuals.find(ind => ind.id === family.wife_id);

                // Заполняем информацию о муже
                const husbandInfo = document.getElementById('fam-husband-info');
                if (husband) {
                    const husbandBirth = husband.birth_date ? formatDate(husband.birth_date) : 'Дата неизвестна';
                    husbandInfo.innerHTML = `
            <span>Муж</span>
            <p>${husband.last_name} ${husband.first_name} ${husband.patronymic} (${husbandBirth} г.)</p>
        `;
                } else {
                    husbandInfo.innerHTML = `
            <span>Муж</span>
            <p>Не указан</p>
        `;
                }

                // Заполняем информацию о жене
                const wifeInfo = document.getElementById('fam-wife-info');
                if (wife) {
                    const wifeBirth = wife.birth_date ? formatDate(wife.birth_date) : 'Дата неизвестна';
                    wifeInfo.innerHTML = `
            <span>Жена</span>
            <p>${wife.last_name} ${wife.first_name} ${wife.patronymic} (${wifeBirth} г.)</p>
        `;
                } else {
                    wifeInfo.innerHTML = `
            <span>Жена</span>
            <p>Не указана</p>
        `;
                }

                if (data.response.access_level == "edit") {
                    const efbrlpmerbplem = document.getElementById('modal-family-add-child-button');
                    efbrlpmerbplem.addEventListener('click', (e) => {
                        showAddChildModal(familyId);
                    })
                }


                // Заполняем информацию о детях
                const childrenContainer = document.getElementById('fam-children-container');
                childrenContainer.innerHTML = ''; // Очищаем контейнер

                if (family.children && family.children.length > 0) {
                    family.children.forEach(childData => {
                        const child = data.response.individuals.find(ind => ind.id === childData.id);
                        if (child) {
                            const childBirth = child.birth_date ? formatDate(child.birth_date) : 'Дата неизвестна';

                            const childElement = document.createElement('div');
                            childElement.className = 'padding-8-12 shadow margin-bottom-12';
                            childElement.innerHTML = `
                    <div class="flex-inline space-between align-items-center">
                        <span>${child.last_name} ${child.first_name} (${childBirth} г.)</span>
                        <button class="default-button light-gray icon-delete"></button>
                    </div>
                `;

                            // onclick="confirmRemoveChildFromFamily(${family.id}, ${child.id})" 

                            if (data.response.access_level == "edit") {
                                childElement.querySelector('.default-button').onclick = () => {
                                    confirmRemoveChildFromFamily(family.id, child.id)
                                }
                            }

                            childrenContainer.appendChild(childElement);
                        }
                    });
                } else {
                    childrenContainer.innerHTML = '<p>Детей нет</p>';
                }
            }

            // 2. Функция отображения модального окна семьи
            function showFamilyModal(familyId) {
                // Заполняем модальное окно данными
                fillFamilyModal(familyId);
                if (data.response.access_level == "edit") {
                    initIcons();
                }

                // Показываем модальное окно (удаляем класс disable)
                const modal = document.getElementById('modal-fam');
                modal.classList.remove('disable');

                // Блокируем прокрутку страницы
                document.body.style.overflow = 'hidden';


                setupFamilyModalCloseHandlers(familyId);

            }

            // 3. Функция закрытия модального окна семьи
            function closeFamilyModal() {
                const modal = document.getElementById('modal-fam');
                modal.classList.add('disable');

                // Восстанавливаем прокрутку страницы
                document.body.style.overflow = '';
            }

            // Настройка обработчиков закрытия модального окна семьи
            function setupFamilyModalCloseHandlers(familyId) {
                // Закрытие по клику на overlay (фон)
                document.getElementById('modal-fam').addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeFamilyModal();
                    }
                });

                // Закрытие по клику на кнопку закрытия
                document.getElementById('fam-close-btn').addEventListener('click', closeFamilyModal);

                if (data.response.access_level == "edit") {
                    // Обработчик для кнопки удаления (пока просто закрываем)
                    document.getElementById('fam-delete-btn').addEventListener('click', function (e) {
                        confirmDeleteFamily(familyId);
                    });
                }
            }


            //
            //
            // ДОБАВЛЕНИЕ РЕБЁНКА В СЕМЬЮ
            //
            //
            // Глобальная переменная для хранения ID текущей семьи
            let currentFamilyId = null;

            // 1. Функции открытия/закрытия модального окна
            function showAddChildModal(familyId) {
                currentFamilyId = familyId; // Сохраняем ID семьи
                fillChildSelectOptions(data); // Заполняем select
                document.getElementById('modal-fam-add-child').classList.remove('disable');
                // document.body.style.overflow = 'hidden';
            }

            function closeAddChildModal() {
                document.getElementById('modal-fam-add-child').classList.add('disable');
                // document.body.style.overflow = '';
                currentFamilyId = null; // Сбрасываем ID семьи
            }

            // 2. Функция заполнения select вариантами детей
            function fillChildSelectOptions() {
                const select = document.getElementById('select-fam-add-child');
                select.innerHTML = '<option value="">-- Выберите ребёнка из списка --</option>';

                // Находим текущую семью
                const family = data.response.families.find(f => f.id === currentFamilyId);
                if (!family) return;

                // Получаем ID родителей (мужа и жены)
                const parentIds = [family.husband_id, family.wife_id].filter(id => id);

                // Получаем ID уже существующих детей
                const existingChildrenIds = family.children?.map(child => child.id) || [];

                // Фильтруем индивидуумов, исключая родителей и уже существующих детей
                const availableChildren = data.response.individuals.filter(ind =>
                    !parentIds.includes(ind.id) && !existingChildrenIds.includes(ind.id)
                );

                // Добавляем варианты в select
                availableChildren.forEach(child => {
                    const birthDate = child.birth_date ? formatDate(child.birth_date) : 'Дата неизвестна';
                    const option = document.createElement('option');
                    option.value = child.id;
                    option.textContent = `${child.last_name} ${child.first_name} ${child.patronymic} (${birthDate} г.)`;
                    select.appendChild(option);
                });
            }

            // 3. Функция отправки запроса на добавление ребенка
            async function submitAddChildRequest() {
                const select = document.getElementById('select-fam-add-child');
                const childId = select.value;

                // Проверка выбора
                if (!childId) {
                    alert('Пожалуйста, выберите ребенка из списка');
                    return;
                }

                // Проверка наличия ID семьи
                if (!currentFamilyId) {
                    alert('Ошибка: не указана семья');
                    return;
                }

                try {

                    if (!uuidParam) {
                        alert('Ошибка: не найден идентификатор дерева');
                        return;
                    }

                    // Отправка запроса
                    const response = await apiRequest('tree_fam_add_child.php', {
                        tree_uuid: uuidParam,
                        family_id: currentFamilyId,
                        child_id: childId
                    });

                    if (response.status === 'success') {
                        // alert('Ребенок успешно добавлен в семью');
                        closeAddChildModal();
                        window.location.reload();
                        // Здесь можно обновить данные или интерфейс
                    } else {
                        alert('Ошибка: ' + (response.message || 'Не удалось добавить ребенка'));
                    }
                } catch (error) {
                    console.error('Ошибка при добавлении ребенка:', error);
                    alert('Произошла ошибка при добавлении ребенка');
                }
            }

            // Инициализация обработчиков событий
            function setupAddChildModalHandlers() {
                // Закрытие по клику на фон
                document.getElementById('modal-fam-add-child').addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeAddChildModal();
                    }
                });

                // Закрытие по кнопкам
                document.getElementById('fam-add-child-close-btn').addEventListener('click', closeAddChildModal);
                document.getElementById('fam-add-child-cancel-btn').addEventListener('click', closeAddChildModal);

                // Отправка формы
                document.getElementById('fam-add-child-submit-btn').addEventListener('click', submitAddChildRequest);
            }

            setupAddChildModalHandlers();


            //
            //
            // ОТКРЫТИЕ СЕМЬИ
            //
            //
            // 1. Функции открытия/закрытия модального окна
            function showCreateFamilyModal() {
                fillFamilySelectOptions(); // Заполняем select'ы
                document.getElementById('modal-create-fam').classList.remove('disable');
                document.body.style.overflow = 'hidden';
            }

            function closeCreateFamilyModal() {
                document.getElementById('modal-create-fam').classList.add('disable');
                document.body.style.overflow = '';
            }

            // 2. Функция заполнения select мужей и жен
            function fillFamilySelectOptions() {
                const husbandSelect = document.getElementById('select-create-fam-husband');
                const wifeSelect = document.getElementById('select-create-fam-wife');

                // Очищаем select'ы
                husbandSelect.innerHTML = '<option value="">-- Выберите мужчину --</option>';
                wifeSelect.innerHTML = '<option value="">-- Выберите женщину --</option>';

                // Фильтруем и сортируем мужчин
                const males = data.response.individuals
                    .filter(ind => ind.is_male === true)
                    .sort((a, b) => new Date(a.birth_date || '9999-12-31') - new Date(b.birth_date || '9999-12-31'));

                // Фильтруем и сортируем женщин
                const females = data.response.individuals
                    .filter(ind => ind.is_male === false)
                    .sort((a, b) => new Date(a.birth_date || '9999-12-31') - new Date(b.birth_date || '9999-12-31'));

                // Добавляем мужчин в select
                males.forEach(man => {
                    const birthDate = man.birth_date ? formatDate(man.birth_date) : 'Дата неизвестна';
                    const option = document.createElement('option');
                    option.value = man.id;
                    option.textContent = `${man.last_name} ${man.first_name} ${man.patronymic} (${birthDate})`;
                    husbandSelect.appendChild(option);
                });

                // Добавляем женщин в select
                females.forEach(woman => {
                    const birthDate = woman.birth_date ? formatDate(woman.birth_date) : 'Дата неизвестна';
                    const option = document.createElement('option');
                    option.value = woman.id;
                    option.textContent = `${woman.last_name} ${woman.first_name} ${woman.patronymic} (${birthDate})`;
                    wifeSelect.appendChild(option);
                });
            }

            // 3. Функция валидации и отправки запроса
            async function submitCreateFamilyRequest() {
                const husbandId = document.getElementById('select-create-fam-husband').value;
                const wifeId = document.getElementById('select-create-fam-wife').value;

                // Валидация
                if (!husbandId || !wifeId) {
                    alert('Пожалуйста, выберите и мужа, и жену');
                    return;
                }

                if (husbandId === wifeId) {
                    alert('Муж и жена не могут быть одним и тем же человеком');
                    return;
                }

                try {
                    // Получаем uuid из URL
                    const urlParams = new URLSearchParams(window.location.search);
                    const uuidParam = urlParams.get('uuid');

                    if (!uuidParam) {
                        alert('Ошибка: не найден идентификатор дерева');
                        return;
                    }

                    // Отправка запроса
                    const response = await apiRequest('tree_create_fam.php', {
                        tree_uuid: uuidParam,
                        husband_id: husbandId,
                        wife_id: wifeId
                    });

                    if (response.status === 'success') {
                        // alert('Семья успешно создана');
                        closeCreateFamilyModal();
                        window.location.reload();
                        // Здесь можно обновить данные или интерфейс
                    } else {
                        alert('Ошибка: ' + (response.message || 'Не удалось создать семью'));
                    }
                } catch (error) {
                    console.error('Ошибка при создании семьи:', error);
                    alert('Произошла ошибка при создании семьи');
                }
            }

            // Инициализация обработчиков событий
            function setupCreateFamilyModalHandlers() {
                // Закрытие по клику на фон
                document.getElementById('modal-create-fam').addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeCreateFamilyModal();
                    }
                });

                // Закрытие по кнопкам
                document.getElementById('create-fam-close-btn').addEventListener('click', closeCreateFamilyModal);
                document.getElementById('create-fam-cancel-btn').addEventListener('click', closeCreateFamilyModal);

                // Отправка формы
                document.getElementById('create-fam-submit-btn').addEventListener('click', submitCreateFamilyRequest);
            }

            setupCreateFamilyModalHandlers();
            //
            //
            //
            //
            //
            //

            //
            //
            //
            // ДОБАВЛЕНИЕ ИНДИВИДА
            //
            function closeCreateIndivModal() {
                document.getElementById('modal-indiv-create').classList.add('disable');
            }

            // Функция открытия модального окна создания
            function openCreateIndivModal() {
                document.getElementById('modal-indiv-create').classList.remove('disable');
            }
            setupCreateIndivModalHandlers();

            // Настройка обработчиков для модального окна создания
            function setupCreateIndivModalHandlers() {
                // Закрытие по клику на overlay (фон)
                document.getElementById('modal-indiv-create').addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeCreateIndivModal();
                    }
                });

                // Закрытие по клику на кнопку закрытия
                document.getElementById('close-create-modal-btn').addEventListener('click', closeCreateIndivModal);


                // Закрытие по клику на кнопку отмены
                document.getElementById('modal-indiv-create-cancel-create-btn').addEventListener('click', (e) => {
                    closeCreateIndivModal();
                    clearCreateForm();
                });

                // Обработка отправки формы
                document.getElementById('modal-indiv-create-submit-create-btn').addEventListener('click', (event) => {
                    createIndividual();
                })
            }

            // Функция создания индивида
            async function createIndividual() {
                // Получаем значения полей
                const firstName = document.getElementById('first-name-input').value.trim();
                const lastName = document.getElementById('last-name-input').value.trim();
                const patronymic = document.getElementById('patronymic-input').value.trim();
                const isMale = document.querySelector('input[name="gender"]:checked')?.value === 'true';
                const birthDate = document.getElementById('birth-date-input').value;
                const birthPlace = document.getElementById('birth-place-input').value.trim();
                const deathDate = document.getElementById('death-date-input').value;
                const deathPlace = document.getElementById('death-place-input').value.trim();
                const photoUrl = document.getElementById('photo-url-input').value.trim();
                const description = document.getElementById('description-input').value.trim();


                // Проверка обязательных полей
                if (!firstName || !lastName || !birthDate || !document.querySelector('input[name="gender"]:checked')) {
                    alert('Пожалуйста, заполните все обязательные поля: Имя, Фамилия, Дата рождения, Пол');
                    return;
                }

                // console.log(new Date(birthDate));
                if (new Date(birthDate) > new Date() || new Date(deathDate) > new Date()) {
                    alert('Дата рождения или смерти не может быть позже сегодня');
                    return;
                }


                // Формируем объект данных для отправки (только с заполненными полями)
                const formData = {
                    tree_uuid: uuidParam,
                    first_name: firstName,
                    last_name: lastName,
                    is_male: isMale.toString(),
                    birth_date: formatDateForServer(birthDate)
                };

                // Добавляем необязательные поля только если они заполнены
                if (patronymic) formData.patronymic = patronymic;
                if (birthPlace) formData.birth_place = birthPlace;
                if (deathDate) formData.death_date = formatDateForServer(deathDate);
                if (deathPlace) formData.death_place = deathPlace;
                if (photoUrl) formData.photo_url = photoUrl;
                if (description) formData.description = description;

                try {
                    console.log(formData);

                    // Отправляем запрос на сервер
                    const response = await apiRequest('tree_create_indiv.php', formData);

                    if (response.status === 'success') {
                        // Закрываем модальное окно и обновляем страницу
                        clearCreateForm();
                        closeCreateIndivModal();
                        window.location.reload();

                    } else {
                        alert('Ошибка при создании персоны: ' + (response.message || 'Неизвестная ошибка'));
                    }
                } catch (error) {
                    console.error('Ошибка при создании персоны:', error);
                    alert('Произошла ошибка при отправке данных на сервер');
                }
            }


            // Функция для очистки всех полей формы
            function clearCreateForm() {
                // Очищаем текстовые поля
                document.getElementById('first-name-input').value = '';
                document.getElementById('last-name-input').value = '';
                document.getElementById('patronymic-input').value = '';
                document.getElementById('birth-date-input').value = '';
                document.getElementById('birth-place-input').value = '';
                document.getElementById('death-date-input').value = '';
                document.getElementById('death-place-input').value = '';
                document.getElementById('photo-url-input').value = '';
                document.getElementById('description-input').value = '';

                // Сбрасываем выбор пола
                const genderRadios = document.querySelectorAll('input[name="gender"]');
                genderRadios.forEach(radio => radio.checked = false);
            }

            // Вспомогательная функция для форматирования даты в серверный формат
            function formatDateForServer(dateString) {
                if (!dateString) return '';
                const date = new Date(dateString);
                return date.toISOString().split('T')[0]; // Формат YYYY-MM-DD
            }

            if (data.response.access_level == "edit") {

                document.getElementById('button-modal-create-indiv').addEventListener('click', (e) => {
                    openCreateIndivModal();
                });

                document.getElementById('button-modal-create-fam').addEventListener('click', (e) => {
                    showCreateFamilyModal();
                });

                document.getElementById('button-modal-create-event').addEventListener('click', (e) => {
                    openTreeCreateEventModal();
                });
            }


            //
            //
            //
            //
            //
            //
            // создание события индивида
            // Массив предлагаемых событий
            const SUGGESTED_EVENTS = [
                // 1. Детство и семья
                "Рождение",
                "Крещение",
                "Переезд в детстве",
                "Поступление в школу",
                "Окончание школы",
                "Смена школы",
                "Друзья детства",
                "Конфликт в семье",
                "Смерть родителя",
                "Рождение брата/сестры",

                // 2. Образование
                "Поступление в университет",
                "Окончание университета",
                "Защита диплома",
                "Курсы повышения квалификации",
                "Учёба за границей",
                "Отчисление",
                "Смена специальности",

                // 3. Карьера
                "Первая работа",
                "Повышение",
                "Увольнение",
                "Смена профессии",
                "Открытие бизнеса",
                "Банкротство",
                "Командировка",
                "Пенсия",

                // 4. Личная жизнь
                "Первая любовь",
                "Свадьба",
                "Развод",
                "Рождение ребенка",
                "Смерть супруга",
                "Усыновление",
                "Гражданский брак",

                // 5. Увлечения и достижения
                "Первое публичное выступление",
                "Спортивная победа",
                "Издание книги",
                "Участие в выставке",
                "Путешествие",
                "Вступление в клуб",
                "Награда/премия",

                // 6. Исторический контекст
                "Участие в войне",
                "Эвакуация",
                "Репрессии",
                "Эмиграция",
                "Возвращение на родину",
                "Участие в стройке века (например, БАМ)",
                "Чернобыльская авария",

                // 7. Здоровье и кризисы
                "Тяжёлая болезнь",
                "Госпитализация",
                "Инвалидность",
                "Пожар/катастрофа",
                "Потеря имущества",
                "Судебный процесс",

                // 8. Прочее
                "Встреча с известной личностью",
                "Изобретение",
                "Публичное признание",
                "Духовное обращение",
                "Изменение фамилии",
                "Переезд на ПМЖ",
                "Смерть"
            ];

            // Текущие данные
            let currentIndividualId = null;

            // Функция для открытия модального окна
            function openIndivEventModal(individualId) {
                currentIndividualId = individualId;

                // Находим индивида по ID
                const individual = data.response.individuals.find(ind => ind.id === individualId);
                if (!individual) {
                    alert('Индивид не найден');
                    return;
                }

                // Получаем существующие события
                const existingEvents = individual.events ? individual.events.map(event => event.title) : [];

                document.getElementById('modal-indiv-event-create').classList.remove('disable');
                setupIndivEventModalHandlers(individualId);
                renderSuggestedEvents(existingEvents);
            }

            // Функция для отрисовки предлагаемых событий
            function renderSuggestedEvents(existingEvents = []) {
                const eventGrid = document.querySelector('.event-grid-offer');
                eventGrid.innerHTML = '';

                SUGGESTED_EVENTS.forEach(eventName => {
                    const eventSpan = document.createElement('span');
                    eventSpan.textContent = eventName;

                    // Проверяем, есть ли уже такое событие
                    if (existingEvents.includes(eventName)) {
                        eventSpan.classList.add('event-exist');
                    }

                    // Добавляем обработчик клика
                    eventSpan.addEventListener('click', () => {
                        document.getElementById('indiv-event-title').value = eventName;
                    });

                    eventGrid.appendChild(eventSpan);
                });
            }

            // Функция создания события
            async function createIndivEvent() {
                // Получаем значения полей
                const name = document.getElementById('indiv-event-title').value.trim();
                const date = document.getElementById('indiv-event-date').value;
                const place = document.getElementById('indiv-event-place').value.trim();
                const description = document.getElementById('indiv-event-description-input').value.trim();

                // Валидация
                if (!name) {
                    alert('Пожалуйста, укажите название события');
                    return;
                }

                if (!date) {
                    alert('Пожалуйста, укажите дату события');
                    return;
                }

                // Формируем базовые данные для отправки
                const formData = {
                    ind_id: currentIndividualId,
                    title: name,
                    event_date: date
                };

                // Добавляем необязательные поля только если они заполнены
                if (place) formData.place = place;
                if (description) formData.description = description;

                try {
                    // Отправляем запрос
                    console.log(formData);
                    const response = await apiRequest('ind_create_event.php', formData);

                    if (response.status === 'success') {
                        closeIndivEventModal();
                        window.location.reload();
                    } else {
                        alert('Ошибка при создании события: ' + (response.message || 'Неизвестная ошибка'));
                    }
                } catch (error) {
                    console.error('Ошибка при создании события:', error);
                    alert('Произошла ошибка при отправке данных на сервер');
                }
            }

            // Функция для закрытия модального окна
            function closeIndivEventModal() {
                document.getElementById('modal-indiv-event-create').classList.add('disable');
                clearIndivEventForm();
            }

            // Функция очистки формы
            function clearIndivEventForm() {
                document.getElementById('indiv-event-title').value = '';
                document.getElementById('indiv-event-date').value = '';
                document.getElementById('indiv-event-place').value = '';
                document.getElementById('indiv-event-description-input').value = '';
            }

            // Настройка обработчиков для модального окна
            function setupIndivEventModalHandlers(individualId) {
                const modal = document.getElementById('modal-indiv-event-create');

                // Закрытие по клику на фон
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeIndivEventModal();
                    }
                });

                // Закрытие по кнопке закрытия
                document.getElementById('close-indiv-event-create').addEventListener('click', closeIndivEventModal);

                // Закрытие по кнопке отмены
                document.getElementById('indiv-event-create-cancel-create-btn').addEventListener('click', closeIndivEventModal);

                // Обработка создания события
                document.getElementById('indiv-event-create-submit-create-btn').addEventListener('click', createIndivEvent);

            }

            //
            //
            //
            //
            //
            //
            // создание события древа
            // Открытие модального окна создания события
            function openTreeCreateEventModal() {
                document.getElementById('modal-tree-event-create').classList.remove('disable');
                setupTreeCreateEventModalHandlers(uuidParam);

                // Обработчик для кнопки "Прочитать аннотацию"
                document.querySelector('.span-link').addEventListener('click', function (e) {
                    e.preventDefault();
                    // closeTreeEventModal();
                    openTreeEventAnnotateModal();
                });
            }

            // Закрытие модального окна создания события
            function closeTreeCreateEventModal() {
                document.getElementById('modal-tree-event-create').classList.add('disable');
                clearTreeCreateEventForm();
            }

            // Открытие модального окна аннотации
            function openTreeEventAnnotateModal() {
                document.getElementById('modal-tree-event-annotate-create').classList.remove('disable');
                setupTreeEventAnnotateHandlers();
            }

            // Закрытие модального окна аннотации
            function closeTreeEventAnnotateModal() {
                document.getElementById('modal-tree-event-annotate-create').classList.add('disable');
            }

            function clearTreeCreateEventForm() {
                document.getElementById('tree-event-title').value = '';
                document.getElementById('tree-event-date').value = '';
                document.getElementById('tree-event-place').value = '';
                document.getElementById('tree-event-description-input').value = '';
                document.getElementById('tree-event-color-select').value = 'blue'; // Сброс к значению по умолчанию
            }


            function setupTreeCreateEventModalHandlers(treeUuid) {
                const modal = document.getElementById('modal-tree-event-create');

                // Закрытие по клику на фон
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeTreeCreateEventModal();
                    }
                });

                // Закрытие по кнопке закрытия
                document.getElementById('close-tree-event-create').addEventListener('click', closeTreeCreateEventModal);

                // Закрытие по кнопке отмены
                document.getElementById('tree-event-create-cancel-create-btn').addEventListener('click', closeTreeCreateEventModal);

                // Обработка создания события
                document.getElementById('tree-event-createsubmit-create-btn').addEventListener('click', function () {
                    createTreeEvent(treeUuid);
                });
            }

            function setupTreeCreateEventAnnotateHandlers() {
                const modal = document.getElementById('modal-tree-event-annotate-create');

                // Закрытие по клику на фон
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeTreeEventAnnotateModal();
                    }
                });

                // Закрытие по кнопке закрытия
                document.getElementById('close-tree-event-annotate-create').addEventListener('click', closeTreeEventAnnotateModal);

                // Закрытие по кнопке "Закрыть"
                document.getElementById('tree-event-annotate-create-cancel-create-btn').addEventListener('click', closeTreeEventAnnotateModal);
            }

            async function createTreeEvent(treeUuid) {
                // Получаем значения полей
                const title = document.getElementById('tree-event-title').value.trim();
                const eventDate = document.getElementById('tree-event-date').value;
                const place = document.getElementById('tree-event-place').value.trim();
                const description = document.getElementById('tree-event-description-input').value.trim();
                const color = document.getElementById('tree-event-color-select').value;

                // Валидация
                if (!title) {
                    alert('Пожалуйста, укажите название события');
                    return;
                }

                if (!eventDate) {
                    alert('Пожалуйста, укажите дату события');
                    return;
                }

                if (!color) {
                    alert('Пожалуйста, выберите цвет события');
                    return;
                }

                // Формируем данные для отправки
                const formData = {
                    tree_uuid: treeUuid,
                    title: title,
                    event_date: eventDate,
                    color: color // Добавляем цвет в formData
                };

                // Добавляем необязательные поля только если они заполнены
                if (place) formData.place = place;
                if (description) formData.description = description;

                try {
                    console.log(formData);
                    // Отправляем запрос
                    const response = await apiRequest('tree_create_event.php', formData);

                    if (response.status === 'success') {
                        // Закрываем модальное окно
                        closeTreeCreateEventModal();

                        // Обновляем страницу
                        window.location.reload();
                    } else {
                        alert('Ошибка при создании события: ' + (response.message || 'Неизвестная ошибка'));
                    }
                } catch (error) {
                    console.error('Ошибка при создании события:', error);
                    alert('Произошла ошибка при отправке данных на сервер');
                }
            }

            setupTreeCreateEventAnnotateHandlers();
            //
            //
            //
            //
            //
            //
            //
            // ОТОБРАЖЕНИЕ СОБЫТИЯ ДРЕВА

            // Функция для открытия модального окна события
            function openTreeEventModal(eventId) {
                if (!data || !data.response || !data.response.tree_events) {
                    alert('Данные дерева не загружены');
                    return;
                }

                // Находим событие по ID
                const event = data.response.tree_events.find(e => e.id === eventId);
                if (!event) {
                    alert('Событие не найдено');
                    return;
                }

                // Заполняем данные
                document.querySelector('#modal-tree-event .header h1').textContent = event.title;

                // Форматируем дату
                const formattedDate = formatDate(event.event_date);
                document.querySelector('#tree-event-date span:last-child').textContent = `${formattedDate} г.`;

                // Заполняем место
                const placeElement = document.querySelector('#tree-event-place span:last-child');
                placeElement.textContent = event.place || 'Не указано';

                // Заполняем описание
                const descriptionElement = document.querySelector('#tree-event-desciption p');
                descriptionElement.textContent = event.description || 'Описание отсутствует';

                // Показываем модальное окно
                const modalTreeEvent = document.getElementById('modal-tree-event');
                modalTreeEvent.classList.remove('disable');


                // Удаляем предыдущие классы пола (если они есть)
                modalTreeEvent.firstElementChild.classList.remove('blue', 'green', 'yellow', 'red', 'black');


                modalTreeEvent.firstElementChild.classList.add(`${event.color}`);
                //

                setupTreeEventModalHandlers(eventId);
            }

            // Функция для закрытия модального окна
            function closeTreeEventModal() {
                document.getElementById('modal-tree-event').classList.add('disable');
            }

            // Настройка обработчиков
            function setupTreeEventModalHandlers(eventId) {
                const modal = document.getElementById('modal-tree-event');

                // Закрытие по клику на фон
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeTreeEventModal();
                    }
                });

                // Закрытие по кнопке закрытия
                document.getElementById('tree-event-close-btn').addEventListener('click', closeTreeEventModal);

                if (data.response.access_level == "edit") {
                    document.getElementById('tree-event-delete-btn').addEventListener('click', function () {
                        confirmDeleteTreeEvent(eventId);
                    });
                }


            }

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
            // УДАЛЕНИЕ

            let currentDeleteType = '';
            let currentDeleteData = {};

            // ================== ОБЩИЕ ФУНКЦИИ УДАЛЕНИЯ ==================

            // Функция открытия модального окна подтверждения
            function openDeleteConfirmModal(type, data, customMessage = null) {
                currentDeleteType = type;
                currentDeleteData = data;

                // Устанавливаем стандартные сообщения
                const messages = {
                    'indiv': 'Вы уверены, что хотите удалить этого человека из древа?',
                    'event': 'Вы уверены, что хотите удалить это событие?',
                    'family': 'Вы уверены, что хотите удалить эту семью из древа?',
                    'child': 'Вы уверены, что хотите удалить ребенка из семьи?',
                    'indiv_event': 'Вы уверены, что хотите удалить это событие у человека?',
                    'permission': 'Вы уверены, что хотите удалить эти права доступа?',
                    'tree': 'Вы уверены, что хотите полностью удалить это древо?'
                };

                const message = customMessage || messages[type] || 'Вы уверены, что хотите выполнить это действие?';
                document.querySelector('#modal-confirm .header h1').textContent = message;

                document.getElementById('modal-confirm').classList.remove('disable');
            }

            // Функция выполнения удаления
            async function executeDelete() {
                try {
                    let endpoint = '';
                    let formData = {};

                    switch (currentDeleteType) {
                        case 'indiv':
                            endpoint = 'tree_del_indiv.php';
                            formData = { ind_id: currentDeleteData.id };
                            break;

                        case 'event':
                            endpoint = 'tree_del_event.php';
                            formData = {
                                tree_uuid: uuidParam,
                                event_id: currentDeleteData.id
                            };
                            break;

                        case 'family':
                            endpoint = 'tree_del_fam.php';
                            formData = { fam_id: currentDeleteData.id };
                            break;

                        case 'child':
                            endpoint = 'tree_fam_remove_child.php';
                            formData = {
                                tree_uuid: uuidParam,
                                family_id: currentDeleteData.familyId,
                                child_id: currentDeleteData.childId
                            };
                            break;

                        case 'indiv_event':
                            endpoint = 'ind_delete_event.php';
                            formData = {
                                ind_id: currentDeleteData.indivId,
                                event_id: currentDeleteData.eventId
                            };
                            break;

                        case 'permission':
                            endpoint = 'tree_remove_permissions.php';
                            formData = {
                                tree_uuid: uuidParam,
                                target_username: currentDeleteData.username
                            };
                            break;

                        case 'tree':
                            endpoint = 'user_delete_tree.php';
                            formData = {
                                tree_uuid: uuidParam
                            };
                            break;

                        default:
                            throw new Error('Неизвестный тип удаления');
                    }

                    const response = await apiRequest(endpoint, formData);

                    if (response.status === 'success') {
                        // Обновляем страницу после успешного удаления
                        window.location.reload();
                    } else {
                        alert('Ошибка: ' + (response.message || 'Неизвестная ошибка'));
                    }
                } catch (error) {
                    console.error('Ошибка удаления:', error);
                    alert('Произошла ошибка при удалении');
                }
            }

            // Инициализация модального окна подтверждения
            function setupConfirmModal() {
                // Подтверждение удаления
                document.getElementById('modal-confirm-submit-create-btn').addEventListener('click', executeDelete);

                // Отмена удаления
                document.getElementById('modal-confirm-cancel-create-btn').addEventListener('click', () => {
                    document.getElementById('modal-confirm').classList.add('disable');
                });

                // Закрытие по крестику
                document.querySelector('#modal-confirm .icon-close').addEventListener('click', () => {
                    document.getElementById('modal-confirm').classList.add('disable');
                });

                // Закрытие по клику на фон
                document.getElementById('modal-confirm').addEventListener('click', (e) => {
                    if (e.target === e.currentTarget) {
                        document.getElementById('modal-confirm').classList.add('disable');
                    }
                });
            }

            // ================== СПЕЦИФИЧЕСКИЕ ФУНКЦИИ УДАЛЕНИЯ ==================

            // 1. Удаление индивида
            function confirmDeleteIndividual(indivId, customMessage = null) {
                openDeleteConfirmModal('indiv', { id: indivId }, customMessage);
            }

            // 2. Удаление события древа
            function confirmDeleteTreeEvent(eventId, customMessage = null) {
                openDeleteConfirmModal('event', { id: eventId }, customMessage);
            }

            // 3. Удаление семьи
            function confirmDeleteFamily(famId, customMessage = null) {
                openDeleteConfirmModal('family', { id: famId }, customMessage);
            }

            // 4. Удаление ребенка из семьи
            function confirmRemoveChildFromFamily(familyId, childId, customMessage = null) {
                openDeleteConfirmModal('child', { familyId, childId }, customMessage);
            }

            // 5. Удаление события у индивида
            function confirmDeleteIndividualEvent(indivId, eventId, customMessage = null) {
                openDeleteConfirmModal('indiv_event', { indivId, eventId }, customMessage);
            }

            // 6. Удаление прав доступа
            function confirmRemovePermission(username, customMessage = null) {
                openDeleteConfirmModal('permission', { username }, customMessage);
            }

            // 7. Удаление древа
            function confirmDeleteTree(customMessage = null) {
                openDeleteConfirmModal('tree', {}, customMessage || 'Вы уверены, что хотите полностью удалить это древо? Это действие нельзя отменить!');
            }

            setupConfirmModal();
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
            //
            //
            //
            //
            // Функция открытия основного модального окна настроек
            function openTreeSettingsModal() {
                if (!treeData || !treeData.tree) {
                    alert('Данные дерева не загружены');
                    return;
                }

                const tree = treeData.tree;

                // Заполняем основные данные


                document.querySelector('#tree-settings-title span:last-child').textContent = tree.name;
                document.querySelector('#tree-settings-access span:last-child').textContent = tree.is_public ? 'Публичный' : 'Приватный';
                document.querySelector('#tree-settings-creator span:last-child').textContent = tree.creator_username;
                document.querySelector('#tree-settings-desciption p').textContent = tree.description || 'Описание отсутствует';

                // Заполняем список прав доступа
                renderPermissionsList();

                // Показываем модальное окно
                document.getElementById('modal-tree-settings').classList.remove('disable');
                setupTreeSettingsModalHandlers();

                if (data.response.access_level == "edit") {
                    initIcons();
                }
            }

            // Функция рендеринга списка прав доступа
            function renderPermissionsList() {
                const container = document.getElementById('tree-permissions-container');
                container.innerHTML = '';

                if (!treeData.permissions) return;

                if (treeData.permissions.length == 0) {
                    // alert('spisok pust');
                    let tempString = '';
                    if (data.response.access_level == "edit") {
                        tempString = 'Список пуст. Добавьте права доступа другим пользователям нажатием на&nbsp;кнопку +';
                    } else {
                         tempString = 'Доступ к&nbsp;просмотру данных отсутствует';
                    }
                    container.innerHTML = tempString;


;
                    // container.classList.add('text-align-left');
                    container.classList.add('tiny');
                    return;
                }

                treeData.permissions.forEach(permission => {
                    const permElement = document.createElement('div');
                    permElement.className = 'padding-8-12 shadow margin-bottom-12';

                    permElement.innerHTML = `
            <div class="flex-inline space-between align-items-center">
                <span>${permission.username} <span class="tiny">— ${permission.can_edit ? 'Редактор' : 'Зритель'}</span></span>
                <button class="default-button light-gray icon-delete" data-username="${permission.username}"></button>
            </div>
        `;

                    container.appendChild(permElement);
                });

                // Добавляем обработчики на кнопки удаления
                document.querySelectorAll('#tree-permissions-container .icon-delete').forEach(btn => {
                    btn.addEventListener('click', function (e) {
                        e.stopPropagation();
                        const username = this.dataset.username;
                        confirmRemovePermission(username, `Вы уверены, что хотите удалить права пользователя ${username}?`);
                    });
                });
            }

            // Функция открытия модального окна добавления прав
            function openAddPermissionModal() {
                document.getElementById('modal-tree-settings-add-user').classList.remove('disable');
                setupAddPermissionModalHandlers();
            }

            // Функция добавления прав доступа
            async function addPermission() {
                const username = document.getElementById('tree-settings-add-user-username').value.trim();
                const canEdit = document.getElementById('select-tree-settings-add-user').value === 'editor';

                if (!username) {
                    alert('Пожалуйста, укажите имя пользователя');
                    return;
                }

                console.log(uuidParam, username, canEdit);

                try {
                    const response = await apiRequest('tree_add_permissions.php', {
                        tree_uuid: uuidParam,
                        target_username: username,
                        can_edit: canEdit.toString()
                    });

                    if (response.status === 'success') {
                        // Закрываем модальное окно
                        closeAddPermissionModal();

                        window.location.reload();
                    } else {
                        alert('Ошибка: ' + (response.message || 'Неизвестная ошибка'));
                    }
                } catch (error) {
                    console.error('Ошибка добавления прав:', error);
                    alert('Произошла ошибка при добавлении прав');
                }
            }

            // Настройка обработчиков основного модального окна
            function setupTreeSettingsModalHandlers() {
                const modal = document.getElementById('modal-tree-settings');

                // Закрытие по клику на фон
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeTreeSettingsModal();
                    }
                });

                // Закрытие по кнопке закрытия
                document.getElementById('tree-settings-close-btn').addEventListener('click', closeTreeSettingsModal);

                if (data.response.access_level == "edit") {
                    // Кнопка удаления древа
                    document.getElementById('tree-settings-delete-btn').addEventListener('click', function (e) {
                        confirmDeleteTree();
                    });
                }
                if (data.response.access_level == "edit") {
                    // Кнопка добавления прав доступа
                    document.getElementById('tree-settings-add-permissions').addEventListener('click', function (e) {
                        e.stopPropagation();
                        openAddPermissionModal();
                    });
                }
            }

            // Настройка обработчиков модального окна добавления прав
            function setupAddPermissionModalHandlers() {
                const modal = document.getElementById('modal-tree-settings-add-user');

                // Закрытие по клику на фон
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeAddPermissionModal();
                    }
                });

                // Закрытие по кнопке закрытия
                document.getElementById('tree-settings-add-user-close-btn').addEventListener('click', closeAddPermissionModal);

                // Закрытие по кнопке отмены
                document.getElementById('tree-settings-add-user-cancel-btn').addEventListener('click', closeAddPermissionModal);

                // Обработка добавления прав
                document.getElementById('tree-settings-add-user-submit-btn').addEventListener('click', addPermission);
            }

            // Функции закрытия модальных окон
            function closeTreeSettingsModal() {
                document.getElementById('modal-tree-settings').classList.add('disable');
            }

            function closeAddPermissionModal() {
                document.getElementById('modal-tree-settings-add-user').classList.add('disable');
                // Очищаем поля
                document.getElementById('tree-settings-add-user-username').value = '';
                document.getElementById('select-tree-settings-add-user').value = 'viewer';
            }

            document.getElementById('tree-settings-button').onclick = () => {
                openTreeSettingsModal()
            }

            // 
            //
            //
            //
            //
            //
            //
            //
            //

            const individuals = new Map(treeData.individuals.map(p => [p.id, p]));
            const families = treeData.families;
            const childToParents = new Map();
            families.forEach(fam => {
                fam.children.forEach(child => {
                    childToParents.set(child.id, {
                        father: fam.husband_id,
                        mother: fam.wife_id
                    });
                });
            });
            const individualMap = new Map(); // id → { id, generation, line }
            // console.log(childToParents);

            let maxGenerationDepth = 1;
            findGenerationDepth(rootId);
            const totalLines = Math.pow(2, maxGenerationDepth) - 1;
            const rootLine = Math.ceil(totalLines / 2);

            // создание строк для канваса и навигатора
            const minLines = 9;
            if (totalLines < minLines) {
                createLines(minLines);
            } else createLines(totalLines);

            function createLines(quant) {
                for (i = 0; i <= quant - 1; i++) {
                    const containerCanvas = document.createElement('div');
                    containerCanvas.className = 'canvas-unit-container';

                    const unitCanvas = document.createElement('div');
                    unitCanvas.className = 'canvas-unit';

                    containerCanvas.appendChild(unitCanvas);

                    canvas.appendChild(containerCanvas);

                    // 
                    const containerNav = document.createElement('div');
                    containerNav.className = 'navigator-unit-container';

                    const unitNav = document.createElement('div');
                    unitNav.className = 'navigator-unit';

                    containerNav.appendChild(unitNav);

                    navigator.appendChild(containerNav);
                }
            }


            // ширина древа пиксели, года, всё такое
            const individualsFiltered = treeData.individuals.filter(i => i.birth_date); // фильтруем тех, у кого есть дата рождения

            const hasLiving = individualsFiltered.some(i => !i.death_date); // проверяем есть ли живые

            const minBirth = Math.min(...individualsFiltered.map(i => new Date(i.birth_date).getFullYear()));


            let minEventDate = new Date().getFullYear();

            data.response.tree_events.forEach(element => {
                if (new Date(element.event_date).getFullYear() < minEventDate) {
                    minEventDate = new Date(element.event_date).getFullYear();
                }
            });

            const rightYear = hasLiving
                ? new Date().getFullYear()
                : Math.max(...individualsFiltered.filter(i => i.death_date).map(i => new Date(i.death_date).getFullYear()));

            const leftYear = minBirth > minEventDate ? minEventDate : minBirth;

            // ищем первый год кратный 10
            const leftYear10 = leftYear - leftYear % 10;

            // длительносить 
            const deltaYear = rightYear - leftYear10;
            const decades = deltaYear / 10;

            let decadesWidth = 0;
            if (canvas.offsetWidth / decades < 80) {
                decadesWidth = 80;
            } else {
                decadesWidth = canvas.offsetWidth / decades;
            }

            const yW = decadesWidth / 10;

            // расчёт экрана
            // если на 
            function timelineCreater() {
                let i = 0;
                for (; i < decades - 1; i++) {
                    timelineCreaterDiv(leftYear10 + i * 10, decadesWidth);
                }
                timelineCreaterDiv(leftYear10 + i * 10, yW * (rightYear - (leftYear10 + i * 10)));

            }

            function timelineCreaterDiv(yearContent, width) {
                const timelineUnit = document.createElement('div');
                timelineUnit.className = 'timeline-unit';
                timelineUnit.textContent = `${yearContent}`;
                timelineUnit.style.minWidth = `${width}px`;

                timeline.appendChild(timelineUnit);
            }

            timelineCreater();


            // расчёт блока таймлайна (опорная точка для построения)
            var trueTimelineWidth = 0;

            Array.from(timeline.children).forEach((child) => {
                trueTimelineWidth += child.offsetWidth;
            })

            canvas.style.width = `${trueTimelineWidth}px`;
            timeline.style.width = `${trueTimelineWidth}px`;
            timelineEvent.style.width = `${trueTimelineWidth}px`;


            data.response.tree_events.forEach(element => {
                const timelineEventUnit = document.createElement('div');
                timelineEventUnit.className = 'timeline-event-unit';
                timelineEventUnit.classList.add(`${element.color}`);
                timelineEventUnit.textContent = `${element.title}`;

                const eventDateTemp = new Date(element.event_date).getFullYear();

                const leftOffset = (new Date(element.event_date).getFullYear() - leftYear10) * yW;
                timelineEventUnit.style.left = `${leftOffset}px`;


                timelineEventUnit.onclick = () => {
                    openTreeEventModal(element.id);
                }


                timelineEvent.prepend(timelineEventUnit);
            });

            // 
            // ЗАПОЛНЕНИЕ КАНВАСА И НАВИГАТОРА
            // 
            // Рекурсивное определение глубины поколений с защитой от циклов
            function findGenerationDepth(individualId, currentDepth = 1, visited = new Set()) {
                // Защита от бесконечной рекурсии
                if (currentDepth > 100) {
                    console.error(`Обнаружена возможная циклическая связь у индивида ${individualId}. Максимальная глубина ${100} достигнута.`);
                    maxGenerationDepth = 0; // Сбрасываем глубину
                    alert("Обнаружена циклическая связь в данных семьи. Пожалуйста, проверьте корректность данных в базе.");
                    return;
                }

                // Защита от циклических ссылок
                if (visited.has(individualId)) {
                    console.error(`Обнаружена циклическая ссылка у индивида ${individualId}`);
                    maxGenerationDepth = 0; // Сбрасываем глубину
                    alert("Обнаружена циклическая связь в данных семьи. Пожалуйста, проверьте корректность данных в базе.");
                    return;
                }

                // Добавляем текущего индивида в посещенные
                visited.add(individualId);

                // Обновляем максимальную глубину
                maxGenerationDepth = Math.max(maxGenerationDepth, currentDepth);

                // Получаем родителей
                const parents = childToParents.get(individualId);
                if (!parents) return;

                // Рекурсивно проверяем родителей
                try {
                    if (parents.father) {
                        findGenerationDepth(parents.father, currentDepth + 1, new Set(visited));
                    }
                    if (parents.mother) {
                        findGenerationDepth(parents.mother, currentDepth + 1, new Set(visited));
                    }
                } catch (e) {
                    console.error("Ошибка при вычислении глубины поколений:", e);
                    maxGenerationDepth = 0;
                    alert("Произошла ошибка при анализе структуры семьи. Пожалуйста, проверьте данные.");
                }
            }

            // Рекурсивная разметка поколений и линий
            let connectionsToDraw = []; // Массив для хранения связей, которые нужно нарисовать

            function assignPositions(individualId, generation, line) {
                individualMap.set(individualId, {
                    id: individualId,
                    generation,
                    line
                });

                placeindividualOnNav(individualId, line, generation);
                placeindividualOnGantt(individualId, line);

                const parents = childToParents.get(individualId);
                if (!parents) return;

                const offset = Math.pow(2, maxGenerationDepth - generation - 1);

                if (parents.father) {
                    assignPositions(parents.father, generation + 1, line - offset);
                    // Сохраняем связь для отрисовки позже
                    connectionsToDraw.push({ parentId: parents.father, childId: individualId });
                }
                if (parents.mother) {
                    assignPositions(parents.mother, generation + 1, line + offset);
                    // Сохраняем связь для отрисовки позже
                    connectionsToDraw.push({ parentId: parents.mother, childId: individualId });
                }
            }

            // После завершения построения всего дерева
            function drawAllConnections() {
                connectionsToDraw.forEach(connection => {
                    drawConnection(connection.parentId, connection.childId);
                });
                connectionsToDraw = []; // Очищаем массив
            }

            // console.table(Array.from(individualMap.values()));

            // позиционирование
            // обращение к строке
            const navigatorUnit = document.querySelectorAll('.navigator-unit');
            const canvasUnit = document.querySelectorAll('.canvas-unit');

            function placeindividualOnNav(id, line, generation) {
                const individual = individuals.get(id);
                if (!individual) { return; }

                const individualDiv = document.createElement("div");
                individualDiv.style.gridColumn = `${maxGenerationDepth - generation + 1}`;

                individualDiv.classList.add('small-border-radius');

                if (individual.is_male) {
                    individualDiv.classList.add('male');
                }
                else if (!individual.is_male) {
                    individualDiv.classList.add('female');
                }
                else {
                    individualDiv.classList.add('unknown');
                }

                individualDiv.dataset.id = id;
                individualDiv.title = `${individual.last_name} ${individual.first_name} ${individual.patronymic} (${formatDate(individual.birth_date)} г.)`;

                individualDiv.addEventListener('click', (e) => {
                    // alert(id);
                    showIndividualModal(id);
                })
                navigatorUnit[line - 1].appendChild(individualDiv);
            }

            function placeindividualOnGantt(id, line) {
                const individual = individuals.get(id);
                if (!individual) { return; }

                const individualDiv = document.createElement("div");

                individualDiv.classList.add('small-border-radius');

                if (individual.is_male) {
                    individualDiv.classList.add('male');
                }
                else if (!individual.is_male) {
                    individualDiv.classList.add('female');
                }
                else {
                    individualDiv.classList.add('unknown');
                }

                individualDiv.dataset.id = id;
                individualDiv.title = `${individual.last_name} ${individual.first_name} ${individual.patronymic} (${formatDate(individual.birth_date)} г.)`;
                individualDiv.textContent = `${individual.first_name} ${individual.last_name} `;
                // console.log(canvasUnit[line - 1]);

                // установка ширины блока индивида
                const leftDate = new Date(individual.birth_date).getFullYear();
                const rightDate = individual.death_date == null ? new Date().getFullYear() : new Date(individual.death_date).getFullYear();
                // console.log(rightDate);


                individualDiv.style.left = `${(leftDate - leftYear10) * yW}px`;

                individualDiv.style.width = `${(rightDate - leftDate) * yW}px`;

                individualDiv.addEventListener('click', (e) => {
                    // alert(id);
                    showIndividualModal(id);
                })
                canvasUnit[line - 1].appendChild(individualDiv);
            }


            // отрисовка линий
            function drawConnection(parentId, childId) {
                const parentEl = navigator.querySelector(`[data-id="${String(parentId)}"]`);
                const childEl = navigator.querySelector(`[data-id="${String(childId)}"]`);

                if (!parentEl || !childEl) {
                    console.log('Elements not found, skipping connection');
                    return;
                }

                if (!svg) {
                    console.error('SVG element not found');
                    return;
                }

                // Получаем координаты элементов относительно SVG
                const parentRect = parentEl.getBoundingClientRect();
                const childRect = childEl.getBoundingClientRect();
                const svgRect = svg.getBoundingClientRect();

                // Координаты центров блоков
                const x1 = parentRect.left + parentRect.width / 2 - svgRect.left;
                const y1 = parentRect.top + parentRect.height / 2 - svgRect.top;
                const x2 = childRect.left + childRect.width / 2 - svgRect.left;
                const y2 = childRect.top + childRect.height / 2 - svgRect.top;

                // Определяем направление (родитель выше или ниже ребенка)
                const parentIsAbove = y1 < y2;

                // Создаем путь из двух линий
                const path = document.createElementNS("http://www.w3.org/2000/svg", "path");

                if (parentIsAbove) {
                    // Родитель выше - линия вниз, затем вправо
                    path.setAttribute("d", `M${x1},${y1} V${y2} H${x2}`);
                } else {
                    // Родитель ниже - линия вверх, затем вправо
                    path.setAttribute("d", `M${x1},${y1} V${y2} H${x2}`);
                }

                // path.setAttribute("stroke", "#333");
                // path.setAttribute("stroke-width", "2");
                path.setAttribute("fill", "none");
                path.setAttribute("stroke-linecap", "round");
                path.setAttribute("stroke-linejoin", "round");

                svg.appendChild(path);
            }


            // css grid настройка стиля
            const style = document.createElement('style');
            var columnsNumber = maxGenerationDepth;

            style.textContent = `.navigator-unit { grid-template-columns: repeat(${columnsNumber}, 1fr) !important; grid-column-gap: ${-1.25 * columnsNumber + 17.5}%;}`;
            document.head.appendChild(style);

            // положении мыши
            function getRelativeCoordinates(e, element) {
                const rect = element.getBoundingClientRect();

                const style = window.getComputedStyle(element);
                const matrix = new DOMMatrix(style.transform);

                let relativeX = (e.clientX - rect.left - matrix.e) / matrix.a;
                let relativeY = (e.clientY - rect.top - matrix.f) / matrix.d;

                relativeX = Math.max(0, Math.min(relativeX, element.offsetWidth));
                relativeY = Math.max(0, Math.min(relativeY, element.offsetHeight));

                return { x: relativeX, y: relativeY };
            }

            canvasCont.addEventListener('mousemove', (e) => {
                const coords = getRelativeCoordinates(e, canvas);
                const coordsCont = getRelativeCoordinates(e, canvasCont);

                cursor.style.left = `${coordsCont.x.toFixed(1)}px`;

                cursorNumber.textContent = `${Math.floor(coords.x.toFixed(1) / yW) + leftYear10
                    }`;
                // console.log(coords.x.toFixed(1));
            })

            assignPositions(rootId, 1, rootLine);
            drawAllConnections();

            document.querySelectorAll('[data-id]').forEach(item => {
                item.addEventListener('mouseenter', function () {
                    const id = this.dataset.id;
                    // Находим все элементы с таким же data-id
                    document.querySelectorAll(`[data-id="${id}"]`).forEach(el => {
                        el.parentElement.parentElement.classList.add('highlight');
                    });
                });

                item.addEventListener('mouseleave', function () {
                    const id = this.dataset.id;
                    // Убираем подсветку у всех элементов
                    document.querySelectorAll(`[data-id="${id}"]`).forEach(el => {
                        el.parentElement.parentElement.classList.remove('highlight');
                    });
                });
            });
        }

        buildTree();

        // заглушка на ресайз        
        const treeResizeCap = document.getElementById('tree-resize-cap');
        window.addEventListener('resize', () => {
            treeResizeCap.classList.remove('disable');
        }
        );

        // синхронизация курсоров таймлайн канвас навигатор
        canvasCont.addEventListener('scroll', () => {
            timeline.style.transform = `translateX(-${canvasCont.scrollLeft}px)`;

            navigator.style.transform = `translateY(-${canvasCont.scrollTop}px)`;

            svg.style.top = `${-canvasCont.scrollTop}px`;
        });


        //
        //
        //
        //
        function formatDate(dateString) {
            if (!dateString) return '';

            try {
                const date = new Date(dateString);
                const day = date.getDate().toString().padStart(2, '0');
                const month = (date.getMonth() + 1).toString().padStart(2, '0');
                const year = date.getFullYear();

                return `${day}-${month}-${year}`;
            } catch (e) {
                console.error('Invalid date format:', dateString);
                return dateString; // или вернуть "Неизвестно"
            }
        }

        //
        //
        //
        const sectionTreeLayout = document.getElementById('tree-layout');
        const sectionList = document.getElementById('screen-list');

        const chooserList = document.getElementById('screen-chooser-list');
        const chooserLayout = document.getElementById('screen-chooser-layout');

        if (screen == 'list') {
            setScreenList();
        }

        if (screen == 'layout') {
            setScreenLayout();
        }

        chooserList.addEventListener('click', (e) => {
            setScreenList();
        })


        chooserLayout.addEventListener('click', (e) => {
            if (!rootId) {
                alert('Ни один индивид не выбран в качестве корневого. \nВыберите его на странице «Список» и нажмите «Посмотреть» для корректного отображения хронологии');
            } else {
                setScreenLayout();
                window.location.reload();
            }
        })

        function setScreenList() {
            chooserList.classList.add('selected');
            chooserLayout.classList.remove('selected');

            sectionTreeLayout.classList.add('disable');
            sectionList.classList.remove('disable');

            setUrlParamNow('screen', 'list');
        }

        function setScreenLayout() {
            chooserLayout.classList.add('selected');
            chooserList.classList.remove('selected');

            sectionList.classList.add('disable');
            sectionTreeLayout.classList.remove('disable');

            setUrlParamNow('screen', 'layout');
        }



        //
        //
        //
        //
        //
        // ЗАКРЫТИЕ НАВИГАТОРА

        // sessionStorage.setItem('navIsOpen', true);
        const closeNavButton = document.getElementById('closeNav-button');
        const treeLayoutCont = document.getElementById('tree-layout-container');

        // if ()
        // grid-template-columns: 1fr 100px;


        closeNavButton.onclick = (e) => {

            if (getBooleanOnSessionItem('navIsOpen')) {
                sessionStorage.setItem('navIsOpen', 'false');
                window.location.reload();
            } else {
                sessionStorage.setItem('navIsOpen', 'true');
                window.location.reload();
            }

            navIsOpenSwitch();

        }

        // null
        if (getBooleanOnSessionItem('navIsOpen') == null) {
            sessionStorage.setItem('navIsOpen', 'true');
        }

        if (getBooleanOnSessionItem('navIsOpen')) {
            closeNavButton.style = 'transform: scaleX(-1);';
            treeLayoutCont.style = 'grid-template-columns: 1fr auto;';

        } else {
            closeNavButton.style = '';
            treeLayoutCont.style = '';
        }


        //
        function getBooleanOnSessionItem(sessionItem) {
            return JSON.parse(sessionStorage.getItem(`${sessionItem}`));
        }

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
        //
        //
        //
        document.querySelector('.default-button.black.icon-exit').addEventListener('click', function () {
            // Создаем новый URL относительно текущего
            const parentUrl = new URL('./', window.location.href);
            window.location.href = parentUrl.toString();
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


        function disableEditingForViewer() {
            // Удаляем все кнопки добавления
            document.querySelectorAll('.add-button').forEach(button => {
                button.remove();
            });

            // Удаляем все кнопки удаления
            document.querySelectorAll('.icon-delete, [class*="delete"], button[onclick*="delete"]').forEach(button => {
                button.remove();
            });
        }


    </script>

    <script>


    </script>
</body>

</html>