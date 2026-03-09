<?php

/* =========================
   SANITIZATION FUNCTIONS
   ========================= */

function sanitizeString($data){
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function sanitizeEmail($email){
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}

function sanitizeNumber($num){
    return filter_var($num, FILTER_SANITIZE_NUMBER_INT);
}


/* =========================
   VALIDATION FUNCTIONS
   ========================= */

function checkRequired($value){
    return !empty(trim($value));
}

function checkEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function checkMinLength($value,$min){
    return strlen(trim($value)) >= $min;
}

function checkMaxLength($value,$max){
    return strlen(trim($value)) <= $max;
}

function checkNumber($num){
    return is_numeric($num);
}

function checkRange($num,$min,$max){
    return $num >= $min && $num <= $max;
}

?>