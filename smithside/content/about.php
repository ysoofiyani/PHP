<?php
/**
 * about.php
 * content for the about page
 * @version 1.2 2018-04-16
 * @package Smith Side Auction
 * @copyright (c) 2018, Yasser Soofiyani IPD12
 * @license GNU Generl Public License
 * @since Release version 1.0
 */

/**
 * pass an associative array with the property name as the keys and the values from the first contact in the list
 * create an object called $item from the contact class
 */

$items = array();
$items[] = new Contact(array(
        'first_name'=>'Martha',
        'last_name'=>'Smith',
        'position' => '',
        'email'=>'martha@example.com',
        'phone'=>''
        ));
$items[] = new Contact(array(
        'first_name'=>'George',
        'last_name'=>'Smith',
        'position' => '',
        'email'=>'george@example.com',
        'phone'=>'515-555-1236'
        ));
$items[] = new Contact(array(
        'first_name'=>'Jeff',
        'last_name'=>'Meyers',
        'position' => 'hip hop expert for shure',
        'email'=>'jeff@example.com',
        'phone'=>''
        ));
$items[] = new Contact(array(
        'first_name'=>'Peter',
        'last_name'=>'Meyers',
        'position' => '',
        'email'=>'peter@example.com',
        'phone'=>'515-555-1237'
        ));
$items[] = new Contact(array(
        'first_name'=>'Sally',
        'last_name'=>'Smith',
        'position' => '',
        'email'=>'sally@example.com',
        'phone'=>'515-555-1235'
        ));
$items[] = new Contact(array(
        'first_name'=>'Sarah',
        'last_name'=>'Finder',
        'position' => 'Lost Soul',
        'email'=>'finder@a.com',
        'phone'=>'555-123-5555'
        ));

?>

<div class="content">
    <h1>About Us</h1>
    <p>We are all happy to be a part of this. Please contact any of us with questions.</p>

    <ul class="ulfancy">
        <?php foreach ($items as $i => $item) : ?>
        <li class="row<?php echo $i % 2; ?>">
            <h2><?php echo $item->contactName(); ?></h2>
            <p>
                Position: <?php echo $item->position; ?><br/>
                Email: <?php echo $item->email; ?><br/>
                Phone: <?php echo $item->phone; ?><br/>
            </p>
        </li>
        <?php endforeach; ?>
        
    </ul>

    

</div><!-- end content -->