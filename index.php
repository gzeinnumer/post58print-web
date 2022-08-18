<html>

<head>
    <style>
        #print {
            display: none;
        }

        #error {
            color: #E32D40;
        }
    </style>
</head>

<body>
    <p>
        <label>App Key</label>
        <input type="text" id="app-key" placeholder="Insert Your App Key">
    </p>
    <p>
        <label>App Port</label>
        <input type="text" id="app-port" value="1811">
    </p>

    <p id="error"></p>

    <button id="open">Open</button>
    <button id="print">Print</button>

    <p>
        ** Please, start Recta-Host before. <br>
        ** If you haven't install Recta-Host yet, goto
        <a href="https://github.com/adenvt/recta-host">here</a>
    </p>

    <script src="https://cdn.jsdelivr.net/npm/recta/dist/recta.js"></script>
    <script>
        var printer

        $('#open').click(() => {
            var key = $('#app-key').val()
            var port = $('#app-port').val()

            // Initial printer with key and port from form input
            printer = new Recta(key, port)
            // Opening printer
            printer.open().then(() => {
                // Show print button, it's hidden by default
                $('#print').show()
            }).catch((e) => {
                // Show Error if get an Error
                $('#error').text(e)
            })
        })

        $('#print').click(() => {
            printer.align('center')
                .text('Hello World !!')
                .bold(true)
                .text('This is bold text')
                .bold(false)
                .underline(true)
                .text('This is underline text')
                .underline(false)
                .barcode('UPC-A', '123456789012')
                .cut()
                .print()
        })
    </script>
</body>

</html>