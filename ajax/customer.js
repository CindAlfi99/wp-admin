let Cari = document.getElementById('cari');
let containe = document.getElementById('containe');
Cari.addEventListener('keyup', () => {

    //buat object ajax
   
    
        // if(keyword !== ''){
    let xhr = new XMLHttpRequest();
    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                containe.innerHTML = xhr.responseText;

            }
        }
        ////ekseskusi ajax
    xhr.open('GET', 'data_ajax/customer.php?Cari=' + Cari.value, true);
    xhr.send();
    // }else{
    //     container.innerHTML = 'Masukkan Nomor resi anda!';
    // }


})