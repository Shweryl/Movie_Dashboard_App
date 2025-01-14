const selectedGenres = new Set();

    // Add selected option to the list
    document.getElementById('genre-select').addEventListener('change', function () {
        const genre = this.value;
        if (genre && !selectedGenres.has(genre)) {
            selectedGenres.add(genre);
            updateSelectedGenres();
        }
    });

    // Add custom input value to the list
    function addCustomGenre() {
        const customGenre = document.getElementById('custom-genre').value.trim();
        if (customGenre && !selectedGenres.has(customGenre)) {
            selectedGenres.add(customGenre);
            document.getElementById('custom-genre').value = '';
            updateSelectedGenres();
        }
    }

    // Display selected genres and update hidden input
    function updateSelectedGenres() {
        const container = document.getElementById('selected-genres');
        container.innerHTML = '';

        selectedGenres.forEach(genre => {
            const tag = document.createElement('span');
            tag.textContent = genre;
            tag.classList.add('genre-tag');

            // Remove button
            const removeBtn = document.createElement('button');
            removeBtn.textContent = '×';
            removeBtn.onclick = () => {
                selectedGenres.delete(genre);
                updateSelectedGenres();
            };

            tag.appendChild(removeBtn);
            container.appendChild(tag);
        });

        // Update hidden input for form submission
        document.getElementById('genres-input').value = Array.from(selectedGenres).join(',');
