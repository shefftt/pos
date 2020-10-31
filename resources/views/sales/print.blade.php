<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>نقاط البيع</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <style type="text/css">
        * {
            font-size: 14px;
            line-height: 24px;
            font-family: 'Ubuntu', sans-serif;
            text-transform: capitalize;
        }

        .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor: pointer;
        }

        .btn-info {
            background-color: #999;
            color: #FFF;
        }

        .btn-primary {
            background-color: #20c997;
            color: #FFF;
            width: 100%;
            font-size: 20px;
        }

        td,
        th,
        tr,
        table {
            border-collapse: collapse;
        }

        tr {
            border-bottom: 1px dotted #ddd;
        }

        td,
        th {
            padding: 7px 0;
            width: 50%;
        }

        table {
            width: 100%;
        }

        tfoot tr th:first-child {
            text-align: left;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        small {
            font-size: 11px;
        }

        @media print {
            * {
                font-size: 12px;
                line-height: 20px;
            }

            td,
            th {
                padding: 5px 0;
            }

            .hidden-print {
                display: none !important;
            }

            @page {
                margin: 0;
            }

            body {
                margin: 0.5cm;
                margin-bottom: 1.6cm;
            }
        }
    </style>
</head>

<body>

    <div style="max-width:400px;margin:0 auto">
        <div class="hidden-print">
            <table>
                <tbody>
                    <tr>
                        <td><a href="{{url('pos')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i> الى الخلف</a> </td>
                        <td><button onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i> طباعة</button></td>
                    </tr>
                </tbody>
            </table>
            <br>
        </div>

        <div id="receipt-data">
            <div class="centered">
                <img src="{{url('/image/logo.png')}}" height="100" width="100" style="margin:10px 0;">

                <h2>
                    {{$info->name}}</h2>

                <p>العنوان:
                    {{$info->address}}
                    <br>رقم الهاتف:

                    {{$info->phone}}
                </p>
            </div>
            <p>تاريخ:
                {{now()}}
                <br>
                مرجع:
                {{$invoice->id}}#

                @if(isset($sale->customer->name))
                <br>
                العميل:
                {{$sale->customer->name}} @endif


            </p>
            <table>
                <tbody>
                    @foreach($invoice->products as $products)
                    <tr>
                        <td colspan="2">
                            {{$products->product->name}}
                            <br> {{$products->qyt}} x {{$products->price}}</td>
                        <td style="text-align:right;vertical-align:bottom">{{$products->sub_total}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">مجموع: </th>
                        <th style="text-align:right">{{$invoice->total}}</th>
                    </tr>
                    <tr>
                        <th colspan="2">مجموع الضريبه: </th>
                        <th style="text-align:right">{{$invoice->vat_total}}</th>
                    </tr>
                    <tr>
                        <th colspan="2">المجموع + الضريبه :</th>
                        <th style="text-align:right">{{$invoice->total + $invoice->vat_total}}</th>
                    </tr>
                </tfoot>
            </table>
            <table>
                <tbody>
                    <tr style="background-color:#ddd;">
                        <td style="padding: 5px;width:30%">دفعت :
                            {{$invoice->payment->name}}
                        </td>
                    </tr>
                    <tr>
                        <td class="centered" colspan="3">شكرا لتسوقك معنا </td>
                    </tr>
                    <!-- <tr><td class="centered" colspan="3"><img style="margin-top:10px;" src="blob:null/846e6740-6d83-4a17-a2d3-dbe2072721eb" alt="barcode"></td></tr> -->
                </tbody>
            </table>
            <!-- <div class="centered" style="margin:30px 0 50px">
            <small>فاتورة ولدت من قبل SalePro.
            طورت بواسطة LionCoders</strong></small>
        </div> -->
        </div>
    </div>

    <script type="text/javascript">
        function auto_print() {
            // window.print()
        }
        setTimeout(auto_print, 1000);
    </script>



</body>

</html>






<style>
    #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 108mm;
        background: #FFF;


        ::selection {
            background: #f31544;
            color: #FFF;
        }

        ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        h1 {
            font-size: 1em;
            color: #222;
        }

        h2 {
            font-size: .7em;
        }

        h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        p {
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }

        #top,
        #mid,
        #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #top {
            min-height: 100px;
        }

        #mid {
            min-height: 80px;
        }

        #bot {
            min-height: 50px;
        }

        #top .logo {
            //float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
            background-size: 60px 60px;
        }

        .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        .info {
            display: block;
            //float:left;
            margin-left: 0;
        }

        .title {
            float: right;
        }

        .title p {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            //padding: 5px 0 5px 15px;
            //border: 1px solid #EEE
        }

        .tabletitle {
            //padding: 5px;
            font-size: .5em;
            background: #EEE;
        }

        .service {
            border-bottom: 1px solid #EEE;
        }

        .item {
            width: 24mm;
        }

        .itemtext {
            font-size: .5em;
        }

        #legalcopy {
            margin-top: 5mm;
        }
</style>
