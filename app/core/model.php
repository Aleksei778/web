<?php

require_once 'models/validators/form_validation.php';

class Model {
    public $validator;
    public $results_validator;

    function __construct() { 
        $this->validator = new FormValidation();
        $this->results_validator = new ResultsVerification();
    } 
    
    function validate($post_data) { 
        $this->validator->validate($post_data);
    }

    function validateTest($post_data) {
        $this->results_validator->ValidateTest($post_data);
    }

    function validateResults($post_data) {
        $this->results_validator->verifyResults($post_data);
    }
}