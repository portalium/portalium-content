<?php

namespace portalium\content\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use portalium\content\Module;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%content}}".
 *
 * @property int $id_content
 * @property string $name
 * @property string $title
 * @property string|null $body
 * @property int $id_user
 * @property int $id_category
 * @property int $status
 * @property string $date_create
 * @property string $date_update
 */
class Content extends \yii\db\ActiveRecord
{
    const STATUS = [
        'passive' => 0,
        'active' => 10
    ];

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'date_create',
                'updatedAtAttribute' => 'date_update',
                'value' => date("Y-m-d H:i:s"),
            ],
            [
                'class' => 'yii\behaviors\BlameableBehavior',
                'createdByAttribute' => 'id_user',
                'updatedByAttribute' => 'id_user',
                'value' => Yii::$app->user->id,
            ],
        ];
    }

    public static function tableName()
    {
        return '{{%content}}';
    }

    public function extraFields()
    {
        return ['category']; // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'title', 'id_category', 'status'], 'required'],
            [['title', 'body'], 'string'],
            [['id_user', 'id_category', 'status'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_content' => 'Id Content',
            'name' => 'Name',
            'title' => 'Title',
            'body' => 'Body',
            'id_user' => 'Id User',
            'id_category' => 'Id Category',
            'status' => 'Status',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

    public static function getStatusList()
    {
        //return value and label
        return [
            'STATUS' => [
                self::STATUS['passive'] => Module::t('Passive'),
                self::STATUS['active'] => Module::t('Active')
            ]
        ];
    }

    public static function getContentList()
    {
        //return value and label
        return ArrayHelper::map(self::find()->all(), 'id_content', 'title');
    }

    public function getCategory()
    {
        return $this->hasMany(Category::class, ['id_category' => 'id_category']);
    }
}
