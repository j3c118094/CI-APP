<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agama extends Migration
{
	private $table = 'agama';
	public function up()
	{
		$this->forge->addField([
			'kode_agama' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => 'true',
			],
			'agama' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			]
		]);
		$this->forge->addKey('kode_agama', true);
		// $this->forge->addForeignKey('kode_agama', 'agama', 'kode_agama', 'CASCADE', 'CASCADE');
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
