<?php

namespace PHPMVC\Lib;

trait Validate
{
    private $_regexPatterns = [
        'num'               => '/^[0-9]+(?:\.[0-9]+)?$/',
        'int'               => '/^[0-9]+$/',
        'float'             => '/^[0-9]+\.[0-9]+$/',
        'alpha'             => '/^[a-zA-ZÀ-ÿ’\p{Arabic}ّ َ ً ُ ٌ ِ ٍ ْ  \-.ـ]+$/u',
        'alphanum'          => '/^[a-zA-ZÀ-ÿ’\p{Arabic}ّ َ ً ُ ٌ ِ ٍ ْ 0-9\-.ـ]+$/u',
        'alphanumPlus'      => '/^[a-zA-ZÀ-ÿ’\p{Arabic}ّ َ ً ُ ٌ ِ ٍ ْ 0-9\'"()«»&:;.,،!\?\؟\-+\/\\\ \n\rـ]+$/u',
        'validDate'         => '/^[1-2][0-9][0-9][0-9]-(?:(?:0[1-9])|(?:1[0-2]))-(?:(?:0[1-9])|(?:(?:1|2)[0-9])|(?:3[0-1]))$/',
        'email'             => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'url'               => '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
    ];

    public function req($value)
    {
        return '' != $value || !empty($value);
    }

    public function num($value)
    {
        return (bool) preg_match($this->_regexPatterns['num'], $value) || empty($value) || $value == '';
    }

    public function int($value)
    {
        return (bool) preg_match($this->_regexPatterns['int'], $value) || empty($value) || $value == '';
    }

    public function float($value)
    {
        return (bool) preg_match($this->_regexPatterns['float'], $value) || empty($value) || $value == '';
    }

    public function alpha($value)
    {
        return (bool) preg_match($this->_regexPatterns['alpha'], $value) || empty($value) || $value == '';
    }

    public function alphanum($value)
    {
        return (bool) preg_match($this->_regexPatterns['alphanum'], $value) || empty($value) || $value == '';
    }

    public function alphanumPlus($value)
    {
        return (bool) preg_match($this->_regexPatterns['alphanumPlus'], $value) || empty($value) || $value == '';
    }

    public function equal($value, $matchAgainst)
    {
        return $value == $matchAgainst;
    }

    public function equalField($value, $otherFieldValue)
    {
        return $value == $otherFieldValue;
    }

    public function lessThan($value, $matchAgainst)
    {
        if(is_string($value)) {
            return mb_strlen($value) < $matchAgainst;
        } elseif (is_numeric($value)) {
            return $value < $matchAgainst;
        }
    }

    public function greaterThan($value, $matchAgainst)
    {
        if(is_string($value)) {
            return mb_strlen($value) > $matchAgainst;
        } elseif (is_numeric($value)) {
            return $value > $matchAgainst;
        }
    }

    public function min($value, $min)
    {
        if(is_string($value)) {
            return mb_strlen($value) >= $min;
        } elseif (is_numeric($value)) {
            return $value >= $min;
        }
    }

    public function max($value, $max)
    {
        if(is_string($value)) {
            return mb_strlen($value) <= $max;
        } elseif (is_numeric($value)) {
            return $value <= $max;
        }
    }

    public function between($value, $min, $max)
    {
        if(is_string($value)) {
            return mb_strlen($value) >= $min && mb_strlen($value) <= $max;
        } elseif (is_numeric($value)) {
            return $value >= $min && $value <= $max;
        }
    }

    public function floatLike($value, $beforeDP, $afterDP)
    {
        if (!$this->float($value)) {
            return false;
        }
        $pattern = '/^[0-9]{' . $beforeDP . '}\.[0-9]{' . $afterDP . '}$/';
        return (bool) preg_match($pattern, $value);
    }

    public function validDate($value)
    {
        return (bool) preg_match($this->_regexPatterns['validDate'], $value) || empty($value) || $value == '';
    }

    public function email($value)
    {
        return (bool) preg_match($this->_regexPatterns['email'], $value) || empty($value) || $value == '';
    }

    public function url($value)
    {
        return (bool) preg_match($this->_regexPatterns['url'], $value) || empty($value) || $value == '';
    }

    public function isValid($roles, $inputType)
    {
        $errors = [];
        if (!empty($roles)) {
            foreach ($roles as $fieldName => $validationRoles) {
                $value = $inputType[$fieldName];
                $validationRoles = explode('|', $validationRoles);
                foreach ($validationRoles as $validationRole) {
                    if(array_key_exists($fieldName, $errors))
                        continue;
                    if (preg_match_all('/(min)\((\d+)\)/', $validationRole, $m)) {
                        // In case of min role
                        if ($this->min($value, $m[2][0]) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(max)\((\d+)\)/', $validationRole, $m)) {
                        // In case of max role
                        if ($this->max($value, $m[2][0]) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(equal)\((\w+)\)/', $validationRole, $m)) {
                        // In case of equal role
                        if ($this->equal($value, $m[2][0]) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(equalField)\((\w+)\)/', $validationRole, $m)) {
                        $otherFieldValue = $inputType[$m[2][0]];
                        // In case of equalField role
                        if ($this->equalField($value, $otherFieldValue) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $this->language->get('text_label_' . $m[2][0])]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(lessThan)\((\d+)\)/', $validationRole, $m)) {
                        // In case of lessThan role
                        if ($this->lessThan($value, $m[2][0]) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(greaterThan)\((\d+)\)/', $validationRole, $m)) {
                        // In case of greaterThan role
                        if ($this->greaterThan($value, $m[2][0]) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(between)\((\d+),(\d+)\)/', $validationRole, $m)) {
                        // In case of between role
                        if ($this->between($value, $m[2][0], $m[3][0]) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0], $m[3][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(floatLike)\((\d+),(\d+)\)/', $validationRole, $m)) {
                        // In case of floatLike role
                        if ($this->floatLike($value, $m[2][0], $m[3][0]) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0], $m[3][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } else {
                        if ($this->$validationRole($value) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $validationRole, [$this->language->get('text_label_' . $fieldName)]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    }
                }
            }
        }
        return empty($errors) ? true : false;
    }
}
