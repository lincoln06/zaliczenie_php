<?php

use Apsl\Inf\Lab01\Controller\Error404Page;
use Apsl\Inf\Lab01\Controller\ContactPage;
use Apsl\Inf\Lab01\Controller\HomePage;
use Apsl\Inf\Lab01\Controller\RecoverPasswordPage;


return [
    '/' => HomePage::class,
    '/contact' => ContactPage::class,
    '_404' => Error404Page::class,
    '/recover_password' => RecoverPasswordPage::class
    '/generate-hash'=>HashGenrator::class
];
