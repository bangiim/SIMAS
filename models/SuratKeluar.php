<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_keluar".
 *
 * @property int $id_suratkeluar
 * @property string $no_suratkeluar
 * @property string $tgl_keluar
 * @property string $tujuan
 * @property string $isi
 * @property int $id_jenis_surat
 */
class SuratKeluar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_keluar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_keluar'], 'safe'],
            [['isi'], 'string'],
            [['id_jenis_surat'], 'integer'],
            //[['no_suratkeluar'], 'autonumber', 'format'=>'formatRomawi'],
            [['no_suratkeluar', 'tujuan'], 'string', 'max' => 30],
            [['id_jenis_surat', 'tgl_keluar', 'tujuan', 'isi'], 'required'],
        ];
    }

    public function formatRomawi()
    {
        $romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $bulan = $romawi[date('n')-1];
        return "/{$bulan}/". date('Y');
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_suratkeluar' => 'Id Suratkeluar',
            'no_suratkeluar' => 'No Surat keluar',
            'tgl_keluar' => 'Tgl Keluar',
            'tujuan' => 'Tujuan',
            'isi' => 'Isi',
            'id_jenis_surat' => 'Jenis Surat',
        ];
    }
}
