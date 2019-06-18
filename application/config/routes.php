<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] 		= 'Homepage_controller';
$route['404_override'] 				= 'Homepage_controller/PageNotFound';
$route['translate_uri_dashes'] 		= FALSE;
$route['fb-login']					= 'Login_controller/fb_login';
$route['g-login'] 					= 'Login_controller/google_login';
$route['login'] 					= 'Login_controller';
$route['sign-up'] 					= 'Login_controller/sign_up';
$route['register'] 					= 'Login_controller/registration';
$route['sign-in'] 					= 'Login_controller/login';
$route['profile'] 					= 'Login_controller/profile';
$route['logout'] 					= 'Login_controller/logout';
$route['update-profile'] 			= 'Login_controller/update_profile';
$route['location-update'] 			= 'Login_controller/location_update';
$route['update-about'] 				= 'Login_controller/update_about';
$route['user/(:num)'] 				= 'Login_controller/user/$1';
$route['user-viewer'] 				= 'Login_controller/user_viewer';
$route['follow'] 					= 'Login_controller/follow';
$route['BMS-login'] 				= 'Login_controller/BMS';
$route['BMS-logout'] 				= 'Login_controller/BMS_logout';

$route['home'] 						= 'Homepage_controller';
$route['subscribe'] 				= 'Homepage_controller/subscribe';
$route['developer'] 				= 'Homepage_controller/developer';
$route['remove-tags'] 				= 'Homepage_controller/remove_tags';
$route['ask-question'] 				= 'Homepage_controller/question';
$route['submit-question'] 			= 'Homepage_controller/question_submit';
$route['get-question'] 				= 'Homepage_controller/get_questions';
$route['answer'] 					= 'Homepage_controller/answer_submit';
$route['get-answer'] 				= 'Homepage_controller/get_answers';
$route['question/(:num)'] 			= 'Homepage_controller/show_question/$1';
$route['get-viewer'] 				= 'Homepage_controller/get_viewer';
$route['Test'] 						= 'Homepage_controller/test';
$route['top-question'] 				= 'Homepage_controller/top_question';
$route['questions'] 				= 'Homepage_controller/question_list';
$route['tags'] 						= 'Homepage_controller/tags';
$route['get-questions-list'] 		= 'Homepage_controller/user_questions_list';
$route['update-question/(:num)'] 	= 'Homepage_controller/update_question/$1';
$route['update-answer/(:num)'] 		= 'Homepage_controller/update_answer/$1';
$route['votes'] 					= 'Homepage_controller/votes';
$route['get-tags'] 					= 'Homepage_controller/get_tags';
$route['add-interest'] 				= 'Homepage_controller/add_interest';
$route['contact'] 					= 'Homepage_controller/contact';
$route['tags-list'] 				= 'Homepage_controller/tags_list';
$route['users'] 					= 'Homepage_controller/users';
$route['user-list'] 				= 'Homepage_controller/user_list';
$route['business'] 					= 'Homepage_controller/business';
$route['question-approved'] 		= 'Homepage_controller/question_approved';
$route['category'] 					= 'Homepage_controller/category';
$route['category-list'] 			= 'Homepage_controller/category_list';
$route['profile-pic'] 				= 'Homepage_controller/profile_pic';
$route['banner-pic'] 				= 'Homepage_controller/banner_pic';
$route['get-images'] 				= 'Homepage_controller/get_images';
$route['delete-image'] 				= 'Homepage_controller/detele_image';
$route['delete-question'] 			= 'Homepage_controller/delete_question';

$route['business-login']			= 'Business_controller/login';
$route['business-sign-up']			= 'Business_controller/registration';
$route['plans']						= 'Business_controller/plan_page';
$route['selected-plans']			= 'Business_controller/selected_plans';
$route['page/(:any)']				= 'Business_controller/page';


$route['BMS'] 						= 'BMS';
$route['BMS/dashboard'] 			= 'BMS/dashboard';
$route['BMS/graph'] 				= 'BMS/graph';
$route['BMS/frame'] 				= 'BMS/frame';
$route['BMS/users'] 				= 'BMS/users_list';
$route['BMS/user-update'] 			= 'BMS/user_update';
$route['BMS/questions'] 			= 'BMS/quetion_list';
$route['BMS/contacts'] 				= 'BMS/contact_page';
$route['BMS/tags'] 					= 'BMS/tags';
$route['BMS/ads'] 					= 'BMS/ads_list';
$route['direct/(:any)'] 			= 'BMS/direct_login';

