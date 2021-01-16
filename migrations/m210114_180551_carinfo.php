<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m210114_180551_carinfo1
 */
class m210114_180551_carinfo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> createTable('car' , [
            'id' => $this -> primaryKey(),
            'brand' => $this -> string(15) ->notNull()


        ]);

        $this -> createTable('post', [
            'id' => $this -> primaryKey(),
            'description' => $this -> string(150),
            'date' => $this -> integer(),
            'price' => $this -> integer(),
            'carid' => $this -> integer()
        ]);

        //$this -> addForeignKey('carid', 'car', 'id',
        // 'post', 'id');

        $this -> addForeignKey('forcarid', 'post', 'carid',
            'car', 'id');


        $this -> batchInsert('car', ['id','brand'],
            [
                ['1','Mazda'],
                ['2','Toyota'],
                ['3', 'Peugeot'],
                ['4','Citroen'],
                ['5','Renault'],
                ['6','BMW'],
                ['7','Audi'],
                ['8','Volkswagen'],

            ]);

        $this -> batchInsert('post', ['id','description', 'date', 'price', 'carid'],
            [
                ['1','2010 Model Sahibinden Mazda', '2020', 40000, 1],
                ['2','2015 Model Audi', 2020, 85000, 7],
                ['3', '2005 Model ikinci el temiz BMW', 2020, 45000, 6],

            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m210114_180551_carinfo cannot be reverted.\n";
        $this -> dropTable('car');
        $this -> dropTable('post');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210114_180551_carinfo cannot be reverted.\n";

        return false;
    }
    */
}
