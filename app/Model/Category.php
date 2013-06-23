<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property Product $Product
 */
class Category extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'category_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function afterFind($data, $primary = false) {
        foreach($data as $k => &$c)
        {
            if(isset($c['Category']['id']) && isset($c['Category']['name']))
            {
                $c['Category']['slug'] = Inflector::slug(strtolower($c['Category']['name']), '-');
                $c['Category']['link'] = array(
                    'controller' => 'categories',
                    'action' => 'index',
                    'slug' => $c['Category']['slug'],
                    'id' => $c['Category']['id'],
                    'ext' => 'html',
                    'admin' => false
                );
            }
        }
//        foreach ($data as $k => &$c) {
//            if (isset($c['Category']['id']) && isset($c['Category']['name'])) {
//                $c['Category']['slug']=  Inflector::slug(strtolower($c['Category']['name']), '-');
//                $c['Category']['link']=array(
//                    'controller'=>'categories',
//                    'action'=>'index',
//                    'slug'=>$c['Category']['slug'],
//                    'id'=> $c['Category']['id'],
//                    'ext'=>'html',
//                    'admin'=>false
//                );
//            }
//        }
//        echo "<pre>";var_dump($data);die;echo'</pre>';
        return $data;
    }

}
