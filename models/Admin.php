<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property string $nama_lengkap
 * @property string $email
 * @property string $authKey
 * @property string $accessToken
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'string', 'max' => 30],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 100],
            [['nama_lengkap', 'email'], 'string', 'max' => 50],
            [['username', 'password', 'nama_lengkap', 'email'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'nama_lengkap' => 'Nama Lengkap',
            'email' => 'Email',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
}
