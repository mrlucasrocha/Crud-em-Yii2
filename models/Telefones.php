<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telefones".
 *
 * @property int $telefone_id
 * @property string $telefone
 * @property int $pessoa_telefone_id
 *
 * @property Pessoa $pessoaTelefone
 */
class Telefones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telefones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
            /* Na funçao de rules passamos todos os campos que vai usar e as configurações deles */
        return [
            [['telefone', 'pessoa_telefone_id'], 'required'],
            [['pessoa_telefone_id'], 'integer'],
            [['telefone'], 'string', 'max' => 255],
            [['pessoa_telefone_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['pessoa_telefone_id' => 'pessoa_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
            /*Já aqui na parte de Labels falamos quais campos 
            iremos usar no array de exibição e quais vão ser os títulos dos labels */
        return [
            'telefone_id' => 'Telefone ID',
            'telefone' => 'Telefone',
            'pessoa_telefone_id' => 'Pessoa Telefone ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

     /*A função get serve para pegar do banco registros. Utilizando o hasOne ele pega somente um registro
     por vez da tabela pessoa */
    public function getPessoaTelefone()
    {
        return $this->hasOne(Pessoa::className(), ['pessoa_id' => 'pessoa_telefone_id']);
    }
}
