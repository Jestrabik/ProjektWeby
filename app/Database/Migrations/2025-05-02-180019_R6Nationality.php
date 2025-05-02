<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class R6Nationality extends Migration
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
            'nationality' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
                'comment'    => 'Národnost hráče',
            ],
            'country_code' => [
                'type'       => 'CHAR',
                'constraint' => 2,
                'null'       => false,
                'comment'    => 'ISO kód země',
            ],
        ]);

        // Primární klíč
        $this->forge->addKey('id', true);

        // Vytvoření tabulky
        $this->forge->createTable('nationalities');
    }

    public function down()
    {
        $this->forge->dropTable('nationalities');
    }
}
