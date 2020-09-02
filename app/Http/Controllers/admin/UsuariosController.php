<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\QueryException;

class UsuariosController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function usuarios(request $request)
    {

        $user = User::all();

        return view('admin.usuario', [
            'user' => $user
        ]);

    }

    public function cadastrar()
    {
        return view('admin.cadastrar');
    }

    public function novoCadastro(Request $request)
    {
        try{
        $db = New user;

            $db->name = $request->input('name');
            $db->email = $request->input('email');
            $db->telefone = $request->input('telefone');
            $db->password = bcrypt($request->input('password'));

            $db->pvisualizar_usuario = (isset($request['pvisualizar_usuario'])) ? 1 : 0;
            $db->pcadastrar_usuario = (isset($request['pcadastrar_usuario'])) ? 1 : 0;
            $db->pdeletar_usuario = (isset($request['pdeletar_usuario'])) ? 1 : 0;
            $db->peditar_usuario = (isset($request['peditar_usuario'])) ? 1 : 0;

            $db->pvisualizar_cliente = (isset($request['pvisualizar_cliente'])) ? 1 : 0;
            $db->pcadastrar_cliente = (isset($request['pcadastrar_cliente'])) ? 1 : 0;
            $db->pdeletar_cliente = (isset($request['pdeletar_cliente'])) ? 1 : 0;
            $db->peditar_cliente = (isset($request['peditar_cliente'])) ? 1 : 0;
            $db->save();

            return redirect()->route('index.usuarios')->with('mensagem', 'O usuário foi cadastrado com sucesso!');
        } catch (QueryException $ex) {
            
            if($ex->getCode() === "23000") {
                return redirect()->route('index.usuarios')->with('invalido', 'O usuário já está cadastrado no sistema!');
            } else {
                return redirect()->route('index.usuarios')->with('invalido', 'Erro SQL ao cadastrar usuário!');
            }
        }

    }

    public function editar(request $request, $id)
    {

        $db = user::find($id);

        return view('admin.editarUsuario',[
            'id' => $id,
            'name' => $db['name'],
            'email' => $db['email'],
            'password' => $db['password'],
            'telefone' => $db['telefone'],

            'pvisualizar_usuario' => $db['pvisualizar_usuario'],
            'pcadastrar_usuario' => $db['pcadastrar_usuario'],
            'pdeletar_usuario' => $db['pdeletar_usuario'],
            'peditar_usuario' => $db['peditar_usuario'],

            'pvisualizar_cliente' => $db['pvisualizar_cliente'],
            'pcadastrar_cliente' => $db['pcadastrar_cliente'],
            'pdeletar_cliente' => $db['pdeletar_cliente'],
            'peditar_cliente' => $db['peditar_cliente'],

        ]); 

    }

    public function editarFinalizado(request $request, $id)
    {

        $db = user::find($id);

        $dados = $request->all();

        $name = $dados['name'];
        $email = $dados['email'];
        $password = $dados['password'];
        $telefone = $dados['telefone'];

        $pvisualizar_usuario = (isset($request['pvisualizar_usuario'])) ? 1 : 0;
        $pcadastrar_usuario = (isset($request['pcadastrar_usuario'])) ? 1 : 0;
        $pdeletar_usuario = (isset($request['pdeletar_usuario'])) ? 1 : 0;
        $peditar_usuario = (isset($request['peditar_usuario'])) ? 1 : 0;

        $pvisualizar_cliente = (isset($request['pvisualizar_cliente'])) ? 1 : 0;
        $pcadastrar_cliente = (isset($request['pcadastrar_cliente'])) ? 1 : 0;
        $pdeletar_cliente = (isset($request['pdeletar_cliente'])) ? 1 : 0;
        $peditar_cliente = (isset($request['peditar_usuario'])) ? 1 : 0;

        $db['pvisualizar_cliente'] = $pvisualizar_cliente;
        $db['pcadastrar_cliente'] = $pcadastrar_cliente;
        $db['pdeletar_cliente'] = $pdeletar_cliente;
        $db['peditar_cliente'] = $peditar_cliente;

        $db['pvisualizar_usuario'] = $pvisualizar_usuario;
        $db['pcadastrar_usuario'] = $pcadastrar_usuario;
        $db['pdeletar_usuario'] = $pdeletar_usuario;
        $db['peditar_usuario'] = $peditar_usuario;

        $db['name'] = $name;
        $db['telefone'] = $telefone;
        $db['email'] = $email;
        $db['password'] = $password;
      
        $db->save();

        return redirect()->route('index.usuarios')->with('mensagem', 'O usuário foi atualizdo com sucesso!');

    }

    public function remover(request $request, $id)
    {

        $user = user::find($request->id);
        $user->delete();

        return redirect()->route('index.usuarios')->with('invalido', 'O usuário foi deletado com sucesso!');

    }

}
