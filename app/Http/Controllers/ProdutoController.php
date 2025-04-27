<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Exibir todos os produtos
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        return view('produtos.create');
    }

    // Salvar um novo produto
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'url_imagem' => 'required|url',
        ]);

        Produto::create($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    // Mostrar formulário de edição
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    // Atualizar um produto
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'url_imagem' => 'required|url',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Deletar um produto
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto deletado com sucesso!');
    }
}
