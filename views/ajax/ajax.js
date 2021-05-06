let tombolCari = document.getElementById('cari');
let container = document.getElementById('container');
tombolCari.addEventListener('keyup', () => {

    //buat object ajax
   
    
        // if(keyword !== ''){
    let ajax = new XMLHttpRequest();
    // cek kesiapan ajax
    ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                container.innerHTML = ajax.responseText;

            }
        }
        ////ekseskusi ajax
    ajax.open('GET', 'data_ajax/cari.php?tombolCari=' + tombolCari.value, true);
    ajax.send();
    // }else{
    //     container.innerHTML = 'Masukkan Nomor resi anda!';
    // }


})
