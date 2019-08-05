<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JenisSurat;

/**
 * JenisSuratSearch represents the model behind the search form about `app\models\JenisSurat`.
 */
class JenisSuratSearch extends JenisSurat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenis_surat'], 'integer'],
            [['kode_jenis', 'nama_jenis', 'content_jenis'], 'safe'],
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
        $query = JenisSurat::find();

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
            'id_jenis_surat' => $this->id_jenis_surat,
        ]);

        $query->andFilterWhere(['like', 'kode_jenis', $this->kode_jenis])
            ->andFilterWhere(['like', 'nama_jenis', $this->nama_jenis])
            ->andFilterWhere(['like', 'content_jenis', $this->content_jenis]);

        return $dataProvider;
    }
}
