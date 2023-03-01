
@extends('layout.app-layout')


@section('content')

    <hr />
    <p>Paste Your JSON Here:</p>
    <textarea class="form-control" rows="10" id="json" class="text"></textarea>
    <br />
    <input id="quote" type="checkbox" checked="true" /> Wrap values in double quotes
    <br />
    <input id="labels" type="checkbox" checked="true" /> Include labels in first row
    <br />
    <button class="btn btn-outline-primary" id="convert">Convert to CSV</button>
    &nbsp;&nbsp;
    <button  class="btn btn-outline-primary" id="download">Download CSV</button>
    <textarea class="form-control" rows="10" id="csv" class="text"></textarea>

@endsection

@section('scripts')
    <script>
        function JSON2CSV(objArray) {
            var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;

            var str = '';
            var line = '';

            if ($("#labels").is(':checked')) {
                var head = array[0];
                if ($("#quote").is(':checked')) {
                    for (var index in array[0]) {
                        var value = index + "";
                        line += '"' + value.replace(/"/g, '""') + '",';
                    }
                } else {
                    for (var index in array[0]) {
                        line += index + ',';
                    }
                }

                line = line.slice(0, -1);
                str += line + '\r\n';
            }

            for (var i = 0; i < array.length; i++) {
                var line = '';

                if ($("#quote").is(':checked')) {
                    for (var index in array[i]) {
                        var value = array[i][index] + "";
                        line += '"' + value.replace(/"/g, '""') + '",';
                    }
                } else {
                    for (var index in array[i]) {
                        line += array[i][index] + ',';
                    }
                }

                line = line.slice(0, -1);
                str += line + '\r\n';
            }
            return str;

        }

        $("#convert").click(function() {
            var json = $.parseJSON($("#json").val());
            var csv = JSON2CSV(json);
            $("#csv").val(csv);
        });

        $("#download").click(function() {
            var json = $.parseJSON($("#json").val());
            var csv = JSON2CSV(json);
            window.open("data:text/csv;charset=utf-8," + escape(csv))
        });
    </script>

@endsection
