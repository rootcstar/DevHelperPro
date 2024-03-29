
@extends('layout.app-layout')


@section('content')

    <h3>
        <button class="btn btn-outline-success" href="javascript:void(0);" id="json2xml" onclick="switchParser('json2xml');">JSON 2 XML</button> |
        <button class="btn btn-outline-success" href="javascript:void(0);" id="xml2json" onclick="switchParser('xml2json');">XML 2 JSON</button>
    </h3>
    <div class="form-group">
        <textarea class="form-control" rows="10" id="input" name="text" placeholder="Input" style="white-space: pre;"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-outline-success" onclick="parseData()">Convert</button>
        <button class="btn btn-outline-success" onclick="compressData()">Minify</button>
        <button class="btn btn-outline-success" onclick="copyData('input')" data-toggle="tooltip" title="Copy to clipboard">Copy Input</button>
        <button class="btn btn-outline-primary" onclick="clearInput()">Clear Input</button>
        <button class="btn btn-outline-secondary" onclick="clearAll()">Clear All</button>
    </div>
    <div class="form-group">
        <textarea readonly class="form-control" rows="10" id="output" name="text" placeholder="Output" style="white-space: pre;"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-outline-success" onclick="copyData('output')" data-toggle="tooltip" title="Copy to clipboard">Copy Output</button>
        <button class="btn btn-outline-primary" onclick="clearOutput()">Clear Output</button>
    </div>

@endsection

@section('scripts')
    <script>
        const TYPES = ["json2xml", "xml2json"];
        var current_type = "json2xml",
            x2js = new X2JS,
            switchParser = e => {
                document.getElementById(current_type).style.color = "#007bff", TYPES.includes(e) && (current_type = e), document.getElementById(current_type).style.color = "#ff5200", window.localStorage.setItem("converter_type", current_type);
                var t = window.localStorage.getItem(current_type);
                t ? !0 === isValidInputData(current_type, t) ? document.getElementById("input").value = t : (window.localStorage.removeItem(current_type), clearInput()) : clearInput();
                clearOutput()
            },
            validateJson = e => {
                try {
                    JSON.parse(e)
                } catch (e) {
                    return e
                }
                return !0
            },
            validateXml = e => {
                const t = (new window.DOMParser).parseFromString(e, "text/xml");
                return !(t.getElementsByTagName("parsererror").length > 0) || t.getElementsByTagName("parsererror")[0].getElementsByTagName("div")[0].innerHTML
            },
            isValidInputData = (e, t) => {
                let r;
                switch (e) {
                    case "json2xml":
                        r = validateJson(t);
                        break;
                    case "xml2json":
                        r = validateXml(t);
                        break;
                    default:
                        r = "Invalid type"
                }
                return r
            },
            initPage = () => {
                let e = window.localStorage.getItem("converter_type");
                e && TYPES.includes(e) ? current_type = e : window.localStorage.setItem("converter_type", current_type), document.getElementById(current_type).style.color = "#ff5200";
                var t = window.localStorage.getItem(current_type);
                if (t) {
                    var r = isValidInputData(current_type, t);
                    !0 === r ? document.getElementById("input").value = t : (window.localStorage.removeItem(current_type), console.log(r))
                }
            };
        initPage();
        var parseXml = e => {
                return (new window.DOMParser).parseFromString(e, "text/xml")
            },
            parseInputData = (e, t) => {
                let r = t;
                switch (e) {
                    case "json2xml":
                        r = vkbeautify.xml(x2js.json2xml_str(JSON.parse(t.trim())));
                        break;
                    case "xml2json":
                        r = vkbeautify.json(x2js.xml_str2json(t.trim()), 4);
                        break;
                    default:
                        r = "Invalid type"
                }
                return r
            },
            parseData = () => {
                var e = document.getElementById("input").value;
                if (e) {
                    var t = isValidInputData(current_type, e);
                    !0 === t ? (document.getElementById("output").value = parseInputData(current_type, e), window.localStorage.setItem(current_type, e)) : document.getElementById("output").value = current_type.toUpperCase() + " validation: " + t
                } else document.getElementById("output").value = "Input is empty"
            },
            compressInputData = (e, t) => {
                let r = t;
                switch (e) {
                    case "json2xml":
                        r = vkbeautify.xmlmin(x2js.json2xml_str(JSON.parse(t.trim())), !0);
                        break;
                    case "xml2json":
                        r = vkbeautify.jsonmin(JSON.stringify(x2js.xml_str2json(t.trim())));
                        break;
                    default:
                        r = "Invalid type"
                }
                return r
            },
            compressData = () => {
                var e = document.getElementById("input").value;
                if (e && "" !== e.trim()) {
                    var t = isValidInputData(current_type, e);
                    !0 === t ? (document.getElementById("output").value = compressInputData(current_type, e), window.localStorage.setItem(current_type, e)) : document.getElementById("output").value = current_type.toUpperCase() + " validation: " + t
                } else document.getElementById("output").value = "Input value is empty"
            },
            copyData = e => {
                var t = document.getElementById(e);
                t.select(), t.setSelectionRange(0, 99999), document.execCommand("copy")
            },
            clearInput = () => {
                document.getElementById("input").value = ""
            },
            clearOutput = () => {
                document.getElementById("output").value = ""
            },
            clearAll = () => {
                clearOutput(), clearInput()
            };
    </script>

@endsection
