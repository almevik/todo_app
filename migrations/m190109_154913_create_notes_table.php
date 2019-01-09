<?php

use yii\db\Migration;

/**
 * Handles the creation of table `notes`.
 */
class m190109_154913_create_notes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('notes', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'date' => $this->timestamp(),
            'text' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('notes');
    }
}
