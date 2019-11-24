<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%jaminan_tanah_bangunan}}".
 *
 * @property int $jaminan_tanah_bangunan_id
 * @property string $nama_pemilik
 * @property int $no
 * @property string $status_hak_milik
 * @property int $luas
 */
class JaminanTanahBangunan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jaminan_tanah_bangunan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jaminan_tanah_bangunan_id', 'nama_pemilik', 'no', 'status_hak_milik', 'luas'], 'required'],
            [['jaminan_tanah_bangunan_id', 'no', 'luas'], 'integer'],
            [['nama_pemilik', 'status_hak_milik'], 'string', 'max' => 250],
            [['jaminan_tanah_bangunan_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jaminan_tanah_bangunan_id' => 'Jaminan Tanah Bangunan ID',
            'nama_pemilik' => 'Nama Pemilik',
            'no' => 'No',
            'status_hak_milik' => 'Status Hak Milik',
            'luas' => 'Luas',
        ];
    }
}
