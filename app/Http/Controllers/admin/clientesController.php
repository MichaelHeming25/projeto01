<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\QueryException;
use App\clientes;

class clientesController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $clientes = clientes::all();

        foreach ($clientes as $cliente) {
            if($cliente->status == 1){
                $cliente->status = 'Ativo';
            }else{
                $cliente->status = 'Inativo';
            }
        }

        return view('admin.clientes', [
            'clientes' => $clientes
        ]);
    }

    public function cadastrar()
    {
        return view('admin.cadastrarClientes');
    }

    public function novoCadastro(Request $request)
    {
        // try{

        $db = New clientes;

            $db->status = $request->input('status');
            $db->name = $request->input('name');
            $db->email = $request->input('email');
            $db->cpf = $request->input('cpf');
            $db->telefone = $request->input('telefone');
            $db->nascimento = $request->input('nascimento');
            $db->cidade = $request->input('cidade');
            $db->endereco = $request->input('endereco');
            $db->nmr_endereco = $request->input('nmr_endereco');
            $db->bairro = $request->input('bairro');
            $db->marca = $request->input('marca');
            $db->modelo = $request->input('modelo');
            $db->ano = $request->input('ano');
            $db->placa = $request->input('placa');
            $db->save();

            return redirect()->route('index.clientes')->with('mensagem', 'O cliente foi cadastrado com sucesso!');
        // } catch (QueryException $ex) {
            
        //     if($ex->getCode() === "23000") {
        //         return redirect()->route('index.clientes')->with('invalido', 'O cliente já está cadastrado no sistema!');
        //     } else {
        //         return redirect()->route('index.clientes')->with('invalido', 'Erro SQL ao cadastrar o cliente!');
        //     }
        // }

    }

    public function vermais($id)
    {
        $clientes = clientes::find($id);

        return view('admin.vermais', [
            "id" => $id,
            "clientes" => $clientes,
            'status' => $clientes['status'],
            'name' => $clientes['name'],
            'email' => $clientes['email'],
            'cpf' => $clientes['cpf'],
            'telefone' => $clientes['telefone'],
            'nascimento' => $clientes['nascimento'],
            'cidade' => $clientes['cidade'],
            'endereco' => $clientes['endereco'],
            'nmr_endereco' => $clientes['nmr_endereco'],
            'bairro' => $clientes['bairro'],
            'marca' => $clientes['marca'],
            'modelo' => $clientes['modelo'],
            'ano' => $clientes['ano'],
            'placa' => $clientes['placa'],
            'created_at' => $clientes['created_at'],
            'created_at' => $clientes['created_at'],
        ]);
    }

    public function editar(request $request, $id)
    {

        $db = clientes::find($id);

        return view('admin.editarClientes',[
            'id' => $id,
            'status' => $db['status'],
            'name' => $db['name'],
            'email' => $db['email'],
            'cpf' => $db['cpf'],
            'telefone' => $db['telefone'],
            'nascimento' => $db['nascimento'],
            'cidade' => $db['cidade'],
            'endereco' => $db['endereco'],
            'nmr_endereco' => $db['nmr_endereco'],
            'bairro' => $db['bairro'],
            'marca' => $db['marca'],
            'modelo' => $db['modelo'],
            'ano' => $db['ano'],
            'placa' => $db['placa'],
        ]); 

    }
    public function editarFinalizado(request $request, $id)
    {

        $db = clientes::find($id);

        $dados = $request->all();

        $status = $dados['status'];
        $name = $dados['name'];
        $email = $dados['email'];
        $cpf = $dados['cpf'];
        $telefone = $dados['telefone'];
        $nascimento = $dados['nascimento'];
        $cidade = $dados['cidade'];
        $endereco = $dados['endereco'];
        $nmr_endereco = $dados['nmr_endereco'];
        $bairro = $dados['bairro'];
        $marca = $dados['marca'];
        $modelo = $dados['modelo'];
        $ano = $dados['ano'];
        $placa = $dados['placa'];

        $db['status'] = $status;
        $db['name'] = $name;
        $db['email'] = $email;
        $db['cpf'] = $cpf;
        $db['telefone'] = $telefone;
        $db['nascimento'] = $nascimento;
        $db['cidade'] = $cidade;
        $db['endereco'] = $endereco;
        $db['nmr_endereco'] = $nmr_endereco;
        $db['bairro'] = $bairro;
        $db['marca'] = $marca;
        $db['modelo'] = $modelo;
        $db['ano'] = $ano;
        $db['placa'] = $placa;
      
        $db->save();

        return redirect()->route('index.clientes')->with('mensagem', 'O cliente foi atualizdo com sucesso!');
    }

    public function remover(request $request, $id)
    {

        $user = clientes::find($request->id);
        $user->delete();

        return redirect()->route('index.clientes')->with('invalido', 'O cliente foi deletado com sucesso!');

    }
}
