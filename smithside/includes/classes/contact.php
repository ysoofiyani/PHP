<?php

/**
 * Description of contact
 * contact.php
 * 
 * contact class file 
 * 
 * @version 1.2 2018-04-19
 * 
 * @package SmithSide
 * @copyright (c) 2018, Yasser Soofiyani
 * @license GNU General Public License
 * @author yasser
 */
class Contact {

    public $first_name;
    public $last_name;
    public $position;
    public $phone;
    public $email;

    /**
     * contact_name function concatenates the first and last name
     * @return string 
     */
    
    public function __construct($input = fales) {
        if (is_array($input)){
            foreach ($input as $key => $val){
                $this->$key = $val;
            }
        }
    }


    public function contactName() {
        $contact_name = $this->first_name . '' . $this->last_name;
        return $contact_name;
    }

}

