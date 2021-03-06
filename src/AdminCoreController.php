<?php

namespace LaraMod\Admin\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaraMod\Admin\Core\Traits\DashboardTrait;

class AdminCoreController extends Controller
{

    use DashboardTrait;

    public function index()
    {
        if (!auth('admin')->check() && !auth('admin')->viaRemember()) {
            return redirect()->route('admin.login');
        }


        return view('admincore::index', ['widgets' => $this->getWidgets()]);
    }

    public function getLogin()
    {
        return view('admincore::login');
    }

    public function postLogin(Request $request)
    {
        if (auth('admin')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')],
            $request->has('remember'))
        ) {
            return redirect()->intended('admin');
        }

        return redirect()->route('admin.login')->withInput(['email' => $request->get('email')]);
    }

    public function logout()
    {
        auth('admin')->logout();

        return redirect()->route('admin.login');
    }

}