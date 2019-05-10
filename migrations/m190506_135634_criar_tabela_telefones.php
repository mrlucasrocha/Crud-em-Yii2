<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190506_135634_criar_tabela_telefones
 */
class m190506_135634_criar_tabela_telefones extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      /*   aqui estamos criando uma tabela de telefones, para se relacionar com a tabela de pessoa.
        além disso estamos apagando a coluna de pessoa_telefone para não ficar dados duplicados; */

        $this->createTable('telefones', [
            'telefone_id' => 'pk',
            'telefone' => Schema::TYPE_STRING . ' NOT NULL',
            'pessoa_telefone_id' => Schema::TYPE_INTEGER . ' NOT NULL'
             ]);
    $this->addForeignKey('pessoa_telefone_fk','telefones','pessoa_telefone_id', 'pessoa', 'pessoa_id');

    $this->dropColumn('pessoa','pessoa_celular');     
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
/*         no safeDown estamos revertendo as alterações do safeUp, ou seja, estamos excluindo o relacionamento,
        dropando a tabela de telefones e re-adicionando a coluna de pessoa_telefone na tabela de pessoa. */
        $this->dropForeignKey ('pessoa_telefone_fk','telefone');
        $this->dropTable('telefones');
        $this->addColumn('pessoa', 'pessoa_telefone', $this->string(5000));
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190506_135634_criar_tabela_telefones cannot be reverted.\n";

        return false;
    }
    */
}
