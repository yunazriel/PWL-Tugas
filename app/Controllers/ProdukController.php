<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProdukController extends BaseController {
    public function index() {
        return view('content/v_produk.php');
    }
}
