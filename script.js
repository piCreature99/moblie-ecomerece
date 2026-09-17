document.getElementById('logoutBtn')?.addEventListener('click', function(e) {
    e.preventDefault();

    // 1. Tell the server to log us out
    fetch('logout_ajax.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {

                window.location.reload();
            }
        })
        .catch(error => console.error('Error:', error));
});