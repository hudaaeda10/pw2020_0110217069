const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');

// hilangkan tombol cari
tombolCari.style.display = 'none';

// event ketika menulis keyword
keyword.addEventListener('keyup', function() {
    // MENGGUNAKAN AJAX
    // buat ajax
    // const xhr = new XMLHttpRequest();

    // // periksa apakah ajax sudah ready?
    // xhr.onreadystatechange = function() {
    //     if( xhr.readyState == 4 && xhr.status == 200) {
    //         container.innerHTML = xhr.responseText;
    //     }
    // };
    // xhr.open('get', 'ajax/ajax_cari.php?keyword='  + keyword.value);
    // xhr.send();


    // MENGGUNAKAN FETCH
    fetch('ajax/ajax_cari.php?keyword=' + keyword.value) // fetch mencari file yang ingin diminta request
    .then((response) => response.text()) // meminta feedback dari file yang diminta
    .then((response) => (container.innerHTML = response)); // menampikan feedback tersebut di class container
});