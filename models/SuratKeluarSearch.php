<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratKeluar;

/**
 * SuratKeluarSearch represents the model behind the search form of `app\models\SuratKeluar`.
 */
class SuratKeluarSearch extends SuratKeluar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_suratkeluar', 'id_jenis_surat'], 'integer'],
            [['no_suratkeluar', 'tgl_keluar', 'tujuan', 'isi'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SuratKeluar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_suratkeluar' => $this->id_suratkeluar,
            'tgl_keluar' => $this->tgl_keluar,
            'id_jenis_surat' => $this->id_jenis_surat,
        ]);

        $query->andFilterWhere(['like', 'no_suratkeluar', $this->no_suratkeluar])
            ->andFilterWhere(['like', 'tujuan', $this->tujuan])
            ->andFilterWhere(['like', 'isi', $this->isi]);

        return $dataProvider;
    }

    public function count_some()
    {
        $count_query = SuratKeluar::find()->count();

        $jumlah_surat_keluar = $count_query;

        return $jumlah_surat_keluar;
    }
}
