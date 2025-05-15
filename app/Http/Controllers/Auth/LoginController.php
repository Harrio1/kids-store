<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Показать форму для входа.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Обработать запрос на вход.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Валидация
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Попытка аутентификации
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            // Если запрос был AJAX, вернем JSON
            if ($request->expectsJson()) {
                return response()->json(['success' => true]);
            }
            
            return redirect()->intended('/');
        }

        // Если запрос был AJAX, вернем ошибку в JSON
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Неверные учетные данные'], 401);
        }
        
        // Для обычных запросов используем сессию для ошибок
        return back()->withErrors([
            'email' => 'Неверный email или пароль.',
        ]);
    }

    /**
     * Выход из системы.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
} 