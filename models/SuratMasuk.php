<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "surat_masuk".
 *
 * @property int $id_suratmasuk
 * @property string $no_suratmasuk
 * @property string $no_urut
 * @property string $pengirim
 * @property string $tgl_masuk
 * @property string $perihal_surat
 * @property string $upload_berkas
 * @property int $id_jenis_surat
 */
class SuratMasuk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_masuk';
        SuratMasuk::model()->count($id_suratmasuk);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_suratmasuk','pengirim','tgl_masuk','perihal_surat'], 'required'],
            [['tgl_masuk'], 'safe'],
            [['id_jenis_surat'], 'integer'],
            [['no_suratmasuk', 'no_urut'], 'string', 'max' => 30],
            [['pengirim', 'perihal_surat'], 'string', 'max' => 100],
            [['upload_berkas', 'no_urut'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_suratmasuk' => 'ID Surat Masuk',
            'no_suratmasuk' => 'No. Surat Masuk',
            'no_urut' => 'No. Urut',
            'pengirim' => 'Pengirim',
            'tgl_masuk' => 'Tgl. Masuk',
            'perihal_surat' => 'Perihal Surat',
            'upload_berkas' => 'Upload Berkas',
            'id_jenis_surat' => 'Jenis Surat',
        ];
    }
}
