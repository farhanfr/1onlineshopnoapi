{{-- PAYMENT ATM (STRUK) --}}
<div class="modal fade" id="receipt_payment">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pembayaran ATM (Struk)</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container">
          <h5 class="text-center">Cara Pembayaran ATM (Struk)</h5>
          <ol>
            <li>Pilih pembayaran dengan ATM (Struk)</li>
            <li>Tekan tombol <i>Baik saya mengerti</i></li>
            <li>Setalah itu, akan muncul tempat untuk upload struk pembayaran di atas checkout</li>
            <li>Upload struk pembayaran</li>
            <li>Setelah itu, tunggu petugas E-Tech untuk memverifikasi bukti tersebut, status pembayaran akan berubah menjad pending</li>
            <li>Setelah dinyatakan benar, maka status akan menjadi lunas</li>
            <li>Pembayaran selesai</li>
          </ol>
        </div>
      </div>
      <div class="modal-footer">
         <a href="{{ url('/receiptpayment/'.$GetNoCheckout) }}" class="btn btn-success">Baik Saya Mengerti</a>
      </div>
    </div>
  </div>
</div>

{{-- PAYMENT ATM (STRUK) --}}
<div class="modal fade" id="outlet_payment">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pembayaran Gerai E-Tech</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container">
          <h5 class="text-center">Cara Pembayaran Gerai E-Tech</h5>
          <ol>
            <li>Pilih pembayaran Gerai E-Tech</li>
            <li>Tekan tombol <i>Baik saya mengerti</i></li>
            <li>Setalah itu, akan muncul tempat untuk menampilkan kode pembayaran</li>
            <li>Catat atau foto kode pembayaran tersebut</li>
            <li>Setelah itu, tunjukkan kepada petugas atau kasir di Gerai E-Tech</li>
            <li>Pembayaran selesai</li>
          </ol>
        </div>
      </div>
      <div class="modal-footer">
          <a href="{{ url('/outletpayment/'.$GetNoCheckout) }}" class="btn btn-success">Baik Saya Mengerti</a>
      </div>
    </div>
  </div>
</div>




