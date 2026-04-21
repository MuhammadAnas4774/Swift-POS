<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contact', true, 303);
    exit;
}

$postedToken = (string)($_POST['csrf_token'] ?? '');
$sessionToken = (string)($_SESSION['csrf_token'] ?? '');
if ($sessionToken === '' || !hash_equals($sessionToken, $postedToken)) {
    $_SESSION['contact_error'] = 'Your session expired. Please try again.';
    header('Location: index.php#contact', true, 303);
    exit;
}

$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$company = trim((string)($_POST['company'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

$errors = [];

if ($name === '' || mb_strlen($name) > 120) {
    $errors[] = 'Please enter your name (max 120 characters).';
}

if ($email === '' || mb_strlen($email) > 254) {
    $errors[] = 'Please enter a valid email address.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'That email address does not look valid.';
}

if ($company !== '' && mb_strlen($company) > 160) {
    $errors[] = 'Company name is too long.';
}

if ($message === '' || mb_strlen($message) > 4000) {
    $errors[] = 'Please enter a message (max 4000 characters).';
}

if ($errors) {
    $_SESSION['contact_error'] = $errors[0];
    header('Location: index.php#contact', true, 303);
    exit;
}

// Honeypot: optional field "website" — bots often fill hidden fields
if (!empty($_POST['website'])) {
    // Pretend success to avoid tipping off scrapers
    header('Location: thank-you.html', true, 303);
    exit;
}

$safeName = preg_replace('/[\r\n]+/', ' ', $name);
$safeEmail = preg_replace('/[\r\n]+/', ' ', $email);
$safeCompany = preg_replace('/[\r\n]+/', ' ', $company);
$safeMessage = preg_replace('/\r\n|\r|\n/', ' ', $message);

$logLine = sprintf(
    "[%s] name=%s | email=%s | company=%s | message=%s\n",
    gmdate('c'),
    $safeName,
    $safeEmail,
    $safeCompany ?: '-',
    $safeMessage
);

$dataDir = __DIR__ . DIRECTORY_SEPARATOR . 'data';
if (!is_dir($dataDir)) {
    @mkdir($dataDir, 0755, true);
}

$logFile = $dataDir . DIRECTORY_SEPARATOR . 'contact-submissions.log';
@file_put_contents($logFile, $logLine, FILE_APPEND | LOCK_EX);

$subject = 'SwiftPOS demo site: new contact form';
$body = "Name: {$safeName}\nEmail: {$safeEmail}\nCompany: " . ($safeCompany ?: '-') . "\n\nMessage:\n{$safeMessage}\n";
$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/plain; charset=UTF-8',
    'From: SwiftPOS Site <noreply@localhost>',
    'Reply-To: ' . $safeEmail,
];

// Optional: try PHP mail() on configured hosts; failures are non-fatal because we log
@mail('hello@swiftpos.example', '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, implode("\r\n", $headers));

$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

header('Location: thank-you.html', true, 303);
exit;
