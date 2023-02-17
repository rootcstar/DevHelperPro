
@extends('layout.app-layout')


@section('content')


    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">JSON FORMATTER</h5>

                <div class="col-sm-10 mb-3">
                    <button id="translate" class="btn btn-primary validate">Validate</button>
                </div>
                <h5 id="result"></h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <textarea class="form-control" id="json-input" autocomplete="off" placeholder="Type or paste your JSON syntax here..." oninput='this.style.height = "";this.style.height = Math.min(800,this.scrollHeight) + "px"'></textarea>
                    </div>
                    <div class="col-md-6">
                        <pre id="json-display-blackbord" class="json-display-blackbord"></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection

    @section('scripts')
        <script>
            function resize_text_area(pixel) {
                var text = $("#json-input");
                text[0].style.height = 'auto'
                text[0].style.height = pixel + "px"
            }

            //handles main button with try-catch
            $(".validate").click(function () {
                var textValue = $("#json-input").val();
                if(textValue == ''){alert('Enter a JSON');return;}

                try {
                    var parsed_json = JSON.parse(textValue);
                } catch (err) {
                    $('#result').text('JSON is NOT valid!');
                    $('#result').css('color', 'red');
                    $('#result').css('font-weight', 'bolder');
                    $('#json-display-blackbord').jsonViewer(textValue, {collapsed: true, withQuotes: true, withLinks: false,rootCollapsable:false});
                    return;
                }

                $('#json-display-blackbord').jsonViewer(parsed_json, {collapsed: true, withQuotes: true, withLinks: false,rootCollapsable:false});




                var js = JSON.stringify(parsed_json, undefined, 4);
                $('.json-textarea').val(js);

                //behavior when NOT error
                $('#result').text('JSON is valid!'  );
                $('#result').css('color', 'green');



            });


        </script>

    @endsection
