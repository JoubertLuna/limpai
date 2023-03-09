<?php

namespace App\Http\Controllers\Limpai\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Limpai\Painel\ServiceRequest;
use App\Models\Limpai\Painel\Service;

class ServiceController extends Controller
{
  /**
   * Repository Serviço
   */
  private $service;

  public function __construct(Service $service)
  {
    $this->service = $service;
  }
  /**
   * index
   */
  public function index()
  {

    $services = $this->service->latest()->paginate(1000000);
    return view('Limpai.Painel.pages.services.index', compact('services'));
  }

  /**
   * create
   */
  public function create()
  {
    return view('Limpai.Painel.pages.services.create');
  }

  /**
   * store
   */
  public function store(ServiceRequest $request)
  {
    if ($this->service->create($request->except('_token'))) {
      return redirect()->route('service.index')->with('success', 'Serviço cadastrado com sucesso');
    } else {
      return redirect()->route('service.index')->with('error', 'Falha ao cadastrar o serviço');
    }
  }

  /**
   * show
   */
  public function show($id)
  {
    if (!$service = $this->service->find($id)) {
      return redirect()->back();
    }
    return view('Limpai.Painel.pages.services.show', compact('service'));
  }

  /**
   * edit
   */
  public function edit($id)
  {
    if (!$service = $this->service->find($id)) {
      return redirect()->back();
    }

    return view('Limpai.Painel.pages.services.edit', compact('service'));
  }

  /**
   * update
   */
  public function update(ServiceRequest $request, $id)
  {
    if (!$service = $this->service->find($id)) {
      return redirect()->back();
    }

    if ($service->update($request->except('_token', '_method'))) {
      return redirect()->route('service.index')->with('success', 'Serviço editado com sucesso');
    } else {
      return redirect()->route('service.index')->with('error', 'Falha ao editar o serviço');
    }
  }

  /**
   * excluir
   */
  public function destroy($id)
  {
    if (!$service = $this->service->find($id)) {
      return redirect()->back();
    }

    if ($service->delete()) {
      return redirect()->route('service.index')->with('danger', 'Serviço excluído com sucesso!');
    } else {
      return redirect()->route('service.index')->with('error', 'Falha ao excluir o serviço');
    }
  }
}
