<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $reference
 * @property int $price
 * @property int $weight
 * @property string $category
 * @property int $stock
 * @property string $created_date
 * @property string $date_last_sell
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'reference', 'price', 'weight', 'category', 'stock'], 'required'],
            [['price', 'weight', 'stock'], 'integer'],
            [['created_date', 'date_last_sell'], 'safe'],
            [['name', 'reference', 'category'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'reference' => 'Reference',
            'price' => 'Price',
            'weight' => 'Weight',
            'category' => 'Category',
            'stock' => 'Stock',
            'created_date' => 'Created Date',
            'date_last_sell' => 'Date Last Sell',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductsQuery(get_called_class());
    }
}
