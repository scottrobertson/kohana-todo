<?php
class Model_List extends ORM
{
    protected $_sorting = array(
        'id' => 'DESC',
    );

    protected $_has_many = array(
        'tasks' => array(
            'model'       => 'task',
            'foreign_key' => 'list_id',
            'sort' => 'id DESC'
        ),
    );
}