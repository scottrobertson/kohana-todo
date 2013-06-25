<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller {

    public function action_login()
    {
        $view = View::factory('auth/login');

        if ($this->request->post())
        {
            $post = $this->request->post();
            $login = Auth::instance()->login($post['email'], $post['password'], true);

            if ($login)
            {
                $this->request->redirect('/');
            }
            else
            {
                $view->error = 'Email/password where incorrect.';
            }
        }

        $this->response->body($view);
    }

    public function action_signup()
    {
        $view = View::factory('auth/signup');

        if ($this->request->post())
        {
            $post = $this->request->post();
            $user = ORM::factory('user');

            $exists = $user->where('email', '=', $post['email'])->find();

            if ( ! $exists->loaded())
            {
                $user->email = $post['email'];
                $user->password = $post['password'];
                $user->save();

                $user->add('roles', array(
                    'user_id' => $user->id,
                    'role_id' => 1
                ));

                $login = Auth::instance()->login($post['email'], $post['password'], true);
                $this->request->redirect('/');
            }
            else
            {
                $view->error = 'Email already exists.';
            }
        }

        $this->response->body($view);
    }

    public function action_logout()
    {
        Auth::instance()->logout();
        $this->request->redirect('/');
    }
}
