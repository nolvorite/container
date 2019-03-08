<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        require_once("defaultConstructConfig.php");
    }

    public function register(){
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');    
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    

        if ($this->form_validation->run() == FALSE) {   
            $loads = ["register.php"];
            $this->base_model->pageRender("index","defaultAll",$loads);
        }
        else{                
            if($this->user_model->isDuplicate($this->input->post('email'))){
                $this->session->set_flashdata('flash_message', 'User email already exists');
                redirect(site_url().'login/');
            }
            else{

                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                $id = $this->user_model->insertUser($clean); 
                $token = $this->user_model->insertToken($id);                                        

                $qstring = $this->base_model->base64url_encode($token);                    
                $url = site_url() . 'login/complete/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 

                $message = '';                     
                $message .= '<strong>You have signed up with our website</strong><br>';
                $message .= '<strong>Please click:</strong> ' . $link;                          

                //echo $message; //send this in email

                redirect($url);
                exit;


            }             
        }
    }

    public function complete(){                                   
        $token = base64_decode($this->uri->segment(4));       
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();           

        if(!$user_info){
            $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
            redirect(site_url().'/login');
        }            
        $data = array(
            'firstName'=> $user_info->first_name, 
            'email'=>$user_info->email, 
            'user_id'=>$user_info->id, 
            'token'=>$this->base_model->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              

        if ($this->form_validation->run() == FALSE) {   
            $this->base_model->pageRender("index","defaultAll","complete.php",$data);
        }
        else{
            $this->load->library('password');                 
            $post = $this->input->post(NULL, TRUE);

            $cleanPost = $this->security->xss_clean($post);

            $hashed = $this->password->create_hash($cleanPost['password']);    
            $cleanPost['password'] = $hashed;
            unset($cleanPost['passconf']);
            $userInfo = $this->user_model->updateUserInfo($cleanPost);

            if(!$userInfo){
                $this->session->set_flashdata('flash_message', 'There was a problem updating your record');
                redirect(site_url().'/login');
            }

            unset($userInfo->password);

            $this->user_model->logLogin($userInfo);
        }
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
        $this->form_validation->set_rules('password', 'Password', 'required'); 

        if($this->form_validation->run() == FALSE) {
            $loads = ["login.php"];
            $this->base_model->pageRender("index","defaultAll",$loads);

        }else{



            $post = $this->input->post();  
            $clean = $this->security->xss_clean($post);

            $userInfo = $this->user_model->checkLogin($clean);

            if(!$userInfo){
                $this->session->set_flashdata('flash_message', 'The login was unsucessful');
                //redirect(site_url().'/login');
            }                
            $this->user_model->logLogin($userInfo);
        }
    }

    public function logout(){
    	$this->session->unset_userdata("loginData");
        redirect(site_url().'/login/');
    }

    public function forgot(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 

        if($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('forgot');
            $this->load->view('footer');
        }else{
            $email = $this->input->post('email');  
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->user_model->getUserInfoByEmail($clean);

            if(!$userInfo){
            $this->session->set_flashdata('flash_message', 'We cant find your email address');
            redirect(site_url().'/login');
            }   

            if($userInfo->status != $this->status[1]){ //if status is not approved
            $this->session->set_flashdata('flash_message', 'Your account is not in approved status');
            redirect(site_url().'/login');
            }

            //build token 

            $token = $this->user_model->insertToken($userInfo->id);                        
            $qstring = $this->base_model->base64url_encode($token);                  
            $url = site_url() . 'login/reset/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>'; 

            $message = '';                     
            $message .= '<strong>A password reset has been requested for this email account</strong><br>';
            $message .= '<strong>Please click:</strong> ' . $link;             

            echo $message; //send this through mail
            exit;
        }
    }

    public function reset(){
        $token = $this->base_model->base64url_decode($this->uri->segment(4));                  
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();               

        if(!$user_info){
	        $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
	        redirect(site_url().'home/login');
        }            
        $data = array(
	        'firstName'=> $user_info->first_name, 
	        'email'=>$user_info->email, 
	        //                'user_id'=>$user_info->id, 
	        'token'=>$this->base_model->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              

        if ($this->form_validation->run() == FALSE) {   
	        $this->load->view('header');
	        $this->load->view('reset_password', $data);
	        $this->load->view('footer');
        }else{

	        $this->load->library('password');                 
	        $post = $this->input->post(NULL, TRUE);                
	        $cleanPost = $this->security->xss_clean($post);                
	        $hashed = $this->password->create_hash($cleanPost['password']);                
	        $cleanPost['password'] = $hashed;
	        $cleanPost['user_id'] = $user_info->id;
	        unset($cleanPost['passconf']);                
	        if(!$this->user_model->updatePassword($cleanPost)){
	        $this->session->set_flashdata('flash_message', 'There was a problem updating your password');
	        }else{
	        $this->session->set_flashdata('flash_message', 'Your password has been updated. You may now login');
	        }
	        redirect(site_url().'home/login');                
        }
    }

}

?>