<?php

namespace App\Http\Controllers\Limpai\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Limpai\Painel\UserRequest;
use App\Models\Limpai\Painel\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  private $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   * index
   */
  public function index()
  {
    $users = $this->user->latest()->paginate(1000000);
    return view('Limpai.Painel.pages.user.index', compact('users'));
  }

  /**
   * create
   */
  public function create()
  {
    return view('Limpai.Painel.pages.user.create');
  }

  /**
   * store
   */
  public function store(UserRequest $request)
  {
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
      $nome_imagem = $request->image->getClientOriginalName();
      $request->image->storeAs('users', $nome_imagem);
    } else {
      $nome_imagem = 'default.jpg';
    }

    if (user::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'cpf' => $request->cpf,
      'rg' => $request->rg,
      'fone' => $request->fone,
      'celular' => $request->celular,
      'cep' => $request->cep,
      'logradouro' => $request->logradouro,
      'numero' => $request->numero,
      'uf' => $request->uf,
      'cidade' => $request->cidade,
      'complemento' => $request->complemento,
      'bairro' => $request->bairro,
      'image' => $nome_imagem,
    ])) {
      return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso');
    } else {
      return redirect()->route('user.index')->with('error', 'Falha ao cadastrar o usuário');
    }
  }

  /**
   * show
   */
  public function show($id)
  {
    if (!$user = $this->user->find($id)) {
      return redirect()->back();
    }
    return view('Limpai.Painel.pages.user.show', compact('user'));
  }

  /**
   * edit
   */
  public function edit($id)
  {
    if (!$user = $this->user->find($id)) {
      return redirect()->back();
    }

    return view('Limpai.Painel.pages.user.edit', compact('user'));
  }

  /**
   * update
   */
  public function update(userRequest $request, $id)
  {
    if (!$user = $this->user->find($id)) {
      return redirect()->back();
    }

    //Update de Imagem
    if ($request->image) {
      if ($user->image && Storage::exists($user->image)) {
        Storage::delete($user->image);
      }

      $nome_imagem_edit = $request->image->getClientOriginalName();
      $request->image->storeAs('users', $nome_imagem_edit);
    } elseif ($request->image === null) {
      $nome_imagem_edit = $user['image'];
    } else {
      $nome_imagem_edit = 'default.jpg';
    }
    //Update de Imagem

    if ($user->update([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'cpf' => $request->cpf,
      'rg' => $request->rg,
      'fone' => $request->fone,
      'celular' => $request->celular,
      'cep' => $request->cep,
      'logradouro' => $request->logradouro,
      'numero' => $request->numero,
      'uf' => $request->uf,
      'cidade' => $request->cidade,
      'complemento' => $request->complemento,
      'bairro' => $request->bairro,
      'image' => $nome_imagem_edit,
    ])) {
      return redirect()->route('user.index')->with('success', 'Usuário editado com sucesso');
    } else {
      return redirect()->route('user.index')->with('error', 'Falha ao editar o usuário');
    }
  }

  /**
   * excluir
   */
  public function destroy($id)
  {
    if (!$user = $this->user->find($id)) {
      return redirect()->back();
    }

    if ($user->id <= 1) {
      return redirect()->back()->with('error', 'Você não pode deletar usuários padrões do sistema');
    }

    if ($user->delete()) {
      return redirect()->route('user.index')->with('danger', 'Usuário excluído com sucesso!');
    } else {
      return redirect()->route('user.index')->with('error', 'Falha ao excluir o usuário');
    }
  }
}
