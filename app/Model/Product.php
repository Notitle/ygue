<?php

App::uses('AppModel', 'Model');

/**
 * Product Model
 *
 * @property Category $Category
 * @property Order $Order
 */
class Product extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Order' => array(
            'className' => 'Order',
            'joinTable' => 'orders_products',
            'foreignKey' => 'product_id',
            'associationForeignKey' => 'order_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        )
    );

    public function afterFind($Product, $primary = false) {
        
        foreach($Product as &$p)
        {
            if(isset($p['Product']['id']) && isset($p['Product']['name']))
            {
                $p['Product']['slug'] = Inflector::slug(strtolower($p['Product']['name']), '-');
                $p['Product']['link'] = array(
                    'controller' => 'products',
                    'action' => 'view',
                    'slug' => $p['Product']['slug'],
                    'id' => $p['Product']['id'],
                    'ext' => 'html',
                    'admin' => false
                );
            }
            
            if(isset($p['Product']['image']))
            {
                $visuel = substr($p['Product']['image'], 0, strpos($p['Product']['image'], '.'));
                $ext = substr($p['Product']['image'], strpos($p['Product']['image'], '.'));
                $p['Product']['image_path'] = '/uploads/products/'.$visuel.''.$ext;
            }
        }
//         echo "<pre>";var_dump($visuel, $ext);die;echo'</pre>';
        return $Product;
    }
    

//        foreach ($products as &$p) {
//            if (isset($p['Product']['id']) && isset($p['Product']['name'])) {
//                $p['Product']['slug'] = Inflector::slug(strtolower($p['Product']['name']), '-');
//
//                $p['Product']['link'] = array(
//                    'controller' => 'products',
//                    'action' => 'view',
//                    'slug' => $p['Product']['slug'],
//                    'id' => $p['Product']['id'],
//                    'ext' => 'html',
//                    'admin' => false
//                );
//            }
//            if (isset($p['Product']['image'])) {
//                $visuel = substr($p['Product']['image'], 0, strpos($p['Product']['image'], '.'));
//                $ext = substr($p['Product']['image'], strpos($p['Product']['image'], '.'));
//                $p['Product']['image_path']='/uploads/products/'.$visuel.''.$ext;
//            }
//        }
////        echo "<pre>";var_dump($products);die;echo'</pre>';
//        return $products;
//    }

}
