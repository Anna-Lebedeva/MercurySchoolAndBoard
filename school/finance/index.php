<?php
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>


    <h1>Оплата занятий производится по следующим реквизитам:</h1>

<table>
    <tr>
        <td>
            <img class="bank-card-img" src="/img/finance/sber2.jpg" alt="">
        </td>
        <td>
            <span class="bank-card-text">Номер карты Сбербанк: 63900255 9036311627</span>
        </td>
    <tr>
        <td>
            <img class="bank-card-img" src="/img/finance/tink.png" alt="">
        </td>
        <td>
            <span class="bank-card-text">Номер карты Тинькофф: 4377 7237 4170 8568</span>
        </td>
    </tr>
    </tr>
</table>

    <style>
        #contacts {
            margin-top: 10px;
        }
        .button {
            padding: 1px 11px !important;
        }
        @media (min-width: 360px) {
            #contacts {
                margin-top: 300px;
            }
        }
    </style>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>