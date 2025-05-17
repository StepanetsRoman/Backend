
document.getElementById('noteForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;

    const res = await fetch('add_note.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ title, content, user_id: 1 })
    });

    const msg = await res.text();
    alert(msg);
    loadNotes();
});

async function loadNotes() {
    const res = await fetch('get_notes.php');
    const notes = await res.json();
    const container = document.getElementById('notesContainer');
    container.innerHTML = '';
    notes.forEach(note => {
        const div = document.createElement('div');
        div.innerHTML = `
            <h3>${note.title}</h3>
            <p>${note.content}</p>
            <button onclick="deleteNote(${note.id})">Видалити</button>
            <button onclick="editNote(${note.id}, '${note.title}', '${note.content}')">Редагувати</button>
            <hr>
        `;
        container.appendChild(div);
    });
}

async function deleteNote(id) {
    await fetch('delete_note.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id })
    });
    loadNotes();
}

async function editNote(id, oldTitle, oldContent) {
    const newTitle = prompt('Новий заголовок', oldTitle);
    const newContent = prompt('Новий текст', oldContent);
    if (newTitle && newContent) {
        await fetch('update_note.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id, title: newTitle, content: newContent })
        });
        loadNotes();
    }
}

loadNotes();
