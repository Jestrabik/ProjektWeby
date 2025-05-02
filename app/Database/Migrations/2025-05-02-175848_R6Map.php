<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class R6Map extends Migration
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
            'map_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
                'comment'    => 'Název mapy',
            ],
        ]);

        // Primární klíč
        $this->forge->addKey('id', true);

        // Vytvoření tabulky
        $this->forge->createTable('r6_maps');
    }

    public function down()
    {
        $this->forge->dropTable('r6_maps');
    }
}
