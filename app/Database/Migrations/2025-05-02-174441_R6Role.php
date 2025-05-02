<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class R6Role extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('r6_role');
    }

    public function down()
    {
        $this->forge->dropTable('r6_role');
    }
}
