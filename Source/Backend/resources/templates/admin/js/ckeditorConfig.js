ClassicEditor
    .create( document.querySelector( '#content' ), {
        cloudServices: {
            tokenUrl: 'https://41041.cke-cs.com/token/dev/h6MUMZHbxIUoqLlTHWaHCyjnGtusRcKDeu24YvkLpMFpZGhrHRG7IqmmBlaA',
            uploadUrl: 'https://41041.cke-cs.com/easyimage/upload/'
        },
        image: {
            // You need to configure the image toolbar, too, so it uses the new style buttons.
            toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],

            styles: [
                // This option is equal to a situation where no style is applied.
                'full',

                // This represents an image aligned to the left.
                'alignLeft',

                // This represents an image aligned to the right.
                'alignRight'
            ]
        }
    } )
    .then()
    .catch();
