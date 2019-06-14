<?php
defined("BASEPATH") or exit("No direct script access allowed");

$config['g_client_id'] = '24427139995-mvhpi05t91v9jlj2bli67n2bj7mo672g.apps.googleusercontent.com';
$config['g_secret_id'] = 'XGLlD_fCR7GkQ1r0rlt-sAIJ';
$config['g_app_name'] = 'Keptiv Web Google Login';
$config['g_redirect_uri'] = site_url('user/google_login_callback');
$config['g_scopes'] = 'https://www.googleapis.com/auth/userinfo.email';
