<?


include $_SERVER['DOCUMENT_ROOT'] . '/header.php'; ?>

<? if ($clNav->flag_auth == 1) { ?>
    <style>

        .bt_gray2 {
            background-color: #474747;
            transition: background-color 0.2s;
            color: white;

            border-radius: 10px;
            text-decoration: none;
            display: block;
            padding: 20px;
        }

        .bt_gray2:hover {
            background-color: #565656;
        }

        .bt_gray2:active {
            background-color: #3a3a3a;
        }

        .btYellow2 {

            transition: background-color 0.2s;
            cursor: pointer;
            background-color: #dccc47;
            border: 1px solid #eeeeee;
            box-shadow: 0 0 7px -3px #000;
        }

        .btYellow2:hover {
            background-color: #ecda4b;

        }

        .btYellow2:active {
            background-color: #dcca48;

        }


        .btRed2 {

            transition: background-color 0.2s;
            cursor: pointer;
            background-color: #c53a3a;
            border: 1px solid #eeeeee;
            box-shadow: 0 0 7px -3px #000;
        }

        .btRed2:hover {
            background-color: #ec4b4b;

        }

        .btRed2:active {
            background-color: #dc4848;

        }
    </style>

    <div class="dialog_calendar modal-form">

        <div style="background: #d3d3d3;text-align: left;color: #000;padding: 10px 10px 10px 30px;font-size: 16px;">
            <span onclick="$('.dialog_calendar').css({display:'none'});$('#fade').css({display:'none'});"
                  style="cursor: pointer; float: right;width: 16px;height: 16px;display: block; background: url('/img/close2.png');"></span>Урок
        </div>

        <div style="           overflow-y: auto; text-align: left;">

            <div style="padding: 10px;text-align: center;"><a href="/lessons" class="bt_gray2" style=" ">Перейти к
                    уроку</a>
            </div>
            <div style="padding: 10px;">
                <?

                if (intval($clNav->flag_uchitel) == 1)  //это учитель
                {
                    echo '<div style="color: #000">Ученик:</div>';
                    ?>
                    <select class="select_uchenik">
                        <?

                        $r = $clMysql->query("SELECT id,name,email FROM profile WHERE flag_uchitel=0 ORDER BY name asc");

                        while ($row = $r->fetch_row()) {

                            ?>
                            <option value="<?= $row[0] ?>"><?= $row[1] . ' [' . $row[2] . ']' ?></option><?
                        }

                        ?>
                    </select>

                    <?
                }


                ?>

                <input type="hidden" value="" class="id_row">
                <input type="hidden" value="" class="data_db">
                <p style="color: #000;text-align: left;padding: 0 0 10px 0; margin: 0;">Тема</p>
                <label>
                    <input type="text" class="input-field input_tema" value="">
                </label>
                <p style="color: #000;text-align: left;padding: 0 0 10px 0; margin: 20px 0 0 0;">Начало занятия</p>
                <label>
                    <input type="text" value="" disabled="disabled" class="input-field input_date"
                           style="background-color: #f6f6f6">
                </label>
                <p style="color: #000;text-align: left;padding: 0 0 10px 0; margin: 20px 0 0 0;">Длительность</p>
                <label>
                    <select class="input-field" style="width: 100%">
                        <option value="60 минут">60 минут</option>

                    </select>
                </label>
                <div style="padding-top: 20px;">
                    <input type="button" value="Сохранить" onclick="save_calendar()" class="btYellow2 btDialogCalendar">
                    <input type="button" value="Удалить" onclick="remove_calendar();" class="btRed2"
                           style=" float: right;">
                </div>

            </div>
            body

        </div>

    </div>
    <div id='calendar'></div>


    <script type="text/javascript">
        function save_calendar() {

            let uchenic_id = $('.select_uchenik option:selected').val();
            let id_row = $('.id_row').val();
            let tema = $('.input_tema').val();
            let data = $('.input_date').val();


            $.post('/calendar/srSaveCalendar.php', ({
                'uchenic_id': uchenic_id,
                'id': id_row,
                'tema': tema,
                'data': data
            }), function (h) {
                // console.log(h);
            });

            $('.dialog_calendar').css({display:'none'});
            $('.fade').css({display:'none'});
            location.reload();
        }

        function remove_calendar() {

            let id_row = $('.id_row').val();
            $.post('/calendar/srDeleteCalendar.php', ({'id': id_row}), function (h) {
                location.reload();
            });
        }


        function open_dialog() {


        }

        $(document).ready(function () {

            setTimeout(function () {
                $('.fc-timegrid-slots td').click(function () {


                    open_dialog();
                })
            }, 100)

        })

    </script>


<?php } else { ?>

<?php } ?>



<? include $_SERVER['DOCUMENT_ROOT'] . '/footer.php'; ?>
