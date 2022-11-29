<?php

namespace App\Models;

use CodeIgniter\Model;
class model_transaksi_baru extends Model{
    protected $table = 'transaksi';
    protected $primary = 'transaksi_id';
    protected $protectFields = false;
    protected $useTimeStamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

}