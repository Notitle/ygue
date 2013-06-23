<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author Notitle
 */
class Contact extends AppModel{

    public $useTable=false;
    
    public $_schema=array(
        'name'=>array(
            'type'=>'string',
            'length'=>30
        ),
        'email'=>array(
            'type'=>'string',
            'length'=>50
        ),
        'subject'=>array(
            'type'=>'string',
            'length'=>50
        ),
        'message'=>array(
            'type'=>'text'
        )
    );
}

?>
