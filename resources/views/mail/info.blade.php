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
                    <p style="margin: 24px 0 18px 0; font-size: 18px; text-align: center; font-weight: 400;">
                        {{ $data['content'] }}
                    </p>
                </section>
            </div>
        </td>
    </tr>
</table>
