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
            [
                'field'     =>   'start_date',
                'label'     =>   'Start Date',
                'rules'     =>   'required'
            ]
        ],

    'login_validate'
        =>	[
                [
                    'field'		=> 	'email',
                    'label'   	=> 	'Email address',
                    'rules'   	=> 	'required|valid_email'
                ],
    
                [
                    'field'		=> 	'password',
                    'label'   	=> 	'Password',
                    'rules'  	=> 	'required',
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
        ],
    'edit_info_validate'
        =>	[
                [
                      'field'		=> 	'email',
                      'label'   	=> 	'Email address',
                      'rules'   	=> 	'required|valid_email',
                      'errors'  	=>	[
                                          'valid'   		=>	'You have entered invalid format for %s',
                                     ],
                ],
    
                [
                      'field'   	=>	'fname',
                      'label'   	=> 	'First Name',
                      'rules'   	=> 	'required|regex_match[/^([A-z-]|\s)+$/]',
                      'errors'	=> 	[
                                          'regex_match' 	=>	'Remove special characters in %s'
                                      ],
                  
                ],
    
                [
                      'field'   	=>	'lname',
                      'label'   	=> 	'Last Name',
                      'rules'   	=> 	'required|regex_match[/^([A-z-]|\s)+$/]',
                      'errors'	=> 	[
                                          'regex_match' 	=> 	'Remove special characters in %s'
                                      ],
                  
                ],
            ],
    'intern_other_info_validate'
        =>	[
                [
                    'field'		=> 	'school',
                    'label'   	=> 	'School',
                    'rules'   	=> 	'required'
                ],

                [
                    'field'		=> 	'no_of_hrs',
                    'label'   	=> 	'Number of hours',
                    'rules'   	=> 	'required|numeric'
                ],

                [
                    'field'		=> 	'course',
                    'label'   	=> 	'Course',
                    'rules'   	=> 	'required'
                ],

                [
                    'field'		=> 	'bday',
                    'label'   	=> 	'Birthday',
                    'rules'   	=> 	'required'
                ],

                [
                    'field'		=> 	'year',
                    'label'   	=> 	'Year (School Year)',
                    'rules'   	=> 	'required'
                ],

                [
                    'field'		=> 	'start_date',
                    'label'   	=> 	'Start date',
                    'rules'   	=> 	'required'
                ],
            ],

    'add_leave'
            =>[
                  [
                    'field'=>'leave_name',
                    'label'=>'Leave name',
                    'rules'=>'required|is_unique[timekeeping_leave.leave_name]|regex_match[/^([a-zA-Z0-9@.,_]|\s)+$/]',
                    'errors'=> ['is_unique'=>'%s is already taken',],
                  ],
                  [
                    'field'=>'days',
                    'label'=>'Days',
                    'rules'=>'required',    
                  ],

            ],
     'edit_leave'
            =>[
                [
                    'field'=>'leave_name',
                    'label'=>'Leave',
                    'rules'=>'required|is_unique[timekeeping_leave.leave_name]|regex_match[/^([a-zA-Z0-9@.,_]|\s)+$/]',
                    'errors'=> ['is_unique'=>'%s is already taken',],
                  ],
                  [
                    'field'=>'days',
                    'label'=>'Days',
                    'rules'=>'required',    
                  ],     

            ],               

];