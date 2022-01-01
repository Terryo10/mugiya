<!doctype html>
<html lang="en">
    {{-- <link href="{{ asset('assets') }}/css/theme.css" rel="stylesheet" /> --}}
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        /* .invoice table {
            margin: 155px;
        } */
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>{{$client->name}}</h3>
                <pre>
Show Grounds
Harare
Zimbabwe
<br /><br />
Date: {{Carbon\Carbon::now()}}
Identifier: {{uniqid()}}

</pre>


            </td>
            <td align="center">
                {{-- <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/> --}}
            </td>
            <td align="right" style="width: 40%;">

                {{-- <h3>CompanyName</h3>
                <pre>
                    https://company.com

                    Street 26
                    123456 City
                    United Kingdom
                </pre> --}}
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Invoice specification</h3>
    <table >
        <thead>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($transaction->transactionItems as $product)
            <tr>
                <td>{{$product->product->name}}</td>
                <td>{{$product->quantity}}</td>
                <td align="left">$ {{ number_format($product->price * $product->quantity, 2, ',', '.') }}</td>
            </tr>
            @endforeach


        </tbody>

        <tfoot>
            <tr>
                <td colspan="1"></td>
                <td align="left">Amount Paid</td>
                <td align="left" class="gray">$ {{ number_format($transaction->amount_paid, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td align="left">Total Debt </td>
                <td align="left" class="gray">$ {{ number_format($total - $transaction->amount_paid , 2, ',', '.') }}</td>
            </tr>
        <tr>
            <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">$ {{ number_format($total, 2, ',', '.') }}</td>
        </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Migiya Sys
            </td>
        </tr>

    </table>
</div>
</body>
</html>
