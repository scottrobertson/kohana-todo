<?php defined('SYSPATH') or die('No direct script access.');

class Controller_List extends Controller {

    public function action_index()
    {
        $user = Auth::instance()->get_user();
        if (!$user)
        {
            $this->request->redirect('/login');
        }

        $id = (int) $this->request->param('id', false);
        if ( ! $id)
        {
            throw new HTTP_Exception_404('No list id specified.');
        }

        $list = ORM::factory('list', $id);
        if (!$list->loaded() || $list->user_id !== $user->id)
        {
            throw new HTTP_Exception_404('List could not be found.');
        }


        if ($this->request->post())
        {
            $task = ORM::factory('task');
            $task->title = $this->request->post('title');
            $task->list_id = $id;
            $task->save();

            $this->request->redirect('/list/' . $id);
        }

        $view = View::factory('list');
        $view->list = $list;
        $this->response->body($view);
    }

    public function action_delete()
    {
        $user = Auth::instance()->get_user();
        if (!$user)
        {
            $this->request->redirect('/login');
        }

        $id = (int) $this->request->param('id', false);
        if ( ! $id)
        {
            throw new HTTP_Exception_404('List not specified.');
        }

        $list = ORM::factory('list', $id);

        if ( ! $list->loaded() || $list->user_id !== $user->id)
        {
            throw new HTTP_Exception_404('List not found.');
        }

        $tasks = $list->tasks->find_all();
        foreach ($tasks as $task)
        {
            $task->delete();
        }

        $list->delete();

        $this->request->redirect('/');
    }
}
