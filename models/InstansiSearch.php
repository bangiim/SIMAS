<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Instansi;

/**
 * InstansiSearch represents the model behind the search form of `app\models\Instansi`.
 */
class InstansiSearch extends Instansi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_instansi'], 'integer'],
            [['nama_instansi', 'alamat', 'website', 'nama_yayasan', 'kepala_instansi', 'idkepala', 'email_instansi', 'logo', 'kopsurat'], 'safe'],
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
        $query = Instansi::find();

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
            'id_instansi' => $this->id_instansi,
        ]);

        $query->andFilterWhere(['like', 'nama_instansi', $this->nama_instansi])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'nama_yayasan', $this->nama_yayasan])
            ->andFilterWhere(['like', 'kepala_instansi', $this->kepala_instansi])
            ->andFilterWhere(['like', 'idkepala', $this->idkepala])
            ->andFilterWhere(['like', 'email_instansi', $this->email_instansi])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'kopsurat', $this->kopsurat]);

        return $dataProvider;
    }
}
