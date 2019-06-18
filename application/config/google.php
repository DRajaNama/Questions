<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '365968683891-d753kt8k9965stjsk1l2q0qedc73rlbi.apps.googleusercontent.com';
$config['google']['client_secret']    = 'PWmqFPR1K0c-UjeqtP8J6s61';
$config['google']['redirect_uri']     = 'http://questions.co/Questions/Login_controller/google_login';
$config['google']['application_name'] = 'Questions';
$config['google']['api_key']          = 'AIzaSyDPS-5bt1cYJ9_s_43YB06hMjOdOOI8_Nc';
$config['google']['scopes']           = array();