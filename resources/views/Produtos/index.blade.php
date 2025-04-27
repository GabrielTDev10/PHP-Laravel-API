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

            <!-- Tabela de Produtos -->
            <div class="p-6 text-gray-900 dark:text-gray-100 mt-8">
                <h1 class="text-xl font-semibold mb-4">Lista de Produtos</h1>

                <!-- Estilos CSS para tabela -->
                <style>
                    /* Estilo geral da tabela */
                    .table {
                        width: 100%;
                        border-collapse: collapse; /* Remove as linhas de espaçamento entre as células */
                        margin-top: 20px;
                        background-color: #fff; /* Cor de fundo branca para a tabela */
                        border-radius: 8px;
                        overflow: hidden;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra suave para a tabela */
                    }

                    /* Estilo das células da tabela */
                    .table th, .table td {
                        padding: 12px 15px;
                        text-align: left;
                        font-size: 14px;
                        color: #333; /* Cor do texto contrastante */
                        border-bottom: 1px solid #ddd; /* Linha sutil abaixo das células */
                    }

                    /* Cor do cabeçalho da tabela */
                    .table th {
                        background-color: #007BFF; /* Cor de fundo azul */
                        color: #fff; /* Texto branco */
                        font-weight: bold;
                    }

                    /* Cor das linhas da tabela ao passar o mouse */
                    .table tbody tr:hover {
                        background-color: #f1f1f1; /* Cor clara quando o mouse passa por cima */
                    }

                    /* Estilo para as mensagens de sucesso */
                    .alert {
                        background-color: #4CAF50; /* Cor verde */
                        color: white;
                        padding: 10px;
                        margin-bottom: 15px;
                        border-radius: 5px;
                        font-weight: bold;
                    }

                    /* Botões */
                    .btn {
                        padding: 8px 15px;
                        text-decoration: none;
                        color: white;
                        border-radius: 5px;
                        font-size: 14px;
                        display: inline-block;
                    }

                    .btn-primary {
                        background-color: #007bff; /* Azul */
                    }

                    .btn-warning {
                        background-color: #ffc107; /* Amarelo */
                    }

                    .btn-danger {
                        background-color: #dc3545; /* Vermelho */
                    }

                    /* Hover effect for buttons */
                    .btn:hover {
                        opacity: 0.8;
                    }

                    /* Estilo para as imagens */
                    .table img {
                        max-width: 50px;
                        border-radius: 5px;
                    }
                </style>

                <!-- Lista de Produtos -->
                @if (session('success'))
                    <div class="alert">{{ session('success') }}</div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Imagem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->codigo }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                                <td><img src="{{ $produto->url_imagem }}" alt="Imagem"></td>
                                <td>
                                    <a href="{{ route('produtos.edit', $produto->codigo) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('produtos.destroy', $produto->codigo) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Deseja excluir este produto?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
