<?php

require_once 'models/photo_model.php';
require_once 'models/interest_model.php';

class MainController extends Controller {
    // Основной метод, который будет вызываться по умолчанию
    public function index() {
        $this->view->render('pages/main_page.php', 'Главная страница');
    }

    // Методы для остальных страниц
    public function actionAboutMe() {
        $this->view->render('pages/about_me.php', 'Обо мне');
    }

    public function actionMyHobbies() {
        $interests = Interest::getInterests();
        $categories = Interest::getCategories();
        $hobby = Interest::getHobby();
        $this->view->render('pages/my_hobbies.php', 'Мои интересы', ['categories' => $categories, 'hobby' => $hobby, 'interests' => $interests]);
    }

    public function actionStudy() {
        $this->view->render('pages/study.php', 'Учеба');
    }

    public function actionPhotoAlbum() {
        $photos = Photo::getAllPhotos();
        $this->view->render('pages/photo_album.php', 'Фотоальбом', $photos);
    }

    public function actionContact() {
        $this->view->render('pages/contact.php', 'Контакты');
    }

    public function actionDisciplineTest() {
        $this->view->render('pages/discipline_test.php', 'Тест по дисциплине');
    }

    public function actionHistory() {
        $this->view->render('pages/history.php', 'История просмотра');
    }

    public function validateTest() {
        $this->model->result_validator->setTestRule('fullName', 'isValidFio');
        $this->model->result_validator->setTestRule('Science', 'isValidScience');
        
        $this->model->results_validator->setResultsRule('Ecosystem', 'checkEcosystem');
        $this->model->results_validator->setResultsRule('AbioticFactors', 'checkAbioticFactors');
        $this->model->results_validator->setResultsRule('Science', 'checkScience');

        $message = '';
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key => $value) {
                echo "$key: $value<br>";
            }

            if ($this->model->results_validate($_POST)) {
                $message = 'Тест успешно пройден! Все ответы правильные!';
            } else {
                $fields = ['fullName', 'age', 'msg', 'mobilePhone'];
                
                foreach ($fields as $field) {
                    $errors[$field] = $this->model->results_validator->showErrors($field);
                }
            }

            $model = [
                'errors' => $errors,
                'form_data' => $_POST,
                'message' => $message !== '' ? $message : ''
            ];

            $this->view->render('pages/discipline_test.php', 'Тест по дисциплине', $model);
        } else {
            $this->view->render('pages/discipline_test.php', 'Тест по дисциплине');
        }
    }

    public function validateContact() {
        $this->model->validator->setRule('fullName', 'isNotEmpty');
        $this->model->validator->setRule('Email', 'isEmail');
        $this->model->validator->setRule('age', 'isInteger');
        $this->model->validator->setRule('age', 'isGreater', 18);
        $this->model->validator->setRule('msg', 'isNotEmpty');
        $this->model->validator->setRule('mobilePhone', 'isNotEmpty');

        $message = '';
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key => $value) {
                echo "$key: $value<br>";
            }

            if ($this->model->validate($_POST)) {
                $message = 'Форма успешно отправлена!';
            } else {
                $fields = ['fullName', 'Email', 'age', 'msg', 'mobilePhone'];

                foreach ($fields as $field) {
                    $errors[$field] = $this->model->validator->showErrors($field);
                }
            }

            $model = [
                'errors' => $errors,
                'form_data' => $_POST,
                'message' => $message !== '' ? $message : ''
            ];

            $this->view->render('pages/contact.php', 'Контакты', $model);
        } else {
            $this->view->render('pages/contact.php', 'Контакты');
        }
    }
}