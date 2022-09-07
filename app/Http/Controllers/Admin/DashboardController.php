<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPegawai;
use App\Models\DataUnitKerja;

class DashboardController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {
    // $now = date('d-m-Y');
    // dd(date('d-m-Y', strtotime("+3 months", strtotime($now))). $now);
    $pegawai = DataPegawai::where('status', '1')->get();
    $unitKerja = DataUnitKerja::where('status', '1')->get();
    return view('admin.dashboard.index', compact('pegawai', 'unitKerja'));
  }
}
