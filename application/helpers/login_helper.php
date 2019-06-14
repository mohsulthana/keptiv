<?php

function login_google() {
    $ci =& get_instance();

    $ci->load->library('google');
    
    $client = $ci->google->get_client();
    return $client->createAuthUrl();
}

function login_fb() {
    $ci =& get_instance();

    $ci->load->library('fb');

    $client = $ci->fb->get_client();
    
    $helper = $client->getRedirectLoginHelper();

    $loginUrl = $helper->getLoginUrl(site_url('user/fb_callback'));
    
    return $loginUrl;
}