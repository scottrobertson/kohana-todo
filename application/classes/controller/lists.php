<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Lists extends Controller {

    public function action_index()
    {
        $user = Auth::instance()->get_user();
        if (!$user)
        {
            $this->request->redirect('/login');
        }

        $lists = ORM::factory('list')->where('user_id', '=', $user->id)->find_all();

        if ($this->request->post())
        {
            $task = ORM::factory('list');
            $task->title = $this->request->post('title');
            $task->user_id = $user->id;
            $task->save();

            $this->request->redirect('/list/' . $task->id);
        }

        $view = View::factory('lists');
        $view->lists = $lists;
        $this->response->body($view);
    }
}
