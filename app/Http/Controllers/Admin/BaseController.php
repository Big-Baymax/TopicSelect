<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class BaseController extends Controller
{
    protected function checkPolicy($check)
    {
        $this->middleware(function ($request, $next) use ($check) {
            $identity = $this->getCurrentIdentity();
            switch ($check) {
                case 'admin':
                    if (!$this->checkAdmin($identity)) {
                        throw new AccessDeniedHttpException('你没有权限～～');
                    }
                    break;
                case 'teacher':
                    if (!$this->checkTeacher($identity)) {
                        throw new AccessDeniedHttpException('你没有权限～～');
                    }
                    break;
            }

            return $next($request);
        });
    }

    protected function validateMiddle($input, $rules, $messages)
    {
        $validator = $this->getValidationFactory()->make($input, $rules, $messages);
        if ($validator->fails()) {
            return $validator->errors()->first();
        }
        return false;
    }

    protected function checkAdmin($identity)
    {
        return $identity == array_keys(config('common.identity_mapping'))[0];
    }

    protected function checkTeacher($identity)
    {
        return $identity == array_keys(config('common.identity_mapping'))[1];
    }

    protected function getCurrentIdentity()
    {
        $admin_user = session()->get(config('common.admin_remember_session'));
        $identity = (explode('#', $admin_user))[1];

        return $identity;
    }
}
