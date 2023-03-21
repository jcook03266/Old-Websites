<?php
// ************************************
// This file is part of a package from:
// www.freecontactform.com
// See license for details
// v1.1 (July 2020)
// ************************************


// ***********
// LICENSE KEY
// ***********
define('KEY', 'FREE');


// *********************
// FORM FIELD VALIDATION
// *********************
$validate = array(
    'Name' => 'NOT_EMPTY,2,60',
    'Email' => 'EMAIL',
    'Message' => 'NOT_EMPTY,15,3000'
);


// ******************
// FORM FIELD MAPPING
// ******************
$mapping = array(
    'Name' => 'Your name',
    'Email' => 'Your email address',
    'Message' => 'Your message'
);


// **************************
// EMAIL TEMPLATES - INCOMING
// **************************
define('EMAIL_TEMPLATE_IN_HTML', 'contact-form.email-in.htm');
define('EMAIL_TEMPLATE_IN_TEXT', 'contact-form.email-in.txt');


// *************
// EMAIL MESSAGE
// *************
define('EMAIL_TO', 'contact@theqrg.org');
define('EMAIL_TO_NAME', 'contact@theqrg.org');

define('EMAIL_TO_CC', '');
define('EMAIL_TO_CC_NAME', '');

define('EMAIL_TO_BCC', '');
define('EMAIL_TO_BCC_NAME', '');

define('EMAIL_FROM', 'jcook03266@gmail.com');
define('EMAIL_FROM_NAME', 'jcook03266@gmail.com');

define('EMAIL_REPLY_TO', 'FIELD:Email');
define('EMAIL_REPLY_TO_NAME', 'FIELD:Name');

define('EMAIL_SUBJECT_BEFORE', '');
define('EMAIL_SUBJECT', 'New Submission Form');
define('EMAIL_SUBJECT_AFTER', '');


// ***************
// EMAIL TRANSPORT
// ***************
define('USE_SMTP', 'NO'); // YES or NO
define('SMTP_HOST', '');
define('SMTP_USER', '');
define('SMTP_PASS', '');
define('SMTP_AUTH', '');
define('SMTP_SECURE', ''); // STARTTLS or SMTPS (port 465)
define('SMTP_PORT', '');
define('SMTP_DEBUG', 'NO'); // YES or NO



// **************************
//    DON'T CHANGE BELOW
// USED FOR VALIDATION CHECKS
// **************************
define('A', 'Rm9ybSBwcm92aWRlZCBieSB3d3cuZnJlZWNvbnRhY3Rmb3JtLmNvbQ==');
define('B', 'Rm9ybSBwcm92aWRlZCBieSA8YSBocmVmPSJodHRwczovL3d3dy5mcmVlY29udGFjdGZvcm0uY29tIj5GcmVlQ29udGFjdEZvcm0uY29tPC9hPg==');
define('C', 'Rm9ybSBwcm92aWRlZCBieSA8YSBocmVmPSJodHRwczovL3d3dy5mcmVlY29udGFjdGZvcm0uY29tIiB0YXJnZXQ9Il9ibGFuayI+RnJlZUNvbnRhY3RGb3JtLmNvbTwvYT4=');
define('D', 'Y29uZ3JhdHVsYXRpb25zIGZvciBiZWluZyBjbGV2ZXIh');
define('E', 'OGZlR3dSYkh3MjhGbg==');
define('F', 'RlJFRQ==');