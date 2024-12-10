<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Medicament;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        // User::create([
        //     'email' => "ramamy@gmail.com",
        //     'name' => "Mamy Fanojo",
        //     'password' => 'ramamy'
        // ]);
        return view('admin.dashboard.index', [
            'nb_medoc' => Medicament::count(),
            'nb_categ' => Category::count(),
            'nb_supp' => Supplier::count()
        ]);
    }
}
