<?php
// index.php - Entry point for the Citizen Engagement System MVP with Material Design and SMS notifications

session_start();

require_once 'db.php';
require_once 'utils/sms.php'; // Load SMS utility functions

$page = $_GET['page'] ?? 'home';


switch ($page) {
    case 'submit':
        include 'includes/header.php';
        include 'pages/submit.php';
        break;
    case 'track':
        include 'includes/header.php';
        include 'pages/track.php';
        break;
    case 'admin':
        include 'includes/header.php';
        include 'pages/admin.php';
        break;
    case 'login':
        include 'includes/header.php';
        include 'pages/login.php';
        break;
    case 'logout':
        include 'includes/header.php';
        session_destroy();
        header('Location: index.php?page=login');
        exit();
    default:
        // include 'includes/header.php';
        include 'pages/home.php';
        break;
}

include 'includes/footer.php';
