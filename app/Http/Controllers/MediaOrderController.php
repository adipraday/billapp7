<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MMediaOrder;
use App\Models\MBiro;
use App\Models\MEdisi;
use App\Models\MKlien;
use App\Models\MProduk;
use App\Models\MGroupHead;
use App\Models\MIklanKoran;
use App\Models\MIklanMajalahMbm;
use App\Models\MIklanTempoTV;
use App\Models\MIndustri;
use App\Models\MJasaMajalah;
use App\Models\MJenisKoran;
use App\Models\MJenisMajalah;
use App\Models\MRubrikKoran;
use App\Models\MSales;
use App\Models\MTarifKoran;
use App\Models\MTarifMajalahMbm;
use Illuminate\Support\Facades\Validator;

class MediaOrderController extends Controller
{

    public $biros, $kliens, $produks;

    public function index()
    {

        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->orderByDesc('media_order.tgl_input')
                    ->take(50)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);

        return view('mediaorder.mediaorders', compact('mediaorders'));
    }

    public function faddmediaorder()
    {
        $biros = MBiro::orderBy('n_biro')->get();
        $kliens = MKlien::orderBy('n_klien')->get();
        $opt_jenis_barter=array("1"=>"Asset", "2"=>"Promosi", "3"=>"Promosi (Dijual)", "4"=>"Barter Lainnya");
        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->orderByDesc('media_order.tgl_input')
                    ->take(10)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);
        $produks = MProduk::orderBy('n_sproduk')->get();
        $grup_heads = MGroupHead::orderBy('n_gruphead')->get();
        $industris = MIndustri::orderBy('n_indus')->get();
        $saless = MSales::orderBy('n_sales')->get();
        return view('mediaorder.addmediaorder', compact('biros', 'kliens', 'opt_jenis_barter', 'mediaorders', 'produks', 'grup_heads', 'industris', 'saless'));
    }

    public function store(Request $request)
    {

        $tgl_input = new \DateTime();
        $month = now()->month;
        $year = now()->year;
        $tahun = substr(now()->year,-2);
        $lrmo = MMediaOrder::select('k_order')->whereMonth('tgl_input', $month)->whereYear('tgl_input', $year)->get()->count();
        $lrmo1 = $lrmo+1;
        $kode_order = 'MO'.$tahun.$month.sprintf('%04s', $lrmo1);

        //define validation rules
        $validator = Validator::make($request->all(), [
            'no_kontrak'   => 'required',
            'nilai'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post

        $mediaorder = MMediaOrder::create([
            'k_order'       => $kode_order, 
            'no_kontrak'    => $request->no_kontrak,
            'k_klien'       => $request->k_klien,
            'k_biro'        => $request->k_biro,
            'nilai'         => $request->nilai,
            'jenis_kontrak' => $request->jenis_kontrak,
            'jbarter'       => $request->jbarter,
            'status_ppn'    => $request->status_ppn,
            'nilai_nonbarter'   => $request->nilai_nonbarter,
            'nilai_barter'   => $request->nilai_barter,
            'nilai_ppn'   => $request->nilai_ppn,
            'nilai_real'   => $request->nilai_real,
            'atasnama'   => $request->atasnama,
            'j_atasnama'   => $request->atasnama,
            'jtempo'    => '30',
            //'k_produk'   => $k_produk,
            'k_sproduk'   => $request->k_sproduk,
            //'k_grup_old'   => $request->k_grup_old,
            'k_grup'   => $request->k_grup,
            'k_indus'   => $request->k_indus,
            'k_sales'   => $request->k_sales,
            'flag_paket'   => $request->flag_paket,
            'flag_pktnoseri' => $request->flag_pktnoseri,
            'tgl_input'     => $tgl_input,
            'user_input'   => $request->user_input
        ]);

        //return response
        return response()->json([
            'success'   => true,
            'message'   => 'Data Berhasil Disimpan!',
            'data'      => $mediaorder,
            'tgl_input' => $tgl_input
        ]);
    }

    public function feditmediaorder($k_order){

        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->where('k_order', $k_order)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);
        $biros = MBiro::orderBy('n_biro')->get();
        $kliens = MKlien::orderBy('n_klien')->get();
        $opt_jenis_barter=array("1"=>"Asset", "2"=>"Promosi", "3"=>"Promosi (Dijual)", "4"=>"Barter Lainnya");
        $produks = MProduk::orderBy('n_sproduk')->get();
        $grup_heads = MGroupHead::orderBy('n_gruphead')->get();
        $industris = MIndustri::orderBy('n_indus')->get();
        $saless = MSales::orderBy('n_sales')->get();
        return view('mediaorder.editmediaorder', compact('mediaorders', 'biros', 'kliens', 'opt_jenis_barter', 'produks', 'grup_heads', 'industris', 'saless'));
    
    }

    public function fiomajalahtempoindonesia($k_order){

        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->where('k_order', $k_order)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);

        $m_edisi = MEdisi::orderByDesc('tgl_input')->take(5)->get();

        $mjenis_majalah = MJenisMajalah::orderByDesc('tgl_input')->get();

        $mtarif_majalah_mbm = MTarifMajalahMbm::orderByDesc('tgl_input')->get();

        $mjasa_majalah = MJasaMajalah::orderByDesc('tgl_input')->get();

        $iklan_mbm = MIklanMajalahMbm::orderByDesc('no_kwt')->where('k_order', $k_order)->get();

        return view('mediaorder.iomajalahtempoindonesia', compact('mediaorders','m_edisi','mjenis_majalah','mtarif_majalah_mbm','mjasa_majalah', 'iklan_mbm'));
    
    }

    public function saveordermajalahtempombm(Request $request)
    {

        $tgl_input = new \DateTime();
        $month = now()->month;
        $year = now()->year;
        $tahun = substr(now()->year,-2);
        $nokwt0 = MIklanMajalahMbm::select('no_kwt')->whereMonth('tgl_input', $month)->whereYear('tgl_input', $year)->get()->count();
        $nokwt1 = $nokwt0+1;
        
        $no_kwt = 'VI'.$tahun.$month.sprintf('%04s', $nokwt1);

        $date_input = $tgl_input;
        date_add($date_input,date_interval_create_from_date_string("30 days"));
        $tgl_jt = date_format($date_input,"Y-m-d");
        
        //$nik,
        //$type,
        //$tgl_pajak,
        //$j_atasnama,
        //$jam_input,

        //define validation rules
        $validator = Validator::make($request->all(), [
            'k_order'   => 'required',
            'k_biro'    => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $inputorder = MIklanMajalahMbm::create([

            'no_kwt'    => $no_kwt,
            'k_order'   => $request->k_order,
            'no_kontrak'=> $request->no_kontrak,
            'k_biro'    => $request->k_biro,
            'k_klien'   => $request->k_klien,
            'atasnama'  => $request->atasnama,
            'j_atasnama'=> $request->j_atasnama,
            'k_indus'   => $request->k_indus,
            'judul'     => $request->judul, 
            'k_edisi'   => $request->k_edisi, 
            'tgl_terbit'=> $request->tgl_terbit,
            'k_jenis'   => $request->k_jenis, 
            'k_tarif'   => $request->k_tarif,
            'hrg_tarif' => $request->hrg_tarif,
            'k_jasa'    => $request->k_jasa, 
            'hrg_jasa'  => $request->hrg_jasa,
            'jml_eks'   => $request->jml_eks, 
            'nharga'    => $request->nharga, 
            'discp_in'  => $request->discp_in, 
            'discr_in'  => $request->discr_in, 
            'neto'      => $request->neto, 
            'discp_out' => $request->discp_out, 
            'discr_out' => $request->discr_out,
            'ppnp'      => $request->ppnp, 
            'ppnr'      => $request->ppnr, 
            'ttagih'    => $request->ttagih,
            'tgl_jt'    => $tgl_jt, 
            'type'      => $request->type,
            'sts_barter'=> $request->sts_barter,  
            'tgl_input' => $tgl_input,
            'user_input'=> $request->user_input,
            'catatan'   => $request->catatan,
            'cara_bayar'=> $request->cara_bayar, 
            'k_produk'  => $request->k_produk,
            'k_sproduk' => $request->k_sproduk,
            'k_sales'   => $request->k_sales,
            'k_grup'    => $request->k_grup,

        ]);

        //return response
        return response()->json([
            'success'   => true,
            'message'   => 'Data Berhasil Disimpan!',
            'data'      => $inputorder
        ]);

    }

    public function fiotempoenglishedition($k_order){

        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->where('k_order', $k_order)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);

        $m_edisi = MEdisi::orderByDesc('tgl_input')->take(5)->get();

        $mjenis_majalah = MJenisMajalah::orderByDesc('tgl_input')->get();

        $mtarif_majalah_mbm = MTarifMajalahMbm::orderByDesc('tgl_input')->get();

        $mjasa_majalah = MJasaMajalah::orderByDesc('tgl_input')->get();

        $iklan_mbm = MIklanMajalahMbm::orderByDesc('no_kwt')->where('k_order', $k_order)->get();

        return view('mediaorder.iotempoenglishedition', compact('mediaorders','m_edisi','mjenis_majalah','mtarif_majalah_mbm','mjasa_majalah', 'iklan_mbm'));
    
    }

    public function fiokorantempo($k_order){

        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->where('k_order', $k_order)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);
                     
        $mjenis_koran = MJenisKoran::orderByDesc('tgl_input')->get();

        $mrubrik_koran = MRubrikKoran::orderByDesc('tgl_input')->get();

        $mtarif_koran = MTarifKoran::orderByDesc('tgl_input')->get();

        $iklan_koran_tempo = MIklanKoran::orderByDesc('k_order')->where('k_order', $k_order)->get();

        return view('mediaorder.iokorantempo', compact('mediaorders', 'mjenis_koran', 'mrubrik_koran', 'mtarif_koran', 'iklan_koran_tempo'));
    
    }

    
    public function saveorderkorantempo(Request $request)
    {

        $tgl_input = new \DateTime();
        $month = now()->month;
        $year = now()->year;
        $tahun = substr(now()->year,-2);
        $nokwt0 = MIklanMajalahMbm::select('no_kwt')->whereMonth('tgl_input', $month)->whereYear('tgl_input', $year)->get()->count();
        $nokwt1 = $nokwt0+1;
        
        $nik = 'VI'.$tahun.$month.sprintf('%04s', $nokwt1);

        $date_input = $tgl_input;
        date_add($date_input,date_interval_create_from_date_string("30 days"));
        $tgl_jt = date_format($date_input,"Y-m-d");
        $trs_pajak = 00;

        //define validation rules
        $validator = Validator::make($request->all(), [
            'k_order'   => 'required',
            'k_biro'    => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $inputorderkoran = MIklanKoran::create([

            'nik'   => $nik,
            'k_order'   => $request->k_order,
            'k_biro'   => $request->k_biro,
            'k_klien'   => $request->k_klien, 
            'atasnama'   => $request->atasnama, 
            'j_atasnama'   => $request->j_atasnama,
            'k_indus'   => $request->k_indus,
            'judul'   => $request->judul,
            'k_jenis'   => $request->k_jenis,
            'k_rubrik'   => $request->k_rubrik,
            'k_tarif'   => $request->k_tarif,
            'warna'   => $request->warna,
            'hal'   => $request->hal, 
            'jmuat'   => $request->jmuat, 
            'jkolom'   => $request->jkolom, 
            'jtinggi'   => $request->jtinggi, 
            'jtarif'   => $request->jtarif,   
            'tarif'   => $request->tarif,    
            'tharga'   => $request->tharga, 
            'discp_in'   => $request->discp_in,   
            'discr_in'   => $request->discr_in, 
            'nharga'   => $request->nharga, 
            'ppnp'   => $request->ppnp, 
            'ppnr'   => $request->ppnr, 
            'materai'   => $request->materai, 
            'ttagih'   => $request->ttagih,     
            'discp_out'   => $request->discp_out, 
            'discr_out'   => $request->discr_out, 
            'tgl_inv'   => $tgl_input,      
            'tgl_jt'   => $tgl_jt,
            'tgl_pajak'   => $tgl_jt, 
            'sts_pajak'   => $request->sts_pajak, 
            'trs_pajak'   => $trs_pajak, 
            'type'   => $request->type,
            'sts_barter'   => $request->sts_barter,
            'tgl_input'   => $request->tgl_input, 
            'jam_input'   => $request->jam_input,
            'user_input'   => $request->user_input,
            'note'   => $request->note,
            'cara_bayar'   => $request->cara_bayar,
            'stat_validasi'   => $request->stat_validasi,
            'k_produk'   => $request->k_produk,
            'k_sproduk'   => $request->k_sproduk,
            'k_sales'   => $request->k_sales,
            'k_grup'   => $request->k_grup,

        ]);

        //return response
        return response()->json([
            'success'   => true,
            'message'   => 'Data Berhasil Disimpan!',
            'data'      => $inputorderkoran
        ]);

    }

    public function fiotempotv($k_order){

        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->where('k_order', $k_order)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);
                     
        $mjenis_koran = MJenisKoran::orderByDesc('tgl_input')->get();

        $mrubrik_koran = MRubrikKoran::orderByDesc('tgl_input')->get();

        $mtarif_koran = MTarifKoran::orderByDesc('tgl_input')->get();

        $iklan_tempo_tv = MIklanKoran::orderByDesc('k_order')->where('k_order', $k_order)->get();

        return view('mediaorder.iotempotv', compact('mediaorders', 'mjenis_koran', 'mrubrik_koran', 'mtarif_koran', 'iklan_tempo_tv'));
    
    }

    
    public function saveordertempotv(Request $request)
    {
        $tgl_input = new \DateTime();
        $month = now()->month;
        $year = now()->year;
        $tahun = substr(now()->year,-2);
        $nokwt0 = MIklanTempoTV::select('no_kwt')->whereMonth('tgl_input', $month)->whereYear('tgl_input', $year)->get()->count();
        $nokwt1 = $nokwt0+1;
        
        $nik = 'VI'.$tahun.$month.sprintf('%04s', $nokwt1);

        $date_input = $tgl_input;
        date_add($date_input,date_interval_create_from_date_string("30 days"));
        $tgl_jt = date_format($date_input,"Y-m-d");
        $trs_pajak = 00;

        //define validation rules
        $validator = Validator::make($request->all(), [
            'k_order'   => 'required',
            'k_biro'    => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $inputordertempotv = MIklanKoran::create([

            'nik'   => $nik,
            'k_order'   => $request->k_order,
            'k_biro'   => $request->k_biro,
            'k_klien'   => $request->k_klien, 
            'atasnama'   => $request->atasnama, 
            'j_atasnama'   => $request->j_atasnama,
            'k_indus'   => $request->k_indus,
            'judul'   => $request->judul,
            // 'k_jenis'   => $request->k_jenis,
            // 'k_rubrik'   => $request->k_rubrik,
            // 'k_tarif'   => $request->k_tarif,
            // 'warna'   => $request->warna,
            // 'hal'   => $request->hal, 
            // 'jmuat'   => $request->jmuat, 
            // 'jkolom'   => $request->jkolom, 
            // 'jtinggi'   => $request->jtinggi, 
            // 'jtarif'   => $request->jtarif,   
            // 'tarif'   => $request->tarif,    
            // 'tharga'   => $request->tharga, 
            // 'discp_in'   => $request->discp_in,   
            // 'discr_in'   => $request->discr_in, 
            // 'nharga'   => $request->nharga, 
            // 'ppnp'   => $request->ppnp, 
            // 'ppnr'   => $request->ppnr, 
            // 'materai'   => $request->materai, 
            // 'ttagih'   => $request->ttagih,     
            // 'discp_out'   => $request->discp_out, 
            // 'discr_out'   => $request->discr_out, 
            // 'tgl_inv'   => $tgl_input,      
            // 'tgl_jt'   => $tgl_jt,
            // 'tgl_pajak'   => $tgl_jt, 
            // 'sts_pajak'   => $request->sts_pajak, 
            // 'trs_pajak'   => $trs_pajak, 
            // 'type'   => $request->type,
            // 'sts_barter'   => $request->sts_barter,
            // 'tgl_input'   => $request->tgl_input, 
            // 'jam_input'   => $request->jam_input,
            // 'user_input'   => $request->user_input,
            // 'note'   => $request->note,
            // 'cara_bayar'   => $request->cara_bayar,
            // 'stat_validasi'   => $request->stat_validasi,
            // 'k_produk'   => $request->k_produk,
            // 'k_sproduk'   => $request->k_sproduk,
            // 'k_sales'   => $request->k_sales,
            // 'k_grup'   => $request->k_grup,

        ]);

        //return response
        return response()->json([
            'success'   => true,
            'message'   => 'Data Berhasil Disimpan!',
            'data'      => $inputordertempotv
        ]);

    }


    public function fiotempoco($k_order){

       $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->where('k_order', $k_order)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);

        $m_edisi = MEdisi::orderByDesc('tgl_input')->take(5)->get();

        $mjenis_majalah = MJenisMajalah::orderByDesc('tgl_input')->get();

        $mtarif_majalah_mbm = MTarifMajalahMbm::orderByDesc('tgl_input')->get();

        $mjasa_majalah = MJasaMajalah::orderByDesc('tgl_input')->get();

        $iklan_mbm = MIklanMajalahMbm::orderByDesc('no_kwt')->where('k_order', $k_order)->get();

        return view('mediaorder.iotempoco', compact('mediaorders','m_edisi','mjenis_majalah','mtarif_majalah_mbm','mjasa_majalah', 'iklan_mbm'));
    
    }

    public function fiotempocoimd($k_order){

        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->where('k_order', $k_order)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);

        return view('mediaorder.iotempocoimd', compact('mediaorders'));
    
    }

    public function fiomajalahtebidigital($k_order){

        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->where('k_order', $k_order)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);

        return view('mediaorder.iomajalahtebidigital', compact('mediaorders'));
    
    }

    public function fiomajalahtempodigital($k_order){

        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->where('k_order', $k_order)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);

        return view('mediaorder.iomajalahtempodigital', compact('mediaorders'));
    
    }

    public function fiokorantempodigital($k_order){

        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->where('k_order', $k_order)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);

        return view('mediaorder.iokorantempodigital', compact('mediaorders'));
    
    }

    public function finvoiceorder(){

        return view('mediaorder.invoiceorder');
    
    }

    public function show(MMediaOrder $mediaorder)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $mediaorder  
        ]); 
    }

    public function update(Request $request, MMediaOrder $mediaorder)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'no_kontrak'   => 'required',
            'nilai'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tgl_input = new \DateTime();

        //create post
        $mediaorder->update([
            'k_order'       => $request->k_order,
            'no_kontrak'    => $request->no_kontrak,
            'k_klien'       => $request->k_klien,
            'k_biro'        => $request->k_biro,
            'nilai'         => $request->nilai,
            'jenis_kontrak' => $request->jenis_kontrak,
            'jbarter'       => $request->jbarter,
            'status_ppn'    => $request->status_ppn,
            'nilai_nonbarter'   => $request->nilai_nonbarter,
            'nilai_barter'   => $request->nilai_barter,
            'nilai_ppn'   => $request->nilai_ppn,
            'nilai_real'   => $request->nilai_real,
            'atasnama'   => $request->atasnama,
            'j_atasnama'   => $request->atasnama,
            'jtempo'    => '30',
            //'k_produk'   => $k_produk,
            'k_sproduk'   => $request->k_sproduk,
            //'k_grup_old'   => $request->k_grup_old,
            'k_grup'   => $request->k_grup,
            'k_indus'   => $request->k_indus,
            'k_sales'   => $request->k_sales,
            'flag_paket'   => $request->flag_paket,
            'flag_pktnoseri' => $request->flag_pktnoseri,
            'tgl_update'     => $tgl_input,
            'user_update'   => $request->user_input
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Media Order Berhasil Diudapte!',
            'data'    => $mediaorder  
        ]);
    }

    public function destroy($k_order)
    {
        if($k_order == "") {
            return response()->json([
                'status' => 0,
                'success' => false,
                'message' => 'Variable data gagal dimuat !',
            ]);
        }
        //delete media order by k_order
        $res = MMediaOrder::where('k_order', $k_order)->delete();
        if ($res) {
            return response()->json([
                'status' => 1,
                'success' => true,
                'message' => 'Data Media Order Berhasil Dihapus!',
            ]);
        } else {
            if($k_order == ""){
                return response()->json([
                'status' => 0,
                'success' => false,
                'message' => 'Variable data gagal dimuat !',
                ]);
            }else{
                return response()->json([
                'status' => 0,
                'success' => false,
                'message' => 'Data Media Order Gagal Dihapus!',
                ]);
            }
        }
    }

}
