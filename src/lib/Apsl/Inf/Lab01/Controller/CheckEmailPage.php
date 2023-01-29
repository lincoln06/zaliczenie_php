<?php

namespace Apsl\Inf\Lab01\Controller;

use Apsl\Controller\BasePage;

class CheckEmailPage extends BasePage
{

    protected function doHandle(): void
    {
        $this->response->setBody($this->useTemplate('templates/check_email.html.php'));
    }
}