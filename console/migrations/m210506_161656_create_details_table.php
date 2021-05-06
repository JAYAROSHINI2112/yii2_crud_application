<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%details}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210506_161656_create_details_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%details}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
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
            '{{%idx-details-created_by}}',
            '{{%details}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-details-created_by}}',
            '{{%details}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-details-updated_by}}',
            '{{%details}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-details-updated_by}}',
            '{{%details}}',
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
            '{{%fk-details-created_by}}',
            '{{%details}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-details-created_by}}',
            '{{%details}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-details-updated_by}}',
            '{{%details}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-details-updated_by}}',
            '{{%details}}'
        );

        $this->dropTable('{{%details}}');
    }
}
