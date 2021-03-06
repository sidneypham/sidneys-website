<?php
/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license Modified MIT License
 * @link https://blueimp.net/ajax/
 */

// List containing the registered chat users:
$users = array();

// Default guest user (don't delete this one):
$users[0] = array();
$users[0]['userRole'] = AJAX_CHAT_GUEST;
$users[0]['userName'] = null;
$users[0]['password'] = null;
$users[0]['channels'] = array(0);

// Sample admin user:
$users[1] = array();
$users[1]['userRole'] = AJAX_CHAT_ADMIN;
$users[1]['userName'] = 'admin';
$users[1]['password'] = md5('admin');
$users[1]['channels'] = array(0,1);

// Sample moderator user:
$users[2] = array();
$users[2]['userRole'] = AJAX_CHAT_MODERATOR;
$users[2]['userName'] = 'moderator';
$users[2]['password'] = md5('moderator');
$users[2]['channels'] = array(0,1);

// Sample registered user:
$users[3] = array();
$users[3]['userRole'] = AJAX_CHAT_USER;
$users[3]['userName'] = 'user';
$users[3]['password'] = md5('user');
$users[3]['channels'] = array(0,1);

//sidney's account
$users[4] = array();
$users[4]['userRole'] = AJAX_CHAT_ADMIN;
$users[4]['userName'] = 'sidney';
$users[4]['password'] = md5('admin123');
$users[4]['channels'] = array(0,1,2);

//tom's account
$users[5] = array();
$users[5]['userRole'] = AJAX_CHAT_ADMIN;
$users[5]['userName'] = 'tom';
$users[5]['password'] = md5('password1');
$users[5]['channels'] = array(0,1,2);

//jeffrey's account
$users[6] = array();
$users[6]['userRole'] = AJAX_CHAT_ADMIN;
$users[6]['userName'] = 'jeffrey';
$users[6]['password'] = md5('jeffreyiscool');
$users[6]['channels'] = array(0,1);

?>