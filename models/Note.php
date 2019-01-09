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
            ['title', 'string', 'max'=>255],
            ['date', 'timestamp'],
            ['text', 'text'],

            ['title','filter','filter'=>'strip_tags'],
            ['title','filter','filter'=>'trim'],
            ];
        }
}