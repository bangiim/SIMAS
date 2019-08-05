<?php

namespace app\models;

use Yii; 
use yii\web\UploadedFile;

/**
 * This is the model class for table "instansi".
 *
 * @property int $id_instansi
 * @property string $nama_instansi
 * @property string $alamat
 * @property string $website
 * @property string $nama_yayasan
 * @property string $kepala_instansi
 * @property string $idkepala
 * @property string $email_instansi
 * @property string $logo
 * @property string $kopsurat
 */
class Instansi extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instansi';
    } 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_instansi','alamat','website','nama_yayasan','kepala_instansi','idkepala','email_instansi'], 'required'],
            [['alamat'], 'string'],
            [['nama_instansi','nama_yayasan','logo', 'kopsurat'], 'string', 'max' => 100],
            [['website', 'kepala_instansi', 'idkepala'], 'string', 'max' => 30],
            [['email_instansi'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_instansi' => 'Id Instansi',
            'nama_instansi' => 'Nama Instansi',
            'alamat' => 'Alamat',
            'website' => 'Website',
            'nama_yayasan' => 'Nama Yayasan',
            'kepala_instansi' => 'Kepala Instansi',
            'idkepala' => 'Idkepala',
            'email_instansi' => 'Email Instansi',
            'logo' => 'Logo',
            'kopsurat' => 'Kopsurat',
        ];
    }
}
