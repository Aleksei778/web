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
        $this->model->results_validator->SetTestsRule('fullName', 'isValidFio');
        $this->model->results_validator->SetTestsRule('Science', 'isValidScience');
        
        $this->model->results_validator->SetResultsRule('Ecosystem', 'CheckEcosystem');
        $this->model->results_validator->SetResultsRule('AbioticFactors', 'CheckAbioticFactors');
        $this->model->results_validator->SetResultsRule('Science', 'CheckScience');

        $message = '';
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->results_validator->VerifyResults($_POST)) {
                $message = 'Тест успешно пройден! Все ответы правильные!';
            } else {
                $fields = ['fullName', 'age', 'msg', 'mobilePhone'];
                
                foreach ($fields as $field) {
                    $errors[$field] = $this->model->results_validator->ShowErrors($field);
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
        $this->model->validator->SetRule('fullName', 'isNotEmpty');
        $this->model->validator->SetRule('Email', 'isEmail');
        $this->model->validator->SetRule('age', 'isGreater', 18);
        $this->model->validator->SetRule('msg', 'isNotEmpty');
        $this->model->validator->SetRule('mobilePhone', 'isNotEmpty');

        $message = '';
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->validator->Validate($_POST)) {
                $message = 'Форма успешно отправлена!';
            } else {
                $fields = ['fullName', 'Email', 'age', 'msg', 'mobilePhone'];

                foreach ($fields as $field) {
                    $errors[$field] = $this->model->validator->ShowErrors($field);
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