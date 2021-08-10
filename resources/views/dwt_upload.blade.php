<!DOCTYPE html>
<html>

<head>
    <title>Dynamic Web TWAIN for Laravel</title>
    <script src="{{ asset('Resources/dynamsoft.webtwain.initiate.js') }}" ></script>
    <script src="{{ asset('Resources/dynamsoft.webtwain.config.js') }}" ></script>
    <meta name="_token" content="{{csrf_token()}}" />
</head>

<body>
    <h3>Dynamic Web TWAIN for Laravel</h3>
    <div id="dwtcontrolContainer"></div>
    <input type="button" value="Load Image" onclick="loadImage();" />
    <input type="button" value="Scan Image" onclick="acquireImage();" />
    <input id="btnUpload" type="button" value="Upload Image" onclick="upload()">

    <script>
        var DWObject;
        Dynamsoft.DWT.Containers = [{
            ContainerId: 'dwtcontrolContainer',
            Width: '480px',
            Height: '640px'
        }];
        Dynamsoft.DWT.RegisterEvent('OnWebTwainReady', Dynamsoft_OnReady);
        Dynamsoft.DWT.ProductKey = "LICENSE-KEY";
        Dynamsoft.DWT.Load();

        function Dynamsoft_OnReady() {
            DWObject = Dynamsoft.DWT.GetWebTwain('dwtcontrolContainer');
            var token = document.querySelector("meta[name='_token']").getAttribute("content");
            DWObject.SetHTTPFormField('_token', token);
        }

        function loadImage() {
            var OnSuccess = function() {};
            var OnFailure = function(errorCode, errorString) {};

            if (DWObject) {
                DWObject.IfShowFileDialog = true;
                DWObject.LoadImageEx("", Dynamsoft.DWT.EnumDWT_ImageType.IT_ALL, OnSuccess, OnFailure);
            }
        }

        function acquireImage() {
            if (DWObject) {
                DWObject.IfShowUI = false;
                DWObject.IfDisableSourceAfterAcquire = true; // Scanner source will be disabled/closed automatically after the scan.
                DWObject.SelectSource(); // Select a Data Source (a device like scanner) from the Data Source Manager.
                DWObject.OpenSource(); // Open the source. You can set resolution, pixel type, etc. after this method. Please refer to the sample 'Scan' -> 'Custom Scan' for more info.
                DWObject.AcquireImage(); // Acquire image(s) from the Data Source. Please NOTE this is a asynchronous method. In other words, it doesn't wait for the Data Source to come back.
            }
        }

        function upload() {
            var OnSuccess = function(httpResponse) {
                alert("Succesfully uploaded");
            };

            var OnFailure = function(errorCode, errorString, httpResponse) {
                alert(httpResponse);
            };

            var date = new Date();
            DWObject.HTTPUploadThroughPostEx(
                "{{ route('dwtupload.upload') }}",
                DWObject.CurrentImageIndexInBuffer,
                '',
                date.getTime() + ".jpg",
                1, // JPEG
                OnSuccess, OnFailure
            );
        }
    </script>

</body>

</html>
