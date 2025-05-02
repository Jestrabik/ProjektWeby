<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class R6Match extends Migration
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
            'map_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'match_date' => [
                'type'       => 'DATE',
            ],
            'match_duration' => [
                'type'       => 'INT',
                'constraint' => 11,
                'comment'    => 'Délka v minutách',
            ],
        ]);

        // Primární klíč
        $this->forge->addKey('id', true);

        // Vytvoření tabulky
        $this->forge->createTable('r6_match');
    }

    public function down()
    {
        $this->forge->dropTable('r6_match');
    }
}
