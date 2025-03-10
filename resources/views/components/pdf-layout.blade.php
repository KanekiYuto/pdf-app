<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="utf-8"/>
    <title></title>
    <style>
        body {
            font-family: DejaVu SansDejaVu Sans, system-ui;
            padding: 0;
            margin: 0;
            word-wrap: break-word;
        }

        .layout {
            width: 100vw;
            height: 100vh;
        }

        .emphasize {
            color: #CF163E;
        }

        .underline {
            text-decoration: underline;
        }

        .paragraph {
            font-size: 0;
            margin-bottom: 8px;
        }

        .paragraph .text {
            letter-spacing: 0.05rem;
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="layout">
    {{ $slot }}
</div>
</body>
