<?php

class ContactValidator
{
    public function validate(array $data): array
    {
        $errors = [];

        $name = trim($data['name'] ?? '');
        $email = trim($data['email'] ?? '');
        $message = trim($data['message'] ?? '');

        if ($name === '') {
            $errors['name'] = 'Name is required.';
        }

        if ($email === '') {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format.';
        }

        if ($message === '') {
            $errors['message'] = 'Message is required.';
        }

        return $errors;
    }
}
