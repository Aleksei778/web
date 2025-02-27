<section class="test-section">
    <h2>
        Тест по дисциплине<br>
        "Основы экологии"
    </h2>
    <!-- ФИО -->
    <div class="info-container">
        <!-- Форма для теста -->
        <div class="test-form">
            <form id="testForm" style="position: sticky; z-index: 1000;">
                <!-- Отдельный раздел "Информация о пользователе" -->
                <fieldset>
                    <legend>Информация о пользователе</legend>

                    <label for="fullName">ФИО:</label>
                    <input type="text" name="fullName" id="fullName" placeholder="Введите ФИО">

                    <label for="group">Группа:</label>
                    <select name="group" id="group">
                        <optgroup label="Курс 1">
                            <option value="group1">ИТ/б-24-1-о</option>
                            <option value="group2">ИТ/б-24-2-о</option>
                            <option value="group3">ИТ/б-24-3-о</option>
                            <option value="group4">ИТ/б-24-4-о</option>
                            <option value="group5">ИТ/б-24-5-о</option>
                            <option value="group6">ИТ/б-24-6-о</option>
                            <option value="group7">ИТ/б-24-7-о</option>
                            <option value="group8">ИТ/б-24-8-о</option>
                        </optgroup>

                        <optgroup label="Курс 2">
                            <option value="group1">ИТ/б-23-1-о</option>
                            <option value="group2">ИТ/б-23-2-о</option>
                            <option value="group3">ИТ/б-23-3-о</option>
                            <option value="group4">ИТ/б-23-4-о</option>
                            <option value="group5">ИТ/б-23-5-о</option>
                            <option value="group6">ИТ/б-23-6-о</option>
                            <option value="group7">ИТ/б-23-7-о</option>
                            <option value="group8">ИТ/б-23-8-о</option>
                        </optgroup>

                        <optgroup label="Курс 3">
                            <option value="group1">ИВТ/б-22-1-о</option>
                            <option value="group2">ИВТ/б-22-2-о</option>
                            <option value="group3">ИС/б-22-1-о</option>
                            <option value="group4">ИС/б-22-2-о</option>
                            <option value="group5">ПИ/б-22-1-о</option>
                            <option value="group6">ПИ/б-22-2-о</option>
                            <option value="group7">ПИН/б-22-1-о</option>
                            <option value="group8">ПИН/б-22-2-о</option>
                        </optgroup>

                        <optgroup label="Курс 4">
                            <option value="group1">ИВТ/б-21-1-о</option>
                            <option value="group2">ИВТ/б-21-2-о</option>
                            <option value="group3">ИС/б-21-1-о</option>
                            <option value="group4">ИС/б-21-2-о</option>
                            <option value="group5">ПИ/б-21-1-о</option>
                            <option value="group6">ПИ/б-21-2-о</option>
                            <option value="group7">ПИН/б-21-1-о</option>
                            <option value="group8">ПИН/б-21-2-о</option>
                        </optgroup>
                    </select>
                </fieldset>

                <!-- Отдельный раздел "Тест по дисциплине" -->
                <fieldset>
                    <legend>Тест по дисциплине</legend>
                    <!-- Вопрос 1 -->
                    <label for="firstQ">Вопрос 1. В какой экосистеме обитает тушканчик?</label>
                    <select name="ecosystem" id="ecosystem">
                        <optgroup label="Наземные экосистемы">
                            <option value="forest">Леса</option>
                            <option value="desert">Пустыни</option>
                            <option value="grassland">Степи</option>
                        </optgroup>

                        <optgroup label="Водные экосистемы">
                            <option value="freshwater">Пресноводные</option>
                            <option value="marine">Морские</option>
                            <option value="wetlands">Водно-болотные угодья</option>
                        </optgroup>
                    </select>

                    <br><br>
                    <!-- Вопрос 2 -->
                    <label for="secondQ">Вопрос 2. Как называется наука, изучающая взаимоотношения живых организмов между собой и с окружающей средой?</label>
                    <input type="text" id="ecology_termin" name="ecology_termin" placeholder="Введите ответ"><br>
                    <!-- Вопрос 3 -->
                    <label for="thirdQ">Вопрос 3. Какие из перечисленных факторов являются абиотическими? (несколько вариантов ответа)</label><br>
                    <input type="checkbox" name="abiotic_factors" id="sunlight" value="sunlight">
                    <label id="not-label" for="sunlight">Солнечный свет</label><br>
                    <input type="checkbox" name="abiotic_factors" id="temperature" value="temperature">
                    <label id="not-label" for="temperature">Температура</label><br>
                    <input type="checkbox" name="abiotic_factors" id="humidity" value="humidity">
                    <label id="not-label" for="humidity">Влажность</label><br>
                    <input type="checkbox" name="abiotic_factors" id="predators" value="predators">
                    <label id="not-label" for="predators">Хищники</label><br><br>
                </fieldset>

                <!-- Кнопки "Отправить" и "Очистить форму" -->
                <div class="button-group">
                    <button type="submit" onclick="validateForm(event)">Отправить</button>
                    <button type="button" id="clear_testform-btn">Очистить форму</button>
                </div>
            </form>
        </div>
    </div>
</section>