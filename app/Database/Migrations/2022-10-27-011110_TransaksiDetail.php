<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            't_detail_id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'kategori_id' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'transaksi_id' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'nama_tamu' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'status' => [
                'type' => 'tinyint',
                'constraint' => 4,
                'null' => FALSE,
                'default' => 0,
                'comments' => '1=sudah diproses, 0=belum diproses',
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ]
        ]);

        $this->forge->addKey('t_detail_id', TRUE);
        $this->forge->createTable('transaksi_detail');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi_detail');
    }
}
