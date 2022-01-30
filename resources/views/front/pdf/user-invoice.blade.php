<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/48505676c5.js" crossorigin="anonymous"></script>
</head>

<style>
    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #757575;
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #ff7f00;
    }
    .footer i{
        color: #ff7f00;
    }

    .footer-border{
        height: 20px;
        margin-top: 20px;
        background: linear-gradient(to right, #757575 50%, #ff7f00 50%);
    }

    .invoice main {
        padding-bottom: 50px;
    }

    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #ff7f00;
    }

    .invoice main .notices .notice {
        font-size: 1.2em;
        color: #757575;
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,.invoice table th {
        padding: 15px;
        /* background: #eee; */
        border-bottom: 1px solid #757575;
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #3989c6;
        font-size: 1.2em
    }

    .invoice table .qty,.invoice table .total,.invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: black;
        font-size: 1.6em;
        background: #ff7f00;
    }

    .invoice table .total {
        /* background: #3989c6; */
        color: black;
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #757575;
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .invoice table tfoot tr:last-child td {
        color: #757575;
        font-size: 1.4em;
        border-top: 1px solid #757575;
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px!important;
            overflow: hidden!important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }
    #printInvoice{
        background: #ff7f00 !important;
    }
</style>
<body>
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="{{route('home')}}">
                            <img style="width: 20%;" src="/uploads/logo/{{$config->logo}}" data-holder-rendered="true"/>
                        </a>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Kimin Adina:</div>
                        <h2 class="to">{{$order->fullname}}</h2>
                        <div class="address">{{$order->adress}}</div>
                        <div class="email"><a href="mailto:mustafalim@bk.ru">mustafalim@bk.ru</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Faktura 1</h1>
                        <div class="date">Faktura Tarixi: {{$order->order_created_at_no_pm()}}</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-left">Ad</th>
                        <th class="text-right">Alis Qiymeti</th>
                        <th class="text-right">Eded</th>
                        <th class="text-right">Cemi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->basket->basket_products as $key=>$basket)
                        <tr>
                            <td class="no">{{++$key}}</td>
                            <td class="text-left">
                                <h3>
                                    <a target="_blank" href="{{route('product.detail',$basket->product->slug)}}">
                                        Məhsula Keçid
                                    </a>
                                </h3>
                                {{$basket->product->name}}
                            </td>
                            <td class="unit">{{$basket->price}} ⫙</td>
                            <td class="qty">{{$basket->count}}</td>
                            <td class="total">{{$basket->count*$basket->price}} ⫙</td>
                        </tr>
                        <tr>
                            <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">Cemi</td>
                        <td>{{$order->sub_total}} ⫙</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">ADV</td>
                        <td>{{$order->edv_total}} ⫙</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">Umumi Mebleg</td>
                        <td>{{$order->order_total}} ⫙</td>
                    </tr>
                    </tfoot>
                </table>
                <div class="notices">
                    <div class="notice">Bizimlə çalıştığınız üçün təşəkkür edirik!</div>
                </div>
            </main>
            <div class="footer" style="text-align: center; color: #757575; border-top: 1px solid #aaa;">
                <div class="row">
                    <div class="col">
                        <div>
                            <i class="fas fa-phone-alt" style="margin-right:10px;"></i>
                            <span>{{$config->mobil_1}}</span>
                        </div>
                        <div>
                            <i class="fas fa-mobile" style="margin-right:10px;"></i>
                            <span>{{$config->mobil_2}}</span>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <i class="fas fa-envelope" style="margin-right:10px;"></i>
                            <span>{{$config->email}}</span>
                        </div>
                        <div>
                            <i class="fab fa-internet-explorer" style="margin-right:10px;"></i>
                            <span>www.elektrikevi.az</span>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <i class="fab fa-instagram" style="margin-right:10px;"></i>
                            <span>{{$config->instagram}}</span>
                        </div>
                        <div>
                            <i class="fab fa-facebook-f" style="margin-right:10px;"></i>
                            <span>{{$config->facebook}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-border"></div>
            <footer>
                Faktura kompüterdə yaradılıb və imza və möhür olmadan etibarlıdır.
            </footer>
        </div>
        <div></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    $('#printInvoice').click(function(){
        Popup($('.invoice')[0].outerHTML);
        function Popup(data)
        {
            window.print();
            return true;
        }
    });
</script>

</body>
</html>