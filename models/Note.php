<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Note extends ActiveRecord
{
    public static function tableName()
    {
        return '{{notes}}';
    }

    public function rules()
    {
        return [
            ['title', 'string', 'max' => 255],
            ['date', 'date', 'format' => 'php:Y-m-d'],
            ['text', 'string', 'max' => 255],

            ['title', 'filter', 'filter' => 'strip_tags'],
            ['title', 'filter', 'filter' => 'trim'],
        ];
    }

    public static function find()
    {
        return new NoteQuery(get_called_class());
    }
}