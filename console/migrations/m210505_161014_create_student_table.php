<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210505_161014_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            's_name' => $this->string(100)->notNull(),
            'reg_no' => $this->string(30)->notNull(),
            'email' => $this->string(100)->notNull(),
            'phone_no' => $this->string(30)->notNull(),
            'created_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-student-created_by}}',
            '{{%student}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-student-created_by}}',
            '{{%student}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-student-updated_by}}',
            '{{%student}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-student-updated_by}}',
            '{{%student}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-student-created_by}}',
            '{{%student}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-student-created_by}}',
            '{{%student}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-student-updated_by}}',
            '{{%student}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-student-updated_by}}',
            '{{%student}}'
        );

        $this->dropTable('{{%student}}');
    }
}
