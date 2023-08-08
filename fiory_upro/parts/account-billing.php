<?php $user_id = $args['user_id'] ?>


    <li>
        <p>FIRST NAME:</p>
        <p><?= get_field('billing_first_name', 'user_' . $user_id) ?></p>
    </li>
    <li>
        <p>LAST NAME:</p>
        <p><?= get_field('billing_last_name', 'user_' . $user_id) ?></p>
    </li>
    <li>
        <p>EMAIL:</p>
        <p><?= get_field('billing_email', 'user_' . $user_id) ?></p>
    </li>
    <li>
        <p>PHONE:</p>
        <p><?= get_field('billing_phone', 'user_' . $user_id) ?></p>
    </li>
    <li>
        <p>PASSWORD:</p>
        <p>*******</p>
    </li>


