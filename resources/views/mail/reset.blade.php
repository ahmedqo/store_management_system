<table style="width: 100%;">
    <tr>
        <td>
            <div style="padding: 64px 16px;">
                <img src="{{ asset('img/logo-black.png') }}?v={{ env('APP_VERSION') }}" alt="logo"
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
                        {{ __('Did you forget your password?') }}
                    </h1>
                    <p style="margin: 24px 0 18px 0; font-size: 18px; text-align: center; font-weight: 400;">
                        {{ __('No need to worry, we\'ve got you covered! Let us provide you with a new password.') }}
                    </p>
                    <a href="{{ route('views.reset.index', $data['token']) }}" target="_blank"
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
							margin: 0 auto;
						">
                        {{ __('Reset Password') }}
                    </a>
                </section>
                <p style="margin: 40px 0 0 0; font-size: 16px; text-align: center; color: #030712;">
                    {{ __('If you didn\'t request a password change, you can ignore this email.') }}
                </p>
            </div>
        </td>
    </tr>
</table>
