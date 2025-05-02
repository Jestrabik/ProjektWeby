<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class R6MatchResult extends Migration
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
            'match_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'match_win_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'comment'    => 'ID vítězného týmu',
            ],
            'match_lose_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'comment'    => 'ID poraženého týmu',
            ],
            'match_win_score' => [
                'type'       => 'INT',
                'constraint' => 11,
                'comment'    => 'Skóre vítězného týmu',
            ],
            'match_lose_score' => [
                'type'       => 'INT',
                'constraint' => 11,
                'comment'    => 'Skóre poraženého týmu',
            ],
        ]);

        // Primární klíč
        $this->forge->addKey('id', true);

        // Vytvoření tabulky
        $this->forge->createTable('r6_match_result');
    }

    public function down()
    {
        $this->forge->dropTable('r6_match_result');
    }
}
