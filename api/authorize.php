<?php
function getAllUserEmails() {
    return ['example@example.com', 'admin@admin.com', 'user@user.com'];
}

// URL должен быть вида authorize.php?action=check_email_uniqueness&email=<проверяемый email>
if (!empty($_GET['action'])) 
{
    $action = $_GET['action'];
    if (($action == 'check_email_uniqueness') && !empty($_GET['email']))  
    {
        $userEmails   = getAllUserEmails();
        $emailToCheck = $_GET['email'];

        echo json_encode([
            'result' => !in_array($emailToCheck, $userEmails)
            ]);
    }
}