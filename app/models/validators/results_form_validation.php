<?php

require_once '/opt/lampp/htdocs/web/app/models/validators/custom_form_validation.php';

class ResultsVerification extends CustomFormValidation {
    private $result_rules = [];

    public function SetResultsRule($field_name, $validator_name) {
        $this->result_rules[] = [
            'field' => $field_name,
            'validator' => $validator_name
        ];
    }

    public function CheckEcosystem($data) {
        if ($data !== "Пустыни") {
            return "Ну уж к этой экосистеме тушканчик точно не приспособлен!";
        }
        return "";
    }

    public function CheckScience($data) {
        if ($data !== "Экология") {
            return "Неправильно! Подсказка: название начинается на букву 'Э'.";
        }
        return "";
    }

    public function CheckAbioticFactors($data) {
        if ($data !== ['Солнечный свет', 'Температура', 'Влажность']) {
            return "Подумай ещё! Тут три правильных варианта ответа.";
        }
        return "";
    }

    public function VerifyResults($post_array) {
        foreach ($this->rules as $rule) {
            $field = $rule['field'];
            $validator = $rule['validator'];

            $data = $post_array[$field] ?? '';

            echo "FIELD: ", $field, " ";
            echo "VALIDATOR: ", $validator, " ";
            echo "DATA: ", $data, " ";

            switch ($validator) {
                case 'CheckEcosystem':
                    $error = $this->CheckEcosystem($data);
                    break;
                case 'CheckScience':
                    $error = $this->CheckScience($data);
                    break;
                case 'CheckAbioticFactors':
                    $error = $this->CheckAbioticFactors($data);
                    break;
            }

            if ($error) {
                $this->errors[$field] = $error;
            }

        }

        return empty($this->errors);
    }
}

