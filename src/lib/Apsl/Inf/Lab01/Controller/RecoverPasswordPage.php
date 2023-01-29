<?php

namespace Apsl\Inf\Lab01\Controller;

use Apsl\Controller\BasePage;
use Apsl\Http\Request;

class RecoverPasswordPage extends BasePage
{
 protected string $email;

    protected function doHandle(): void
    {
        if ($this->request->isMethod(Request::METHOD_POST)) {
            $data = $this->request->getValue('recover_password');
            $email = trim($data['email'] ?? '');

            $errors = [];
            if ($email === '') {
                $errors['email'] = 'Field required';
            } elseif (filter_var($email, filter: FILTER_VALIDATE_EMAIL) === false) {
                $errors['email'] = 'Wrong email format';
            }

            if (empty($errors)) {
                $this->response->redirect('/check_email');

                return;
            }
        }

        $this->response->setBody($this->useTemplate('templates/recover_password.html.php', [
            'title' => 'Odzyskiwanie hasła',
            'errors' => $errors ?? [],
            'success' => $this->request->getValue('success', false)
        ]));

    }
}