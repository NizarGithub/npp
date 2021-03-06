@extends('mails.mail_master')
@section('content')
  <div class="content">
    <h3 class="title is-3">Dear {{$order->name}},</h3>
    <p>
      Pesanan anda dengan nomor <u>#{{$order->order_no}}</u> sedang dalam proses <b>PENGIRIMAN</b>. <br>
      Berikut detail pesanan anda:
    </p>
    <table class="table">
      <tr>
        <th>Nama Product</th>
        <td>{{$product->name}}</td>
      </tr>
      <tr>
        <th>Jumlah</th>
        <td>{{$order->qty}}</td>
      </tr>
      <tr>
        <th>Alamat kirim</th>
        <td>{{$order->address}}</td>
      </tr>
    </table>
    <p>
      Mohon verifikasi jika barang sudah diterima. Untuk memferifikasi barang sudah diterima silahkan klik tombol dibawah ini
    </p>
    <p class="has-text-centered">
      <a href="{{route('order.complete', ['email'=>$order->email, 'code'=>$order->code])}}" class="button is-primary">Barang sudah diterima</a>
    </p>
  </div>
@endsection
