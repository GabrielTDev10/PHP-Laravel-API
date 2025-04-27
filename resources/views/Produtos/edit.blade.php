<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Produto') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <!-- Formulário de edição de produto -->
        <form action="{{ route('produtos.update', $produto->codigo) }}" method="POST" class="bg-white dark:bg-gray-800 p-8 shadow-sm rounded-lg">
            @csrf
            @method('PUT')

            <div class="form-group mb-6">
                <label for="descricao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição</label>
                <input type="text" id="descricao" name="descricao" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" value="{{ old('descricao', $produto->descricao) }}" required>
                @error('descricao')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-6">
                <label for="valor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor</label>
                <input type="text" id="valor" name="valor" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" value="{{ old('valor', $produto->valor) }}" required>
                @error('valor')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-6">
                <label for="url_imagem" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL da Imagem</label>
                <input type="text" id="url_imagem" name="url_imagem" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" value="{{ old('url_imagem', $produto->url_imagem) }}" required>
                @error('url_imagem')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="mt-4 w-full py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-700 dark:hover:bg-blue-600">
                Atualizar Produto
            </button>
        </form>
    </div>
</x-app-layout>
