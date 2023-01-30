<?php

namespace Apsl\Inf\Lab01\Controller;

use Apsl\Controller\BasePage;
use Apsl\Http\Request;
use Apsl\Session\Session;

class NewPassword extends BasePage
{
    protected function doHandle(): void
    {

            if ($this->request->isMethod(Request::METHOD_POST)) {
                if($this->request->getCookieValue('session')!=null) {
                    $sessionId=$this->request->getCookieValue('session');
                    session_id($sessionId);
                }
                session_start();
                $commonHash = $this->request->getQueryStringValue('hash');
                if ($commonHash === $_SESSION['hash']) {
                $data = $this->request->getValue('recoverPassword');
                $newPassword = trim($data['newPassword'] ?? '');
                $confirmedPassword = trim($data['confirmedPassword'] ?? '');

                $errors = [];
                if ($newPassword === '') {
                    $errors['newPassword'] = 'Field required';
                } elseif (filter_var($newPassword, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/")==false))) {
                    $errors['newPassword'] = 'Password must be at least 8 characters length and include at leat one big letter, one digit and one special character.';
                }
                if ($confirmedPassword === '') {
                    $errors['confirmedPassword'] = 'Field required';
                } elseif (filter_var($confirmedPassword, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/")==false))) {
                $errors['confirmedPassword'] = 'Password must be at least 8 characters length and include at leat one big letter, one digit and one special character.';
                }
                if($confirmedPassword!==$newPassword) {
                    $errors['password']='Passwords must be the same';
                }
                if (empty($errors)) {
                    $this->response->redirect($this->request->getCurrentUri(withQueryString: false) . '?success=true');
                    return;
                }}


            }

            $this->response->setBody($this->useTemplate('templates/newpassword.html.php', [
                'title' => 'Ustaw nowe hasło',
                'errors' => $errors ?? [],
                'data' => $data ?? [],
                'success' => $this->request->getValue('success', false)
            ]));
        }

}