<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6"> <!-- Adicionando margem superior para espaço -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Mensagem de login -->
                <p>{{ __("You're logged in!") }}</p>
            </div>

            <!-- Formulário de Adicionar Produto -->
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-xl font-semibold mb-4">Adicionar Produto</h1>
                <form action="{{ route('produtos.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="descricao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição</label>
                        <input type="text" name="descricao" class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="valor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor</label>
                        <input type="number" step="0.01" name="valor" class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="url_imagem" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL da Imagem</label>
                        <input type="url" name="url_imagem" class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                    </div>
                    <!-- Botão com borda azul clara -->
                    <button type="submit" class="mt-4 px-4 py-2 border-2 border-blue-400 bg-blue-500 text-white font-bold rounded hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-600">
                        Salvar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
