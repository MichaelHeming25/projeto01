<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\user;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct() 
    {
        $this->middleware('auth');
    }
     // Função que privada

    //  private $clientes = [
    //     ['id' => 1, 'nome' => 'gabriel', 'idade' => '23', 'sexo' => 'M', 'telefone' => '6699669966']
    // ];

    // // Função construtora

    // public function __construct()
    // {
    //     $clientes = session('clientes');
    //     if(!isset($clientes)){
    //         session(['clientes' => $this -> clientes]);
    //     }
    // }

    // // Função que retorna a view da HomePage

    // public function index()
    // {
    //     return view('welcome');
    // }

    // // Função que retorna a view da pagina "Cadastrar"

    // public function cadastrar()
    // {
    //     return view('cadastrar');
    // }

    // // Função que cadastra as seguintes informações

    // public function dadoscadastro(request $request)
    // {

    //     $clientes = session('clientes');
    //     $id = count($clientes) + 1;

    //     $nome = $request->query('nome');
    //     $idade = $request->query('idade');
    //     $sexo = $request->query('sexo');
    //     $telefone = $request->query('telefone');

    //     $dados = [
    //         'id' => $id,
    //         'nome' => $nome,
    //         'idade' => $idade,
    //         'sexo' => $sexo,
    //         'telefone' => $telefone
    //     ];

    //     $clientes[] = $dados;

    //     session(['clientes' => $clientes]);

    //     return redirect()->route('listar');
    // }

    // // Função que lista na tela os cadastros

    // public function usuarios(request $request)
    // {

    //     $clientes = session('clientes');

    //     return view('admin.usuario', ['dados' => $clientes]);
    // }

    // // Funçao para ediçao de cadastros

    // public function editar(request $request, $id)
    // {

    //     $clientes = session('clientes');

    //     return view('editar', [
    //         'id' => $id,
    //         'nome' => $clientes[$id - 1]['nome'],
    //         'idade' => $clientes[$id - 1]['idade'],
    //         'sexo' => $clientes[$id - 1]['sexo'],
    //         'telefone' => $clientes[$id - 1]['telefone'],
    //     ]);
    // }

    // // Funçao finalizada da ediçao de cadastros

    // public function editarFinalizado(request $request, $id)
    // {

    //     $clientes = session('clientes');

    //     $nome = $request->query('nome');
    //     $idade = $request->query('idade');
    //     $sexo = $request->query('sexo');
    //     $telefone = $request->query('telefone');

    //     $clientes[$id - 1]['nome'] = $nome;
    //     $clientes[$id - 1]['idade'] = $idade;
    //     $clientes[$id - 1]['sexo'] = $sexo;
    //     $clientes[$id - 1]['telefone'] = $telefone;

    //     session(['clientes' => $clientes]);

    //     return redirect()->route('listar');
    // }

    // // Funçao para remover um cadastro

    // public function remover(request $request, $id)
    // {

    //     $clientes = session('clientes');

    //     $ids = array_column($clientes, 'id');
    //     $index = array_search($id, $ids);
    //     array_splice($clientes, $index, 1);
    //     session(['clientes' => $clientes]);

    //     return redirect()->route('listar');
    // }
  

    // Função construtora


    // Função que retorna a view da HomePage

    public function index()
    {
       

        return view('welcome');
    }

    // Função que retorna a view da pagina "Cadastrar"


    // Função que cadastra as seguintes informações

    public function dadoscadastro(request $request)
    {

        // $clientes = session('clientes');
        // $id = count($clientes) + 1;

        // $nome = $request->query('nome');
        // $idade = $request->query('idade');
        // $sexo = $request->query('sexo');
        // $telefone = $request->query('telefone');

        // $dados = [
        //     'id' => $id,
        //     'nome' => $nome,
        //     'idade' => $idade,
        //     'sexo' => $sexo,
        //     'telefone' => $telefone
        // ];

        // $clientes[] = $dados;

        // session(['clientes' => $clientes]);

        // return redirect()->route('listar');

        dd($request->all);
// --
        try{
            $db = New user;
    
                $db->name = $request->input('name');
                $db->email = $request->input('email');
                $db->password = bcrypt($request->input('password'));
                $db->save();
    
                return redirect()->route('admin.usuario')->with('mensagem', 'O usuário foi cadastrado com sucesso!');
            } catch (QueryException $ex) {
                
                if($ex->getCode() === "23000") {
                    return redirect()->route('admin.usuario')->with('invalido', 'O usuário já está cadastrado no sistema!');
                } else {
                    return redirect()->route('admin.usuario')->with('invalido', 'Erro SQL ao cadastrar usuário!');
                }
                
            }
    }

    public function editar(request $request, $id)
    {
        // $user = user::all();

        // foreach ($user as $users) {
        //     if(Auth::user()->peditar_usuarios == 1){
        //         return redirect()->route('tip.home')->with('mensagem', 'Você não tem permissão para acessar esta página!');
        //     }else{
                $db = user::find($id);

                return view('admin.editarUsuario',[
                    'id' => $id,
                    'name' => $db['name'],
                    'email' => $db['email'],
                    'password' => $db['password'],
                ]); 
        //     }
        // }
    }

    // Funçao finalizada da ediçao de cadastros

    public function editarFinalizado(request $request, $id)
    {

        $db = user::find($id);

        $dados = $request->all();

        $name = $dados['name'];
        $email = $dados['email'];
        $password = $dados['password'];

        $db['name'] = $name;
        $db['email'] = $email;
        $db['password'] = $password;

      
        $db->save();

        return redirect()->route('usuarios')->with('mensagem', 'O usuário foi atualizdo com sucesso!');
    }

    // Funçao para remover um cadastro

    public function remover(request $request, $id)
    {

        // $clientes = session('clientes');

        // $ids = array_column($clientes, 'id');
        // $index = array_search($id, $ids);
        // array_splice($clientes, $index, 1);
        // session(['clientes' => $clientes]);

        // return redirect()->route('listar');

        // $user = user::all();

        // foreach ($user as $users) {
        //     if(Auth::user()->pdeletar_usuarios == 1){
        //         return redirect()->route('tip.home')->with('mensagem', 'Você não tem permissão para acessar esta página!');
        //     }else{
                $user = user::find($request->id);
                $user->delete();

                return redirect()->route('usuarios')->with('invalido', 'O usuário foi deletado com sucesso!');
        //     }
        // }

    }
}
