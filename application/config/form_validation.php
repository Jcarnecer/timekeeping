<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config =
[
	'add_users_validate'
	=>	[
		    [
                'field'    =>    'fname',
                'label'    =>    'First name',
                'rules'    =>    'required',
            ],

            [
                'field'    =>    'lname',
                'label'    =>    'Last name',
                'rules'    =>    'required',
            ],

            [
                'field'    =>    'emailadd',
                'label'    =>    'Email address',
                'rules'    =>    'required|is_unique[users.email]|valid_email',
                'error'    =>    [
                                    'is_unique'    =>    '%s is already taken.'
                ],
            ],
        ],
    'add_position_validate'
    =>  [
            [
                'field'    =>    'position',
                'label'    =>    'Position',
                'rules'    =>    'required|is_unique[position.name]|regex_match[/^([a-zA-Z0-9@.,_]|\s)+$/]',
                'errors'    =>    [
                                    'is_unique'     =>    '%s is already taken',
                                    'regex_match'    =>    'Invalid Character for %s'
                                 ],
            ],
            [
                'field'    =>    'privileges[]',
                'label'    =>    'Position privileges',
                'rules'    =>    'required',
            ],
        ]
];