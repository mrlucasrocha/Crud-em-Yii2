<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property int $email_id
 * @property string $email
 * @property int $pessoa_email_id
 *
 * @property Pessoa $pessoaEmail
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'pessoa_email_id'], 'required'],
            [['pessoa_email_id'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['pessoa_email_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['pessoa_email_id' => 'pessoa_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'email_id' => 'Email ID',
            'email' => 'Email',
            'pessoa_email_id' => 'Pessoa Email ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoaEmail()
    {
        return $this->hasOne(Pessoa::className(), ['pessoa_id' => 'pessoa_email_id']);
    }
}
