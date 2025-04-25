<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VytvorTabulkuZapasu extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id' => [
            'type'           => 'INT',
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'map' => [
            'type'       => 'VARCHAR',
            'constraint' => 100,
        ],
        'match_date' => [
            'type' => 'DATE',
        ],
        'match_duration' => [
            'type'       => 'DECIMAL',
            'constraint' => '4,2', // např. 0.35 = 21 minut
        ],
        'winning_team' => [
            'type'       => 'VARCHAR',
            'constraint' => 100,
        ],
        'final_result' => [
            'type'       => 'VARCHAR',
            'constraint' => 10,
        ],
        'mvp' => [
            'type'       => 'VARCHAR',
            'constraint' => 100,
        ],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->createTable('r6_match');
    }

    public function down()
    {
        $this->forge->dropTable('r6_match');
    }
}
