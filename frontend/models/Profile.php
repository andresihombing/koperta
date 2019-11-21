<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%profile}}".
 *
 * @property int $profile_id
 * @property string $nama
 * @property string $alamat
 * @property string $tanggal_lahir
 * @property int $koperasi_id
 * @property int $user_id
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'tanggal_lahir', 'koperasi_id', 'user_id'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['koperasi_id', 'user_id'], 'integer'],
            [['nama', 'alamat'], 'string', 'max' => 45],
            [['koperasi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Koperasi::className(), 'targetAttribute' => ['koperasi_id' => 'koperasi_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'profile_id' => 'Profile ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'tanggal_lahir' => 'Tanggal Lahir',
            'koperasi_id' => 'Koperasi ID',
            'user_id' => 'User ID',
        ];
    }
}
