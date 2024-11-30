<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Certifique-se de importar o Auth corretamente
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;

class AuthController extends Controller
{
    // Método de exibição da página de login
    public function index()
    {
        // Verifica se o usuário está logado
        if (Auth::check()) {
            // Se estiver logado, redireciona para o dashboard
            return redirect()->route('dashboard');
        }

        // Se não estiver logado, exibe o formulário de login com mensagem de erro
        return view('login')->with('error', 'Você não está logado.');
    }

    // Método de login
    public function login(Request $request)
    {
        // Valida os campos de email e senha
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        // Busca o usuário pelo email
        $usuario = Usuarios::where('email', $request->email)->first();

        // Verifica se o usuário existe e se a senha é válida
        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            // Faz login do usuário
            Auth::login($usuario);

            // Regenera a sessão para segurança
            $request->session()->regenerate();

            // Se o usuário for admin, redireciona para o dashboard de administrador
            if ($usuario->status === 'admin') {
                return redirect()->route('dashboard')->with('success', 'Bem-vindo à área administrativa!');
            }

            // Caso contrário, redireciona para a página de agendamentos
            return redirect()->route('agendamentos.index')->with('success', 'Login realizado com sucesso!');
        }

        // Caso as credenciais estejam incorretas, retorna erro
        return back()->withErrors([
            'email' => 'Credenciais inválidas ou você não está cadastrado.',
        ]);
    }

    // Método para exibir o formulário de cadastro
    public function showRegisterForm()
    {
        return view('register');
    }

    // Método de registro de um novo usuário
    public function register(Request $request)
    {
        // Valida os campos do formulário de cadastro
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

        // Cria um novo usuário no banco de dados
        Usuarios::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'senha' => Hash::make($request->password),
            'status' => $request->status,
            'data_nascimento' => $request->data_nascimento,
            'endereco' => $request->endereco,
        ]);

        // Redireciona para a página de login com uma mensagem de sucesso
        return redirect()->route('login.form')->with('success', 'Cadastro realizado com sucesso! Faça login.');
    }

    // Método de logout
    public function logout(Request $request)
    {
        // Faz logout do usuário
        Auth::logout();

        // Invalida a sessão e regenera o token de CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redireciona para a página de login com uma mensagem
        return redirect()->route('login.form')->with('error', 'Você não está logado.');
    }
}
