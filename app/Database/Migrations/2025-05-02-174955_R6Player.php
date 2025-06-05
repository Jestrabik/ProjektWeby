<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class R6Player extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'player_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'team_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'age' => [
                'type'       => 'DATE',
                'null'       => true,
            ],
            'headshot_percentage' => [
                'type'       => 'FLOAT',
                'null'       => true,
            ],
            'total_games' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'kd_ratio' => [
                'type'       => 'FLOAT',
                'null'       => true,
            ],
            'nationality_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'role_id' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        // Primární klíč
        $this->forge->addKey('id', true);

        // Vytvoření tabulky
        $this->forge->createTable('r6_player');
    }

    public function down()
    {
        $this->forge->dropTable('r6_player');
    }
}
