const btn = document.querySelector('.btn-tambah')
btn.addEventListener('click', tambahForm, false)

const formOrder = document.querySelector('#form-order')
formOrder.onsubmit = order

function tambahForm() {
  const layanan = document.querySelectorAll('.layanan')
  const length = layanan.length
  const jenis = `<div class="form-group col-md-3 layanan">
  <label>Layanan</label>
  <select name="layanan[${length}][jenis]" class="form-control" onchange="my_fun(this.value, ${length});">
    <option selected>Pilih..</option>
    <option value="kiloan">Kiloan</option>
    <option value="satuan">Satuan</option>
    <option value="karpet">Karpet</option>
    <option value="shoes">Sepatu</option>
  </select>
  </div>`
  const item = `<div class="form-group col-md-7 jenis_item">
  <label>Jenis item</label>
  <select name="layanan[${length}][item]" class="form-control jenis-item-${length}">
    <option>Pilih Layanan</option>
  </select>
  </div>`
  const jumlah = `<div class="form-group col-md-2 jumlah">
  <label>Jumlah</label>
  <input type="number" name="layanan[${length}][jml_item]" class="form-control">
  </div>`
  const after = document.querySelectorAll('.jumlah')
  const form = jenis + item + jumlah
  after[after.length - 1].insertAdjacentHTML('afterend', form)
}

function order(e) {
  e.preventDefault();
  const formData = $('form').serialize()
  fetch('helper.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
      // 'Content-Type': 'application/json'
    },
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    console.log(data)
    formOrder.reset()
    
    $(".alert").addClass("show")
    $('.alert').alert()
    
  })
  .catch(err => console.log(err))
}
