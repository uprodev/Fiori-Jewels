<?php $user_id = $args['user_id'] ;

$countries_obj   = new WC_Countries();
$countries   = $countries_obj->get_countries();

if ($code = get_field('shipping_country', 'user_' . $user_id)) {
    $country = (array)$countries[$code];
}


?>


<li>
    <p>FIRST NAME:</p>
    <p><?= get_field('shipping_first_name', 'user_' . $user_id) ?></p>
</li>
<li>
    <p>LAST NAME:</p>
    <p><?= get_field('shipping_last_name', 'user_' . $user_id) ?></p>
</li>
<li>
    <p>PHONE:</p>
    <p><?= get_field('shipping_phone', 'user_' . $user_id) ?></p>
</li>
<li>
    <p>COUNTRY:</p>
    <p><?= $country[0] ?></p>
</li>
<li>
    <p>CITY:</p>
    <p><?= get_field('shipping_city', 'user_' . $user_id) ?></p>
</li>
<li>
    <p>ZIP:</p>
    <p><?= get_field('shipping_postal', 'user_' . $user_id) ?></p>
</li>
<li>
    <p>ADDRESS:</p>
    <p><?= get_field('shipping_address_1', 'user_' . $user_id) ?> </p>
    <p><?= get_field('shipping_address_2', 'user_' . $user_id) ?> </p>
</li>





