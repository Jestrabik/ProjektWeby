<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VytvorHrace extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'player_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'team_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'nationality' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'age' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'headshot_percentage' => [
                'type'       => 'DECIMAL',
                'constraint' => '2', // Např. 2.37 %
            ],
            'total_games' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'total_deaths' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'kd_ratio' => [
                'type'       => 'DECIMAL',
                'constraint' => '10',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('r6_player');
    }

    public function down()
    {
        $this->forge->dropTable('r6_player');
    }
}
