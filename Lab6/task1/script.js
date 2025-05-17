
document.getElementById('registerForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const res = await fetch('register.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name, email, password })
    });

    const data = await res.text();
    alert(data);
    getUsers();
});

async function getUsers() {
    const res = await fetch('get_users.php');
    const users = await res.json();
    const list = document.getElementById('userList');
    list.innerHTML = '';
    users.forEach(user => {
        const li = document.createElement('li');
        li.textContent = `${user.name} (${user.email})`;
        list.appendChild(li);
    });
}
