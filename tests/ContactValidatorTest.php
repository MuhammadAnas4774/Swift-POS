<?php

namespace QuickPOS\Tests;

use PHPUnit\Framework\TestCase;
use QuickPOS\ContactValidator;

class ContactValidatorTest extends TestCase
{
    public function testEmptyNameShowsError(): void
    {
        $validator = new ContactValidator();

        $errors = $validator->validate([
            'name' => '',
            'email' => 'test@example.com',
            'message' => 'Hello'
        ]);

        $this->assertArrayHasKey('name', $errors);
    }

    public function testEmptyEmailShowsError(): void
    {
        $validator = new ContactValidator();

        $errors = $validator->validate([
            'name' => 'Ali',
            'email' => '',
            'message' => 'Hello'
        ]);

        $this->assertArrayHasKey('email', $errors);
    }

    public function testInvalidEmailShowsError(): void
    {
        $validator = new ContactValidator();

        $errors = $validator->validate([
            'name' => 'Ali',
            'email' => 'wrong-email',
            'message' => 'Hello'
        ]);

        $this->assertArrayHasKey('email', $errors);
    }

    public function testEmptyMessageShowsError(): void
    {
        $validator = new ContactValidator();

        $errors = $validator->validate([
            'name' => 'Ali',
            'email' => 'test@example.com',
            'message' => ''
        ]);

        $this->assertArrayHasKey('message', $errors);
    }

    public function testValidFormHasNoErrors(): void
    {
        $validator = new ContactValidator();

        $errors = $validator->validate([
            'name' => 'Ali',
            'email' => 'test@example.com',
            'message' => 'I want QuickPOS details.'
        ]);

        $this->assertEmpty($errors);
    }
}
