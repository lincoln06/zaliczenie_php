<?php

namespace Apsl\Inf\Lab01\Controller;

use Apsl\Controller\BasePage;

class HashGenerator extends BasePage
{
public function generateHash() : string {
    return sha1(time());
}

    protected function doHandle(): void
    {
        $hash = $this->generateHash();
        $session = new Session();

        $session->setValue('reset_hash', $hash);

        $this->response->redirect(
            '/...'
        );
}}