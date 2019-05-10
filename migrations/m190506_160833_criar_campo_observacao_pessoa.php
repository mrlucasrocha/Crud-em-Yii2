<?php

use yii\db\Migration;

/**
 * Class m190506_160833_criar_campo_observacao_pessoa
 */
class m190506_160833_criar_campo_observacao_pessoa extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pessoa','pessoa_observacao', $this->string(5000));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('pessoa','pessoa_observacao');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190506_160833_criar_campo_observacao_pessoa cannot be reverted.\n";

        return false;
    }
    */
}
