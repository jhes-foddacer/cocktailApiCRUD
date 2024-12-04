async function deleteAllCocktails() {
    if (confirm("Tem certeza de que deseja excluir todos os coquetéis?")) {
        const response = await fetch('delete_all_cocktails.php', {
            method: 'POST'
        });
        const data = await response.json();

        if (data.message) {
            alert(data.message);

            
            const cocktailList = document.getElementById('cocktailList');
            cocktailList.innerHTML = '';
        } else if (data.error) {
            console.error(data.error);
            alert('Erro ao excluir todos os coquetéis.');
        }
    }
}
