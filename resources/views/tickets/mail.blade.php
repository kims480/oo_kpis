<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        /* Base */

        body,
        body *:not(html):not(style):not(br):not(tr):not(code) {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif,
                'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            position: relative;
        }

        body {
            -webkit-text-size-adjust: none;
            background-color: #ffffff;
            color: #718096;
            height: 100%;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }

        p,
        ul,
        ol,
        blockquote {
            line-height: 1.4;
            text-align: left;
        }

        a {
            color: #3869d4;
        }

        a img {
            border: none;
        }

        /* Typography */

        h1 {
            color: #3d4852;
            font-size: 18px;
            font-weight: bold;
            margin-top: 0;
            text-align: left;
        }

        h2 {
            font-size: 16px;
            font-weight: bold;
            margin-top: 0;
            text-align: left;
        }

        h3 {
            font-size: 14px;
            font-weight: bold;
            margin-top: 0;
            text-align: left;
        }

        p {
            font-size: 16px;
            line-height: 1.5em;
            margin-top: 0;
            text-align: left;
        }

        p.sub {
            font-size: 12px;
        }

        img {
            max-width: 100%;
        }

        /* Layout */

        .wrapper {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
            background-color: #edf2f7;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        .text-sm {
            font-size: 0.875rem
                /* 14px */
            ;
            line-height: 1.25rem
                /* 20px */
            ;
        }

        .table-auto {
            table-layout: auto;
        }

        .w-full {
            width: 100%;
        }

        .content {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        /* Header */

        .header {
            padding: 25px 0;
            text-align: center;
        }

        .header a {
            color: #3d4852;
            font-size: 19px;
            font-weight: bold;
            text-decoration: none;
        }

        /* Logo */

        .logo {
            height: 75px;
            max-height: 75px;
            width: 75px;
        }

        /* Body */

        .body {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
            background-color: #edf2f7;
            border-bottom: 1px solid #edf2f7;
            border-top: 1px solid #edf2f7;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        .inner-body {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 570px;
            background-color: #ffffff;
            border-color: #e8e5ef;
            border-radius: 2px;
            border-width: 1px;
            box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015);
            margin: 0 auto;
            padding: 3px;
            width: 570px;
        }

        .min-w-max {
            min-width: max-content;
        }

        .text-center {
            text-align: center;
        }

        .px-6 {
            padding-left: 1.5rem
                /* 24px */
            ;
            padding-right: 1.5rem
                /* 24px */
            ;
        }

        .py-3 {
            padding-top: 0.75rem
                /* 12px */
            ;
            padding-bottom: 0.75rem
                /* 12px */
            ;
        }

        /* Subcopy */

        .subcopy {
            border-top: 1px solid #e8e5ef;
            margin-top: 25px;
            padding-top: 25px;
        }

        .subcopy p {
            font-size: 14px;
        }

        /* Footer */

        .footer {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 570px;
            margin: 0 auto;
            padding: 0;
            text-align: center;
            width: 570px;
        }

        .footer p {
            color: #b0adc5;
            font-size: 12px;
            text-align: center;
        }

        .footer a {
            color: #b0adc5;
            text-decoration: underline;
        }

        /* Tables */

        .table table {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
            margin: 30px auto;
            width: 100%;
        }

        .table th {
            border-bottom: 1px solid #edeff2;
            margin: 0;
            padding-bottom: 8px;
        }

        .table td {
            color: #74787e;
            font-size: 15px;
            line-height: 18px;
            margin: 0;
            padding: 10px 0;
        }

        .content-cell {
            max-width: 100vw;
            padding: 32px;
        }

        /* Buttons */

        .action {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
            margin: 30px auto;
            padding: 0;
            text-align: center;
            width: 100%;
        }

        .button {
            -webkit-text-size-adjust: none;
            border-radius: 4px;
            color: #fff;
            display: inline-block;
            overflow: hidden;
            text-decoration: none;
        }

        .button-blue,
        .button-primary {
            background-color: #2d3748;
            border-bottom: 8px solid #2d3748;
            border-left: 18px solid #2d3748;
            border-right: 18px solid #2d3748;
            border-top: 8px solid #2d3748;
        }

        .button-green,
        .button-success {
            background-color: #48bb78;
            border-bottom: 8px solid #48bb78;
            border-left: 18px solid #48bb78;
            border-right: 18px solid #48bb78;
            border-top: 8px solid #48bb78;
        }

        .button-red,
        .button-error {
            background-color: #e53e3e;
            border-bottom: 8px solid #e53e3e;
            border-left: 18px solid #e53e3e;
            border-right: 18px solid #e53e3e;
            border-top: 8px solid #e53e3e;
        }

        /* Panels */

        .panel {
            border-left: #2d3748 solid 4px;
            margin: 21px 0;
        }

        .panel-content {
            background-color: #edf2f7;
            color: #718096;
            padding: 16px;
        }

        .panel-content p {
            color: #718096;
        }

        .panel-item {
            padding: 0;
        }

        .panel-item p:last-of-type {
            margin-bottom: 0;
            padding-bottom: 0;
        }

        /* Utilities */

        .break-all {
            word-break: break-all;
        }

        .greeting {
            color: darkblue;
            font-size: 1rem;
            font-weight: 600;
            float: left;
            width: 100%;

        }

        .bg-gray-200 {
            --tw-bg-opacity: 1;
            background-color: rgb(229 231 235 / var(--tw-bg-opacity));
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity));
        }

        .uppercase {
            text-transform: uppercase;
        }

        .leading-normal {
            line-height: 1.5;
        }

        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<body>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="header">
                            <a href="{{ config('app.url') }}" style="display: inline-block;">
                                @if (trim(config('app.name')) === 'Laravel')
                                @else
                                    {{ trim(config('app.name')) }}
                                @endif
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="100%" cellpadding="0" cellspacing="0"
                                role="presentation">
                                <!-- Body content -->

                                <!-- greeting-->
                                <tr>
                                    <td class="greeting">
                                        Dear {{ $data['userData']->name }}
                                    </td>
                                </tr>
                                <!-- message-->
                                <tr>
                                    <td class="message">
                                        <div class="px-6 py-3">
                                        TT {{ $data['ticket']->tt_number }} has been assigned to you please do the needful.
                                        </div>
                                    </td>
                                </tr>

                                {{-- TT Details --}}
                                <tr>
                                    <td class="content-cell">
                                        {{-- tt details --}}
                                        <table class='min-w-max w-full table-auto text-sm' id='tickets-table'>
                                            <tbody>
                                                <tr>
                                                    <th
                                                        class="bg-gray-200 px-6 text-gray-600 uppercase text-sm leading-normal">
                                                        {{ __('models/tickets.fields.tt_number') }}</th>
                                                    <td class="py-3 px-6 text-left">{{ $data['ticket']->tt_number }}
                                                    </td>
                                                    <th class="bg-gray-200 px-6 text-gray-600 uppercase text-sm leading-normal">
                                                        {{ __('models/tickets.fields.site_id') }}</th>
                                                        <td class="py-3 px-6 text-left">
                                                            {{ $data['ticket']->site->site_id }}</td>
                                                </tr>
                                                <tr>
                                                    <th
                                                        class="bg-gray-200 px-6 text-gray-600 uppercase text-sm leading-normal">
                                                        {{ __('models/tickets.fields.alarm_name') }}</th>
                                                    <td class="py-3 px-6 text-left">{{ $data['ticket']->alarm->name }}
                                                    </td>
                                                    <th
                                                        class="bg-gray-200 px-6 text-gray-600 uppercase text-sm leading-normal">
                                                        {{ __('models/tickets.fields.description') }}</th>
                                                    <td class="py-3 px-6 text-left">{{ $data['ticket']->description }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th
                                                        class="bg-gray-200 px-6 text-gray-600 uppercase text-sm leading-normal">
                                                        {{ __('models/tickets.fields.categ') }}</th>
                                                    <td class="py-3 px-6 text-left">
                                                        {{ $data['ticket']->tt_categ->name }}</td>
                                                    <th
                                                        class="bg-gray-200 px-6 text-gray-600 uppercase text-sm leading-normal">
                                                        {{ __('models/tickets.fields.contractor') }}</th>
                                                    <td class="py-3 px-6 text-left">
                                                        {{ $data['ticket']->tt_contractor->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th
                                                        class="bg-gray-200 px-6 text-gray-600 uppercase text-sm leading-normal">
                                                        {{ __('models/tickets.fields.scope') }}</th>
                                                    <td class="py-3 px-6 text-left">
                                                        {{ $data['ticket']->tt_scope->name }}</td>
                                                    <th
                                                        class="bg-gray-200 px-6 text-gray-600 uppercase text-sm leading-normal">
                                                        {{ __('models/tickets.fields.created_at') }}</th>
                                                    <td class="py-3 px-6 text-left">{{ $data['ticket']->created_at }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                {{-- Action button --}}
                                <tr>
                                    <td>
                                        {{-- Action --}}
                                        <table class="action" align="center" width="100%" cellpadding="0"
                                            cellspacing="0" role="presentation">
                                            <tr>
                                                <td align="center">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                        role="presentation">
                                                        <tr>
                                                            <td align="center">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    role="presentation">
                                                                    <tr>
                                                                        <td>
                                                                            <a class="button button-primary"
                                                                                target="_blank" rel="noopener"
                                                                                href="{{ env('APP_URL') }}/admin/tickets/{{ $data['ticket']->id }}">
                                                                                Open TT </a>

                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0"
                                role="presentation">
                                <tr>
                                    <td class="content-cell" align="center">
                                        ©{{date('Y')}}  {{config('app.name')}}  All rights reserved.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>

{{-- @foreach ($data['messageMarkDown'] as $line)
        <div>{{$line}}</div>
    @endforeach --}}
