<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Pedido</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <style>
        #invoice {
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
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


        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,
        .invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
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

        .invoice table .qty,
        .invoice table .total,
        .invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #3989c6;
            color: #fff
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
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px !important;
                overflow: hidden !important
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

    </style>
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>
    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-warning"><i class="fa fa-print"></i> Imprimir</button>
        </div>
        <hr>
    </div>
    <div class="container">

        <div class="bg-light" id="invoice">
            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="row">
                            <div class="col">
                                <img class="p-3 img-fluid" src="/assets/img/logo.png" alt="DiiFrame" data-holder-rendered="true" />

                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                                    <a target="_blank" href="https://lobianijs.com">
                                        Mas Arte de Mexico S.A.
                                    </a>
                                </h2>
                                <div>455 Foggy Heights, AZ 85004, US</div>
                                <div>(123) 456-789</div>
                                <div>ventas@diiframe.com.mx</div>
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                <div class="text-gray-light">Cliente:</div>
                                <h2 class="to">John Doe</h2>
                                <div class="address">796 Silver Harbour, TX 79273, US</div>
                                <div class="email"></div>
                                <div class="celular"></div>
                            </div>
                            <div class="col invoice-details">
                                <h1 class="text-warning">Pedido No. <?php echo $_GET['Nota_ID'];?></h1>
                                <input id="Nota_ID" class="d-none" value="<?php echo $_GET['Nota_ID'];?>">
                                <div class="date">Date of Invoice: 01/10/2018</div>
                                <div class="date">Due Date: 30/10/2018</div>
                            </div>
                        </div>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-left">Producto</th>
                                    <th class="text-right">Tamaño</th>
                                    <th class="text-right">Cantidad</th>
                                    <th class="text-right">Precio</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_Pedido">
                                <tr>
                                    <td class="no">04</td>
                                    <td class="text-left">
                                        <h3>
                                            <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                                Youtube channel
                                            </a>
                                        </h3>
                                        <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                            Useful videos
                                        </a>
                                        to improve your Javascript skills. Subscribe and stay tuned :)
                                    </td>
                                    <td class="unit">$0.00</td>
                                    <td class="qty">100</td>
                                    <td class="total">$0.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">SUBTOTAL</td>
                                    <td id="subtotal"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">I.V.A. 16%</td>
                                    <td id="impuestos"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"> TOTAL</td>
                                    <td id="total">$6,500.00</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="thanks">¡Gracias!</div>
                        <div class="notices">
                            <div class="notice">
                                <p class="text-muted">Transacciones realizadas vía:</p>
                                <center><img src="/assets/img/openpay/openpay.png"><img src="/assets/img/openpay/radio_on.png"></center>
                            </div>
                        </div>
                    </main>
                    <footer>
                        Tus pagos se realizaron de forma segura con encriptación de 256 bits.
                    </footer>
                </div>
                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                <div></div>
            </div>
        </div>
    </div>

    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/scripts.html'; ?>
    <script type="text/javascript" src="/assets/js/pedido.js"></script>
</body>

</html>
