
/*
Filename : lib/AnggotaCombo.js
Tools : SimplePHPBot
Author : Freddy Wicaksono, M.Kom
*/
function populateAnggota() {
    let fetchUrl = '../lib/anggotaCombo.php';

    fetch(fetchUrl)
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById('anggota_id');

            // Clear existing options
            select.innerHTML = '';

            // Loop through the data and create options
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id; // You can set the value to the anggota ID
                option.textContent = `${item.nama}`;
                select.appendChild(option);
            });

            // After populating the combo box, you can call fetchData if needed
            fetchData();
        })
        .catch(error => console.error('Error:', error));
}

function fetchDataAnggota() {
    // Assuming you have obtained the 'id' from the browser
    var anggota = document.getElementById('anggota');
    var id = anggota.dataset.id;
    

    if (id !== null) {
        let fetchUrl = '../lib/anggotaCombo.php?id='+id;

        fetch(fetchUrl)
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('anggota_id');

                // Set the selected option based on the provided ID
                select.value = id;
            })
            .catch(error => console.error('Error:', error));
    }
}

populateAnggota();
fetchDataAnggota();