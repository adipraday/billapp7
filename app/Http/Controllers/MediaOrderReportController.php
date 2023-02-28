<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MMediaOrder;

class MediaOrderReportController extends Controller
{
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

        return view('report.mediaorder', compact('mediaorders'));
    }

    public function carimediaorder(Request $request)
    {
        $k_order = $request->k_order;
        $no_kontrak = $request->no_kontrak;
        $jkontrak = $request->jkontrak;

        $where = ['media_order.k_order' => $k_order, 'media_order.no_kontrak' => $no_kontrak, 'media_order.jkontrak' => $jkontrak];

        $mediaorders = MMediaOrder::join('mbiro', 'mbiro.k_biro', '=', 'media_order.k_biro')
              		->join('mklien', 'mklien.k_klien', '=', 'media_order.k_klien')
                    ->join('sproduk', 'sproduk.k_sproduk', '=', 'media_order.k_sproduk')
                    ->join('mindustri', 'mindustri.k_indus', '=', 'media_order.k_indus')
                    ->join('mgrouphead', 'mgrouphead.k_grup', '=', 'media_order.k_grup')
                    ->join('msales', 'msales.k_sales', '=', 'media_order.k_sales')
                    ->orderByDesc('media_order.tgl_input')
                    ->where($where)
              		->get(['media_order.*', 'mbiro.n_biro', 'mklien.n_klien', 'sproduk.n_sproduk', 'mindustri.n_indus', 'mgrouphead.n_gruphead', 'msales.n_sales']);

        return view('report.mediaorder', compact('mediaorders'));
    }
}
