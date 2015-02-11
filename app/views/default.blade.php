<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <meta charset="utf-8">
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <style>
            * { font-family:Arial; }

            h2 { padding:0 0 5px 5px; }

            h2 a { color: #224f99; }

            a { color:#999; text-decoration: none; }

            a:hover { color:#802727; }

            p { padding:0 0 5px 0; }

            input { padding:5px; border:1px solid #999; border-radius:4px; 
                    -moz-border-radius:4px; 
                    -web-kit-border-radius:4px; 
                    -khtml-border-radius:4px; }
            .input-field-style {
                display: block;
                margin: 10px auto;
                padding:5px; border:1px solid #999; border-radius:4px; 
                -moz-border-radius:4px; 
                width: 70%;
                -web-kit-border-radius:4px; 
                -khtml-border-radius:4px; 
            }
            input.invalid, textarea.invalid{
                border: 2px solid red;
            }

            input.valid, textarea.valid{
                border: 2px solid green;
            }
            .input-field-style-question {
                width: 90%;
                padding:10px; 
                margin: 10px auto; 
                display: block;
                font-size: 25px;
                border:1px solid #999; 
                border-radius:4px; 
                -moz-border-radius:4px; 
                -web-kit-border-radius:4px; 
                -khtml-border-radius:4px; 
            }
            .form-style {
                background-color: #009200;
                margin: 0 auto;
                width: 25%;
                padding: 10px;
                border-radius: 15px;
            }

            .form-button {
                margin: 0 40%;
                padding: 10px;

            }

        </style>
    </head>

    <body>

        @yield('content')

    </body>

</html>