<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pessoa".
 *
 * @property int $pessoa_id
 * @property string $pessoa_nome
 * @property string $pessoa_celular
 * @property string $pessoa_nascimento
 */
class Pessoa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pessoa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        /*carregando os valores da tabela pessoa e informando as regras dela */
        return [
            [['pessoa_nome'], 'required'],
            [['pessoa_nascimento'], 'safe'],
            [['pessoa_observacao'], 'string', 'max' => 5000]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
            /*Exibindo num array em forma de tabela os dados salvos no campo.
             À esquerda o nome do campo na tabela e na direita a label exibida no titulo  */
        return [
            'pessoa_id' => 'Pessoa ID',
            'pessoa_nome' => 'Pessoa Nome',
            'pessoa_nascimento' => 'Pessoa Nascimento',
            'pessoa_observacao' => 'Pessoa Observação',
        ];
    }

        /*Essa função pega todos os emails, utilizando hasMany, se fosse apenas um registro
         usariamos o hasOne. Em seguida usamos a sintaxe do yii para acessar a tabela E-mails e puxar 
         todos os emails, separados por ID da pessoa
          */
    public function getEmails()
    {
        return $this->hasMany(Emails::className(),['pessoa_email_id'=>'pessoa_id']);
    }

        /*Aqui estamos fazendo a mesma coisa que fizemos nos emails nos telefones */
    public function getTelefones()
    {
        return $this->hasMany(Telefones::className(),['pessoa_telefone_id'=>'pessoa_id']);
    }

   
}
