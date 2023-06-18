<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome to KLEOS family!</h1>
    <p>
        Hi <?php echo e($user->name); ?>,
        <br>
        Your account has been created successfully. Here are your login details:
        <br>
        Email: <?php echo e($user->email); ?>

        <br>
        Password: <?php echo e($password); ?>

    </p>
</body>
</html>
<?php /**PATH /home/douz/Downloads/projetPFE2/resources/views/emails/new_user_notification.blade.php ENDPATH**/ ?>