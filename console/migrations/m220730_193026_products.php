<?php

use yii\db\Migration;

/**
 * Class m220730_193026_products
 */
class m220730_193026_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'product_name' => $this->string()->notNull()->unique(),
            'image' => $this->string(),
            'price' => $this->decimal( 10, 2),
            'category_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx-products-category_id',
            'products',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-products-category_id',
            'products',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220730_193026_products cannot be reverted.\n";
        $this->dropTable('{{%categories}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220730_193026_products cannot be reverted.\n";

        return false;
    }
    */
}
