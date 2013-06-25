<?php

class Model_User extends Model_Auth_User {


    public function rules()
    {
        return array(
            'email' => array(
                array('not_empty'),
                array('email'),
            ),
        );
    }

}