<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HobiMahasiswa extends Migration
{
	private $table = 'hobi_mahasiswa';
	public function up()
	{
		$this->forge->addField([
			'kode_hobi_mahasiswa' => [
				'type' => 'VARCHAR',
				'constraint' => '11',
				'unsigned' => 'true'
			],
			'kode_hobi' => [
				'type' => 'VARCHAR',
				'constraint' => 11,
				'unsigned' => 'true'
			],
			'nim' => [
				'type' => 'VARCHAR',
				'constraint' => 9,
				'unsigned' => 'true'
			],
		]);
		$this->forge->addKey('kode_hobi_mahasiswa', true);
		$this->forge->addForeignKey('kode_hobi', 'hobi', 'kode_hobi', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('nim', 'mahasiswa', 'nim', 'CASCADE', 'CASCADE');
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
