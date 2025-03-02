<?php

require_once 'custom_validation.php';

class ResultsVerification {
    private $result_rules = [];

    public function SetResultRule($field_name, $validator_name) {
        $this->result_rules[] = [
            'field' => $field_name,
            'validator' => $validator_name
        ];
    }

    public function checkEcosystem($data) {
        if ($data !== "Пустыни") {
            return "Ну уж к этой экосистеме тушканчик точно не приспособлен!";
        }
        return "";
    }

    public function checkScience($data) {
        if ($data !== "Экология") {
            return "Неправильно! Подсказка: название начинается на букву 'Э'.";
        }
        return "";
    }

    public function checkAbioticFactors($data) {
        if ($data !== ['Солнечный свет', 'Температура', 'Влажность']) {
            return "Подумай ещё! Тут три правильных варианта ответа."
        }
        return "";
    }

    public function verifyResults($post_array) {
        foreach ($this->rules as $rule) {
            $field = $rule['field'];
            $validator = $rule['validator'];

            $data = $post_array[$field] ?? '';

            switch ($validator) {
                case 'checkEcosystem':
                    $error = $this->checkEcosystem($data);
                    break;
                case 'checkScience':
                    $error = $this->checkScience($data);
                    break;
                case 'checkAbioticFactors':
                    $error = $this->checkAbioticFactors($data);
                    break;
            }

            if ($error) {
                $this->errors[$field] = $error;
            }

        }

        return empty($this->errors);
    }

    public function ShowRightAnswers($field) {
        if (empty($this->rightAnwsers)) {
            return "";
        }
        
        $msg = $this->rightAnswers[$field];
        $html = "<div class='error-message'>$msg</div>";
        return $html;
    }
}

