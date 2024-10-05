<script>
    $(document).ready(function() {
        // Alternar o status da tarefa
        $('.toggle-complete').click(function() {

            const taskId = $(this).data('id');
            const button = $(this);

            $.ajax({
                url: `/tasks/${taskId}/toggle`, // URL da rota
                method: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}' // Incluindo o token CSRF
                },
                success: function(response) {
                    // Atualiza o botão com base na nova tarefa
                    button.text(response.completed ? 'Marcar como Incompleta' : 'Marcar como Completa');
                    button.closest('tr').find('input[type="checkbox"]').prop('checked', response.completed);
                    alert('Tarefa atualizada com sucesso!'); // Mensagem de sucesso
                },
                error: function(xhr) {
                    alert('Erro ao atualizar a tarefa. Tente novamente.'); // Mensagem de erro
                }
            });
        });

        // Excluir a tarefa
        $('.delete-task').click(function() {
            const taskId = $(this).data('id');
            const button = $(this);
                
            if (confirm('Tem certeza que deseja excluir esta tarefa?')) {
                $.ajax({
                    url: `/tasks/${taskId}`, // URL da rota
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}' // Incluindo o token CSRF
                    },
                    success: function(response) {
                        // Remove a linha da tabela
                        button.closest('tr').remove();
                        alert('Tarefa excluída com sucesso!'); // Mensagem de sucesso
                    },
                    error: function(xhr) {
                        alert('Erro ao excluir a tarefa. Tente novamente.'); // Mensagem de erro
                    }
                });
            }
        });
    });
</script>