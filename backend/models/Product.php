<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $product_name
 * @property string|null $image
 * @property float|null $price
 * @property int $category_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Categories $category
 */
class Product extends \common\models\Product
{
    
}
