<?php
class Ajax extends CI_Controller

{
   public function checkEmail()
   {
    $email = $this->input->post('cMail');
    $checkEmail = $this->CommonModal->getRowById('user_registration', 'email', $email);
    if(!empty($checkEmail)){
        echo '1';
    }else{
        echo '0';
    }
   }
}
