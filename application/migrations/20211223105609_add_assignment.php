<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Migration_Add_assignment extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id'          => array(
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ),
            'name'       => array(
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'username'       => array(
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'email'       => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'password'       => array(
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'status'       => array(
                'type'       => 'ENUM("0","1")',
                'default' => '1'
            ),
            'is_deleted'       => array(
                'type'       => 'ENUM("0","1")',
                'default' => '0'
            ),
            'createdAt datetime default current_timestamp',
            'updateAt datetime default current_timestamp on update current_timestamp'
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('users');

        $this->dbforge->add_field(array(
            'id'          => array(
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ),
            'user_id'          => array(
                'type'           => 'INT',
                'constraint'     => 11,
                'null'          => true
            ),
            'file_name'       => array(
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'status'       => array(
                'type'       => 'ENUM("0","1")',
                'default' => '1'
            ),
            'is_deleted'       => array(
                'type'       => 'ENUM("0","1")',
                'default' => '0'
            ),
            'createdAt datetime default current_timestamp',
            'updateAt datetime default current_timestamp on update current_timestamp'
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('user_gallery');
    }
    public function down()
    {
        $this->dbforge->drop_table('users');
        $this->dbforge->drop_table('user_gallery');
    }
}
