<?php




         ?>

<script>

    // function set_data(date,title)
    // {
    //
    //     calendar.batchRendering(function() {
    //         calendar.changeView('dayGridMonth');
    //         calendar.addEvent({ title:title, start: date });
    //     });
    //
    // }
    //
    //
    // function remove_data(date,title)
    // {
    //
    //     calendar.batchRendering(function() {
    //         calendar.changeView('dayGridMonth');
    //         calendar.remove();
    //     });
    //
    // }
    document.addEventListener('DOMContentLoaded', function () {
        let calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            // themeSystem: 'bootstrap',
            initialView: 'timeGridWeek',
            //headerToolbar: {
            //    center: 'dayGridMonth,timeGridWeek,listWeek'
            //},
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            views: {
                dayGridMonth: { // name of view
                    titleFormat: {year: 'numeric', month: '2-digit', day: '2-digit'}
                },
                timeGridWeek: { // name of view
                    slotLabelFormat: {
                        hour: 'numeric',
                        minute: '2-digit',
                    },
                    slotMinTime: '08:00:00',
                    slotMaxTime: '25:00:00',
                    slotLabelInterval: '01:00',
                    scrollTime: '12:00',
                },
            },
            expandRows: true,
            nowIndicator: true,
            dayMaxEvents: true,
            selectable: true,
            eventStartEditable: true,

            eventOverlap: false,
            dateClick: function (info) {  //создание нового урока
                console.log(" " + JSON.stringify(info))

                let s = info.date.toLocaleString();


                let a = s.split(' ');
                let date = a[0];
                date = date.replace(',', '');
                let time = a[1];
                time = time.split(':')[0] + ':' + time.split(':')[1];
                let data_db = date.split('.')[2] + '-' + date.split('.')[1] + '-' + date.split('.')[0];
                $('.input_tema').val('');
                $('.id_row').val('')
                $('.input_date').val(date + " " + time)
                $('.data_db').val(data_db);

//alert('test');

                let date_urok = info.dateStr;
                $('.dialog_calendar input:eq(1)').val(date + " " + time);
                $('.dialog_calendar input:eq(1)').val(date + " " + time);
                $('.dialog_calendar').css({display: 'block'});


                $("#dialog-lesson").dialog("open");
                $("#id_time_start").val(info.dateStr).hide(); //для компьютера, нужно скрыть
                $("label[for=id_time_start]").hide(); //лэйбел (текст рядом)
                $("#id_time_start_prc").val(info.date.toLocaleString().replace(',', '')); // текст для людей todo удалить секунды
                $('#id_subject').trigger('focus');
                $('.delete-btn').hide();
            },
            eventClick: function (info) {   //редактирование урока

                let s = info.event.start.toLocaleString();

                $('.input_tema').val(info.event.title)
                let a = s.split(' ');
                let date = a[0];
                date = date.replace(',', '');
                let time = a[1];
                time = time.split(':')[0] + ':' + time.split(':')[1];
                let data_db = date.split('.')[2] + '-' + date.split('.')[1] + '-' + date.split('.')[0];


                $('.data_db').val(data_db);


                let date_urok = info.dateStr;
                $('.input_date').val(date + " " + time);
                $('.dialog_calendar').css({display: 'block'});


                $('.id_row').val(info.event.extendedProps.id_row)

                // alert('test');
                $("#dialog-lesson").dialog("open");
                //console.log(info);  //вывод в консоль#}
                $("#id_time_start").val(info.event.startStr).hide(); //для компьютера, нужно скрыть
                $("label[for=id_time_start]").hide(); //лэйбел (текст рядом)
                $("#id_time_start_prc").val(info.event.start.toLocaleString().replace(',', ''));  //todo удалить секунды
                $("#id_duration").val((info.event._instance.range.end - info.event._instance.range.start) / 60000);
                $("#id_subject").val(info.event.title).trigger('focus');
                $('.delete-btn').show();
            }, eventAllow: function (dropInfo, draggedEvent) {
                console.log(JSON.stringify(dropInfo));
                console.log('dateStart -' + dropInfo.start);


//время надо добавить---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

                let d2 = new Date();

                let startYear = dropInfo.start.getFullYear();
                let startMonth = dropInfo.start.getMonth();
                let startDay =  dropInfo.start.getDate()
                let startHours = dropInfo.start.getHours();
                let startMinutes = dropInfo.start.getMinutes();
                let startSeconds = dropInfo.start.getSeconds();


                let endYear = d2.getFullYear();
                let endMonth = d2.getMonth();
                let endDay = d2.getDate();
                let endHours = d2.getHours();
                let endMinutes = d2.getMinutes();
                let endSeconds = d2.getSeconds();




                if (startMonth <= 9)
                    startMonth = '0'+startMonth;
                if (startDay <= 9)
                    startDay = '0'+startDay;
                if (startHours <= 9)
                    startHours = '0'+startHours;
                if (startMinutes <= 9)
                    startMinutes = '0'+startMinutes;
                if (startSeconds <= 9)
                    startSeconds = '0'+startSeconds;


                if (endMonth <= 9)
                    endMonth = '0'+endMonth;
                if (endDay <= 9)
                    endDay = '0'+endDay;

                if (endHours <= 9)
                    endHours = '0'+endHours;
                if (endMinutes <= 9)
                    endMinutes = '0'+endMinutes;
                if (endSeconds <= 9)
                    endSeconds = '0'+endSeconds;





                let res = startYear+""+startMonth+""+startDay+""+(startHours)+""+startMinutes+""+startSeconds;


                let res2 =endYear+""+endMonth+""+endDay+""+(endHours)+""+endMinutes+""+endSeconds;


               console.log("d="+res);
               console.log("d2="+res2);

                return res >= res2;

                //   alert(d);
                //   alert(d2);
                //  let d =   dropInfo.start.getFullYear()+ ""+ dropInfo.start.getMonth() +""+   dropInfo.start.getDate();

                //   alert(d);
                // return   < new;


            },
            eventDrop: function (info) {   //после отпускания урока (когда тащишь и бросаешь)

                let s = info.event.start.toLocaleString();

                $('.input_tema').val(info.event.title)
                let a = s.split(' ');
                let date = a[0];
                date = date.replace(',', '');
                let time = a[1];
                time = time.split(':')[0] + ':' + time.split(':')[1];

                let id_row = info.event.extendedProps.id_row;
                let date_time = date + " " + time;

                $.post('/calendar/srDragSaveCalendar.php', ({'id': id_row, 'data': date_time}), function (h) {

                });

                $("#dialog-lesson").dialog("open");
                $("#id_time_start").val(info.event.startStr).hide(); //для компьютера, нужно скрыть
                $("label[for=id_time_start]").hide(); //лэйбел (текст рядом)
                $("#id_time_start_prc").val(info.event.start.toLocaleString().replace(',', ''));  //todo удалить секунды
                $("#id_duration").val((info.event._instance.range.end - info.event._instance.range.start) / 60000);
                $("#id_subject").val(info.event.title).trigger('focus');
                $('.delete-btn').show();
            },
            timeZone: 'local',
            allDaySlot: false,
            eventSources: [
                {
                    url: '/myfeed.php',
                }
            ],
            events: [
                <?php

                $i = 0;
                $r2 =      $clMysql->query("SELECT * FROM raspisanie WHERE profile_id='$clNav->profile_id'");
                while ($row2 = $r2->fetch_array())
                {$i++;
                ?>

                {

                    backgroundColor: '#a941c2',
                    id: '<?=$row2['id']?>',
                    title: '<?=$row2['title']?>',
                    start: '<?=$row2['data_yroka']?>',
                    end: '<?=$row2['data_yroka']?>',
                    id_row: '<?=$row2['id']?>'
                }



            <?

            if ($i <> $r2->num_rows)
            {
                ?>,<?
            }
            ?>





        <?

        }
        ?>


]
        });
        calendar.setOption('locale', 'ru');
        calendar.render();


        $("#dialog-lesson").dialog({  //модалка
            autoOpen: false,
            height: 410,
            width: 350,
            resizable: false,
            modal: true,
            closeOnEscape: true,
            open: function (event, ui) {
                $('.ui-widget-overlay').bind('click', function () {
                    $('#dialog-lesson').dialog('close');
                });
            },
            show: {
                effect: 'fade',
                duration: 200
            },
            hide: {
                effect: 'fade',
                duration: 200
            },
            close: function () {
                window.location.reload();
                window.location.reload();
            },
            title: 'Урок',
            closeText: "hide",
            classes: {
                "ui-dialog": "modal-content",
                "ui-dialog-titlebar": "modal-header",
                "ui-dialog-title": "modal-title",
                "ui-dialog-titlebar-close": "close",
                "ui-dialog-content": "modal-body",
                "ui-dialog-buttonpane": "modal-footer"
            },
        });

    })


</script>


<style>
    #calendar {
        background-color: #bdaeff;
        color: #000e;
        padding: 5px;
    }

    .fc-event-main-frame {
        cursor: pointer;
    }

    #dialog-lesson {
        background-color: white;
    }

    #calendar > div.fc-view-harness.fc-view-harness-active {
        height: 876px !important;
    }

    .ui-widget-overlay {
        background-color: black;
        opacity: .3;
    }

</style>