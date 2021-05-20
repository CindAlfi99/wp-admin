let Carie = document.getElementById('carilayanan');
let containew = document.getElementById('containew');
Carie.addEventListener('keyup', () => {

    //buat object ajax
   
    
        // if(keyword !== ''){
    let xhr = new XMLHttpRequest();
    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                containew.innerHTML = xhr.responseText;

            }
        }
        ////ekseskusi ajax
    xhr.open('GET', 'data_ajax/layanan.php?Carie=' + Carie.value, true);
    xhr.send();
    // }else{
    //     container.innerHTML = 'Masukkan Nomor resi anda!';
    // }


})