<?php
    $this->load->model('User_model', 'user_model', TRUE);
    $this->load->model('Base_model', 'base_model', TRUE);
    $this->load->library('form_validation');    
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->user_model->status = $this->config->item('status'); 
    $this->user_model->roles = $this->config->item('roles');
    $this->base_model->pageProperties = $this->config->item('properties');
    $this->base_model->defaultTitle = $this->config->item('properties')['index']['title'];
    $this->base_model->fileBundles = $this->config->item('fileBundles');
?>