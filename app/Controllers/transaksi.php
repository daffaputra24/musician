<?php namespace App\Controllers;


use App\Models\model_transaksi;
use App\Models\model_barang;
use App\Models\model_transaksi_baru;
use App\Models\model_kategori;
use CodeIgniter\I18n\Time;
class transaksi extends BaseController{
    protected $model;
    protected $modelbrg;
    public function __construct() { 
        $this->model = new model_transaksi();
        $this->modelbrg = new model_barang();
        $this->helpers = ['form', 'url'];
    }
    
    public function index()
    {
        $transaksi = new model_transaksi();
        $barang = new model_barang();
            $data = [
                'transaksi' => $transaksi->daftarTransaksi(),
                'barang' => $barang->daftarStudio()

            ];
            return view('transaksi/form_transaksi', $data);
    }

    public function handleTambahTransaksi() {
        $transaksi = new model_transaksi();
        $barang = new model_barang();
        $kategori = new model_kategori();
        $transaksiBaru = new model_transaksi_baru();
        $transaksiData = $this->request->getPost();
        $idTransaksi = $transaksiBaru->orderBy('transaksi_id', 'DESC')->findAll(1)[0];
        $transaksiBaru->insert([
            'transaksi_id' => $idTransaksi['transaksi_id'] + 1,
            'tanggal_transaksi' => date_format(Time::now(), "Y-m-d"),
            'operator_id' => 6

        ]);
        $transaksiId = $transaksiBaru->orderBy('transaksi_id', 'DESC')->findAll(1)[0];
        // dd($transaksiId);
        $cariKategori = $barang->where('nama_barang', $transaksiData['barang'])->findAll(1)[0];
        // dd($transaksiData['barang']);
        $cariHarga = $kategori->where('kategori_id', $cariKategori['kategori_id'])->findAll(1)[0];
        
        $transaksi->insert([
            'nama_tamu' => $transaksiData['tamu'],
            'nama_barang' => $transaksiData['barang'],
            'harga' => $transaksiData['qty']*$cariHarga['harga'],
            'kategori_id' => $cariKategori['kategori_id'],
            'transaksi_id' => $transaksiId['transaksi_id'],
            'status' => '0'
        ]);

        return redirect()->to('/transaksi/form_transaksi');
    } 
    
    public function laporan()
    {
        $transaksi = new model_transaksi();
            $data = [
                'transaksi' => $transaksi->laporan_default()
            ];
            return view('transaksi/laporan', $data);
    }
    
    
}