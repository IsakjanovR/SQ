<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <style type="text/css">

        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }

        label, input {
            display: block;
        }

        input.text {
            margin-bottom: 12px;
            width: 95%;
            padding: .4em;
        }

        fieldset {
            padding: 0;
            border: 0;
            margin-top: 25px;
        }

        h1 {
            font-size: 1.2em;
            margin: .6em 0;
        }

        div#users-contain {
            width: 350px;
            margin: 20px 0;
        }

        div#users-contain table {
            margin: 1em 0;
            border-collapse: collapse;
            width: 100%;
        }

        div#users-contain table td, div#users-contain table th {
            border: 1px solid #eee;
            padding: .6em 10px;
            text-align: left;
        }

        .ui-dialog .ui-state-error {
            padding: .3em;
        }

        .validateTips {
            border: 1px solid transparent;
            padding: 0.3em;
        }
    </style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(function () {
                var dialog, form,

                    name = $("#name"),
                    city = $("#city_name"),
                    phone_namber = $("#phone_namber"),
                    allFields = $([]).add(name).add(city).add(phone_namber),


                    dialog = $("#dialog-form").dialog({
                        autoOpen: false,
                        height: 350,
                        width: 350,
                        modal: true,
                        close: function () {
                            allFields.removeClass("ui-state-error");
                        }
                    });


                $("#create-user").button().on("click", function () {
                    dialog.dialog("open");
                });


                $("#edit-form").dialog({
                    autoOpen: false,
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "explode",
                        duration: 1000
                    }
                });

                $(".edit").on("click", function () {
                    var clickedID = this.id.split("-");
                    var edit = clickedID[1];
                    $("#edit-form").dialog("open");
                    $.post(
                        'check_user', {edit: edit}, function (result) {
                            if (result.type == 'error') {
                                alert('error');
                                return (false);
                            }
                            else {
                                console.log(result)
                                var inputName = '';
                                var inputPhone = '';
                                var inputId = '';
                                $(result.user_id).each(function () {
                                    inputName += '<input name="nameEdit" value="' + $(this).attr("username")+'">';
                                    inputPhone += '<input name="phoneEdit" value="' + $(this).attr("phone")+'">';
                                    inputId += '<input name="userId" value="' + $(this).attr("id")+'" style="display: none">';
                                });

                                $('#edit-name').html('' + inputName);
                                $('#edit-phone').html('' + inputPhone);
                                $('#edit-id').html('' + inputId);
                            }
                        }, 'json'
                    );
                });


                $(".delete").click(function () {
                    var clickedID = this.id.split("-");
                    var delet = clickedID[1];
                    $.post(
                        'delete_user', {delet: delet}, function (responsd) {
                            $('#tab-' + delet).fadeOut("slow");
                        }, 'text'
                    );
                });
            });
        });
    </script>

</head>



<body>



<div id="dialog-form">
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
    <label for="name">Фамилия Имя Отчество</label>
    <input type="text" name="user_name" id="name" class="text ui-widget-content ui-corner-all">
    <label for="city_name">Выберите Город Проживания</label>
    <select name="city" id="city_name">
        <?php foreach ($city as $value): ?>
            <option id="<?php echo $value['city_name']; ?>"
                    value="<?php echo $value['id']; ?>"><?php echo $value['city_name']; ?> </option>
        <?php endforeach; ?>
    </select>
    <label for="phone_namber">Номер телефона</label>
    <input type="number" name="phone_namber" id="phone_namber" class="text ui-widget-content ui-corner-all">
    <input type="submit" value="print">
    </form>
</div>





<div id="edit-form" title="Basic dialog">
    <?php echo form_open('main/update'); ?>
    <label for="name">Фамилия Имя Отчество</label>
    <p class="" id="edit-name"></p>

    <label for="phone_namber">Номер телефона</label>
    <p class="" id="edit-phone"></p>
    <p class="" id="edit-id"></p>
    <input type="submit" value="print">
    </form>
</div>




<div id="users-contain" class="ui-widget">
    <h1>Existing Users:</h1>
    <table id="users" class="ui-widget ui-widget-content">
        <thead>
        <tr class="ui-widget-header ">
            <th>Ф.И.О.</th>
            <th>Город</th>
            <th>Телефон</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $row): ?>
            <tr id="tab-<?php echo $row['id'] ?>">
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['city_name'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td>
                    <button id="del-<?php echo $row['id'] ?>" class="delete">delete</button>
                </td>
                <td>
                    <button id="edit-<?php echo $row['id'] ?>" class="edit">edit</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<button id="create-user">Create new user</button>


</body>
</html>