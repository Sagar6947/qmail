<?php
class Home extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $loginUser = $this->CommonModal->getRowById('user_registration', 'user_id', sessionId('user'))[0];
        $this->userId = $loginUser['user_id'];
        $this->name = $loginUser['name'];
        $this->email = $loginUser['email'];
        $this->dob = $loginUser['dob'];
    }

    public function index()
    {
        if (!$this->session->has_userdata('user')) {
            redirect(base_url('login'));
        }
        $data['title'] = 'Inbox | Qmail';
        $this->load->view('home', $data);
    }

    public function login()
    {
        if ($this->session->has_userdata('user')) {
            redirect(base_url('inbox'));
        }
        if (count($_POST) > 0) {
            if (count($_POST) > 0) {
                $post = $this->input->post();
                $checkUser = $this->CommonModal->getRowByMoreId('user_registration', array('email' => $post['email']))[0];

                if (!empty($checkUser)) {
                    if ($checkUser['password'] == $post['password']) {
                        $this->session->set_userdata('user', $checkUser['user_id']);
                        $message = array(
                            'type' => 'success',
                            'message' => 'Login successfully.',
                            'access' => 'granted'
                        );
                        // redirect(base_url('inbox'));
                    } else {
                        // $this->session->set_userdata('msg', '<h6 class="alert alert-danger">The <b>password</b> you entered is <b>incorrect</b> Please try again.</h6>');
                        $message = array(
                            'type' => 'danger',
                            'message' => 'Incorrect password',
                            'access' => 'denied'
                        );
                    }
                } else {
                    $message = array(
                        'type' => 'warning',
                        'message' => 'No account found with this email',
                        'access' => 'denied'
                    );
                }
            }
            echo json_encode($message);
            exit();
        }
        $data['title'] = "Login | Qmail";
        $this->load->view('login', $data);
    }

    public function register()
    {
        if ($this->session->has_userdata('user')) {
            redirect(base_url('inbox'));
        }
        if (count($_POST) > 0) {
            $post = $this->input->post();

            $email = $post['email'];
            if (!preg_match('#^[a-zA-Z]+@#', $email)) {
                $email =  $email . '@qmail.com';
            }
            $post['email'] = $email;
            if ($post['password'] === $post['cpassword']) {
                $registerUser = $this->CommonModal->insertRowReturnId('user_registration', $post);
                print_r("Insert id = " . $registerUser);
                $getUser = $this->CommonModal->getRowById('user_registration', 'user_id', $registerUser)[0];
                $this->session->set_userdata('user', $getUser['user_id']);
                redirect((base_url('inbox')));
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">password and confirm password not match</div>');
            }
        }
        $data['title'] = "Register | Qmail";
        $this->load->view('register', $data);
    }

    public function read_mail()
    {
        $data['title'] = "Read mail | Qmail";
        $this->load->view('read-mail', $data);
    }

    public function sent()
    {
        $data['title'] = "sent | Qmail"; 
        $this->load->view('sent', $data);
    }

    public function logout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('user');
        redirect(base_url());
    }
}
