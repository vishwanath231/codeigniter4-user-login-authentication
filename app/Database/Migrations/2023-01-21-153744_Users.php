<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration{
    
    public function up(){
        
        $this->forge->addField([
            'id' => [
                "type" => "INT",
                "auto_increment" => TRUE
            ],
            "firstname" => [
                "type" => "VARCHAR",
                "constraint" => "50"
            ],
            "lastname" => [
                "type" => "VARCHAR",
                "constraint" => "50",
            ],
            "email" => [
                "type" => "VARCHAR",
                "constraint" => "50",
            ],
            "password" => [
                "type" => "VARCHAR",
                "constraint" => "300"
            ],
            "created_at" => [
                "type" => "DATETIME",
                // "default" => "current_timestamp"
            ],
            "updated_at" => [
                "type" => "DATETIME"
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users');
    }

    public function down(){
        $this->forge->dropTable('users');
    }
}
