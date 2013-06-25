<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Task extends Controller {

    public function action_get()
    {
        $user = Auth::instance()->get_user();
        if (!$user)
        {
            $this->request->redirect('/login');
        }

        $id = (int) $this->request->param('id', false);
        if ( ! $id)
        {
            throw new HTTP_Exception_404('Task not specified.');
        }

        $task = ORM::factory('task', $id);
        if ( ! $task->loaded() || $task->list->user_id !== $user->id)
        {
            throw new HTTP_Exception_404('Task not found.');
        }


        if ($this->request->post())
        {
            $task->title = $this->request->post('title');
            $task->description = $this->request->post('description');
            $task->status = (bool) $this->request->post('status');
            $task->save();

            $this->request->redirect('/list/' . $task->list->id);
        }

        $view = View::factory('task');
        $view->task = $task;
        $this->response->body($view);
    }

    public function action_complete()
    {
        $user = Auth::instance()->get_user();
        if (!$user)
        {
            $this->request->redirect('/login');
        }

        $id = (int) $this->request->param('id', false);
        if ( ! $id)
        {
            throw new HTTP_Exception_404('Task not specified.');
        }

        $task = ORM::factory('task', $id);
        if ( ! $task->loaded() || $task->list->user_id !== $user->id)
        {
            throw new HTTP_Exception_404('Task not found.');
        }

        $task->status = true;
        $task->save();

        $this->request->redirect('/list/' . $task->list_id);
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
            throw new HTTP_Exception_404('Task not specified.');
        }

        $task = ORM::factory('task', $id);

        if ( ! $task->loaded())
        {
            throw new HTTP_Exception_404('Task not found.');
        }

        $list_id = $task->list_id;

        if ($task->list->user_id !== $user->id)
        {
            throw new HTTP_Exception_404('Task not found.');
        }

        $task->delete();
        $this->request->redirect('/list/' . $list_id);
    }

}
