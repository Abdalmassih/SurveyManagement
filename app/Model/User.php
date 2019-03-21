<?php

class User extends AppModel
{

    public $validate = array(
        'username' => array(
            'rule' => 'notBlank',
        ),
        'email' => array(
            'rule' => 'notBlank',
        ),
    );
}
