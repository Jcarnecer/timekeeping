<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{
   

    public function auth() {
            if($this->input->server('REQUEST_METHOD')=='POST'){
                //$json = json_decode(file_get_contents('php://input',true),true);
                $email = clean_data($this->input->post('email'));
                $password = clean_data($this->input->post('password'));
                
                $where = array('email'=>$email);
                $get_user = $this->Crud_model->fetch_tag_row('*','users',$where);
                if(!$get_user == NULL) {
                    $user_where = ['user_id' => $get_user->id];
                    $get_user_detail = $this->Crud_model->fetch_tag_row('*','user_details',$user_where);
                    
                    $check_password = $get_user->password;
                    
                    if(password_verify($password,$check_password)) {
    
                        if($get_user_detail->status == 1) {
                            $position_id =$get_user->position_id;
                            $pos_where = ['id'  => $position_id];
                            $position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
                            parent::audittrail(
                                'Account Access',
                                'Account Login ',
                                $this->user->info('firstname') .' '. $this->user->info('lastname'),
                                $position->name,
                                $this->input->ip_address()
                            );
                          
                            $response="Success";
                        }elseif($get_user_detail->status == 0){
                            $response="Your account is inactive. Contact our human resource department regarding this problem.";
                            
                        }
                        
                    }else {
                        
                        $response="Invalid Credentials";
                    }
                    
                 }else{
                    $response="Invalid Credentials";
                }
                $result=[
                    "response"=>$response,
                    'email'=>$get_user->email,
                ];  
                  echo json_encode($result);      
            }
    }

}