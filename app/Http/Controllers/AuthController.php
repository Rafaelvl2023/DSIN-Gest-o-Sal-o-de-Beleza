<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('login')->with('error', 'Você não está logado.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        $usuario = Usuarios::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            Auth::login($usuario);

            $request->session()->regenerate();

            if ($usuario->status === 'admin') {
                return redirect()->route('dashboard')->with('success', 'Bem-vindo à área administrativa!');
            }

            return redirect()->route('agendamentos.index')->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas ou você não está cadastrado.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|unique:usuarios,email',
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[\W_]/',
            ],
            'data_nascimento' => 'nullable|date',
            'endereco' => 'nullable|string',
            'status' => 'required|in:admin,cliente',
        ], [
            'nome.required' => 'O campo de nome é obrigatório.',
            'telefone.required' => 'O campo de telefone é obrigatório.',
            'email.required' => 'O campo de email é obrigatório.',
            'email.email' => 'Por favor, insira um email válido.',
            'email.unique' => 'Este email já está cadastrado.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password.confirmed' => 'As senhas não coincidem.',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula, uma minúscula, um número e um caractere especial.',
        ]);

        Usuarios::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'senha' => Hash::make($request->password),
            'status' => $request->status,
            'data_nascimento' => $request->data_nascimento,
            'endereco' => $request->endereco,
        ]);

        return redirect()->route('login.form')->with('success', 'Cadastro realizado com sucesso! Faça login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('error', 'Você não está logado.');
    }
}
