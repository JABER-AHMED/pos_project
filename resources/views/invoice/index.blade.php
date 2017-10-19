@extends('layouts.invoicemaster')
@section('title')
@endsection
@section('content')
<div class="container">
    <div id="invoiceholder">

  <div id="invoice">
    
    <div id="invoice-top">
      <div class="title">
        <h1>Invoice #</h1>
        <p>Issued: </p>
      </div><!--End Title-->
    </div><!--End InvoiceTop-->
    
    <div id="invoice-bot">
      
      <div id="table">
        <table>
          <tr class="tabletitle">
            <td class="text-center"><h2>Product Name</h2></td>
            <td class="text-center"><h2>Quantity</h2></td>
            <td class="text-center"><h2>Price</h2></td>
            <td class="text-center"><h2>Sub-total</h2></td>
          </tr>
          @foreach($invoices as $invoice)
          <tr class="service">
            @foreach($invoice->orders as $order)
            <td class="tableitem"><p class="itemtext">{{$order->product_id}}</p></td>
            <td class="tableitem"><p class="itemtext"></p></td>
            <td class="tableitem"><p class="itemtext">$75</p></td>
            <td class="tableitem"><p class="itemtext">$375.00</p></td>
            @endforeach
          </tr>
          @endforeach
          <tr class="tabletitle">
            <td></td>
            <td></td>
            <td class="Rate"><h2>Vat</h2></td>
            <td class="payment"><h2>${{$invoice->vat}}</h2></td>
          </tr>
          <tr class="tabletitle">
            <td></td>
            <td></td>
            <td class="Rate"><h2>Discount</h2></td>
            <td class="payment"><h2>${{$invoice->discount}}</h2></td>
          </tr>
          <tr class="tabletitle">
            <td></td>
            <td></td>
            <td class="Rate"><h2>Total</h2></td>
            <td class="payment"><h2>${{$invoice->total_price}}</h2></td>
          </tr>

          
        </table>
      </div><!--End Table-->
      
    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
</div><!-- End Invoice Holder-->
</div>
@endsection