<?php
namespace app\models;
/**
 * @see Note
 */
class NoteQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return Note[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    /**
     * {@inheritdoc}
     * @return Note|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}