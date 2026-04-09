function clearForm() {
    const confirmClear = confirm("Are you sure you want to clear your blog post?");
    if (confirmClear) {
        document.getElementById('title').value = '';
        document.getElementById('content').value = '';
    }
}