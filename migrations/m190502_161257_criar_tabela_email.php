<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m190502_161257_criar_tabela_email
 */
class m190502_161257_criar_tabela_email extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* aqui estamos criando uma migration para criar a tabela de email, relacionar com a 
        tabela de pessoa e dropar a coluna de pessoa_email da tabela de pessoa.  */


        $this->createTable('emails', [
            'email_id' => 'pk',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'pessoa_email_id' => Schema::TYPE_INTEGER . ' NOT NULL'
             ]);
    $this->addForeignKey('pessoa_fk','emails','pessoa_email_id', 'pessoa', 'pessoa_id');

    $this->dropColumn('pessoa','pessoa_email');       
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

/*         no safeDown revertemos as alterações feitas no safeUp. ou seja, estamos excluindo o relacionamento,
        excluindo a tabela e criando novamente a coluna de pessoa_email na tabela pessoa */
       $this->dropForeignKey ('pessoa_fk','emails');
       $this->dropTable('emails');
       $this->createColumn('pessoa', 'pessoa_email');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190502_161257_criar_tabela_email cannot be reverted.\n";

        return false;
    }
    */
}
