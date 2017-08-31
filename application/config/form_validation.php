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
                                    'is_unique'    =>    'This email is already taken.'
                                 ]
            ]
        ]
];