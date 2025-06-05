<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsSoftdeletes extends Migration
{
    public function up()
    {
        // r6_player
        $this->forge->addColumn('r6_player', [
            'created_at DATETIME NULL AFTER role_id',
            'updated_at DATETIME NULL AFTER created_at',
            'deleted_at DATETIME NULL AFTER updated_at',
        ]);
        // r6_team
        $this->forge->addColumn('r6_team', [
            'created_at DATETIME NULL AFTER ranking',
            'updated_at DATETIME NULL AFTER created_at',
            'deleted_at DATETIME NULL AFTER updated_at',
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('r6_player', ['created_at', 'updated_at', 'deleted_at']);
        $this->forge->dropColumn('r6_team', ['created_at', 'updated_at', 'deleted_at']);
    }
}