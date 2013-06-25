<?php
class Model_Task extends ORM
{
    protected $_sorting = array(
        'status' => 'ASC',
        'id' => 'DESC',
    );
    protected $_belongs_to = array(
        'list' => array(
            'model' => 'list',
        ),
    );
}