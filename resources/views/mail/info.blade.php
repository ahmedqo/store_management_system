<table style="width: 100%;">
    <tr>
        <td>
            <div style="padding: 64px 16px;">
                <img src="{{ asset('img/logo.svg') }}?v={{ env('APP_VERSION') }}" alt="logo"
                    style="display: block; width: 120px; margin: 0 auto 20px auto;" />
                <section
                    style="
						color: #1d1d1d;
						border-radius: 8px;
						width: 100%;
						max-width: 500px;
						padding: 32px;
						margin: 0 auto;
						border: 1px solid #d1d1d1;
						box-sizing: border-box;
						box-shadow: #1D1D1D15 0px 3px 12px, #1D1D1D15 0px 25px 20px -20px;
					">
                    <h1
                        style="
                         margin: 0;
                         font-family: Tahoma, Verdana, Segoe, sans-serif;
                         font-size: 26px;
                         font-weight: 900;
                         letter-spacing: normal;
                         text-align: center;
                     ">
                        {{ $data['content'] }}
                    </h1>
                    @if ($data['ref'])
                        <a href="{{ route('views.guest.quote', $data['ref']) }}" target="_blank"
                            style="
                            text-decoration: none;
                            display: block;
                            color: #fcfcfc;
                            background-color: #03A9F4;
                            border-radius: 8px;
                            width: max-content;
                            font-weight: 900;
                            font-family: Tahoma, Verdana, Segoe, sans-serif;
                            font-size: 20px;
                            padding: 10px 40px;
                            margin: 40px auto 0 auto;
                        ">
                            {{ __('View Quotation') }}
                        </a>
                    @endif
                </section>
            </div>
        </td>
    </tr>
</table>
