<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $pageViewPath;
    protected $pageExtension;

    public function __construct()
    {
        $this->middleware('auth');
        $this->pageViewPath = base_path().'\resources\views\admin\\';
        $this->pageExtension  = '.blade.php';
    }

    public function index($page='dashboard')
    {
        if (file_exists($this->pageViewPath.$page.$this->pageExtension)) {
            return view('admin.'.$page);
        } else {
            abort(404, 'The requested page ('. $page .') not found.');
        }
    }
}
