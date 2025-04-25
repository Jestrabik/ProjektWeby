<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VytvorTymy extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'team_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'coach' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'nationality' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'ranking' => [
                'type'       => 'TINYINT',
                'unsigned'   => true,
            ],
        ]);
    
        $this->forge->addKey('id', true);
        $this->forge->createTable('r6_team');
    }

    public function down()
    {
        $this->forge->dropTable('r6_team');
    }
}
