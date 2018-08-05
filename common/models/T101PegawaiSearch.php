<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\T101Pegawai;

/**
 * T101PegawaiSearch represents the model behind the search form of `common\models\T101Pegawai`.
 */
class T101PegawaiSearch extends T101Pegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'id_kawin', 'id_agama', 'id_perkiraan', 'id_role', 'id_dashboard', 'id_pegawai_absen', 'id_pegawai_buat', 'id_pegawai_ubah'], 'integer'],
            [['nip', 'nama', 'tempat_lahir', 'tanggal_lahir', 'tanggal_masuk', 'tanggal_pensiun', 'npwp', 'nama_bank', 'norek', 'bpjst', 'foto', 'tanda_tangan', 'email', 'no_telp', 'username', 'password', 'deskripsi', 'tanggal_buat', 'tanggal_ubah', 'auth_key', 'password_reset_token'], 'safe'],
            [['harus_ubah_password', 'status_aktif'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = T101Pegawai::find();

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
            'id_pegawai' => $this->id_pegawai,
            'tanggal_lahir' => $this->tanggal_lahir,
            'id_kawin' => $this->id_kawin,
            'id_agama' => $this->id_agama,
            'tanggal_masuk' => $this->tanggal_masuk,
            'tanggal_pensiun' => $this->tanggal_pensiun,
            'harus_ubah_password' => $this->harus_ubah_password,
            'id_perkiraan' => $this->id_perkiraan,
            'id_role' => $this->id_role,
            'id_dashboard' => $this->id_dashboard,
            'id_pegawai_absen' => $this->id_pegawai_absen,
            'status_aktif' => $this->status_aktif,
            'id_pegawai_buat' => $this->id_pegawai_buat,
            'tanggal_buat' => $this->tanggal_buat,
            'id_pegawai_ubah' => $this->id_pegawai_ubah,
            'tanggal_ubah' => $this->tanggal_ubah,
        ]);

        $query->andFilterWhere(['ilike', 'nip', $this->nip])
            ->andFilterWhere(['ilike', 'nama', $this->nama])
            ->andFilterWhere(['ilike', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['ilike', 'npwp', $this->npwp])
            ->andFilterWhere(['ilike', 'nama_bank', $this->nama_bank])
            ->andFilterWhere(['ilike', 'norek', $this->norek])
            ->andFilterWhere(['ilike', 'bpjst', $this->bpjst])
            ->andFilterWhere(['ilike', 'foto', $this->foto])
            ->andFilterWhere(['ilike', 'tanda_tangan', $this->tanda_tangan])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'no_telp', $this->no_telp])
            ->andFilterWhere(['ilike', 'username', $this->username])
            ->andFilterWhere(['ilike', 'password', $this->password])
            ->andFilterWhere(['ilike', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['ilike', 'auth_key', $this->auth_key])
            ->andFilterWhere(['ilike', 'password_reset_token', $this->password_reset_token]);

        return $dataProvider;
    }
}
